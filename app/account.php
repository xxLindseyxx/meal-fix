<?php
ini_set("session.save_path", "/home/unn_w20019235/sessionData"); 
session_start();

require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();
/**
 * 
 * User account
 * 
 * This page gives the user the option to update their account details.
 * 
 * @author Lindsey Cawthorne
 * 
 */

// If the session the user can view their account details. 
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])
{

  $email = $_SESSION['email'];

  $dbConn = getConnection();

  //Get the details from the database
  $sql = "SELECT email, first_name, last_name, phone_number, date_registered, password
  FROM user WHERE email = '$email'";

  $queryResult = $dbConn->query($sql);

  $rowObj = $queryResult->fetchObject();

  /* The form shows the account details to the user 
     and when submitted it gets updated in updateAccount.php
  */
  echo "

  <h2>Account</h2>

  <h3>'Welcome {$rowObj->first_name}'</h3>

  <div class='account-form'>
    <form id='updateAccount' action='updateAccount.php' method='get'>

        <input type='email' id='email' name='email' value='{$rowObj->email}'><br>

        <label for='first_name'>First Name:</label><br>
        <input type='text' id='first_name' name='first_name' value='{$rowObj->first_name}'><br>

        <label for='last_name'>Last Name:</label><br>
        <input type='text' id='last_name' name='last_name' value='{$rowObj->last_name}'><br>

        <label for='phone_number'>Phone Number:</label><br>
        <input type='tel' id='phone_number' name='phone_number' value='{$rowObj->phone_number}'><br>

        <label for='date_registered'>Date Registered:</label><br>
        <input type='text' id='date_registered' name='date_registered' value='{$rowObj->date_registered}'readonly><br>

        <label for='password'>Update Password:</label><br>
        <input type='password' id='password' name='password' value='{$rowObj->password}'><br>

        <input type='submit' name='submit' value='Save'>

        <a href='logOut.php'>Log-out</a>

      </form>
  </div";

}

// If the session is not set send the user to the login page. 
else
{
 header('Location: ' .'loginForm.php');
}

echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();