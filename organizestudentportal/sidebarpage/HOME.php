<?php include 'include/config.php' ?>
<!--Carousel-->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!--Indicators/dots-->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!--The slideshow/carousel-->
  <div class="carousel-inner">
    <?php
    $query = "SELECT * FROM uccp_ht_tbl ORDER BY id DESC LIMIT 3";
    $query_run = mysqli_query($conn, $query);

    while ($htrows = mysqli_fetch_array($query_run)) {
      $httitle = $htrows['ht_title'];
      $htimage = $htrows['ht_image'];
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

  <!--Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
