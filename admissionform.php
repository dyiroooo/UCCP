<?php
include('config.php');
$sql="SELECT schoolyear FROM  `uccp_admission_schedule` WHERE status = 'Open' ";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_assoc($result)){
    $u = $row['schoolyear'];

}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script https://code.jquery.com/jquery-3.6.1.min.js></script>
    <link rel="icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="stylesheet" href="admissionform.css">
    <title>Admission Form</title>
</head>
<body>


    <div class="container">
                <a href="index.php"><i class="fa-sharp fa-solid fa-chevron-left"></i></a>
        <header>Admission Form</header>

        
        <form action="Admission-submit.php" method="post" enctype="multipart/form-data" id="admissionform">
          <div class=" mx-auto" >
              <label>SCHOOL YEAR</label>
              <input type="text" name="Schoolyear" placeholder="" required readonly value="<?php echo $u; ?>">
          </div>

                <div class="details personal">
                    <span class="title">Personal Details</span>  <span style="display: block; text-align: center;" id="check"></span>
                   

                    <div class="fields">
                    <div class="input-field-1">
                        
                        <label>Last Name</label>
                        <input type="text" id="LastName" name="Lastname" placeholder="Enter your last name"  required >
                    </div>

                    <div class="input-field-1">
                     
                        <label>Given Name</label>
                        <input type="text" id="GivenName" name="Givenname" placeholder="Enter your given name" required>
                    </div>

                    <div class="input-field-1">
                      
                        <label>Middle Name</label>
                        <input type="text" id="MiddleName" name="Middlename" placeholder="Enter your middle name" >
                    </div>


                        <div class="input-field-2">
                            <label>Date of Birth</label>
                            <input name="Date" type="date" placeholder="Enter birth date" required>                            
                        </div>

                        <div class="input-field-2">
                            <label>Place of Birth</label>
                            <input name="Bdplace" type="text" placeholder="Enter birth place" required>
                        </div>
                        

                      

                        <div class="input-field-2">
                        
                            <label>Email Address</label>     
                            <!--<span style="display: block; text-align: center;" id="emailz"></span>-->
                            <input name="Email" id="EmailAdd" type="text" placeholder="Enter your email address" required >   
                        </div>

                   
                        <div class="input-field-3">
                            <label>Mobile Number</label>
                            <input name="Number" type="number" placeholder="Enter your mobile number" required>
                        </div>
                        

                        <div class="input-field-3">
                             <label>Gender</label>
                            <select name="Gender" required>
                                <option readonly selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="input-field-4">
                            <label>Home Address</label>
                            <input name="Address" type="text" placeholder="Enter your home address" required>
                        </div>
                    </div>
                </div>

                    <div class="fields">
                      <div class="input-field-5">
                          <label>Guardian`s Name</label>
                          <input name="Guardian" type="text" placeholder="Enter your guardian`s name" required>
                      </div>

                        <div class="input-field-5">
                            <label>Guardian`s Occupation</label>
                            <input name="G-occupation" type="text" placeholder="Enter guardian`s occupation" required>
                        </div>

                        <div class="input-field-6">
                            <label>Guardian`s Contact Number</label>
                            <input name="G-contact" type="number" placeholder="Enter guardian`s contact number" required>
                        </div>

                        <div class="input-field-7">
                            <label>Guardian`s Home Address</label>
                            <input name="G-address" type="text" placeholder="Enter guardian`s occupation" required>
                        </div>
                    </div>

                <div class="details education">
                    <span class="title">Education Background</span>

                    <div class="fields">
                        <div class="input-field-8 ">
                            <label>Primary School</label>
                            <input name="Primary" type="text" placeholder="Enter your primary school name" required>
                        </div>

                        <div class="input-field-8">
                            <label>School Year</label>
                            <input name="Primary-sy" type="text" placeholder="Enter your primary school year" required>
                        </div>

                        <div class="input-field-8">
                            <label>Secondary School</label>
                            <input name="Highschool" type="text" placeholder="Enter your high school name" required>
                        </div>

                        <div class="input-field-8">
                            <label>School Year</label>
                            <input name="Highschool-sy" type="text" placeholder="Enter your high school year" required>
                        </div>

                        <div class="input-field-8">
                            <label>Senior High School</label>
                            <input name="Shs" type="text" placeholder="Enter your senior high school name" required>
                        </div>

                        <div class="input-field-8">
                            <label>School Year</label>
                            <input name="Shs-sy" type="text" placeholder="Enter your senior high school year" required>
                        </div>
                    </div>
                </div>

                <div class="details course">
                    <span class="title">Desired Course</span>

                    <div class="fields">
                        <div class="input-field-8 ">
                            <label>Input First Choice Course</label>

                            <select class="" name="F-choice"  placeholder="Enter first choice course" required>
                                <option selected readonly>Select Course</option>
                              <?php
                              include "config.php";

                                $sql="SELECT courses FROM  `uccp_add_courses` WHERE status='Enable' ";
                                  $result = mysqli_query($conn,$sql);
                                      while($row = mysqli_fetch_assoc($result)){
                                        echo '<option>'.$row['courses'].'</option>';
                                      }
                              ?>
                              </select>
                        </div>
                        </div>
                </div>

                <div class="school require "class="form-control" >
                    <span class="title">School Requirements</span>

                    <div class="fields">
                        <div class="input-field-8 ">
                            <label>PSA</label>
                            <input type="file" name="Requirements[]" value = "" class="form-control" required>
                        </div>

                        <div class="input-field-8 ">
                            <label>FORM 138</label>
                            <input type="file" name="Card[]" value = "" class="form-control" required>
                        </div>

                        <div class="input-field-8 ">
                            <label>Upload Picture</label>
                            <input type="file" name="Picture[]"  value = "" class="form-control" required>
                        </div>

                        <div class="input-field-8 ">
                            <label>Upload Proof of Residency</label>
                            <input type="file"  name="Proof[]" value = "" class="form-control" required>
                        </div>

                        </div>


                    </div>
                  
                    <div class="buttons">
                        <button class="sumbit" type="submit" name="send" id="btn">
                            <span class="btnSubmit">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>

                </div>

                  </div>
            </div>
        </form>

