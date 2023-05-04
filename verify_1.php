<?php
$connect=mysqli_connect("localhost","root","","KaranAuth") or die("Connection Failed");
if(!empty($_POST['submit']))
{
    $username=$_POST['Username'];
    $password=$_POST['Password'];
    $query="select * from registration where name='$username' and password='$password' ";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        header('Location: otp_verify.php');
    }
    else
    {
        echo "INCORRECT USERNAME OR PASSWORD !!";
    }
}
?>