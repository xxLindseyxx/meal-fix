<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * 
 * Update account 
 * 
 * Update account retreves the inputs from 
 * the edit account form it validates and 
 * sanitizes the data then updates them in 
 * the database. 
 * 
 * @author Lindsey Cawthorne
 */

// Function for sanitizing the data
function validate_input($input) 
{
	// Remove whitespace from beginning and end of input
	$input = trim($input);
	
	// Remove backslashes from the input
	$input = stripslashes($input);
	
	// Convert special characters to HTML entities
	$input = htmlspecialchars($input, ENT_QUOTES);
	
	// Return the sanitized input
	return $input;
}

// Retrieve variables
$email = filter_has_var(INPUT_GET, 'email') ? $_GET['email'] : null;
$first_name = filter_has_var(INPUT_GET, 'first_name') ? $_GET['first_name'] : null;
$last_name = filter_has_var(INPUT_GET, 'last_name') ? $_GET['last_name'] : null;
$phone_number = filter_has_var(INPUT_GET, 'phone_number') ? $_GET['phone_number'] : null;
$date_registered = filter_has_var(INPUT_GET, 'date_registered') ? $_GET['date_registered'] : null;
$password = filter_has_var(INPUT_GET, 'password') ? $_GET['password'] : null;

validate_input($email);
validate_input($first_name);
validate_input($last_name);
validate_input($phone_number);
validate_input($date_registered);
validate_input($password);

//Make the password hash take longer to deter hackers. 
$option = [
    'cost' => 14,
];

$hash = password_hash($password, PASSWORD_DEFAULT, $option);

$errors = false;

if (empty($email)) 
{
	echo "<p>You need a valid email address.</p>\n";
	$errors = true;
}
if (empty($first_name)) 
{
	echo "<p>You need a first name.</p>\n";
	$errors = true;
}
if (empty($last_name)) 
{
	echo "<p>You need a surname.</p>\n";
	$errors = true;
}
if (empty($phone_number)) 
{
	echo "<p>You need to define a phone number.</p>\n";
	$errors = true;
}
if (empty($password)) 
{
	echo "<p>You need to define a password.</p>\n";
	$errors = true;
}
if ($errors === true) 
{
	echo "<p>Please try <a href='account.php'>again</a>.</p>\n";
}
else 
{
	try 
	{
		$dbConn = getConnection();

		$updateSQL = "UPDATE user SET 
		first_name='$first_name', 
		last_name = '$last_name', 
        phone_number = '$phone_number', 
		date_registered = '$date_registered', 
		password = '$hash'
		WHERE email = '$email'";

		$dbConn->exec($updateSQL);
		echo "<p>Account updated</p>\n";
	} catch (Exception $e) {
		 echo "<p>Account not updated: " . $e->getMessage() . "</p>\n";
	}
}

echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();