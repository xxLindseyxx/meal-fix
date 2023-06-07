<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * 
 * Delete a meal 
 * 
 * Delete a meal removes the meal from the database 
 * this is not implimented in the project.
 * 
 * @author Lindsey Cawthorne
 */

$mealId = filter_has_var(INPUT_GET, 'meal_id') ? $_GET['meal_id'] : null;

try 
{
    $dbConn = getConnection();

    $delete = "DELETE from meal where meal_id = '$mealId'";
    
    $dbConn->exec($delete);

    header("location: yourmeals.php");
}

catch (Exception $e)
{
    echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}

echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>