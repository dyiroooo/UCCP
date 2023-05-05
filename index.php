<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewpoort" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <title>UCC WEBSITE</title>
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="uicsstext.css">
    <link rel="stylesheet" href="css/morph.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  </head>
  <body style="background-color:#FEFEFD;">
    <!-- #FEFEFD SNOW -->
    <!-- #FD7E14 ORANGE -->
    <!-- #181818 MATTE BLACK -->
    <!-- #FF9933 ROMANTIC ORANGE -->

    <!--topbutton-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">↑</button>
  <script>
// Get the button
let mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<nav class="navbar navbar-expand-lg navbar-white " style="background-color: #fd7e14;">
 <a class="navbar-brand" href="#"><img src="UCCLOGO.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">

        <li class="nav-item">
          <a class="nav-link" href="#home">HOME</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#news">NEWS</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#admission">ADMISSION</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#enrollment">ENROLLMENT</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#aboutus">ABOUT US</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#contact">CONTACT US</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="loginform.php">LOG IN</a>
        </li>

      </ul>
    </div>
</nav>
<!--carousel homepage-->
<section class= "home" id = "home">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="container">

  </div>
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner ">
    <?php
    $query = "SELECT * FROM uccp_ht_tbl ORDER BY id ASC LIMIT 3";
    $query_run = mysqli_query($conn, $query);

    while ($htrows3 = mysqli_fetch_array($query_run)) {
      $httitle = $htrows3['ht_title'];
      $htimage = $htrows3['ht_image'];
      ?>

      <div class="carousel-item active">
        <img src="<?php echo 'fixedduplicateadmin/imght/' . $htimage;  ?>"  class="d-block" style="width:100%">
      </div>
      <?php
    }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</section>




<!--NEWS SECTION-->
<section id="news" class="news section pt-5 mt-5 images-container">
   <div class="container-fluid" data-aos="fade-up" data-aos-delay="500" >
     <div class="row">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
         <div class="section-header text-center pb-5">
             <h1 id="UCCFONT" style="color:#212529"> <span class="addmisiontextorange">NEWS</span><span class="addmisiontextblack"> AND ANNOUNCEMENT</h1>
             <h2 id="UCCFONT"><span class="addmisiontextblack">There’s a lot happening at ucc</span><h2>
           </div>
         </div>
       </div>
     </div>

     <div class="row box" data-aos="fade-up" data-aos-delay="150">
       <?php

       $query = "SELECT * FROM uccp_news_tbl ORDER BY id DESC";
       $query_run = mysqli_query($conn, $query);

       while($newsrow = mysqli_fetch_array($query_run)) {
         $newsid = $newsrow['id'];
         $newsauthor = $newsrow['author'];
         $newstitle = $newsrow['title'];
         $newscontent = $newsrow['body'];
         $newsimage = $newsrow['imgdir'];

         ?>
         <div class="morecard col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4" >
          <!-- <div class="card border-light text-center mb-3"> -->
              <div class="card bg-light mb-3 text-center">
             <div class="card-body">
               <img src="<?php echo 'fixedduplicateadmin\imgnews/'. $newsimage; ?>" class="card-img-to" height="300" alt="...">
               <h5 class="card-title" name="titlenews" style="color:#212529"><?php echo $newstitle; ?></h5>
               <form class="" action="readmorenews.php" method="get">
                 <input type="text" value="<?php echo $newsid; ?>" name="idnews" hidden>
                 <input type="text" value="<?php echo $newstitle; ?>" name="titlenews" hidden>
                 <button type="submit" name="readmoreid"  id="<?php echo 'readmorebtn ' . $newsid; ?>" class="btn text-white" style="background: #fd7e14;">READ MORE</button>
               </form>
             </div>
           </div>
         </div>
         <?php
       }
       ?>
       <div class="more-news col-12 text-center">
         <button type="button" id="btnmorenews" class="load-more btn text-white" style="background: #fd7e14">More NEWS</button>
       </div>
     </div>
   </section>

<!-- Section STEP -->
<div id="admission" class="container-fluid">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" data-aos="fade-up" data-aos-delay="500">
            <section class="parallax">
              <h2 id="text" class="text-center"> <span class="addmisiontextorange">ADMISSION </span><span class="addmisiontextblack">FRESHMEN</span></h2>
             </section>
          </div>
      </div>

  <div class="card col-12 col-sm-12 col-md-12 col-lg-12 g-0 bg-light" style="color:#355C7D;">
    <div class="container-fluid" data-aos="fade-right" data-aos-delay="500">
    <section class="steps container-custom py-4">
      <div class="row">
        <div class="col-12 col-sm-6 d-md-flex justify-content-md-center">
          <img src="admisgif.jpg" alt="admission" class="img-fluid pb-4 steps_section-thumbnail" width="553" height="746" loading="lazy">
        </div>
        <div class="col-12 col-sm-6 align-self-center justify-content-md-center">
          <div class="steps__content-width">

            <span>01</span>
            <h1 class="admissiontitle" style="color:#212529"> <span class="justtilt">UCC Admission Freshmen</span></h1 >
              <!-- <h1 class="h2 mb-4">UNIVERSITY OF CALOOCAN CITY ADMISSION<br></h1> -->
            <h1 class="h4 mb-4">Freshmen applicants are those who have completed middle school
              (senior high) making them eligible to apply for college education.</h1>
            <!-- <p>Freshmen applicants are those who have completed middle school
              (senior high) making them eligible to apply for college education.</p> -->
            <form  method="POST" action="Admission-status.php">
                <input type="submit" name="Admit" value="REGISTER NOW" class="btn text-white" style="background: #FF9933;">
            </form>
          </div>
        </div>
      </div>
        </div>
          </div>
    </section>
