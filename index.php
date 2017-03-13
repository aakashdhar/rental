<?php include 'includes/header.php'; include 'includes/mainnav.php';?>
<?php

  $result = mysqli_query($con,"SELECT * FROM `tbl_category`")

 ?>
<!-- works -->
<div id="works"  class=" clearfix grid">
  <?php while($row = mysqli_fetch_object($result)): ?>
    <figure class="effect-oscar  wowload fadeIn">
        <img src="rradmin/<?= $row -> category_image?>" alt="<?= $row -> category_name ?>"/>
        <figcaption>
            <h2><?= $row -> category_name ?></h2>
            <p>Starts From as low as <br> 1000 Rs.<br>
            <a href="rent.php?cat=<?= $row -> category_name ?>">Book Now</a></p>
        </figcaption>
    </figure>
  <?php endwhile; ?>
</div>
<!-- works -->

<!-- Cirlce Starts -->
<div id="about"  class="container spacer about">
<h2 class="text-center wowload fadeInUp">We Are a Rental Agency Based in Bangalore</h2>
  <div class="row">
  <div class="col-sm-6 wowload fadeInLeft">
    <h4><i class="fa fa-key"></i> Rent</h4>
    <p>Creative digital agency for sleek and sophisticated solutions for mobile, websites and software designs, lead by passionate and uber progressive team that lives and breathes design. Creative digital agency for sleek and sophisticated solutions for mobile, websites and software designs.</p>


  </div>
  <div class="col-sm-6 wowload fadeInRight">
  <h4><i class="fa fa-rocket"></i> Easy Payment and Delivery</h4>
  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
  </div>
  </div>

  <div class="process">
  <h3 class="text-center wowload fadeInUp">How it Works</h3>
  <ul class="row text-center list-inline  wowload bounceInUp">
      <li>
            <span><i class="fa fa-history"></i><b>Browse</b></span>
        </li>
        <li>
            <span><i class="fa fa-puzzle-piece"></i><b>Choose</b></span>
        </li>
        <li>
            <span><i class="fa fa-database"></i><b>Pay</b></span>
        </li>
    </ul>
  </div>
</div>
<!-- #Cirlce Ends -->



<!-- About Starts -->
<div class="highlight-info">
  <div class="overlay spacer">
    <div class="container">
      <div class="row text-center  wowload fadeInDownBig">
        <div class="col-sm-3 col-xs-6">
          <i class="fa fa-smile-o  fa-5x"></i><h4>24 Partners</h4>
        </div>
        <div class="col-sm-3 col-xs-6">
          <i class="fa fa-rocket  fa-5x"></i><h4>750 Online bookings</h4>
        </div>
        <div class="col-sm-3 col-xs-6">
          <i class="fa fa-cloud-download  fa-5x"></i><h4>454 App Downloads</h4>
        </div>
        <div class="col-sm-3 col-xs-6">
          <i class="fa fa-map-marker fa-5x"></i><h4>2 Offices</h4>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About Ends -->







<div id="partners" class="container spacer ">
	<h2 class="text-center  wowload fadeInUp">Some of our happy clients</h2>
  <div class="clearfix">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
      <div id="carousel-testimonials" class="carousel slide testimonails  wowload fadeInRight" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active animated bounceInRight row">
          <div class="animated slideInLeft col-xs-2"><img alt="portfolio" src="images/team/1.jpg" width="100" class="img-circle img-responsive"></div>
            <div  class="col-xs-10">
              <p> I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. </p>
              <span>Angel Smith - <b>eshop Canada</b></span>
            </div>
        </div>
        <div class="item  animated bounceInRight row">
          <div class="animated slideInLeft col-xs-2"><img alt="portfolio" src="images/team/2.jpg" width="100" class="img-circle img-responsive"></div>
            <div  class="col-xs-10">
              <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>
              <span>John Partic - <b>Crazy Pixel</b></span>
            </div>
        </div>
        <div class="item  animated bounceInRight row">
          <div class="animated slideInLeft  col-xs-2"><img alt="portfolio" src="images/team/3.jpg" width="100" class="img-circle img-responsive"></div>
            <div  class="col-xs-10">
              <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.</p>
              <span>Harris David - <b>Jet London</b></span>
            </div>
        </div>
    </div>
     <!-- Indicators -->
     	<ol class="carousel-indicators">
      <li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-testimonials" data-slide-to="1"></li>
      <li data-target="#carousel-testimonials" data-slide-to="2"></li>
    	</ol>
    	<!-- Indicators -->
    </div>
  </div>
</div>
</div>
<!--Contact Starts-->
<div id="contact" class="spacer">
<div class="container contactform center">
<h2 class="text-center  wowload fadeInUp">Get in touch to start your project</h2>
  <div class="row wowload fadeInLeftBig">
      <div class="col-sm-6 col-sm-offset-3 col-xs-12">
        <input type="text" placeholder="Name">
        <input type="text" placeholder="Company">
        <textarea rows="5" placeholder="Message"></textarea>
        <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
      </div>
  </div>
</div>
</div>
<!--Contact Ends-->

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">Title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
</div>
<?php include 'includes/footer.php'; ?>
