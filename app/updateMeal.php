<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * 
 * Updating the meal
 * 
 * This code gets the inputs from editMeal.php and 
 * processes the values and adds the updated versions 
 * to the database. This includes validation because 
 * the inserts need to be protected. 
 * 
 * @author Lindsey Cawthorne
 */

// Function for sanitizing the data
function validate_input($input) {
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
$meal_id = filter_has_var(INPUT_GET, 'meal_id') ? $_GET['meal_id'] : null;
$share = filter_has_var(INPUT_GET, 'share') ? $_GET['share'] : null;
$meal_name = filter_has_var(INPUT_GET, 'meal_name') ? $_GET['meal_name'] : null;
$category_id = filter_has_var(INPUT_GET, 'category') ? $_GET['category'] : null;
$ingredient_name = filter_has_var(INPUT_GET, 'ingredient_name') ? $_GET['ingredient_name'] : null;
$ingredient_amount = filter_has_var(INPUT_GET, 'ingredient_amount') ? $_GET['ingredient_amount'] : null;
$weight_unit_id = filter_has_var(INPUT_GET, 'weight_unit') ? $_GET['weight_unit'] : null;
$notes = filter_has_var(INPUT_GET, 'notes') ? $_GET['notes'] : null;


validate_input($meal_id);
validate_input($share);
validate_input($meal_name);
validate_input($category_id);
validate_input($ingredient_name);
validate_input($ingredient_amount);
validate_input($weight_unit_id);
validate_input($notes);



try 
{
		$dbConn = getConnection();

		$update = 
		"UPDATE ingredient_per_meal SET 
		meal_id ='$meal_id', 
		ingredient_amount = '$ingredient_amount', 
		weight_unit_id = $weight_unit_id, 
		WHERE meal_id = $meal_id";


		$notes = $dbConn->quote($notes);

		$updateSQL = 
		"UPDATE meal SET 
		meal_name ='$meal_name', 
		category_id = '$category_id', 
		notes = $notes 
		WHERE meal_id = $meal_id";

		$dbConn->exec($updateSQL);

		echo "<p>Meal updated</p>\n";

	
	} catch (Exception $e) {
		 echo "<p>Meal not updated: " . $e->getMessage() . "</p>\n";
}

echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();