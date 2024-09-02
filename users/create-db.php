<?php
$servername="localhost";
$username="root";
$password="";

//create connection
$conn=mysqli_connect($servername,$username,$password);
if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}
else{
$sql = 'CREATE Database user_auth';  
if(mysqli_query( $conn,$sql)){  
  echo "Database created successfully.";  
}else{  
echo "Sorry, database creation failed ".mysqli_error($conn);  
}  
}

?>

