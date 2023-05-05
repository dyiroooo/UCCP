<?php
include 'include/config.php';
session_start();
$user_id=$_SESSION['id'];
$name=$_SESSION['name'];
$sql1="SELECT schoolyear, sem FROM  `uccp_enrollment_schedule` WHERE status = 'open' ";
$result1 = mysqli_query($conn,$sql1);



while($row = mysqli_fetch_assoc($result1)){
    $u = $row['schoolyear'];
    $s = $row['sem'];
}
 ?>
<div class="container">
    <header>Enrollment Form</header>
      <form action="sidebarpage/enrollform-submit.php" method="post" enctype="multipart/form-data" id="enrollmentformexist">
          <div class="form" id ="form">
            <div class="fields">
                
             
                
                      <input type="hidden"  name="id"   value="<?php echo $user_id ?>" readonly >
             
                
            <div class="input-field-2">
                      <label>School Year</label>
                      <input type="text"  name="Schoolyear" placeholder="School Year"  value="<?php echo $u ?>" readonly>
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
                          <input type="text" name= "lname" placeholder="Enter your last name"  required>
                      </div>

                      <div class="input-field-1">
                          <label>Given Name</label>
                          <input type="text" name ="gname" placeholder="Enter your given name" required>
                      </div>

                      <div class="input-field-1">
                          <label>Middle Name</label>
                          <input type="text" name="mname" placeholder="Enter your middle name">
                      </div>

                    <div class="input-field-2">
                            <label>Date of Birth</label>
                            <input type="date"  name="birthday" placeholder="Enter your birthday" required>
                        </div>

                        <div class="input-field-2">
                            <label>Place of Birth</label>
                            <input type="text"  name="bdplace" placeholder="Enter your birth place" required>
                        </div>

                      <div class="input-field-2">
                          <label>Email Address</label>
                          <input type="text" name ="emailadd" placeholder="Enter your email address" required>
                      </div>
                      
                      <div class="input-field-2">
                          <label>Mobile Number</label>
                          <input type="number" name = "phoneno" placeholder="Enter mobile number" required>
                      </div>

                    <div class="input-field-2">
                            <label>Gender</label>
                            <select name="gender" required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="input-field-3">
                            <label>Home Address</label>
                            <input type="text"  name="haddress" placeholder="Enter your home address" required>
                        </div>

                  </div>
              </div>

              <div class="details course">
                  <div class="fields">
                      <div class="input-field-2">
                            <label>Input Course</label>
                            <select class="" name="course"  placeholder="Enter your choice" required>
                                <option value="" readonly selected>Select Course</option>
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
                          <label>Input Year Level</label>
                          <select name = "Yearlevel" required>
                              <option readonly selected>Select Year Level</option>
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
                      <div class="input-field-2">
                          <label>Input ERF</label>
                          <input type="file" name = "erf[]" required>
                      </div>

                      <div class="input-field-2">
                          <label>Input Scholastic Records</label>
                          <input type="file" name = "records[]" required>
                      </div>
                    </div>
              </div>

                  <div class="buttons">
                      <button class="sumbit" name="enrollsubmit">
                          <span class="btnSubmit">Submit</span>
                          <i class="uil uil-navigator"></i>
                      </button>
                  </div>
            </div>
      </form>
   </div>
