<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>GRIP_BANK</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='main.js'></script>

    <style>
    .c3{
       color:blue;
       font-size:30px;
    }
   .c4{
    color:white;
    background:red;
    font-size:20px;
    }
    .c5{
       position:absolute;
       top:185px;
       left:500px;
     }
     </style>
</head>
<body align="center"> 
    <ul>
        <li><a href="https://www.thesparksfoundationsingapore.org/contact-us/">CONTACT US</a></li>
        <li><a href="edit.html">SETTINGS</a></li>
        <li><a href="http://localhost/basic_banking_system/">HOME</a></li>
    </ul>
    <p class=h1>TRANSACTION</p>
    <form action="process.php" method="POST">
        <?php
         $conn=mysqli_connect("localhost","root","","grip_bank");
         //check connection
         if($conn->connect_error)
         {
            die("Connection failed: ".$conn->connect_error);
         }
         $ids=$_GET['idtransfer'];
         $sql="SELECT * FROM customers WHERE ACCOUNT_NUMBER=($ids);";
         $result= mysqli_query($conn,$sql);   
         if(!$result)
         {
            printf("ERROR!!");
            exit();
         }
         $arrdata=mysqli_fetch_array($result);
         ?>

        <label for="From" class="c3"><b>Transfer From : </b></label>
        <input type="text" class="c3" name="from" value="<?php echo $arrdata['CUSTOMER_NAME'];?>" required/>

        <label for="acc_no" class="c3"><b>Account No: </b></label>
        <input type="text" class="c3" name="c1" value="<?php echo $arrdata['ACCOUNT_NUMBER'];?>" required/><br><br>

        <label for="amount" class="c3"><b>Amount:₹</b></label>
        <input type="text" class="c3" name="amount" placeholder="enter amount" required/><br><br>

        <label for="to" class="c3"><b>Transfer To :</b></label>
        <input type="text" class="c3" name="to" placeholder="enter receiver name" required/><br><br>

        <label for="acc_no2" class="c3"><b>Account No :</b></label>
        <input type="text" class="c3" name="c2" placeholder="enter receiver acc no" required/><<br><br>

        <button type="submit" class="c4">TRANSFER</button>
        </form>
        </body>
    </html>