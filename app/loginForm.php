<?php 

require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * Login From
 * 
 * The user will; use thid form to login 
 * to the website and update their account 
 * details. 
 * 
 * @author Lindsey Cawthorne
 */
?>

<h2>Login</h2>

<div class="login-container">
    <form id="form" action="passwordVerify.php" method="post">

        <input type='email' id='email' name='email' placeholder='Email Address' tabindex='1'>

        <input type='password' id='password' name='password' placeholder='Password' tabindex='2'>

        <button type='submit' value='Login'>Login</button>

        <a href="createAccount.php">or create a new account</a>
    </form>
</div>

<?php
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>