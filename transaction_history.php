<!DOCTYPE html>
<html>
    <head>
        <title>TRANSACTION HISTORY</title>
        <link rel='stylesheet' type='text/css' media='screen' href='style1.css'>
    </head>

    <body>
       <ul>
        <li><a href="https://www.thesparksfoundationsingapore.org/contact-us/">CONTACT US</a></li>
        <li><a href="edit.html">SETTINGS</a></li>
        <li><a href="http://localhost/basic_banking_system/">HOME</a></li>
      </ul>
      <br><br><
        <div class="h1">TRANSACTION HISTORY</div>
      <br><br>
        <table>
            <tr>
                <th>TRANSACT_ID </th>
                <th>FROM</th>
                <th>ACC_NUMBER</th>
                <th>TO</th>
                <th>ACC_NUMBER</th>
                <th>AMOUNT</th>
                <th>STATUS</th>
            </tr>
       <?php
          $conn=mysqli_connect("localhost","root","","grip_bank");
         //check connection
         if($conn->connect_error)
         {
            die("Connection failed: ".$conn->connect_error);
         }
         $sql="SELECT /*(SL.NO,CUSTOMER_NAME,ACCOUNT_NUMBER,EMAIL_ID,CURRENT_BALANCE)*/ * FROM transactions;";
         $result= mysqli_query($conn,$sql);
        
         $num=mysqli_num_rows($result);
         if( $num >0)
         {
            while($row = mysqli_fetch_assoc($result))
            {
              ?>
                <!--echo "<tr><td>". $row["SL.NO"] ."</td><td>". $row["CUSTOMER_NAME"]."</td><td>".$row["ACCOUNT_NUMBER"] . "</td><td>" .$row["EMAIL_ID"] . "</td><td>" .$row["CURRENT_BALANCE"] ."</td><td>"."<a href=transact.php?idtransfer=".$res['ACCOUNT_NUMBER']."><button>TRANSFER</button></a>"."</td></tr>";-->
                <tr>
               <td><?php  echo $row['TRANSACTION_ID']; ?></td>
               <td><?php echo $row['TRANSFER_FROM']; ?></td>
               <td><?php echo $row['ACCOUNT_NUMBER1']; ?></td>
               <td><?php echo $row['TRANFER_TO']; ?></td>
               <td><?php echo $row['ACCOUNT_NUMBER2']; ?></td>  
               <td><?php echo $row['AMOUNT']; ?></td>
               <td><?php echo $row['STATUS']; ?></td>
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
</html>