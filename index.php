<?php 

# Email script with Submit conditional

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.


    $first_name = isset($_POST['first']) ? $_POST['first'] : '';
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    
    
      // Assume invalid values:
      $first_name = $email = $comment = FALSE;
      
    
      // Check for a first name:
      if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $_POST['first'])) {
        $first_name = htmlentities($_POST['first']);
      } else {
        $fn_error = 'Please enter your full name!';
      }
      
        // Check for an email address:
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlentities($_POST['email']);
      } else {
        $e_error = 'Please enter a valid email address!';
      }
      
      $comment = htmlentities($_POST['comment']);
      
     if ($_POST['droid'] !='') {
       die ('Seems like you are not human. Bye.');
     }
      
    
    } // End of the main Submit conditional.
  
    if (isset($_POST['first']) && ($_POST['email'])) { // If everything's OK...
  
          
          $first_name = $_POST['first'];
          $email = $_POST['email'];
          $comment = $_POST['comment'];
          $date = date('F jS, Y');
          $copy = date('Y');
          
          
  
                  // Send the email:
                  $from = "tellmeyourstory99.aw@Gmail.com";
                  $headers = "From:" . $from;
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                  $body = "<!DOCTYPE HTML>
                                              <html>
                                                  <head>
                                                      <meta charset='utf-8'>
                                                      <title>Hello from Kila Kane</title>
                                                  </head>
  
                                                  <body style=' font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;'>
                                                      <!-- wrapper table -->
                                                      <table style='margin-left:auto; margin-right:auto; display:block; background:#fff;' width='90%' min-width='20%' border='0' cellpadding='0'>
                                                          <!-- begin main table --><table style='margin-left:auto; margin-right:auto; display:block; background:#FFF;' width='70%' min-width='20%' border='0' cellpadding='0'>
                                                            <tr>
                                                              <td>
                                                              <!-- header table -->
                                                                  <table style='margin-left: .3%; background:#b7343a;' width='100%' border='0' cellpadding='0'>
                                                                    <tr>
                                                                      <td width='53%'><a href='http://www.kilakane.com'><img style='margin-left:.2%;  width: 30%; height: auto;' src='http://www.kilakane.com/img/demo/_small/kila.png' alt='Kila Kane logo'></a></td>
                                                                      <td width='47%'></td>
                                                                    </tr>
                                                                  </table>    
                                                              <!-- end header table -->
                                                              <!-- welcome table -->
                                                                  <table width='100%' style='margin-top: -.2%;' border='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td width='100%'><p style='font-size:14px; margin-left: 2.5%;'>$date</p><h2 style='margin-left: 2%;' >$first_name, thank you for contacting me</h2><p style='font-size:18px; margin-left: 2%; padding-right: 1.2%;' >If you are interested in purchasing one of my books, you can do that here. If there is any other way I can assist , please let me know.</p></td>
                                                                    </tr>
                                                                  </table> 
                                                              <!-- end welcome table -->
  
                                                              <!-- footer table -->
  
                                                              <table width='100%' style='background: #b7343a; margin-top: -.2%; margin-left: .2%;' border='0' cellpadding='3'>
                                                                <tr>
                                                                   <td width='54%' valign='top'><p style='color:#FFF; font-size:12px; text-align:center'>&copy;$copy Kila Kane | <a href='mailto:tellmeyourstory99.aw@Gmail.com'>Kila Kane</a><br /><br />Sent from $from to $email.<br /> This is an informational email only. There will be no further communication from $from</p></td>
                                                                </tr>
                                                              </table>  
  
                                                              <!-- end footer table -->
  
  
                                                              </td>
                                                            </tr>
                                                          <!-- end main table --></table>
                                                      <!-- end wrapper table--></table>
                                                  </body>
                                              </html>
  ";
                  mail($_POST['email'], 'Hello from Kila Kane', $body, $headers);
                  
                  // Send the email to administrator :
                  $body2 = "Someone has contacted you.  ".$_POST['first']." ".$_POST['email']." ".$_POST['comment']."";
                  mail('tellmeyourstory99.aw@Gmail.com', 'Client question or comment', $body2, 'From: tellmeyourstory99.aw@Gmail.com');
                  
              echo '<script> alert("Your message has been sent.");</script>';
  
  
                  
          } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kila Kane | Tell Me Your Story</title>
  <link rel="stylesheet" href="base.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
