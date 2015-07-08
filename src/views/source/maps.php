<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="30"> 
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDkkTF-PfaakVa0lF-O7ysdjYXjhVmWERk&sensor=true">
</script>
<script>
<?php 

$database_handle = mysqli_connect("127.0.0.1","root","root","ninja_miner");

  $respo = mysqli_query($database_handle, "SELECT X(`billboard_gps_loc`), Y(`billboard_gps_loc`) FROM billboard_info WHERE billboard_id  = 1;");
  $responserow = mysqli_fetch_array($respo);
  $bbLocation = $responserow[0].",".$responserow[1];
  echo "var myCenter=new google.maps.LatLng(".$bbLocation.");\n";

  $respo = mysqli_query($database_handle, "SELECT user_id, X(location), Y(location) FROM customer_location;");
  $totalUser = mysqli_num_rows($respo);
  
  $respInBBarea =  mysqli_query($database_handle, "SELECT user_id
                            FROM customer_location
                            WHERE(
                              SELECT CALCULATE_DISTANCE(X( location ) , Y( location ) ,
                                            $bbLocation)
                              ) <= '500';"); 

  $inBBUser = mysqli_num_rows($respInBBarea);
  //displing user info
  $addsFetch = mysqli_query($database_handle, "SELECT *
                      FROM advertisement_info AS c
                      JOIN (
                        SELECT catagory, Count( * ) AS reps
                        FROM brand_information AS a
                        JOIN (
                          SELECT brand_id, Count( * ) AS reps
                          FROM customer_expenditure
                          WHERE user_id
                          IN (
                            SELECT user_id
                            FROM customer_location
                            WHERE(
                              SELECT CALCULATE_DISTANCE(X( location ) , Y( location ) ,
                                            $bbLocation)
                              ) <= '500'
                            )
                          GROUP BY brand_id
                          ORDER BY reps DESC
                          ) AS b
                        WHERE a.brand_id = b.brand_id
                        GROUP BY catagory
                        ORDER BY reps DESC LIMIT 0, 3
                        ) AS d
                      WHERE c.catagory = d.catagory ORDER BY reps DESC LIMIT 0, 9
                      ;"
              );
  //print_r($addsFetch);
  $noOfAdds = mysqli_num_rows($addsFetch);
  //echo $noOfAdds;
  if($noOfAdds <=0){
    $addsFetch = mysqli_query($database_handle, "SELECT advertisement_id, advertisement_location
                          FROM advertisement_info ORDER BY    advertisement_event_subscribed DESC;");
  }

  //                        
 while ($response=mysqli_fetch_array($respo)) {
    $userArray[] = $response;
  }
  foreach ($userArray as $userInfo) {
  $userLocation = $userInfo[1].",".$userInfo[2];
    echo "var userLoc". $userInfo[user_id] . "=new google.maps.LatLng(" . $userLocation.");\n";
  }
  echo "function initialize()
        {
        var mapProp = {
          center:myCenter,
          zoom:16,
          mapTypeId:google.maps.MapTypeId.ROADMAP
          };

        var map=new google.maps.Map(document.getElementById(\"googleMap\"),mapProp);

        var billBoardM = new google.maps.InfoWindow({
          content:\"I am bill Board 1\"
          });

        var userM = new google.maps.InfoWindow({
          content:\"I am customer\"
          });

        var marker=new google.maps.Marker({
          position:myCenter,
          icon:'blank_billboard_T.png'
          });";
    foreach ($userArray as $userInfo) {
    echo "var user". $userInfo[user_id]."=new google.maps.Marker({position: userLoc". $userInfo[user_id].", 
        icon:'walking-icon-md.png'});";
    echo "user". $userInfo[user_id].".setMap(map);";
  }

?>

var myCity = new google.maps.Circle({
  center:myCenter,
  radius:500,
  strokeColor:"#00004F",
  strokeOpacity:0.6,
  strokeWeight:2,
  fillColor:"#00004F",
  fillOpacity:0.4
  });

myCity.setMap(map);

marker.setMap(map);
billBoardM.open(map,marker);

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="googleMap" style="width:800px;height:600px;float: left;"></div>
<div style="float: right;">
Totle No. of users: <?php echo $totalUser; ?> <br>
Users in Billboard Area: <?php echo $inBBUser; ?> <br>
Billboard Area: 500 M<br>
<table>
<?php

  while ($addsFetchRow=mysqli_fetch_array($addsFetch)) {
    //advertisement_name, catagory, reps
    //print_r($addsFetchRow);
    
    echo "<tr><td>".$addsFetchRow[3]."</td><td> ".$addsFetchRow[2]."</td><td> ".$addsFetchRow['reps']."</td></tr>";
  }
?> 
</table> 
</div>
</body>
</html>