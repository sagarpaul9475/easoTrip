<?php
$servername="localhost";
$username="root";
$password="";
$database="user_auth";

//create connection
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}
else{
$sql = 'CREATE TABLE users (id INT(6) PRIMARY KEY AUTO_INCREMENT, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)';  
if(mysqli_query( $conn,$sql)){  
  echo "Table created successfully.";  
}else{  
echo "Sorry, table creation failed ".mysqli_error($conn);  
}  
}

?>

