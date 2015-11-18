<?php
  
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    
   
    if($name != NULL && $email != NULL)	{
    	
       

$regex = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[-_a-z0-9][-_a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,})$/i';
$str = $email;
if (preg_match($regex, $str)) {
    
   

    //mail
    require_once ("mail/send.php"); 
    $destAddress= $email;
    $subject= $name.'   O (∩_∩) O Thank you.';
    $content='Your message has been added to the database.The message: '.$message.'<br/>Thank you!';
    $fromName="Chen Hongwei";
    smtp_send_mail($destAddress ,$subject , $content ,$fromName) ;  
    //mail
    echo "<script>alert('Message success! The system will send an Email to your mailbox.');location='index.html';</script>";
  
    
}
else 
    echo "<script>alert('Please enter a correct email');location='./#contact';</script>";
  
    





}

?>