

<html>
    <?php
      session_start();
    ?>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>GRIP_BANK</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='main.js'></script>
</head>
<body> 
   <?php
      if(isset($_SESSION['status']))
      {
        echo $_SESSION['status'];
        unset($_SESSION['status']);
      }
      ?>
    <ul>
        <li><a href="https://www.thesparksfoundationsingapore.org/contact-us/">CONTACT US</a></li>
        <li><a href="edit.html">SETTINGS</a></li>
        <li><a href="http://localhost/basic_banking_system/">HOME</a></li>
    </ul>
    <br>
    <div class="h1"><marquee>WELCOME TO GRIP BANK</marquee></div>
    <br>
    <div class=c1><p align=center><a href="customer.php"><img src="customer.jpg" height="250px"></a></p><a href="customer.php"> <p align=center>VIEW ALL CUSTOMERS</p></a></div>
     
    <div class=c2><a href="edit.html"><img src="edit.png" height="230px"></a></p><a href="edit.html"> <p align=center>EDIT CUSTOMERS</p></a></div>

    <div class=c7><a href="transaction_history.php"><img src="history.png" height="230px"></a></p><a href="transaction_history.php"> <p align=center>TRANSACTION HISTORY</p></a></div>
</body>
</html>
