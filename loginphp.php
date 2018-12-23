<?php 

$host="localhost";
$user="root";
$password="";
$db="blog_samples";

$conn = mysqli_connect($host,$user,$password,$db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from Users where Username='".$uname."'AND Password ='".$password."' limit 1";
    
    $result=mysqli_query($conn,$sql);

    $user = mysqli_fetch_assoc($result);
    
    if(mysqli_num_rows($result)==1){
        session_start(); 

        $_SESSION['auth'] = true; 

        $_SESSION['id'] = $user['ID']; 
        $_SESSION['Username'] = $user['Username'];

        echo 'Здравствуй, '.$_SESSION['Username'];

        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}
?>