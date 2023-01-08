<?php      
           session_start();
           $conn=mysqli_connect("localhost","root","","grip_bank");
           //check connection
           if($conn->connect_error)
           {
              die("Connection failed: ".$conn->connect_error);
           }
           $from=$_POST['from'];
           $c1=$_POST['c1'];
           $amount=$_POST['amount'];
           $to=$_POST['to'];
           $c2=$_POST['c2'];
           $sql1="SELECT * FROM customers WHERE `customers`.`ACCOUNT_NUMBER`=$c1;";
           $result1= mysqli_query($conn,$sql1);
           $sarr=mysqli_fetch_array($result1);
           if(!$result1)
           {
            printf("ERROR:%s\n",mysqli_error($conn));
            exit();
           }
           
           
           $sql2="SELECT * FROM customers WHERE `customers`.`ACCOUNT_NUMBER`=$c2;";
           $result2= mysqli_query($conn,$sql2);
           if(!$result2)
           {
            printf("ERROR:%s\n",mysqli_error($conn));
            exit();
           }
           $rarr=mysqli_fetch_array($result2);
            
           if($sarr['CURRENT_BALANCE']>= $amount)
           {
            $query = "UPDATE `customers` SET `CURRENT_BALANCE` = CURRENT_BALANCE-$amount WHERE `customers`.`ACCOUNT_NUMBER`=$c1;";
            $rec_query="UPDATE `customers` SET `CURRENT_BALANCE` = CURRENT_BALANCE+$amount WHERE `customers`.`ACCOUNT_NUMBER`=$c2;";
            $res = mysqli_query($conn, $query);
            $rec_res = mysqli_query($conn, $rec_query);
            if($res && $rec_res){
                $msg="SUCCESS";
                $new = "INSERT INTO `transactions` (`TRANSACTION_ID`, `TRANSFER_FROM`, `ACCOUNT_NUMBER1`, `TRANFER_TO`, `ACCOUNT_NUMBER2`,`AMOUNT`, `STATUS`) VALUES (NULL,'$from', '$c1', '$to', '$c2','$amount','SUCCESS');";
                $pra=mysqli_query($conn,$new);

                $_SESSION['status'] = "<script>alert('TRANSACTION SUCCESSFULL!!');</script>";    
                 header('location:index.php');
               } 
          else{
                $new1 = "INSERT INTO `transactions` (`TRANSFER_FROM`, `ACCOUNT_NUMBER1`, `TRANFER_TO`, `ACCOUNT_NUMBER2`,`AMOUNT`,`STATUS`) VALUES ('$from', '$c1', '$to', '$c2','$amount','FAIL');";
                $pra1=mysqli_query($conn,$new1);


                header('location:index.php');
                $_SESSION['status'] ="The customer was not added successfully because of this error ---> ". mysqli_error($conn);
                }
             
           }
        else
            {
                $new2 ="INSERT INTO `transactions` (`TRANSFER_FROM`, `ACCOUNT_NUMBER1`, `TRANFER_TO`, `ACCOUNT_NUMBER2`,`AMOUNT`, `STATUS`) VALUES ('$from', '$c1', '$to', '$c2','$amount','FAIL');" ;
                $pra2 =mysqli_query($conn,$new2);

               $_SESSION['status']="<script>alert('Insufficient Balance---Transaction Not  Successful!!');</script>";
               header('location:index.php');
            }
             $conn->close();
?>

           
           
           
           
           
                  
           
           
           
           
           
           