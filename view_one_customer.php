<?php
include "db_connection.php";
$emal=$_GET['id'];
$sql="select * from customers where email='$emal'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
         li{
            margin:5px;
        }
        </style>
    <title>Profile</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container-fluid">
      <a style="position: relative;" class="navbar-brand" href="#">
        <img src="image/spark.jpg" alt="" width="60" height="60" style="position: absolute;"  class="d-inline-block align-text-top">
            <p  class="text-white font-weight-bold " style="margin-left: 65px;margin-top: 10px;" >
                Bank Of Spark Foundation</p>
      </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="nav navbar">

            <li class="nav-item">
              <a class="btn btn-outline-dark text-white" aria-current="page" href="index.html">Home</a>
            </li>
            
            <li class="nav-item">
              <a class="btn btn-outline-dark text-white" aria-current="page" href="view_all_customers.php">View-All-Customers</a>
            </li>
      </ul>
    </div>

    </div>
    </nav>
  </header>


    <div class="card" style="width: 22rem; margin-left:100px;margin-top:50px;">
      <img class="card-img-top" id="img" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Name: <?php echo $row['name'];  ?> </h5>
        <h5 class="card-title">E-mail: <?php echo $row['email'];  ?> </h5>
        <h5 class="card-title">Current-Balance: ₹<?php echo $row['current_balance'];  ?></h5>
        <h5 class="card-title">Gender: <?php echo $row['gender'];  ?></h5>
        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
    <div style="position:absolute; left:60%; top:60%;">
  <img style="position:relative;" src="image/two-half-circle-logo-design.jpg">
  <a style="position:absolute;left:-60px;top:67px;"  class="btn btn-success" href="transfer_money.php?id=<?php echo $emal ?>">Transfer Money</a><br><br>
  <a style="position:absolute; left:110px;top:67px; " class="btn btn-success"  href="transcation_history.php?id=<?php echo $emal ?>">Transaction History</a>
</div>

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
    let gender="<?php echo $row['gender'] ?>"
    if(gender==="male")
    {
        document.getElementById("img").src="image/man_character.jpg";
    }else{
        document.getElementById("img").src="image/woman_character.jpg";
    }
    
    </script>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
