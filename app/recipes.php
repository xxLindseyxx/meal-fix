<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();
echo 

/**
 * 
 * Recipes
 * 
 * The idea of this code is for the user to be 
 * able to share recipes with all users of 
 * meal-fix. In the database share is = to 1 
 * and private is = to 0. The meal would be 
 * shared if the meal is = to 1. This code 
 * could not be completed but this is a 
 * partial example. 
 * 
 * @author Lindsey Cawthorne
 */
"<div>
<h2>Recipes</h2>
</div>";

try 
{
    require_once("functions.php");
    $dbConn = getConnection();

    $sql = "SELECT meal_id, meal_name, category.category_id, category_name, notes, share
    FROM meal
    JOIN category on meal.category_id = category.category_id
    WHERE share = 1";

    $queryResult = $dbConn->query($sql);

    while ($rowObj = $queryResult->fetchObject()) {
        echo "<div class='meal'>\n
        <span class='meal-names'>{$rowObj->meal_name}</span>\n
        </div>\n";
    }
}
    catch (Exception $e)
    {
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
    }


echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>