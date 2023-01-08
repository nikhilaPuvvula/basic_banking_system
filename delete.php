<?php      
           session_start();
           $conn=mysqli_connect("localhost","root","","grip_bank");
           //check connection
           if($conn->connect_error)
           {
              die("Connection failed: ".$conn->connect_error);
           }
           $name=$_POST["name"];
           $no=$_POST["acc_num"];
           $mail=$_POST["email"];
           $sql="DELETE FROM customers WHERE `customers`.`ACCOUNT_NUMBER` = '$no';";

           $result= mysqli_query($conn,$sql);
          
           if($result){
            $_SESSION['status']= "<script>alert('customer deleted from bank successfully')</script>";    
                       header('location:index.php');
                     } 
           else{
                     echo "The customer was not deleted successfully because of this error ---> ". mysqli_error($conn);
                }
              $conn->close();
        ?>