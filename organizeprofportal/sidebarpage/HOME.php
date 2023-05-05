<?php include 'include/config.php' ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

  <!--Indicators/dots-->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
  </div>

  <!--The slideshow/carousel-->
  <div class="carousel-inner">
    <?php
      $query = "SELECT * FROM uccp_ht_tbl ORDER BY id DESC LIMIT 3";
      $query_run = mysqli_query($conn, $query);

      while ($rowht = mysqli_fetch_array($query_run)) {
        $httitle = $rowht['ht_title'];
        $htimage = $rowht['ht_image'];
     ?>
     <div class="carousel-item active">
       <img src="<?php echo '../fixedduplicateadmin/imght/' . $htimage;  ?>"  class="d-block" style="width:100%">
       <div class="carousel-caption d-none d-md-block">
      <h5><?php echo $httitle; ?></h5>
    </div>
     </div>
     <?php
      }
      ?>
  </div>

<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
</button>
</div>
