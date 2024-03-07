<?php 
require_once ("config.php");
// Ternary operation to check if variables are set or not 
$name= isset($_POST["name"])? $_POST["name"]:"";
$email= isset($_POST["email"])? $_POST["email"]:"";
$message= isset($_POST["message"])? $_POST["message"]:"";
$errMessage="";

//Condition to make all conditions available after pressing the button
if(isset($_POST["submit"])) {
if((strlen($name) > MAX_NAME_LENGTH)|| empty($name)){
$errMessage ="<h3> Name must be less than 100 chars and not empty </h3>";
}

if(!(filter_var($email, FILTER_VALIDATE_EMAIL)) ){
  $errMessage .=" <h3> Enter a valid email </h3>";
  }

  if((strlen($message) > MAX_MESSAGE_LENGTH)|| empty($message)){
    $errMessage .="<h3>Message must be less than 250 chars and not empty </h3>";
    }
    echo $errMessage;
    echo strlen($name);
  }

?>

<html>
  <head>
    <title>contact form</title>
  </head>

  <body>
    <h3>Contact Form</h3>
    <div id="after_submit"></div>
    <?php 
        //Checking that button is clicked and no errors to print success messages
        if(isset($_POST["submit"]) && empty($errMessage)) {
          echo SUCCESS_MESSAGE; 
          echo " <b>Name:</b> $name <br>";
          echo " <b>Email:</b> $email <br>";
          echo " <b>Message:</b> $message";
          exit();
        }
    ?>
    <form
      id="contact_form"
      action="index.php"
      method="POST"
      enctype="multipart/form-data"
    >
      <div class="row">
        <label class="required" for="name">Your name:</label><br />
        <input
          id="name"
          class="input"
          name="name"
          type="text"
          value="<?php echo $name ?>"
          size="30"
        /><br />
      </div>
      <div class="row">
        <label class="required" for="email">Your email:</label><br />
        <input
          id="email"
          class="input"
          name="email"
          type="text"
          value="<?php echo $email ?>"
          size="30"
        /><br />
      </div>
      <div class="row">
        <label class="required" for="message">Your message:</label><br />
        <textarea
          id="message"
          class="input"
          name="message"
          rows="7"
          cols="30"
          <?php echo $message ?>
        ></textarea
        ><br />
      </div>

      <input id="submit" name="submit" type="submit" value="Send email" />
      <input id="clear" name="clear" type="reset" value="clear form" />
    </form>
  </body>
</html>


