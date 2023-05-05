<?php
  // Admission Query
  $totalAdmission = admission();
  function admission() {
    include '../config.php';
    $sql = "SELECT id FROM `uccp_admission` ORDER BY id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    return $row;
  }

  // Examinee Query
  $totalExaminee = examinee();
  function examinee() {
    include '../config.php';
    $sql= "SELECT id FROM `uccp_examinees` ORDER BY id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    return $row;
  }

  // Passers Query
  $totalPassers = passers();
  function passers() {
    include '../config.php';
    $sql= "SELECT id FROM `uccp_passers` ORDER BY id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    return $row;
  }

  // Enrollee Query
  $totalEnrollee = enrollee();
  function enrollee() {
    include '../config.php';
    $sql= "SELECT id FROM `uccp_enrollee` ORDER BY id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    return $row;
  }

  // Enrolled Query
  $totalEnrolled = enrolled();
  function enrolled() {
    include '../config.php';
    $sql= "SELECT id FROM `uccp_enrolled` ORDER BY id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    return $row;
  }



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="../favicon.ico">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
  <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="registrar3.css">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Totals', 'Count'],
          ['Total Applicants', <?= $totalAdmission ?>],
          ['Total Examinees', <?= $totalExaminee ?>],
          ['Total of Passers',  <?= $totalPassers ?>],
          ['Total of Enrollees', <?= $totalEnrollee ?>],
          ['Total of Enrolled', <?= $totalEnrolled ?>]
        ]);

        var options = {
          title: 'University of Caloocan City Portal Statistics',
          is3D: true,
          // colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

  <title>UCC Registrar</title>

</head>
<body>
