<?php

    $servername="localhost";
    $dbname="voter"
    $username="sumit"
    $password="test"


    $conn=new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die('connection failed')
    }

    $fullname=$_POST['firstname']
    $email=$_POST['email']
    $age=$_POST['age']

    $sql="INSERT INTO voters (fullname,email,age) VALUES ('$fullname','$email','$password')"

    if($conn->query($sql)===TRUE){
        echo "new record success"
    }else{
        echo "error" .$conn->error
    }

    $conn->close()
?>