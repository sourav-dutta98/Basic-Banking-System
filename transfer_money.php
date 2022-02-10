<?php
include "db_connection.php";
$emal=$_GET['id'];
$sql='select * from customers';
$result=mysqli_query($conn,$sql);
function Calculation_1($conn,$sq,$bal)
{
    $result=mysqli_query($conn,$sq);
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $em=$row['email'];
        $bal=$row['current_balance']+$bal;
        $sql="update customers set current_balance='$bal' where email='$em'";
        mysqli_query($conn,$sql);
    }
}
function Calculation_2($conn,$sq,$bal,$r_name,$r_email)
{
    $result=mysqli_query($conn,$sq);
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $amount=$bal;
        
        $bal=$row['current_balance']-$bal;
        $em=$row['email'];
        $s_name=$row['name'];

        $sql="update customers set current_balance='$bal'where email='$em' ";
        mysqli_query($conn,$sql);

        $sql_new="INSERT INTO transfers (sender_name, sender_email, recever_name, recever_email,amount)
        VALUES ('$s_name','$em', '$r_name','$r_email','$amount')";
      mysqli_query($conn,$sql_new);

    }
}
$log=false;
$vne=false;
$vna=false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["balance"]))){
        $bal_err = "Please enter Amount";
        $log=true;
    } 
    else
    {
        $bal = trim($_POST["balance"]);
        if($bal<0)
        {
          $vna=true;
        }
        
    }

    if(empty(trim($_POST['email']))){

        $ne_err = "Please Enter e-mail";
        $vne=true;
    } 
    if(empty($bal_err) && empty($ne_err) && !$vna)
    {
    $name=$_POST['cname'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];

    $sql_2="select current_balance,email,name from customers where email='$emal'";
    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql_2));
    if($balance<$row['current_balance']){
    Calculation_2($conn,$sql_2,$balance,$name,$email);

    $sql_1="select current_balance,email,name from customers where email='$email'";
    Calculation_1($conn,$sql_1,$balance);
    echo '<script>confirm("Money Transfer Sucessfully!!")</script>';
    echo '<script>window.location.href= "view_all_customers.php"</script>';
    }
    else{
      echo '<script>alert("Infficient Balance ")</script>';
      
    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <style>
         li{
             margin:5px;
         }
         </style>
  
<title>Transaction</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container-fluid">
      <a style="position: relative;" class="navbar-brand" href="#">
        <img src="image/spark.jpg" alt="" width="60" height="60" style="position: absolute;"  class="d-inline-block align-text-top">
            <p class="text-white font-weight-bold " style="margin-left: 65px;margin-top: 10px;" >
                Bank Of Spark Foundation</p>
      </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="nav navbar">

            <li class="nav-item">
              <a class="btn btn-outline-dark text-white " aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-dark text-white " aria-current="page" href="view_one_customer.php?id=<?php echo $emal?>">Profile</a>
            </li>
      </ul>
    </div>

    </div>
    </nav>
  </header>

    <?php
    if($log){
        echo'
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!</strong> '.$bal_err.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }

        if($vne){
            echo'
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>ERROR!</strong>'.$ne_err.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>';

        }
        if($vna){
            echo'
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>ERROR!</strong> Negative amount does not send
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>';

        }
    ?>
    <section>
    <div style="padding:10px;margin-top:30px; width:30rem; position:relative; left:30%;background-color: #f2f2f2;">
    <div class="h3 text-center" >Make a Transaction</div><br>
    <label for="fname"><i class="fa fa-user"></i> Sender-Full Name</label>
    <h4><?php
            $sql_3="select name,current_balance from customers where email='$emal'";
            $re=mysqli_query($conn,$sql_3);
            $row1=mysqli_fetch_assoc($re);
            echo $row1['name'];
                ?>
    </h4>
    <label ><i class="fas fa-balance-scale"></i> Sender-Balance</label>
    <h4>₹<?php
            echo $row1['current_balance'];
                ?>
    </h4>
    <br>
    <form method="post">
    <div class="form-group">
    <label for="fname"><i class="fa fa-user"></i> Receiver-Full Name</label>
        <!-- <label for="option_id" class="font-weight-bold">Reciver</label><br> -->
        <select class="form-control"  id="option_id" name="cname" onChange="update()">
        <!-- option tag starts -->
            <option>Choose one Name</option>
            <?php
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result))
                {
                    if($row['email']==$emal){
                        continue;
                    }
                    else{
                    echo '<option  value="'.$row['name'].'" name="'.$row['email'].'">'.$row['name'].'</option>';
                    }
                }
        }

        ?>
        </select><br>
        <label for="emails"><i class="fa fa-envelope"></i> Email</label>
        <input  class="form-control" list="emails" name="email" id="email">
        <datalist id="emails">
            <option id="set_value">
        </datalist><br><br>
        <label for="amount" ><i class="fas fa-rupee-sign"></i>Amount</label><br>
        <input class="form-control" id="amount" type="number" name="balance">
    </div>
        <button type="submit" class="btn btn-primary btn-block font-weight-bold " >Send Money</button>
        <button type="reset" class="btn btn-info btn-block font-weight-bold " >Reset</button>
    </form>
    <div>
    </section>
    <footer class="bg-dark text-center text-white" style="position:absolute; top:120%; width:100%;">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
          ></a>
    
          <!-- Twitter -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
          ></a>
    
          <!-- Google -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-google"></i
          ></a>
    
          <!-- Instagram -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
          ></a>
    
          <!-- Linkedin -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
          ></a>
    
          <!-- Github -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-github"></i
          ></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->
    
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-white" href="https://www.thesparksfoundationsingapore.org/">The Spark Foundation</a>
      </div>
      <!-- Copyright -->
    </footer>

        <script>

          
         		function update() {
				  var select = document.getElementById('option_id');
				  var option = select.options[select.selectedIndex];
            let email_value=option.getAttribute('name');
            console.log(email_value)

                document.getElementById('set_value').value=email_value;
			    }
                
            </script>
            <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>



