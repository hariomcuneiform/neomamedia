
<?php

        include("connection.php");
    $name    = @trim(stripslashes($_POST['name']));
    $companyname    = @trim(stripslashes($_POST['c_name']));
    $reachby    = @trim(stripslashes($_POST['reachby']));
    $helpwant    = @trim(stripslashes($_POST['helpwant']));
    $email   = @trim(stripslashes($_POST['email']));
    $message = @trim(stripslashes($_POST['message']));

    
    $email_from = $name;
    // $email_to = 'growth@neoma.media';
    $email_to = 'rp6038272@gmail.com';
    
    
     
    $subject="Neoma contact form";
     
     
     $body='<html>
            <body>
            <table border="2px">
            <tr align="center">
            <td colspan="2"><b>'.$subject.'</b></td>
            </tr>
             <tr>
                <tr><td><b>Name :</b></td><td>'.$name.'</td></tr>
                <tr><td><b>Email :</b></td><td>'.$email.'</td></tr>
                <tr><td><b> companyname :</b></td><td>'.$companyname.'</td></tr>
                <tr><td><b>helpwant :</b></td><td>'.$helpwant.'</td></tr>
                <tr><td><b>reachby :</b></td><td>'.$reachby.'</td></tr>
                <td><b>Message :</b></td><td>'.$message.'</td></tr>
            </tr>
            
            </table>
            
            </body>
            </html>';  
                
            
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <'.$email_from.'>'. "\r\n";
    $headers .= 'Bcc: hariomcuneiform@gmail.com' . "\r\n";
    
    if(mail($email_to, $subject, $body, $headers))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone= $_POST['phone'];
        $subject= $_POST['subject'];
        $message = $_POST['message'];
        
  
        $qu= "INSERT INTO `contactform` (`name`, `company`, `reachby`, `helpwant`, `email`, `message`) VALUES ('".$name."', '".$companyname."', '".$reachby."','".$helpwant."', '".$email."','".$message."')";
      if($conn->query($qu)===TRUE){
        // echo "<script>
        // window.location='https://neoma.media';
        // </script>";
        $conn->close();
        }
        else
        {
        echo "Insert Failed ".$conn->error;
        $conn->close();
    }
    
    }
?>
