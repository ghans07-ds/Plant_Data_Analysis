
 <?php
 $servername="localhost";
  $username="root";
  $password="";
  $dbname="plant";
  $count=0;
  
  $conn=mysqli_connect($servername,$username,$password,$dbname);
  if(!$conn)
  {
    die("connection failed");
  }
  ?>
  