<!-- NEW ADMISSION  -->
<!-- NEW ENROLLMENT -->
<div id="enrollment" class="container-fluid">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" data-aos="fade-up" data-aos-delay="500">
            <section class="parallax">
              <h2 id="text" class="text-center"> <span class="addmisiontextorange">ENROLLMENT </span><span class="addmisiontextblack">FRESHMEN</span></h2>
             </section>
          </div>
      </div>

  <div  class="card col-12 col-sm-12 col-md-12 col-lg-12 g-0 bg-light"  style="color:#355C7D">
    <div class="container-fluid" data-aos="fade-left" data-aos-delay="500">
    <section class="steps container-custom py-4">
      <div class="row">
        <div class="col-12 col-sm-6 d-md-flex justify-content-md-center">
          <img src="enrlgif.jpg" alt="admission" class="img-fluid pb-4 steps_section-thumbnail" width="553" height="746" loading="lazy">
        </div>
        <div class="col-12 col-sm-6 align-self-center justify-content-md-center">
          <div class="steps__content-width">

            <span>02</span>
            <h1 class="enrollment-title" style="color:#212529"><span class="justtilt">UCC Enrollment Freshmen</span></h1>

            <h1 class="h4 mb-4 sm-e">Freshmen applicants are those who have who passed college entrance examination making them eligible to apply for college education.</h1>
              <form  method="POST" action="enrollment-status.php">
                  <button type="submit"  name="enroll"  class="btn-enroll btn text-white" style="background: #FF9933;">ENROLL NOW</button>
              </form>
          </div>
        </div>
      </div>
    </div>
      </div>
    </section>
<!-- NEW ENROLLMENT -->

  <div class="container-fluid">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" data-aos="fade-up" data-aos-delay="500">
            <section class="parallax">
              <h2 id="text" class="text-center"> <span class="addmisiontextorange">RETURNEE </span><span class="addmisiontextblack">ENROLLMENT</span></h2>
            </section>

          </div>
      </div>
<div class="card col-12 col-sm-12 col-md-12 col-lg-12 g-0 bg-light">
<br>
<div class="container-fluid" data-aos="fade-up" data-aos-delay="500">
<div class="row">

      <div class="Enrollment-context text-center ">

        <div class="row mx-auto mb-3">
          <img src="UCCLOGO.png" alt="" class="img-fluid">
        </div>
            <div class="row  mx-auto mb-">
              <div class="col-12 ">
                <div class="steps__content-width">
                  <span>03</span>
                  <h2><span class="exofont">Returnees refer to upperclassmen who did not enroll the previous semester(s) and will re-enroll the incoming semester.</span></h2>
                </div>
              </div>
            </div>
              <div class=" col-12 text-center">
                <form  method="POST" action="returnee-status.php">
                  <p><span class="addmisiontextorange">For Returnees,</span></p>
                <button type="submit"  name="returnee"  class="btn-enroll btn text-white" style="background: #fd7e14;">CLICK HERE</button>
              </form>
              <br>
                </div>
      </div>


</div>
</div>
</div>
  </div>

</section>

<!--about us-->
<section id="aboutus" class="About-section  pt-5">
  <div class="container-fluid" data-aos="fade-down" data-aos-delay="500">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
              <div class="section-header-about text-center pb-5">
                  <h1 id="UCCFONT" class="About-title"> <span class="addmisiontextorange">ABOUT</span><span class="addmisiontextblack">US</span></h1>
              </div>
          </div>
      </div>
<div class="card col-12 col-sm-12 col-md-12 col-lg-12 g-0 bg-light ">
<div class="container-fluid" data-aos="fade-down" data-aos-delay="500">
<div class="row">
  <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    <div class="section-header-about text-center pb-5">
        <h1 class="Boardofregent"><span class="addmisiontextorange">BOARD </span><span class="addmisiontextblack">OF REGENTS</span></h1>
    </div>
      <div class="About-img-board">
          <img class="img-board" src="board of regents.jpg" alt="" class="img-fluid">
      </div>
          <div class="col-12 text-center pt-3">
          <a href="boardmembers.php"><button type="button" class="btn-board btn text-white" style="background: #fd7e14;">BOARD OF REGENTS</button></a>
        </div>
        <br>
  </div>

  <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
    <div class="section-header-about text-center pb-5">
        <h1 class="Academics"><span class="addmisiontextorange">ACADEMICS</span></h1>
    </div>
      <div class="About-img-Academics ">
          <img class="img-acads" src="academics.jpg" alt="" class="img-fluid">
      </div>
          <div class="col-12 text-center pt-3">
          <a href="academia.php"><button type="button" class="btn-board btn text-white" style="background: #fd7e14;">LEARN MORE</button></a>
        </div>
  </div>
      </div>
  </div>

