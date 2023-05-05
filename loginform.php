<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
        <link rel="icon" href="favicon.ico">
      <link rel="stylesheet" href="loginform.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
  </head>
<body class="body">

    <div class="container">
        <div class="myCard">
            <div class="row g-0">
                <div class=" col-md-6 col-12">
                    <div class="myleftCtn">
                        <a href="index.php"><i class="fa-sharp fa-solid fa-chevron-left"></i></a>
                        <form class="myForm text-center" method="post" action="login.php">
                          <h4>
                            <?php
                            error_reporting(0);
                            session_start();
                            session_destroy();
                            echo $_SESSION['Messages'];
                             ?>
                          </h4>
                          <header>
                              <img src="UCCLOGO.png" class="rounded mx-auto d-block logo" alt="...">
                            UNIVERSITY OF CALOOCAN CITY</header>

                          <h2>UCC PORTAL</h2>
                          <div class="line mx-auto ">
                          </div>
                              <div class="form-group mx-auto ">
                                <i class="fas fa-user "></i>
                                <input type="text" class="myInput" placeholder="username" id="username" name="username" required>
                              </div>
                              <div class="form-group">
                                <i class="fas fa-lock"></i>
                               <input type="password" class="myInput" placeholder="password" id="password" name="password" required>
                              </div>
                            <input type="submit" name="login" value="Log in" class="btn1 mt-4 mb-3">  <br>
                           <small><a href="forget_pass.php" class="check_1">FORGOT PASSWORD?</a></small>
                        </form>

                        <div class="text d-flex align-items-center justify-content-center align-content-center text-center  flex-column">
                          <h7>Biglang Awa. Street 11Th Avenue Catleya, Caloocan City</h7>
                          <h7>Tel: +632-3106581 / +632-3106855</h7>
                        </div>
                    </div>
                </div>
                          <div class="lside col-md-6 col-12 text-center ">
                             <div class="myRightCtn">
                                <div class="box text-center"><h4>WELCOME TO UCC !</h4>
                                  <img src="UCCLOGO.png" class="rounded mx-auto d-block logo" alt="...">
                                <div class="text d-flex align-items-center justify-content-center align-content-center text-center py-auto flex-column">
                                  <h7>Biglang Awa. Street 11Th Avenue Catleya, Caloocan City</h7>
                                  <h7>Tel: +632-3106581 / +632-3106855</h7>
                                </div>
                                </div>
                                </div>
                             </div>
                          </div>
            </div>
        </div>

      <script src="https://kit.fontawesome.com/d8ddf54c25.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  </body>
</html>
<?php
session_destroy();
?>