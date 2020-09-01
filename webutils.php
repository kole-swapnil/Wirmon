<?php
class WebUtils
{
  public function userMailToJobSeeker($mail, $userEmail,$id)
{
    try{
        $mailSending = $userEmail;
        $body = "Welcome to Wirmon India Pvt Ltd and thanks for registering with us.Activate your account now!";
        $body .="<!DOCTYPE html>
    <html lang=en>

    <head>
      <meta charset=UTF-8>
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #000;

        }
        a {
          background: #ff8000;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff !important;
          font-size:1.8em;
        }
      </style>
    </head> <body>
      <div class=wrapper>
        <center><p style=font-size:1.9em><b>Activate your Account</b></p>
        <a href=http://wirmon.in/login.php?email=$userEmail&id=$id>VERIFY</a></div></body></html>";

        $mail->IsSMTP();
        $mail->Host = "mail.wirmon.in";
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@wirmon.in";
        $mail->Password = "123@Response#90";

        $mail->From = "noreply@wirmon.in";
        $mail->FromName = "Wirmon IT Solutions Pvt Ltd";
        $mail->AddAddress($mailSending);

        $mail->IsHTML(true);                                  // set email format to HTML

        $mail->Subject = "Account Verification";
        $mail->Body    = $body;
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

        if(!$mail->Send())
        {
            return false;
        }
        else
        {
            return true;
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

public function userMailToEmployer($mail, $userEmail,$id)
{
  try{
      $mailSending = $userEmail;
      $body = "Welcome to Wirmon India Pvt Ltd and thanks for registering with us.Activate your account now!";
      $body .="<!DOCTYPE html>
  <html lang=en>

  <head>
    <meta charset=UTF-8>
    <title>Test mail</title>
    <style>
      .wrapper {
        padding: 20px;
        color: #000;

      }
      a {
        background: #ff8000;
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        color: #fff !important;
        font-size:1.8em;
      }
    </style>
  </head> <body>
    <div class=wrapper>
      <center><p style=font-size:1.9em><b>Activate your Account</b></p>
      <a href=http://wirmon.in/login.php?email=$userEmail&id=$id>VERIFY</a></div></body></html>";

      $mail->IsSMTP();
      $mail->Host = "mail.wirmon.in";
      $mail->Port = 465;
      $mail->SMTPSecure = 'ssl';
      $mail->SMTPAuth = true;
      $mail->Username = "noreply@wirmon.in";
      $mail->Password = "123@Response#90";

      $mail->From = "noreply@wirmon.in";
      $mail->FromName = "Wirmon IT Solutions Pvt Ltd";
      $mail->AddAddress($mailSending);

      $mail->IsHTML(true);                                  // set email format to HTML

      $mail->Subject = "Account Verification";
      $mail->Body    = $body;
      $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

      if(!$mail->Send())
      {
          return false;
      }
      else
      {
          return true;
      }

  }
  catch(PDOException $e)
  {
      echo '{"error":{"text":'. $e->getMessage() .'}}';
  }
}
public function userContactForm($mail, $userName, $userEmail)
{
    try{
        $mailSending = $userEmail;
        $body = "Dear ".$userName."," . "<br>" . "Welcome to Wirmon India!<br>";
        $body .= "Thanks for submitting your details. Our admin will contact you soon.<br>";
        $body .= "For any further queries reach us at +91 9487980784 or info@wirmon.in <br> Visit us: <a href=http://wirmon.in/>www.wirmon.in</a>";

        $mail->IsSMTP();
        $mail->Host = "mail.wirmon.in";
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@wirmon.in";
        $mail->Password = "123@Response#90";

        $mail->From = "noreply@wirmon.in";
        $mail->FromName = "Wirmon IT Solutions Pvt Ltd";
        $mail->AddAddress($mailSending);

        $mail->IsHTML(true);                                  // set email format to HTML

        $mail->Subject = "Welcome to Wirmon";
        $mail->Body    = $body;
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

        if(!$mail->Send())
        {
            return false;
        }
        else
        {
            return true;
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

public function adminContactForm($mail, $userName, $mobile, $email, $subject, $message)
{
    try{
        $mailSending = "info@wirmon.in";
        $body = "Dear Wirmon,<br>Please check below details.<br>$userName wants to contact you.<br>";
        $body .= "Name :  $userName  <br> Phone Number :  $mobile <br> Email Address :  $email <br> Subject : $subject <br> Message :  $message";

        $mail->IsSMTP();
        $mail->Host = "mail.wirmon.in";
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@wirmon.in";
        $mail->Password = "123@Response#90";

        $mail->From = "noreply@wirmon.in";
        $mail->FromName = "Wirmon IT Solutions Pvt Ltd";
        $mail->AddAddress($mailSending);

        $mail->IsHTML(true);                                  // set email format to HTML

        $mail->Subject = "Enquiry From Website - Contact Form";
        $mail->Body    = $body;
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

        if(!$mail->Send())
        {
            return false;
        }
        else
        {
            return true;
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
public function userMailforJobpost($mail, $userName, $title, $job_id, $company_name, $userEmail)
{
    try{
        $mailSending = $userEmail;
        $body = "<!DOCTYPE html>
    <html lang=en>

    <head>
      <meta charset=UTF-8>
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #000;

        }
        </style>
    </head> <body>
      <div class=wrapper>
      Dear $userName ,<br> You have Successfully applied for the position of $title at $company_name <br>
      Job Id : $job_id<br>
      <p>Please Login for more details.</p><br>
      <center>
      <a href=http://wirmon.in/login.php style='background: #ff8000;
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        color: #fff !important;
        font-size:1.8em;'>Login</a></div><br><br></body></html>";
        $body .= "For any further queries reach us at +91 9487980784 or info@wirmon.in <br> Visit us:<a href=http://wirmon.in/> www.wirmon.in</a>";

        $mail->IsSMTP();
        $mail->Host = "mail.wirmon.in";
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@wirmon.in";
        $mail->Password = "123@Response#90";

        $mail->From = "noreply@wirmon.in";
        $mail->FromName = "Wirmon IT Solutions Pvt Ltd";
        $mail->AddAddress($mailSending);

        $mail->IsHTML(true);                                  // set email format to HTML

        $mail->Subject = "Job Application Successfull";
        $mail->Body    = $body;
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

        if(!$mail->Send())
        {
            return false;
        }
        else
        {
            return true;
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
public function userMailforEmployer($mail, $userName,$js_name, $title, $job_id, $company_name, $userEmail)
{
    try{
        $mailSending = $userEmail;
        $body = "<!DOCTYPE html>
    <html lang=en>

    <head>
      <meta charset=UTF-8>
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #000;

        }
        </style>
    </head> <body>
      <div class=wrapper>
      Dear $userName ,<br> $js_name have applied for the position of $title at $company_name <br>
      Job Id : $job_id<br>
      <p>Please Login for more details.</p><br>
      <center>
      <a href=http://wirmon.in/login.php style='  background: #ff8000;
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        color: #fff !important;
        font-size:1.8em;'>Login</a></div><br><br></body></html>";
        $body .= "For any further queries reach us at +91 9487980784 or info@wirmon.in <br> Visit us: <a href=http://wirmon.in/>www.wirmon.in</a>";

        $mail->IsSMTP();
        $mail->Host = "mail.wirmon.in";
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@wirmon.in";
        $mail->Password = "123@Response#90";

        $mail->From = "noreply@wirmon.in";
        $mail->FromName = "Wirmon IT Solutions Pvt Ltd";
        $mail->AddAddress($mailSending);

        $mail->IsHTML(true);                                  // set email format to HTML

        $mail->Subject = "Job Application";
        $mail->Body    = $body;
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

        if(!$mail->Send())
        {
            return false;
        }
        else
        {
            return true;
        }

    }
    catch(PDOException $e)
    {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
}
?>