</body>
</html>


<!-- <script type="text/javascript">
// function CheckName(){
//     var fullName = $('#GivenName').val() + ' ' + $('#MiddleName').val() + ' ' + $('#LastName').val();
//     var email =$('#EmailAdd').val();
//     $.ajax({
//         url:'validationform.php',
//         type: 'post',
//         data: {fullName: fullName,email:email},
//         success:function(data,status){
//             $('#check').html(data);
//             $('#check').html(data);
//         }
//     })
// }
</script> -->

<script>
$(document).ready(function(){
    $('#LastName, #GivenName, #MiddleName, #EmailAdd').on('input', function(){
        var name = $('#GivenName').val() + ' ' + $('#MiddleName').val() + ' ' + $('#LastName').val();
        var email = $('#EmailAdd').val();
        $.ajax({
            type: 'POST',
            url: 'validationform.php',
            data: {name: name, email: email},
            success: function(response){
                console.log(response);
                if(response == 'exists'){
                    $('#check').html('Name and Email already exist.').css('color', 'red');
                    $('#LastName').css('border-color', 'red').prop('required', true);
                    $('#MiddleName').css('border-color', 'red').prop('required', true);
                    $('#GivenName').css('border-color', 'red').prop('required', true);
                    $('#EmailAdd').css('border-color', 'red').prop('required', true);
                    $('#btn').prop('disabled', true).css('background-color', '#999');
                } else if(response == 'name_exist') {
            
                    $('#check').html('Name already exists.').css('color', 'red');
                    $('#LastName').css('border-color', 'red').prop('required', true);
                    $('#MiddleName').css('border-color', 'red').prop('required', true);
                    $('#GivenName').css('border-color', 'red').prop('required', true);
                    $('#EmailAdd').css('border-color', '#007bff').prop('required', false);
                    $('#btn').prop('disabled', true).css('background-color', '#999');
                } else if(response == 'email_exist') {
                   
                    $('#EmailAdd').css('border-color', 'red').prop('required', true);
                    $('#check').html('Email already exists.').css('color', 'red');
                    $('#LastName').css('border-color', '#007bff').prop('required', false);
                    $('#MiddleName').css('border-color', '#007bff').prop('required', false);
                    $('#GivenName').css('border-color', '#007bff').prop('required', false);
                    $('#btn').prop('disabled', true).css('background-color', '#999');
                } else {
                    $('#check').empty();
                    $('#LastName').css('border-color', '#007bff').prop('required', false);
                    $('#MiddleName').css('border-color', '#007bff').prop('required', false);
                    $('#GivenName').css('border-color', '#007bff').prop('required', false);
                    $('#EmailAdd').css('border-color', '#007bff').prop('required', false);
                    $('#btn').prop('disabled', false).css('background-color', '#007bff');
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + xhr.responseText);
            }
        });
    });
});

 
</script>
