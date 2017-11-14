<?php 

    $lastname = "";
    $firstname = "";
    $email = "";
    $sql = "";
    
    if (isset($_POST['searchlastname'])){
        $lastname = $_POST['searchlastname'];
        $sql = "Delete from userinfo where lastname='". $lastname . "';";
    }
    else if (isset($_POST['searchfirstname'])){
        $firstname = $_POST['searchfirstname'];
        $sql = "Delete from userinfo where firstname='". $firstname . "';";
    }
    else if (isset($_POST['searchemail'])){
        $email = $_POST['searchemail'];
        $sql = "Delete from userinfo where email='". $email . "';";
    }

    // echo "last name is " .$lastname ." first name is " . $firstname ." email is " . $email;
    // echo "sql is " .$sql;
    // echo  $_POST['search'];

    // connecting to database

    $server =  'localhost' ;
    $username = 'jingeng.li';
    $password = '24671Huntingwood';
    $dbname = 'signup';
         
    $connection = mysqli_connect($server,$username,$password,$dbname);
   
    $query = mysqli_query($connection, $sql);
   
    if ($query){
        echo "Records Deleted:" . mysqli_affected_rows($connection);    

        mysqli_close($connection);
    } 
    else {
       echo "mysql_query error - cound't delete rows from signup table";
       mysqli_close($connection);
    }

?>