</div>
</div>
</div>
  </div>
</section>
<br>
<br>


<!--History-->
<section id="History" class="History-section  pt-5">
  <div class="container-fluid" data-aos="fade-up" data-aos-delay="500">
      <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
              <div class="section-header-history text-center pb-5">
                  <h1 id="UCCFONT" class="history-title" style="color:#212529"> <span class="addmisiontextblack">UNIVERSITY OF </span><span class="addmisiontextorange">CALOOCAN CITY </span></h1>
                  <h2 class="history-title2" style="color:#212529">HISTORY</h2>
                  <p class="details" style="color:#212529">
                      On July 1, 1971, the Secretary of Education authorized the first-year operation of the proposed Caloocan City Community College. For this, Municipal Ordinance No. 1495 appropriated the amount of P23,400.00. Its purpose was to implement the national development goal which assures the maximum participation of all people in the attainment and enjoyment of the benefits of growth and provide quality educational opportunities to its indigent but deserving constituents.

On June 22, 1972, the College was authorized to open the second year of the general education course and the one-year secretarial on a P35,100 city budget.

On June 7, 1973 the secretary of Education approved the third year operation of the College with BS Industrial Education and the BS Business Technology appropriating therefore P36,760 (Mun. Ord. Nos. 2020 and 2140).

On March 25,1975 Ordinance No. 2295 provided for the charter of the renamed Caloocan City Polytechnic College. A fire gutted the High School PTA Building in 1984 forced the College to move to the nearby elementary school before transferring to the Sangandaan site. In June 1996, Buena Park and Camarin Annexes became operational, while Tandang Sora Annex at 7th avenue started classes in November, 2002.From an enrollment of 42 in 1971, the College had 3600 in 2000.

In June 1996, it offered two(2) masteral courses in public administration and in education. To make the College more responsive to the needs of City's constituents, government employees with 60 undergraduate units were enrolled as third year students in the special Bachelor in Public Administration in 1997.

On February 9, 2004, after 33 long years, Municipal Ordinance No. 0379 converted the Caloocan City Polytechnic college into the full-fledged University of Caloocan City.

Vision
A quality higher education institution imbued with relevant knowledge, skills and values for the attainment of community driven, industry sensitive, environmentally conscious, resilient and globally competitive, Academicsally focused citizens for the service of Caloocan City.

Mission
To maintain and support an adequate system of tertiary education that will help promote the economic growth of the country, strengthen the character and well-being of its graduates as productive members of the community.

Goal
To attain quality instruction and high level of teaching competency among the faculty members.

To provide priority programs that are relevant to community development and concern for the environment.

To strengthen linkages between the university and industry partners and professional organization.

To determine the opportunities provided by the university to develop students’ full potential, skills and talents to make them competitive in the labor force in the city, in the national and global community as well.

To develop more immersion programs for students the will produce graduates with increased self-esteem, confidence and resiliency.

To intensify student involvement and Academics leadership within the university and in the local and international sphere.

To embark on research undertaking, curricular enhancement, community development, environmental consciousness, industry sensitivity that significantly affect the academe.</p>
              </div>
              </div>
          </div>
      </div>
  </div>

<!--FOOTER-->

<footer class="main-footer">
<hr>
<section id="contact" class="contact  pt-3">
<div class="row">
  <div class="col-lg-12  text-center">
      <h3 class="footer-title text-white">UNIVERSITY OF CALOOCAN CITY</h3>
      <ul class="detail">
        <p>
            <li <i class="bi bi-house-door-fill text-white"></i>Biglang Awa St Cor 11th Ave Catleya,Caloocan, 1400 Metro Manila, Philippines
            </li>
        </p>

        <p >
            <li <i class="bi bi-telephone-fill text-white"></i>Tel: +632-3106581 / +632-3106855
            </li>
        </p>
        <p>
            <li <i class="bi bi-envelope-fill text-white"></i> Email: admin@ucc-caloocan.edu.ph
            </li>
        </p>
        <p>
            <li <i class="bi bi-globe text-white"></i> Website: www.ucc-caloocan.edu.ph
            </li>
        </p>
      </ul>


        </div>
  <div class="copy col-lg-12  text-center text-white">
      <p class="Copy">Copyright © 2022 UCC | University of Caloocan City Website PORTAL | All Rights Reserved</p>


  </div>

</div>
</section>
</footer>


    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function(){
      $(".morecard").slice(0, 3).fadeIn();
      $(".load-more").click(function(){
        $(".morecard").slice(0, 12).fadeIn();
        $(this).fadeOut();
      });
    });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
  </script>
  </body>
</html>
