<?php
include 'config.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <title>Executive Offices</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF8303;">
    <div class="container-fluid">
      <a class="navbar-brand mx-lg-5 mx-m-5 mx-sm-5" href="index.php">
        <img src="UCCLOGO.png" alt="" width="75" height="75">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0  ">

        <li class="nav-item">
          <a class="nav-link" href="boardmembers.php">Board of Regents</a>
        </li>

      </ul>
    </div>
    
  </nav>

  <div class="container"><br>
    <u><center><h1 class="display-5">Members of Executive Offices</h1></center>
    <table class="table table-hover">
      <thead hidden>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Position & Description</th>
        </tr>
      </thead>
        <?php
          $query1 = "SELECT * FROM uccp_xo_tbl";
          $query_run = mysqli_query($conn, $query1);

          while($exo = mysqli_fetch_array($query_run)) {
            $name = $exo['xo_name'];
            $position = $exo['xo_position'];
            $description = $exo['xo_description'];
            $ibahinmo =  $exo['xo_image'];

         ?>
         <tbody>
           <td height="150" width="150" ><img src="<?= 'fixedduplicateadmin/imgxo/' . $ibahinmo;  ?>" alt="" height="150" width="150"></td>
           
           <td>
             <label>
               <h3>
                 <strong>
                  <?php echo $name; ?>
                 </strong>
               </h3>
               <h4>
                 <?php echo $position; ?>
               </h4>
               <small>
                 <?php echo $description; ?>
               </small>
             </label>
           </td>
         </tbody>
         <?php
         }
          ?>
    </table>
  </div>

</body>
</html>