<div class="header">
  <div class="logo">
      <img src="img/kila.png" alt="Kila Kane logo">
  </div>
  <nav class="navigation">
    <ul>
        <a href="#about"><li>About</li></a>
        <a href="#buy"><li>Buy</li></a>
        <a href="#blog"><li>Blog</li></a>
        <a href="#contact"><li>Contact</li></a>
    </ul>
   </nav>
   <div class="mobile-nav">
        <i class="fa fa-bars" id="switch" aria-hidden="true" fa-2x></i>
    </div>
    <div class="hidden-nav">
        <ul>
            <a href="#about"><li>About</li></a>
            <a href="#buy"><li>Buy</li></a>
            <a href="#blog"><li>Blog</li></a>
            <a href="#contact"><li>Contact</li></a>
        </ul>
    </div>

</div>

  <div class="hero">
    <div class="overlay"></div>
    <p class="story">Tell Me Your Story</p>
  </div>
  
  <div class="about" id="about">
    <h2>My Story</h2>
    <p>
    I was born and raised in Detroit, Michigan, where I graduated from Cass Technical High School in 1999. I've been married to my husband for 11 years and, we have one son. I knew at an early age, I would one day follow my dreams of writing books. In 8th grade, my English teacher, confirmed my thoughts. My first novel "Life Won't Stop #FORNOTHING starts my journey. My hope is to lead you on a fantastic ride. Buckle up and enjoy the scenery because I'm not stopping....#FORNOTHING
    </p>
  </div>
  
  <div class="buy" id="buy">
  <div class="flex-container">
            <div class="card">
                <div class="photo">
                   <img src="img/life.jpeg" alt="">
                </div>
                <div class="blurb-container">
                    <p class="blurb">A story inspired by true events. Life's twists and turns will sometimes pull you in directions you don't want to go.          
                    </p>
                    <p class="price"><strong>Buy:</strong> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WD7BLKHLX2E6Y">Book</a> | <a href="">CD</a> | <a href="">Book + CD</a></p>
                </div>

             </div>

             <div class="card">
                <div class="photo">
                   <img src="img/love.jpeg" alt="">
                </div>
                <div class="blurb-container">
                    <p class="blurb">A story inspired by true events. Life's twists and turns will sometimes pull you in directions you don't want to go.          
                    </p>
                    <p class="price"><strong>Buy:</strong> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WD7BLKHLX2E6Y">Book</a> | <a href="">CD</a> | <a href="">Book + CD</a></p>
                </div>

             </div>

             <div class="card">
                <div class="photo">
                   <img src="img/time.jpeg" alt="">
                </div>
                <div class="blurb-container">
                    <p class="blurb">A story inspired by true events. Life's twists and turns will sometimes pull you in directions you don't want to go.          
                    </p>
                    <p class="price"><strong>Buy:</strong> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WD7BLKHLX2E6Y">Book</a> </p>
                </div>

             </div>
             
        </div>

  </div>
  
  <div class="blog" id="blog">
  <h2>Latest Blog Post</h2>
            <p>Read about my latest thoughts and products in my <a href="http://www.kilakane.com/blog/">blog</a>.</p>
  </div>

  <div class="contact" id="contact">
          <form action="#email" method="post" class="smart-green" id="contactform"      enctype="multipart/form-data">
           <h2 id="email">Contact Me!</h2>
            <div><label>Full Name*</label>
                <input type="text" name="first" size="40" maxlength="60" value="<?php if (isset($_POST['first'])) echo $_POST['first']; ?>"/><p id="error"><?php if (!empty($fn_error)) { ?><?php echo $fn_error;?><?php } ?></p>
            </div><br />
            <div><label>Email*</label>
                <input type="text" name="email" size="40" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/><p id="error"><?php if (!empty($e_error)) { ?><?php echo $e_error;?><?php } ?></p>
            </div><br />
            <div><label>Question or comment*</label>
                <textarea name="comment" cols="80" rows="20"></textarea>
            </div>
            <div>
                <input name="droid" id="droid" type="hidden" value="">
            </div>
            <br />
            <div class="submit">
                <input type="submit" class="button" id="submit" value="Submit" />
            </div>
        </form>
       <script src="toggle.js"></script>
    </div>
  </div>

  <footer class="footer">
    <p>&copy; 2014<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script>, Kila Kane. All Rights Reserved.<br />Designed by Cosmiq Cloud.</p>

  </footer>

  <div id="preloaded-images">
   <img src="img/kila_main.jpg" width="1" height="1" alt="" />
   <img src="img/kila.png" width="1" height="1" alt="" />   
</div>

</body>
</html>