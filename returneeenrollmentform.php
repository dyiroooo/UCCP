
<?php
include('config.php');
$sql="SELECT schoolyear,sem FROM  `uccp_enrollment_schedule` WHERE status = 'open' ";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){

    $u = $row['schoolyear'];
    $s = $row['sem'];
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="returneeenrollments.css">
    <title>Returnee Enrollment Form</title>
</head>
<body>

    <div class="container mt-0">
          <a href="index.php"><i class="fa-sharp fa-solid fa-chevron-left"></i></a>
        <header>Returnee Enrollment Form</header>  <span style="display: block; text-align: center;" id="check"></span>
        <form action="returnee-submit.php" method="post" enctype="multipart/form-data" id="enrollmentformF">
            <div class="form">
              <div class="fields">

                <div class="input-field-2">
                    <label>School Year</label>
                    <input type="text"  name="Schoolyear" placeholder="School Year"  value="<?php echo $u ?>" required readonly >

                </div>

              <div class="input-field-2">
                  <label>Semester</label>
                <input type="text" placeholder="Semester" name="Sem"  value="<?php echo $s ?>" required readonly >
              </div>
            </div>
                <div class="details personal">
                    <div class="fields">

                        <div class="input-field-1">
                            <label>Last Name</label>
                            <input type="text"  id="Lastname" name="Lastname" placeholder="Enter your last name" required>
                        </div>

                        <div class="input-field-1">
                            <label>Given Name</label>
                            <input type="text"  name="Givenname"  id="Givenname" placeholder="Enter your given name" required>
                        </div>

                        <div class="input-field-1">
                            <label>Middle Name</label>
                            <input type="text"  name="Middlename"  id="Middlename" placeholder="Enter your middle name">
                        </div>

                        <div class="input-field-2">
                            <label>Date of Birth</label>
                            <input type="date"  name="Birthday" placeholder="Enter your birthday" required>
                        </div>
                        
                        <div class="input-field-2">
                            <label>Place of Birth</label>
                            <input type="text"  name="Bdplace" placeholder="Enter your birth place" required>
                        </div>

                        <div class="input-field-2">
                            <label>Email Address</label>
                            <input type="text"  name="Email" id="Email" placeholder="Enter your email address" required>
                        </div>

                        <div class="input-field-2">
                            <label>Mobile Number</label>
                            <input type="number"  name="Number" placeholder="Enter your mobile number" required>
                        </div>
                        
                        <div class="input-field-2">
                            <label>Gender</label>
                            <select name="Gender" required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        
                        <div class="input-field-3">
                            <label>Home Address</label>
                            <input type="text"  name="Haddress" placeholder="Enter your home address" required>
                        </div>

                    </div>
                </div>

                <div class="details course">
                    <div class="fields">
                      <div class="input-field-2">
                            <label>Input Course</label>
                            <select class="" name="F-choice"  placeholder="Enter your choice course" required>
                                <option value="" disabled selected>Select Course</option>
                              <?php
                              include "config.php";

                                $sql="SELECT courses FROM  `uccp_add_courses` WHERE status ='Enable' ";
                                  $result = mysqli_query($conn,$sql);
                                      while($row = mysqli_fetch_assoc($result)){
                                        echo '<option>'.$row['courses'].'</option>';
                                      }
                              ?>
                              </select>
                        </div>

                        <div class="input-field-2">
                            <label>Year Level</label>
                            <select name="Yearlevel">
                                <option disabled selected>Select Year</option>
                                <option>1st Year</option>
                                <option>2nd Year</option>
                                <option>3rd Year</option>
                                <option>4th Year</option>
                            </select>
                        </div>
                      </div>
                </div>

                <div class="school require">
                    <span class="title">School Requirements</span>
                      <div class="fields">

                        <div class="input-field-4">
                            <label>Upload PICTURE</label>
                            <input type="file" name="Picture[]">
                        </div>

                        <div class="input-field-4">
                            <label>Upload Diploma</label>
                            <input type="file" name="Diploma[]">
                        </div>

                        <div class="input-field-4">
                            <label>Upload Good Moral</label>
                            <input type="file" name="Goodmoral[]">
                        </div>

                        <div class="input-field-4">
                            <label>Upload Report Card</label>
                            <input type="file" name="Reportcard[]">
                        </div>

                        <div class="input-field-4">
                            <label>Upload PSA</label>
                            <input type="file" name="Psa[]">
                        </div>

                        <div class="input-field-4">
                            <label>Upload PROOF OF RESIDENCY</label>
                            <input type="file" name="Proof[]">
                        </div>
                        
                        <div class="input-field-4">
                            <label>Upload ERF</label>
                            <input type="file" name="Erf[]">
                        </div>
                        
                        <div class="input-field-4">
                            <label>Upload Records</label>
                            <input type="file" name="Records[]">
                        </div> 
                        
                      </div>
                </div>

                    <div class="buttons">
                        <button class="sumbit" type="submit" name="returnesend" id="btns1">
                            <span class="btnSubmit">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
              </div>
        </form>
    </div>

    <script>
    //     const form = document.querySelector("form"),
    //       nextBtn = form.querySelector(".nextBtn"),
    //       backBtn = form.querySelector(".backBtn"),
    //       allInput = form.querySelectorAll(".first input");


    //   nextBtn.addEventListener("click", ()=> {
    //     allInput.forEach(input => {
    //         if(input.value != ""){
    //             form.classList.add('secActive');
    //         }else{
    //             form.classList.remove('secActive');
    //         }
    //     })
    //   })

    // backBtn.addEventListener("click", () => form.classList.remove('secActive'));

    </script>
</body>
</html>

<script>
$(document).ready(function(){
    $('#Lastname, #Givenname, #Middlename, #Email').on('input', function(){
        var name2 = $('#Givenname').val() + ' ' + $('#Middlename').val() + ' ' + $('#Lastname').val();

      
        $.ajax({
            type: 'POST',
            url: 'validationform.php',
            data: {name2: name2},
            success: function(response){
                console.log(response);
                if(response == 'none_exist'){
                    $('#check').html('You are not categorized as Returnee').css('color', 'red');
                    $('#Lastname').css('border-color', 'red').prop('required', true);
                    $('#Middlename').css('border-color', 'red').prop('required', true);
                    $('#Givenname').css('border-color', 'red').prop('required', true);
                 
                    $('#btns1').prop('disabled', true).css('background-color', '#999');
                
               } else {
                    $('#check').empty();
                    $('#Lastname').css('border-color', '#007bff').prop('required', false);
                    $('#Middlename').css('border-color', '#007bff').prop('required', false);
                    $('#Givenname').css('border-color', '#007bff').prop('required', false);
               
                    $('#btns1').prop('disabled', false).css('background-color', '#007bff');
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + xhr.responseText);
            }
        });
    });
});

 
</script>

