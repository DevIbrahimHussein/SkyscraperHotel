<?php $_SESSION['web_Title'] = "Contact us" ?>
<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>OK</title>
  </head>
  <body>
    <form action="contactForm.php" method="POST">
      <label>Name</label>
      <input type="text" name="contact_form_name" value="">
      <label> email</label>
      <input type="text" name="contact_form_email" value="">
      <label>subject</label>
      <input type="text" name="contact_form_subject" value="">
      <label>message</label>
      <input type="text" name="contact_form_messages" value="">
      <input type="submit" name="contact_form_submit_button" value="submit">
    </form>
  </body>
</html>
