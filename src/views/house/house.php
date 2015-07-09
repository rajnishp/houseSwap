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

      <div class="row">
        
        <div class="col-md-7 col-lg-7 col-sm-10 col-sm-offset-1 ">
          <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
          <div style="overflow:hidden;height:300px;">
            <div id="gmap_canvas" style="height:300px;"></div>
            <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
            <a class="google-map-code" href="http://wordpress-themes.org" id="get-map-data">best themes</a>
          </div>
          <script type="text/javascript"> 
            function init_map(){
              var myOptions = {zoom:14,center:new google.maps.LatLng(40.805478,-73.96522499999998),mapTypeId: google.maps.MapTypeId.ROADMAP};
              map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.805478, -73.96522499999998)});
              infowindow = new google.maps.InfoWindow({content:"<b>The Breslin</b><br/>2880 Broadway<br/> New York" });
              google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);
              });
              infowindow.open(map,marker);
            }
            google.maps.event.addDomListener(window, 'load', init_map);
          </script>
        </div>
        
        
        <div class="col-md-3 col-lg-3 col-sm-10 col-sm-offset-1">
        

          <ul class="icons-list">
            
            <li>
              <i class="icon-li fa fa-bars"></i>
              <?= $house->getDescription() ?>
            </li>
            <li>
              <i class="icon-li fa fa-home"></i>
              <?= $house->getAddress() ?>
            </li>

            <li>
              <i class="icon-li fa fa-user"></i>
              <?php
                $name = explode(" ", $house->getName());
                foreach ($name as $key => $valueName) {
                  echo ucfirst($valueName)." ";
                }
              ?>
            </li>
            <li>
              <i class="icon-li fa fa-phone"></i>
              <?= $house->getContact() ?>
            </li>
            <li>
              <?php 
                $houseId = $house->getId();
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

      <!-- /.post request form -->
      <section id = 'post_request'>

        <div class="row">
          <div class="portlet portlet-boxed portlet-danger">

            <div class="portlet-header">
              <h4 class="portlet-title">
                <u><i class="fa fa-check portlet-icon"></i>Post your Request</u>
              </h4>
            </div> <!-- /.portlet-header -->

            <div class="portlet-body">

              <form id="" action="<?= $baseUrl ?>postHouse" method="post" class="form parsley-form">

              <div class="col-md-5 col-lg-5 col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control" data-parsley-required="true">
                </div> <!-- /.form-group -->

                <div class="form-group">
                  <label class="control-label" for="contact">Contact Number</label>
                  <input type="text" id="contact" name="contact" class="form-control" data-parsley-required="true">
                </div> <!-- /.form-group -->

                <div class="form-group">
                  <label class="control-label" for="address">Address</label>
                  <input type="text" id="address" name="address" class="form-control" data-parsley-required="true">
                </div> <!-- /.form-group -->
              
              </div>

              <div class="col-md-5 col-lg-5 col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="description">Description/Details</label>
                  <textarea type="text" id="description" name="description" class="form-control" data-parsley-required="true" style="height: 133px;"></textarea>
                  </textarea>
                </div> <!-- /.form-group -->

                <div class="form-group pull-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> <!-- /.form-group -->
              </div>
              </form>
              
            </div> <!-- /.portlet-body -->

          </div> <!-- /.portlet -->
        </div>
      
      </section>
 
     <!-- /.post request form ends-->
   
    
    </div> <!-- /#container -->
  
  </div> <!-- /#content -->

</div> <!-- /#wrapper -->

  <?php require_once 'views/footer/footer.php'; ?>


</body>
</html>