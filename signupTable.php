<table class="sign-up-table">
  <tbody>
    <form class="" action="signupProcess.php" method="POST">
      <tr><td>
              <input class="signupInputs" type="text" name="signup_fName" placeholder="First Name" required></td><td>
               <input class="signupInputs" type="text" name = "signup_lName" placeholder="Last Name" required></td></tr>
      <tr><td>
              <input class="signupInputs" type="text"name = "signup_mName" placeholder="Middle Name" required></td><td>
              <input class="signupInputs specialCaseInputs" min="18" name = "signup_age" type="text" placeholder="Age" required>
                <select class="signupInputs specialCaseInputs" name ="signup_gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select></td></tr>
      <tr><td>
              <input class="signupInputs" type="text" name = "signup_address"placeholder="Address" required></td></tr>
      <tr><td>
              <input class="signupInputs" type="email"name = "signup_email" placeholder="example@example.com" required></td><td>
              <input class="signupInputs" type="password" name = "signup_password"placeholder="••••••••" required></td></tr>
      <tr><td>
               <input class="signupInputs" type="text"name = "signup_country" placeholder="Country" required></td><td>
               <input class="signupInputs" type="text"name = "signup_state" placeholder="State" required></td></tr>
      <tr><td>
              <input class="signupInputs" type="tel" name = "signup_phoneNumber" placeholder="555 0102" required></td><td>
              <input class="signupInputs" type="text"name = "signup_city" placeholder="City" required></td></tr>
      <tr><td>
  </tbody>
  <tfoot>
    <tr><td></br></td></tr>
    <tr><td colspan="2"><input class="submitInputs" type="submit" value="Submit" name="signup_submit_button"></td></tr>
    </form> <!-- end of form -->
  </tfoot>
</table>
