  <?php
  session_start();
  if(isset($_POST['contact_form_submit_button'])){
    // initialize variables
    $contact_name = $_POST['contact_form_name'];
    $contact_email = $_POST['contact_form_email'];
    $contact_subject = $_POST['contact_form_subject'];
    $contact_message = $_POST['contact_form_messages'];

    $mailTo = "ibrahimhussein19.98@gmail.com";
    $headers = "From: ".$contact_email;
    $txt = "You have received an email from ".$contact_email.".\n\n".$contact_message;

    mail($mailTo,$contact_subject,$txt,$headers);
    echo "done";
  }
 ?>
