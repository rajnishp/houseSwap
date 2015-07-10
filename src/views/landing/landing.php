<?php require_once 'views/source/sharepage.php'; ?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <title>HouseSwap | Give and Take Rest</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- for Google -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="copyright" content="true" />
    <meta name="application-name" content="website" />

  <!-- for Facebook -->          
    <meta property="og:title" content="" />
    <meta name="og:author" content="" />
    <meta property="og:type" content="website"/>

  <!-- for Twitter -->          
    <meta name="twitter:card" content="photo" />
    <meta name="twitter:site" content="@houseswap">
    <meta name="twitter:creator" content="">
    <meta name="twitter:url" content="<?= "http://houseswap.in"?>" />
    <meta name="twitter:title" content="House Swap | Exchange your House" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="" />


  <?php require_once 'views/header/header.php'; ?>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="shortcut icon" href="<?= $baseUrl ?>static/img/favicon.ico">
</head>

<body class="">


<div id="wrapper">

  <?php require_once 'views/navbar/navbar_new.php'; ?>

  <div class="content">

    <div class="container">

      <?php foreach ($houses as $key => $value) { ?>
      <div class="row">
        <div class="col-md-7 col-lg-7 col-sm-10 col-sm-offset-1 ">
          <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:300px;">
          
          <div id="gmap_canvas<?= $key ?>" style="height:300px;"></div>
          
          <style>#gmap_canvas<?= $key ?> img{max-width:none!important;background:none!important}</style>
          
          <a class="google-map-code" href="http://wordpress-themes.org" id="get-map-data">best themes</a></div>
          
          <script type="text/javascript"> 
            function init_map(){
              var myOptions = {zoom:14,center:new google.maps.LatLng(40.805478,-73.96522499999998),mapTypeId: google.maps.MapTypeId.ROADMAP};
              map = new google.maps.Map(document.getElementById("gmap_canvas<?= $key ?>"), myOptions);
              marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.805478, -73.96522499999998)});
              infowindow = new google.maps.InfoWindow({content:"<b>The Breslin</b><br/>2880 Broadway<br/> New York" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
          </script>
        </div>
        
        <div class="col-md-3 col-lg-3 col-sm-10 col-sm-offset-1">

          <ul class="icons-list">
            
            <li>
              <i class="icon-li fa fa-bars"></i>
              <?= $value->getDescription() ?>
            </li>
            <li>
              <i class="icon-li fa fa-home"></i>
              <?= $value->getAddress() ?>
            </li>

            <li>
              <i class="icon-li fa fa-user"></i>
              <?php
                $name = explode(" ", $value->getName());
                foreach ($name as $key => $valueName) {
                  echo ucfirst($valueName)." ";
                }
              ?>
            </li>
            <li>
              <i class="icon-li fa fa-phone"></i>
              <?= $value->getContact() ?>
            </li>
            <li>
              <i class="icon-li fa fa-level-up"></i>
              <?= date("F jS, Y",strtotime($value->getFrom())); ?>
            </li>
            <li>
              <?php 
                $houseId = $value->getId();
                sharepage("http://HouseSwap.in/house/$houseId");
              ?>
            </li>
            <!-- <li>
              <i class="icon-li fa fa-map-marker"></i>
              <a href="javascript:;">View Map</a>
            </li> -->
          </ul>

        </div>
      </div>
      <hr>
      <?php } ?>
      
      <?php require_once 'views/source/postRequestForm.php'; ?>
    
    </div> <!-- /#container -->
  
  </div> <!-- /#content -->

</div> <!-- /#wrapper -->


  <?php require_once 'views/footer/footer.php'; ?>


</body>
</html>