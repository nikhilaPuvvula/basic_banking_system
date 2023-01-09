<!DOCTYPE html>
<html>
    <head>
        <title>ALL CUSTOMERS</title>
        <link rel='stylesheet' type='text/css' media='screen' href='style1.css'>
    </head>

    <body>
       <ul>
        <li><a href="https://www.thesparksfoundationsingapore.org/contact-us/">CONTACT US</a></li>
        <li><a href="edit.html">SETTINGS</a></li>
        <li><a href="index.php">HOME</a></li>
      </ul>
      <br><br><
        <div class="h1">LIST OF CUSTOMERS IN GRIP BANK</div>
      <br><br>
        <table>
            <tr>
                <th>SLNO</th>
                <th>CUST_NAME</th>
                <th>ACC_NUMBER</th>
                <th>EMAIL_ID</th>
                <th>BALANCE</th>
                <th>TRANSFER</th>
            </tr>
       <?php
         
         $conn=mysqli_connect("localhost","root","","grip_bank");
         //check connection
         if($conn->connect_error)
         {
            die("Connection failed: ".$conn->connect_error);
         }
         $sql="SELECT /*(SL.NO,CUSTOMER_NAME,ACCOUNT_NUMBER,EMAIL_ID,CURRENT_BALANCE)*/ * FROM customers;";
         $result= mysqli_query($conn,$sql);
        
         $num=mysqli_num_rows($result);
         if( $num >0)
         {
            while($row = mysqli_fetch_assoc($result))
            {
              ?>
                <!--echo "<tr><td>". $row["SL.NO"] ."</td><td>". $row["CUSTOMER_NAME"]."</td><td>".$row["ACCOUNT_NUMBER"] . "</td><td>" .$row["EMAIL_ID"] . "</td><td>" .$row["CURRENT_BALANCE"] ."</td><td>"."<a href=transact.php?idtransfer=".$res['ACCOUNT_NUMBER']."><button>TRANSFER</button></a>"."</td></tr>";-->
                <tr>
               <td><?php  echo $row['SL.NO']; ?></td>
               <td><?php echo $row['CUSTOMER_NAME']; ?></td>
               <td><?php echo $row['ACCOUNT_NUMBER']; ?></td>
               <td><?php echo $row['EMAIL_ID']; ?></td>
               <td><?php echo $row['CURRENT_BALANCE']; ?></td>
              <td><a href="transact.php?idtransfer=<?php  echo $row['ACCOUNT_NUMBER']; ?>" ><button>TRANSFER</button></a></td>
               </tr>
          <?php
            }
            echo "</table>";
         }
         else
         {
            echo "0 results";
         }
            $conn->close();
        ?>
        </table>
    </body>
