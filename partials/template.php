<?php
  session_start();
  require_once '../controllers/connection.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    <!-- <link rel="shortcut icon" href="img/favicon/favicon.ico"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/bgimg/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/bgimg/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/bgimg/favicon-16x16.png">
	<link rel="manifest" href="../assets/bgimg/site.webmanifest">


    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 



    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#0C3823">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#0C3823">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#0C3823">
    
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Modak" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Modak|Righteous" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <title>MK Outdoor Store</title>

    <link rel="stylesheet" href="../assets/css/gallery.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.4/hammer.min.js"></script>
    <script src="../assets/js/gallery.js"></script>
    <script src="../assets/js/main.js"></script>
  </head>
   <?php if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2){ ?>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" onscroll="showHideNav(this)">
      <a href="./home.php" class="navbar-brand"><img src="../assets/bgimg/MK-store.png" id="logo" width="150"></a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav ml-auto d-flex align-items-center">
          <li class="nav-item">
            <a href="./home.php" class="nav-link">Home</a>
          </li>

          <?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2) {?>
           <li class="nav-item">
            <a href="../views/home.php#aboutus" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="./catalog.php" class="nav-link">Shop</a>
          </li>
          <li class="nav-item">
            <a href="../views/transactions.php" class="nav-link">Transactions</a>
          </li>
          <li class="nav-item">
            <a href="../views/home.php#contactus" class="nav-link" onclick="addNav()">Conctact Us</a>
          </li>
          <?php
          } 
          ?>
          <!-- if not logged in -->
          <?php 
          if (!isset($_SESSION['user'])) {
          ?>
          <li class="nav-item">
              <a href="./catalog.php" class="nav-link">Shop</a>
            </li>
            <li class='nav-item'>
            <a href='./login.php' class='nav-link d-flex align-items-center'><img src="../assets/bgimg/login1.png" style="width: 40px;">Login</a>
            </li>
            <li class='nav-item'>
            <a href='./register.php' class='nav-link'><img src="../assets/bgimg/reg1.png" style="width: 25px;">Register</a>
            </li>
            
          <?php
          } else if (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2){
          ?>
          <li class='nav-item'>
            <a href='./profile.php' class='nav-link'>Welcome, <?php echo $_SESSION['user']['firstname'] . " "?> <?php echo $_SESSION['user']['lastname']; ?> </a>
          </li>
          <li class='nav-item'>
            <a href='../views/logout.php' class='nav-link'>Logout</a>
          </li>
          <li class="nav-item">
            <a href="./cart.php" class="nav-link" style="height: 52px">
              <img src="../assets/bgimg/unnamed1.png" style="width: 35px;">
              <span class="badge" id="cart-count">
              <div class="cartnum" id="cartno">
                <?php
                  if(isset($_SESSION['cart'])) {
                    echo array_sum($_SESSION['cart']);
                  } else {
                    echo 0;
                  }
                ?></div>
              </span>
            </a>
          </li>
          <?php
          } else {
          ?>
            <li class='nav-item'>
            <a href='./profile.php' class='nav-link'>Welcome, <?php echo $_SESSION['user']['firstname'] . " "?> <?php echo $_SESSION['user']['lastname']; ?> </a>
          </li>
          <li class='nav-item'>
            <a href='../views/logout.php' class='nav-link'>Logout</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>

    <main>
       <?php get_body_contents();?>
    </main> 
    <footer class="footer bg-secondary d-flex align-items-center justify-content-center" id="topFooter">
      
    </footer>
    <footer class="footer bg-dark d-flex justify-content-center" id="bottomFooter">
      <div class="text-white my-0 text-justify mx-5">
        DISCLAIMER: This website is for educational purpose only. I do not own nor claim to own any images and content within this website
      </div>
    </footer>
<?php } else if (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1) { ?>
<body>
  <div class="container-fluid m-0 p-0">
     <div class="row bg-info m-0 p-0  fixed-top">
        <div class="col-lg-12 d-flex justify-content-between align-items-center mt-3">
          <p>
            <img src="../assets/bgimg/MK-store.png" id="logo" width="150">
          </p>
          <p class="text-white logoutItem">
            <a href='../views/logout.php' class='nav-link text-white logoutText'>LOGOUT</a>
          </p>
        </div>
     </div>

     <div class="row p-0 m-0 mt-3">
      <div class="col-lg-2 bg-secondary mt-3">
        <nav class="navbar col-lg-2 m-0 p-0 navbar-expand-lg navbar-dark"  id="adminNav">
          <hr>
          <button class="navbar-toggler mt-5 mb-2 btnMobile" data-toggle="collapse" data-target="#navContent">
            <span class="navbar-toggler-icon"></span>
          </button>

      <div class="collapse navbar-collapse " id="navContent">
        <ul class="navbar-nav col-lg-12 m-0 p-0 flex-column mt-5" id="navIto">
          <li class="nav-item">
              <h3 class="text-white mt-3" id="adminPan">Admin Panel</h3>
          </li>
          <hr class="col-lg-9">
          <li class="nav-item">
              <a href="./home.php" class="nav-link">GEARS</a>
          </li>
          <hr class="col-lg-9">
          <li class='nav-item'>
              <a href='../views/add_item.php' class='nav-link'>ADD NEW GEARS</a>
          </li>
          <hr class="col-lg-9">
          <li class="nav-item">
            <a href="../views/all_transactions.php" class="nav-link">ALL TRANSACTION</a>
          </li>
          <hr class="col-lg-9">
               </ul>
          </div>
        </nav>

         </div>
        <div class="col-lg-10 m-0 p-0 mt-5" id="contentAdmin">
          <main>
            <?php get_body_contents();?>
          </main>
        </div>
     </div> <!-- end of row -->

  </div>
<footer class="footer bg-dark d-flex justify-content-center align-items-center" id="bottomFooter">
      <div class="text-white my-0 text-justify mx-5 my-5">
        DISCLAIMER: This website is for educational purpose only. I do not own nor claim to own any images and content within this website
      </div>
    </footer>
<?php } ?>

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>

    