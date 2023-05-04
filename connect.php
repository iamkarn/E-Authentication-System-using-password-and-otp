<?php
  $username = filter_input(INPUT_POST, 'firstName');
  $password = filter_input(INPUT_POST, 'password');
  $email = filter_input(INPUT_POST,'email');
  $mobile = filter_input(INPUT_POST,'mobile');
  //if (!empty($username)){
  //if (!empty($password)){
 // if (!empty($email)){
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "KaranAuth";
  // Create connection
  $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

  if (mysqli_connect_error())
  {
    die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
  }
  else
  {
    if($username != "")
    { 
    $res = mysqli_query($conn, "SELECT * from `registration` where name ='".$username."'");
    $num_rows= mysqli_num_rows($res);
      if($num_rows>0)
      {
        echo '<h1>' ."Username already Exists". '</h1>';
        die();
      }
    }
    if($password != "")
    { 
    $res = mysqli_query($conn, "SELECT * from `registration` where password='".$password."'");
    $num_rows= mysqli_num_rows($res);
      if($num_rows>0)
      {
        echo '<h1>' ."Password matched with another user . Please re-enter strong and unique password !". '</h1>';
        die();
      }
    }
    if($email != "")
    { 
    $res = mysqli_query($conn, "SELECT * from `registration` where email='".$email."'");
    $num_rows= mysqli_num_rows($res);
      if($num_rows>0)
      {
        echo '<h1>' ."Email already Exists . Please re-enter unique mail id !". '</h1>';
        die();
      }
    }
    if($mobile !="")
    {
      $res = mysqli_query($conn,"SELECT * FROM `registration` where mob='".$mobile."'");
      $num_rows= mysqli_num_rows($res);
        if($num_rows>0)
        {
          echo '<h1>' ."Mobile no matched with a user . Please re-enter other mobile no !!". '</h1>';
          die();
        }
    }
    $sql = "INSERT INTO registration (name, password, email, mob) values ('$username','$password','$email','$mobile')";
  
    if ($conn->query($sql))
    {
     header('Location: thank.html');
      exit;
    }
    else
    {
      echo "Error: ". $sql ."
      ". $conn->error;
    }
    $conn->close();
  }


?>