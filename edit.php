<?php      
           session_start();
           $conn=mysqli_connect("localhost","root","Nikhila@123","grip_bank");
           //check connection
           if($conn->connect_error)
           {
              die("Connection failed: ".$conn->connect_error);
           }
           $sl=$_POST["sl_no"];
           $name=$_POST["cust_name"];
           $no=$_POST["acc_number"];
           $mail=$_POST["email"];
           $bal=$_POST["balance"];
           $sql="INSERT INTO `customers` (`SL.NO`, `CUSTOMER_NAME`, `ACCOUNT_NUMBER`, `EMAIL_ID`, `CURRENT_BALANCE`) VALUES ('$sl', '$name', '$no', '$mail', '$bal');" ;
           
           $result= mysqli_query($conn,$sql);
          
           if($result){
                      $_SESSION['status'] = "<script>alert('customer added successfully')</script>";    
                       header('location:index.php');
                     } 
           else{
                     echo "The customer was not added successfully because of this error ---> ". mysqli_error($conn);
                }
              $conn->close();
    ?>