<?php
session_start();
try{
$con = new PDO ("mysql:host=localhost;dbname=alphatriv","root","");
if(isset($_POST['signup'])){
 $login = $_POST['login'];
 $email = $_POST['email'];
 $pass = sha1($_POST['pass']);

 
 echo '<div style="color: green;"> Registered:) </div><hr>';
 
 $insert = $con->prepare("INSERT INTO user (login,email,pass)
values(:login,:email,:pass) ");
$insert->bindParam(':login',$login);
$insert->bindParam(':email',$email);
$insert->bindParam(':pass',$pass);



$insert->execute();
}elseif(isset($_POST['signin'])){
 $login = $_POST['login'];
 $pass = $_POST['pass'];
 
 $select = $con->prepare("SELECT * FROM user WHERE login='$login' and pass='$pass'");
 $select->setFetchMode(PDO::FETCH_ASSOC);
 $select->execute();

 $data=$select->fetch();
 if($data['login']!=$login and $data['pass']!=$pass)
 {
  echo '<div style="color: red;"> Invalid password or login! Try again! </div><hr>';
 }
 elseif($data['login']==$login and $data['pass']==$pass)
 {
 $_SESSION['email']=$data['email'];
    $_SESSION['login']=$data['login'];
header("location:welcome.php"); 
    }
   }
 }
catch(PDOException $e)
{
echo "error".$e->getMessage();
}


?>

<!--=============================================================================================-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>AlphaTriv</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <!--<link rel="stylesheet" type="text/css" href="media/assets/jquery.formstyler.css"/>-->
    <link href='https://fonts.googleapis.com/css?family=Kirang+Haerang' rel='stylesheet'/>
   <!-- <link rel="stylesheet" type="text/css" href="media/assets/jquery.formstyler.theme.css"/>-->
  </head>
  <body>
    <div class="wrapper">
    <div class="row">
      <div class="content">
        <div class="inner-content">
           <h2 id="title">AlphaTriv</h2>
           <p>Won a discount coupon in fair trivia contest? Sign up here & now, to claim your prize!<strong>==></strong> </p>

           <p>Find Us on the Map:</p>


           <div id="map" style="width:70%;height:300px;"></div>

           <script>
           function initMap() {
                   var myLatLng = {lat: 32.330641, lng:  34.856625};

                   var map = new google.maps.Map(document.getElementById('map'), {
                     zoom: 12,
                     center: myLatLng
                   });

                   var marker = new google.maps.Marker({
                     position: myLatLng,
                     map: map,
                     
                   });
                 }
           </script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRxosIia5u2TTR--oC_UwXSeN7E3FHRrw&callback=initMap"></script>
        </div>
     </div>




    <div class="row">
      <div class="sidebar">
        <div class="inner-sidebar">
          <form id="f" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
          <p>
            <p><strong>Your Login</strong></p>
            <input  type="text" name="login"  placeholder="Login" required>
         </p>

          <p>
           <p><strong>Your Email</strong></p>
            <input type="email" name="email"  placeholder="Email" required/> 
         </p>

          
           <p><strong>Your password</strong></p>
            <input  type="password" name="pass"  placeholder="Password" autocomplete="new-password" required/> 
          

          
         

          <p>
            <button type="submit" name="signup">SignUp</button>
          </p>

          </form>
          
          <form id="f_2" method="POST">
            <p>
              <p>Sign In</p>
              <input  type="text" name="login"  placeholder="Login" required><br/>
              <input   type="password" name="pass"  placeholder="Password" required> 
            </p>
            <p>
            <button type="submit" name="signin">SignIn</button>
          </p>
          </form>
        </div>
      </div>
    </div>
  </div>



    <div class="footer">
      <div class="inner-footer">
           <ul class="links">
             <li><p>CONTACT US</p></li>
             <li><a href="https://www.facebook.com/ron.kor1?notif_id=1531900971988749&notif_t=pymk_email"><img src="images/f.png"></a> <a href="https://vk.com/id176912983"><img src="images/vk.png"></a> <a href="http://1pc.co.il/"><img src="images/altr.png"></a></li>
             <li id="q"><p>For questions: <em>wulf.sheleg@gmail.com</em></p> <p id="rights">2018 &copyAlphaTriv</p></li>
           </ul>
           
      </div>
    </div>
  </div>
<!--
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
  <script src="media/assets/jquery.formstyler.min.js" defer></script>
  <script src="media/js/core.js" defer></script>
-->

  </body>
</html>
