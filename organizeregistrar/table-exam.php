<?php
include ('include/config.php');

$query = mysqli_query($conn, "SELECT * FROM uccp_admission_schedule WHERE status = 'Open'");
$data = array();
while ($row1 = mysqli_fetch_array($query)) {
    $sy = $row1['schoolyear'];

    $result = mysqli_query($conn,"SELECT * FROM `uccp_examinees` WHERE Schoolyear = '$sy' AND schedid = '' ");

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $name = $row['Name'];
        $gender = $row['Gender'];
        $bday = date('F d, Y', strtotime($row['Birthday']));
        $cpnum = $row['Number'];
        $email = $row['Email'];
        $category = $row['category'];
        $syexisting = $row['Schoolyear'];

        $subarray = array();

        $subarray[]= '<td><input type="checkbox" name="selector[]" class ="origcheckOne" value='.$id.'></td>';

        $subarray[]="<td><strong>$name</strong>

        <small style='display: none'><b>Year Applied:</b> $syexisting </small>
        <br>
        <small><b>EXAM NOT ASSIGNED YET</b> </small>
        <br><small title='School Year they Admitted'><b>S.Y Admitted:</b> $syexisting</small>
        <br>
        <small><b>Gender:</b> $gender
        <br>
        <b>Birthday: </b>$bday
        </small>
        </td>";

        $subarray[]="<td> <small><b>Phone </b>$cpnum</small>
        <br><small><b>Email </b>$email</small>
        </td>";

        $subarray[]="<td class='text-center' valign='center'>
        <button onclick='reject(".$row['id'].")' class='btn btn-danger'><i class='fa-sharp fa-solid fa-trash'></i></button>
        </td>";

        $data[]=$subarray;
    }
}

$output = array(
    'data'=>$data,
);

echo json_encode($output);
?>
