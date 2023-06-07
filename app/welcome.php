<?php

require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * 
 * Welcome page 
 * 
 * This is what the user sees when they sign-up to meal-fix. 
 * 
 * @author Lindsey Cawthorne
 */
?>

<h1>Welcome to Meal-Fix</h1>
<p>Login to your account here:<a href="loginForm.php">Login Page</a></p>
<?php
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();