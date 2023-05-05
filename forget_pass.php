<?php 
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <title>Forget Password</title>
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js2/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js2/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="container mt-4">
      <div class="row d-flex justify-content-center">
          <div class="col-md-6">
              <div class="card">
                  <div class="card-body text-center">
                    <button class="btn btn-lg btn-danger col-2 mb-5 float-start" id="back">Back</button>
                    <form method="post" class="form1 col-12">
                        <input type="text" name="email" placeholder="Enter your email" class="form-control form-control-lg mb-4" required> <br>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg col-2 mb-5 ">Submit</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

    <!-- Enter Otp -->
    <div class="modal fade" role="dialog" id="forgetPassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body ">
                    <form method="post" class="form-group">
                        <input type="text" class="form-control form-control-lg mb-3" name="forgetPasswordOtp" placeholder="Enter OTP" required>
                        <button type="submit" class="btn btn-lg btn-primary col-12" name="forgetPasswordOtpSubmit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Enter New Password -->
    <div class="modal fade" role="dialog" id="newPassModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body ">
                    <form method="post" class="form-group">
                        <input type="password" class="form-control form-control-lg mb-3" name="newPass" placeholder="Enter new password" required>
                        <button type="submit" class="btn btn-lg btn-primary col-12" name="newPassSubmit"> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $_SESSION['Email'] = $email = $_POST['email'];
        $name = '';
        $query = "SELECT * FROM `uccp_login` WHERE Email = '$email' ";
        $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result)){
                $name = $row['Email'];
                $username = $row['Username'];
                $id = $row['id'];
            }
        $_SESSION['Username'] = $username;
        $_SESSION['id'] = $id;
        if($name == null){
            echo "<script>
            alert('EMAIL DO NOT EXIST!');
            windown.location.replace('forget_pass.php');
            </script>"; 
            return;
        }
        //email exist
        else{
            $forgetPasswordOtp = uniqid();
            $queryInsertForgetPasswordOtp = "UPDATE `uccp_login` SET otp = '$forgetPasswordOtp' WHERE id ='$id'";   
            if($conn -> query($queryInsertForgetPasswordOtp)){
                echo "<script>$('#forgetPassModal').modal('show');</script>";
                //Load Composer's autoloader
                require 'vendor/autoload.php';
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                //Server settings
                $mail->SMTPDebug  = SMTP::DEBUG_OFF;                        //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'mail.ucc-csd-bscs.com';		                //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'uccp@ucc-csd-bscs.com';              //from //SMTP username
                $mail->Password   = 'uccpmailer123';                         //SMTP password
                $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
                $mail->Port       =  465;       
                //Recipients
                $mail->setFrom('vot@ucc-csd-bscs.com', 'uccp');
                $mail->addAddress("$email");                                //sent to
                //Content
                $mail->Subject = 'Forget Password OTP:';
                $mail->Body    = "Good Day, $name \n \n We would like to inform you that you're trying to change your password. \n To confirm please use this OTP: $forgetPasswordOtp \n \nThank You!";
                $mail->send();
            }
        }
    }
    //submit forget pass otp
    if(isset($_POST['forgetPasswordOtpSubmit'])){
        $forgetPasswordOtp = $_POST['forgetPasswordOtp'];
        $selectForgetPassOtp = "SELECT otp FROM `uccp_login` WHERE otp = '$forgetPasswordOtp'";
        $result = mysqli_query($conn,$selectForgetPassOtp);
        //check if otp match
        if($result -> num_rows == 0){
            echo "<script>
            alert('Forget Password OTP not match!');
            window.location.replace('forget_pass.php');
            </script>"; 
            return;
        }
        //otp match
        else{
            echo "<script>$('#newPassModal').modal('show');</script>";
        }
    }

    // submit new pass
    if(isset($_POST['newPassSubmit'])){
        $email = $_SESSION['Email'];
        $password = $_POST['newPass'];
        $hash = $password;
        $queryNewPass = "UPDATE `uccp_login` SET Password = '$hash' where id = '$_SESSION[id]'";
        $queryNewPass1 = "UPDATE `uccp_studentinfo` SET password = '$hash' where id = '$_SESSION[id]'";
        mysqli_query($conn,$queryNewPass1);
        $queryNewPass2 = "UPDATE `uccp_professor` SET password = '$hash' where id = '$_SESSION[id]'";
        mysqli_query($conn,$queryNewPass2);
        if($conn ->query($queryNewPass)){
            echo "<script>
            alert('Update Password Sucess!');
            window.location.replace(loginform.php);
            </script>";
        }
        else{
            die($conn ->error);
            echo "<script>
            alert('Update Password Unsucess!');
            window.location.replace(forget_pass.php);
            </script>";
        }
    }

?>
<script>
    document.getElementById("back").onclick = function() {
        window.location.replace('loginform.php');
    };
</script>
