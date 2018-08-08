<?php  session_start();
if(empty($_SESSION['login']))
{
header("location:index.php");
}
?>


<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>AlphaTriv</title>
      <link rel="stylesheet" type="text/css" href="welcomestyle.css"/>
      <link href='https://fonts.googleapis.com/css?family=Kirang+Haerang' rel='stylesheet'/>
     
    </head>
    <body>
       <div class="wrapper">
           <div class="content">
               <div class="inner-content">
           
                     <p style=" text-align: center; color: #aa3b8a;">WELCOME: <?php echo $_SESSION['login']; ?></p> 

                     <p id="joy"> Enjoy your discount at 'Alef Alef Machshevim'</p>
                     
                     <a id="logout"  href="logout.php">LogOut</a>
<hr>                  

                  
               <li><p>CONTACT US</p></li>
               <li><a href="https://www.facebook.com/ron.kor1?notif_id=1531900971988749&notif_t=pymk_email"><img src="images/f.png"></a> <a href="https://vk.com/id176912983"><img src="images/vk.png"></a> <a href="http://1pc.co.il/"><img src="images/altr.png"></a></li>
               <li id="q"><p>For questions: <em>wulf.sheleg@gmail.com</em></p>  <p id="rights">2018 &copyAlphaTriv</p> </li>
           </ul>
            

               </div>
           </div>
           
       </div>
       
</html>