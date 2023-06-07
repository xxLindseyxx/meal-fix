<?php

require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * Edit Account
 * 
 * Gives the user the ability to edit their account details. 
 * When the new details are saved they are passed to updateAccount.php
 * 
 * @author Lindsey Cawthorne
 */

if(!isset($_SESSION['user_id'])){
  echo "Not logged in";
 }else{

$user_id = filter_has_var(INPUT_GET, 'user_id') ? $_GET['user_id'] : null;

    require_once("./functions.php");
    $dbConn = getConnection();

    $sql = "SELECT user_id, first_name, last_name, phone_number, date_registered, password
    FROM user";

$queryResult = $dbConn->query($sql);

$rowObj = $queryResult->fetchObject();

echo "

<h2>Account</h2>

<h3>'Welcome {$rowObj->first_name}'</h3>

<div class='account-form'>
  <form id='updateAccount' action='updateAccount.php' method='get'>

      <input type='hidden' id='user_id' name='user_id' value='{$rowObj->user_id}' tabindex='1'><br>

      <label for='first_name'>First Name:</label><br>
      <input type='text' id='first_name' name='first_name' value='{$rowObj->first_name}' tabindex='2'><br>

      <label for='last_name'>Last Name:</label><br>
      <input type='text' id='last_name' name='last_name' value='{$rowObj->last_name}' tabindex='3'><br>

      <label for='phone_number'>Phone Number:</label><br>
      <input type='tel' id='phone_number' name='phone_number' value='{$rowObj->phone_number}' tabindex='4'><br>

      <label for='date_registered'>Date Registered:</label><br>
      <input type='text' id='date_registered' name='date_registered' value='{$rowObj->date_registered}' tabindex='5' readonly><br>

      <label for='password'>Update Password:</label><br>
      <input type='password' id='password' name='password' value='{$rowObj->password}' tabindex='6'><br>

      <input type='submit' name='Save' value='Save' tabindex='7'>

      <a href='logOut.php' tabindex='8'>Log-out</a>

    </form>
</div";
 }
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();