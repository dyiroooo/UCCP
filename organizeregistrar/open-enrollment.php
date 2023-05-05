<?php

include('include/config.php');
extract ($_POST);



                        if(isset($_POST['choices1'])){
                          $choices = $_POST['choices1'];
                          $semss = $_POST['sem1'];


                          $sql = mysqli_query($conn,"UPDATE `uccp_enrollment_schedule` SET status = 'Closed' WHERE status = 'Open' ");
                          $sql = mysqli_query($conn,"UPDATE `uccp_enrollment_schedule` SET status = 'Open', sem ='$semss' WHERE schoolyear ='$choices'");
                          // echo "<script> window.location='ENROLLMENT-SCHEDULING.php'</script>";


                          if($sql == true){

                            $data = array(
                              'status'=>'success',
                            );
                            echo json_encode($data);
                          }else {
                      
                            $data = array(
                              'status'=>'failed',
                            );
                            echo json_encode($data);
                          }
                      
                        }
                        
                        ?>