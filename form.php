<?php 
    $formdata = explode('&', $_POST['data']);
    //var_dump($formdata);
    parse_str( $_POST['data'], $values);
   
    

     // connecting to database

     $server =  'localhost' ;
     $username = 'jingeng.li';
     $password = '24671Huntingwood';
     $dbname = 'signup';
     
     $connection = mysqli_connect($server,$username,$password,$dbname);

     if (!$connection){
         echo "problem connecting";
     } 
     else {
         echo "connected successfully";
     }

    //  foreach ($values as $key => $value) {
    //     echo " " . $key. " is " .$value . ", ";

    //     if($key == "firstname"){
    //         $firstname = "'" .$value . "'";
    //     }
    //     if($key == "lastname"){
    //         $lastname = "'" .$value . "'";
    //     }
    //     if($key == "email"){
    //         $email = "'" .$value . "'";
    //     }
    //     if($key == "password"){
    //         $password = "'" .$value . "'";
    //     }
    //     if($key == "password"){
    //         $gender = "'" .$gender . "'";
    //     }
    //     // if($key == "gender"){
    //     //     if($value == "male"){
    //     //         $gender = 0;
    //     //     }
    //     //     else {
    //     //         $gender = 1;
    //     //     }
    //     // }
    //  }

    // parse_str( $_POST['skills'], $svalues);
    
    //  foreach ($values as $key => $value) {
    //     echo " " . $key. " is " .$value . ", ";
    //  }

     $firstname = "'" .$values['firstname'] . "'";
     $lastname = "'" .$values['lastname'] . "'";
     $email = "'" .$values['email'] . "'";
     $password = "'" .password_hash($values['password'],PASSWORD_DEFAULT) . "'";
     $gender = "'" .$values['gender'] . "'";
     $phoneNumber = "'" .$values['phoneNumber'] . "'";
     $skills = "'" .$values['skills'] . "'";
     
     
    $sql = "Insert Into userinfo(firstname,lastname,email,password,gender,phoneNumber,skills)
     VALUES ($firstname,$lastname,$email,$password,$gender,$phoneNumber,$skills);";
    //  echo "sql is " .$sql . ", ";
     

    //  $sql = "Insert Into userinfo(firstname,lastname,email,password,gender)
    //  VALUES ('Jim','Li','jingeng.li@triosstudent.com','246711','male');";

    $query = mysqli_query($connection, $sql);

    if ($query){
        echo "1 row inserted";
    } 
    else {
        echo "mysql_query error - cound't connect to the database";
    }

?>