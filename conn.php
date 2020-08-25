
 <?php
 $servername="localhost";
  $username="root";
  $password="";
  $dbname="trial";
  $count=0;
  
  $conn=mysqli_connect($servername,$username,$password,$dbname);
  if(!$conn)
  {
    die("connection failed");
  }
  ?>
  