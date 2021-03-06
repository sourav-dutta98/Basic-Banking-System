<?php
include "db_connection.php";
$value=$_GET['id'];
$s_name="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        li{
            margin:5px;
        }
        </style>
      <title>Transcation History</title>
</head>
<body style="display: flex;flex-direction: column;">
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container-fluid">
      <a style="position: relative;" class="navbar-brand" href="#">
        <img src="image/spark.jpg" alt="" width="60" height="60" style="position: absolute;"  class="d-inline-block align-text-top">
            <p  class="text-white font-weight-bold" style="margin-left: 65px;margin-top: 10px;" >
                Bank Of Spark Foundation</p>
      </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="nav navbar">
              <?php
              if($value==1){ 
              ?>
            <li class="nav-item">
              <a class="btn btn-outline-dark text-white " aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-dark text-white " aria-current="page" href="view_all_customers.php">View-All-Customers</a>
            </li>
            <?php } 
            else{?>
                 <li class="nav-item">
              <a class="btn btn-outline-dark text-white " aria-current="page" href="view_one_customer.php?id=<?php echo $value?>">Profile</a>
            </li>
            <?php } ?>
            
      </ul>
    </div>

    </div>
    </nav>

  </header>

    <?php if($value==1)
    {
        ?>
<div class="container align-middle">
    <h3 style="text-align:center;">All Customers Transition Details</h3>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
            <th class="text-center">Sr.No.</td>
            <th class="text-center">Sender-Name</td>
            <th class="text-center">Sender-Email</td>
            <th class="text-center">Receiver-Name</td>
            <th class="text-center">Receiver-Email</td>
            <th class="text-center">Amount</td>
            </tr>

        </thead>
        <tbody>
        <?php
        $sql="select * from transfers";
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
                $sno=$sno+1;
            ?>
                <tr>
                    <td class="text-center"><?php echo $sno?></td>
                    <td class="text-center"><?php echo $row['sender_name']?></td>
                    <td class="text-center"><?php echo $row['sender_email']?></td>
                    <td class="text-center"><?php echo $row['recever_name']?></td>
                    <td class="text-center"><?php echo $row['recever_email']?></td>
                    <td class="text-center">???<?php echo $row['amount']?></td>
                </tr>
                <?php

            }
        }


?>
</tbody>
</table>
    </div>
    <?php
     } 
    else{
    ?>
    <div class="container align-middle">
    <h3 id="head"style="text-align:center;"></h3>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
            <th class="text-center">Sr.No.</td>
            <th class="text-center">Receiver-Name</td>
            <th class="text-center">Receiver-Email</td>
            <th class="text-center">Amount</td>
            </tr>

        </thead>
        <tbody>
        <?php
        $sql="select * from transfers where sender_email='$value'";
        $result=mysqli_query($conn,$sql);
        
        if (mysqli_num_rows($result) > 0) {
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
                $sno=$sno+1;
                $s_name=$row['sender_name'];
            ?>
                <tr>
                    <td class="text-center"><?php echo $sno?></td>
                    <td class="text-center"><?php echo $row['recever_name']?></td>
                    <td class="text-center"><?php echo $row['recever_email']?></td>
                    <td class="text-center">???<?php echo $row['amount']?></td>
                </tr>
                <?php

            }
        }


?>
</tbody>
</table>
    </div>
    <?php }
    ?>

<footer class="bg-dark text-center text-white" style="width:100%; margin-top: auto;">
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
        ?? 2022 Copyright:
        <a class="text-white" href="https://www.thesparksfoundationsingapore.org/">The Spark Foundation</a>
      </div>
      <!-- Copyright -->
    </footer>
    <script>
        let value="<?php echo $value ?>";
        
        if(value != 1)
        {
            console.log("okk..");
            let s_name="<?php echo $s_name; ?>"
         
            document.getElementById('head').innerHTML=`${s_name} Transition Details`
        }
        </script>
               <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>