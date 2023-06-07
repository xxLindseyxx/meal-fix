<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "script/password.js");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * Account form
 * 
 * This for allows the user to create an account. The form is then passed to processAccount.php
 * 
 * @author Lindsey Cawthorne
 */

/*All fields are set to required but if somehow they bypass this there is validation in the process account page. 
  it will be better to do this then the user will not lose the data they have already input.
  another way could be to validate in javascript and use hidden divs to display info for the user.  
*/

?>

<h2>Create Account</h2>
<div class="create-container">
    <form class="create-form" id="form" action="processAccount.php" method="post">
        
        <input type='email' id='email' name='email' placeholder='Email..' tabindex="1" required>

        <input type='text' id='first_name' name='first_name' placeholder='First Name..' tabindex="2" required>

        <input type='text' id='last_name' name='last_name' placeholder='Last Name..' tabindex="3" required>

        <input type='tel' id='phone_number' name='phone_number' placeholder='Phone Number..' tabindex="4" required>

        <input type='password' id='password' name='password' placeholder='Password..' tabindex="5" >

        <input type='password' id='repeat-password' name='repeat-password' placeholder='Repeat password..' tabindex="6" >

        <div id="message" hidden><p>Passwords do not match</p></div>

        <div id="eMessage" hidden><p>Password must contain at least one uppercase letter, one lowercase letter and one number</p></div>

        <input id='submit' type='submit' value='Create Account' tabindex="7">
    </form>
</div>

<?php
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>