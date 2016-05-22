<?php
$mysql_host = "mysql.hostinger.co.uk";
$mysql_database = "u303516869_db";
$mysql_user = "u303516869_admin";
$mysql_password = "metrocard1";
session_start();
     //$id=$_SESSION['custid'];




try {
    $conn = new PDO("mysql:host=$mysql_host;dbname=u303516869_db", $mysql_user, $mysql_password);
    } catch (PDOException $e) {
     print "Error!: " . $e->getMessage() . "<br/>";
     die();
 }

$type1='7Unlimited';
$type2='30Unlimited';
$records = $conn->prepare('SELECT T.serieNumber, T.creditCard FROM  Transaction T
                           INNER JOIN metrocard M ON 
                           T.serieNumber = M.cardNumber WHERE CustomerID = :custid and (type=:typeR or type=:typeR1)');
$records->bindParam(':custid', $_SESSION['custid']);
$records->bindParam(':typeR', $type1);
$records->bindParam(':typeR1', $type2);
$records->execute();




$credit = $conn->prepare('SELECT creditCard FROM  Transaction T
                           INNER JOIN metrocard M ON 
                           T.serieNumber = M.cardNumber WHERE CustomerID = :custid');
$credit->bindParam(':custid', $_SESSION['custid']);
$credit->execute();


    $sql= $conn->prepare('UPDATE metrocard set balance=balance + :bal  where cardNumber= :card');
               $sql->bindParam(':bal', $_POST['amount'], PDO::PARAM_STR);
                 $sql->bindParam(':card', $_POST['metrocard'], PDO::PARAM_STR);
               $sql->execute(); 

              if (isset($_POST['submit'])){
               if($sql){

$message = "Thank you for your order.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  
header('Refresh: 1; welcomepage.php');
exit;
}                           
    }       
        
?>




<!DOCTYPE html>
<!--
    Transit by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
 <?php
    session_start()
     
     
 ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Value</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="js/jquery.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-layers.min.js"></script>
        <script src="js/init.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/style-xlarge.css" />
        </noscript>
<style type="text/css">\
    #header{
            padding:1em;
    }
    #baner {
    background-image: url(images/dark_tint.png), url(images/bokeh_car_lights_bg.jpg);
    background-position: center center;
    background-size: cover;
    color: #ffffff;
    padding: 1em 0em 1em;
     
    }
    #sectionone{
    padding-left: 2em;
    text-align: left;
    }
    #main_content{
     padding-top: 15px;
     padding-left: 25px;

    }
    #newcardform{
         
        border: 3px solid;
        background-color: #CCCCCC;
        text-indent: left;
         
    }
    #amount {width: 100px; background-color: white;}
    #payment{
        width: 200px; background-color: white;
        padding: 3px;
    }

</style>

    </head>
    <body class="landing">
     

        <!-- Header -->
            <header id="header">
                <h1><a href="index.html"></a></h1>
                <nav id="nav">
                    <ul>
                        <li><a href="logout.php" class="button special">Log Out</a></li>
                    </ul>
                </nav>
            </header>

        <!-- Banner -->
            <section id="baner">
                <h2>Welcome To Pocket MetroCard</h2>
                <p id="welcome">Welcome : <?
                                echo $_SESSION['fname'];
                                echo ',';
                                echo $_SESSION['lname']; '<br>'; 
                             ?>
                <br> </p></p>
                <ul class="actions">
                     
                </ul>
            </section>

        <!-- One -->
        <div>
                             
             
                    <header class="major"><br>
                        <h3>Please complete the form to Purchase your MetroCard</h3> 
                </div>
                
                <div class="container 50%">
                    <form action="addMoney.php" id="newcardform" method="post">
                        <div class="row uniform">
                            <div class="6u 12u$(small)">
                               <label> Choose one of your cards</label>
                                 <select name ="metrocard" id="payment"><?php
                                    while($row = $records->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value=".$row['serieNumber'].">".$row['serieNumber']."</option>";
                                    }
                                    ?>
                                        
                                     
                                 </select><br>
                            </div>
                            <div>
                                <label> Enter Time</label>
                                    <input type="text" name="amount" placeholder="Amount" id="payment">
                                 </div>
                            <div>
                            <label> Choose a credit card</label>
                                
                                <select name="expmonth"id="payment">
                                    <?php
                                  while($row = $credit->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value=".$row['creditCard'].">".$row['creditCard']."</option>";
                                    }
                                    ?>
                                </select>

                                
                                <br>

                            </div>
                            
                            
                             
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input name= "submit" value="Submit" class="special big" type="submit"></li>
                                </ul>

    
                            </div>
                        </div>
                    </form>
                </div>
            


        <!-- Two -->
            <section id="two" class="wrapper style2 special">
                <div class="container">
                     
                     
                </div>
            </section>

         

        <!-- Footer -->
            <footer id="footer">
                <div class="container">
                
                    <div class="row">
                        <div class="8u 12u$(medium)">
                            <ul class="copyright">
                                <li>&copy; Pocket MetroCard. All rights reserved.</li>
                                
                                
                            </ul>
                        </div>
                        <div class="4u$ 12u$(medium)">
                            <ul class="icons">
                                <li>
                                    <a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
                                </li>
                                <li>
                                    <a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
                                </li>
                                <li>
                                    <a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
                                </li>
                                <li>
                                    <a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

    </body>
</html>