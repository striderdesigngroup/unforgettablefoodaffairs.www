<?php
if(isset($_POST['submit']) && !empty($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6LdJdgwUAAAAALAFf8pZZC3oCSCpFUaG6vx8-yni';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
            //contact form submission code
            $name = !empty($_POST['name'])?$_POST['name']:'';
            $phone = !empty($_POST['company'])?$_POST['company']:'';
            $phone = !empty($_POST['phone'])?$_POST['phone']:'';
            $email = !empty($_POST['email'])?$_POST['email']:'';
            $phone = !empty($_POST['address'])?$_POST['address']:'';
            $phone = !empty($_POST['address2'])?$_POST['address2']:'';
            $phone = !empty($_POST['city'])?$_POST['city']:'';
            $phone = !empty($_POST['state'])?$_POST['state']:'';
            $phone = !empty($_POST['zip'])?$_POST['zip']:'';
            $phone = !empty($_POST['hear'])?$_POST['hear']:'';
            $message = !empty($_POST['details'])?$_POST['details']:'';
            
            $to = 'smnthsnyder@gmail.com';
            $subject = 'New Contact Request';
            $htmlContent = "
                <h1>Contact request details</h1>
                <p><strong>Name: </strong>".$name."</p>
                <p><strong>Company: </strong>".$company."</p>
                <p><strong>Phone: </strong>".$phone."</p>
                <p><strong>Email: </strong>".$email."</p>
                <p><strong>Address: </strong><br />
                ".$address."<br />
                ".$address2."<br />
                ".$city.", ".$state." ".$zip."
                </p>
                <p><strong>How did you hear about us? </strong>".$hear."</p>
                <p><strong>Event Details: </strong>".$details."</p>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
            //send email
            @mail($to,$subject,$htmlContent,$headers);
            
            $succMsg = 'Your contact request have submitted successfully.';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
endif;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Us</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>



<div class="container">

  <div class="row">
    <div class="col-sm-12">
      <div class="pull-right top-bar">
        <a href="tel:9196627678">Phone: (919) 662-7678</a>
        <a href="" target="_blank"><img src="images/graphic-facebook.png" border="0" width="16" style="margin-left:10px;" /></a>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row" style="margin-top:-35px !important;">
    <div class="col-xs-3">
      <a href="index.html">
        <img src="images/logo.png" class="" width="125px" />
      </a>
    </div>

    <div class="col-xs-9 pull right">
      <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-container">
              <span class="sr-only">Show and Hide Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
             </button> 
          </div>
          <div style="collapse navbar-collapse" id="navbar-container">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.html">Home</a></li>
              <li><a href="services.html">Services</a></li>
              <li><a href="menu.html">Menu</a></li>
              <li><a href="events.html">Events</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="contact.html" class="current">Contact</a></li>
            </ul>
          </div>

      </nav>
    </div>
  </div>

  <!--
  <div class="row">
    <div class="col-xs-12">
      <img src="images/about-placeholder.jpg" border="0" class="img-responsive" />
    </div>
  </div>
  -->

  <div class="row">
    <div class="col-sm-6">
      <p>We appreciate your consideration in planning your affair. Please contact us using the most convenient method.</p>
      <p>
        Unforgettable Food Affairs, Inc<br />
        5533 NC HWY 42 Suite B26<br />
        Garner, NC 27529
      </p>

      <p><a href="tel:9196627678">(919) 662-7678</a></p>

      <br />
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12975.875117656733!2d-78.5689743!3d35.6038367!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xca4cd7cc2adc71c9!2sUnforgettable+Food+Affairs!5e0!3m2!1sen!2sus!4v1479528870328" width="100%" height="335" frameborder="0" style="border:0" allowfullscreen></iframe>

    </div>

    <div class="col-sm-6">
      <?php if(!empty($errMsg)): ?><div class="errMsg"><?php echo $errMsg; ?></div><?php endif; ?>
      <?php if(!empty($succMsg)): ?><div class="succMsg"><?php echo $succMsg; ?></div><?php endif; ?>

      <form class="contact-form" role="form" method="post" action="contact.php">
        <div class="col-sm-6">
          <label for="name">Name: <span class="red">*</span></label>
          <input type="text" id="name" name="name" autofocus required value="<?php echo !empty($name)?$name:''; ?>" />
        </div>
        <div class="col-sm-6">
          <label for="company">Company:</label>
          <input type="text" id="company" name="company" value="<?php echo !empty($company)?$company:''; ?>" />
        </div>
        <div class="col-sm-6">
          <label for="phone">Phone: <span class="red">*</span></label>
          <input type="tel" id="phone" name="phone" required value="<?php echo !empty($phone)?$phone:''; ?>" />
        </div>
        <div class="col-sm-6">
          <label for="email">Email: <span class="red">*</span></label>
          <input type="email" id="email" name="email" required value="<?php echo !empty($email)?$email:''; ?>" />
        </div>
        <div class="col-sm-6">
          <label for="address">Address:</label>
          <input type="text" id="address" name="address" value="<?php echo !empty($address)?$address:''; ?>" />
        </div>
        <div class="col-sm-6">
          <label for="address2">&nbsp;</label>
          <input type="text" id="address2" name="address2" value="<?php echo !empty($address2)?$address2:''; ?>" />
        </div>
        <div class="col-sm-6">
          <label for="city">City:</label>
          <input type="text" id="city" name="city"  value="<?php echo !empty($city)?$city:''; ?>"  />
        </div>
        <div class="col-sm-6">
          <label for="state">State:</label>
          <input type="text" id="state" name="state" value="<?php echo !empty($state)?$state:''; ?>" />
        </div>
        <div class="col-sm-6">
          <label for="zip">Zip:</label>
          <input type="text" id="zip" name="zip" value="<?php echo !empty($zip)?$zip:''; ?>" />
        </div>
        <div class="col-sm-6">
          <label for="hear">How did you hear about us?</label>
          <select type="text" id="hear" name="hear"  value="<?php echo !empty($hear)?$hear:''; ?>" >
            <option></option>
            <option>Web Search</option>
            <option>Friend</option>
            <option>Etc</option>
          </select><br />
        </div>
        <div class="col-sm-12">
          <label for="details">Event Details: <span class="red">*</span></label>
          <textarea type="text" id="details" name="details" required><?php echo !empty($details)?$details:''; ?></textarea>
        </div>
        <div class="col-sm-12">
          <div class="g-recaptcha" data-sitekey="6LdJdgwUAAAAACXViZjG_r8pcrnw3BiFSjJlUyjF"></div>
        </div>
        <div class="col-sm-12">
          <br />
        </div>
        <div class="col-sm-6">
          <input type="submit" value="Submit" class="submit" />
        </div>
      </form>
    </div>
  </div>

</div>


<div class="row footer">
  <div class="col-xs-12">
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="services.html">Services</a></li>
      <li><a href="menu.html">Menu</a></li>
      <li><a href="events.html">Events</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="gallery.html">Gallery</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
      <p>© <script>document.write(new Date().getFullYear())</script> Unforgettable Food Affairs, Inc. All Rights Reserved.<br />
        Site Produced by <a href="http://www.striderdesigngroup.com" target="_blank">Strider Design Group</a>.</p>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>