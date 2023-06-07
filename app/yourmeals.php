<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "script/category.js");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

echo 

"<div>
<h2>Your Meals</h2>
</div>";

/**
 * 
 * Choose a meal
 * 
 * This page lists the meals for the user to choose. 
 * Ideally I would have liked the user to be able to 
 * choose a category from the drop down and view the 
 * meals from that category but I couldnt get it to
 * work but I did try.
 * 
 * @author Lindsey Cawthorne
 */

?>

<form>
<!-- This is the code is to select the category name ------------------->
<select id='category' name='category' onchange = 'displayMeals()'>

<?php 

$dbConn = getConnection(); 

$sql = "SELECT category_id, category_name FROM category";

$queryResult = $dbConn->query ($sql);

if ($queryResult === false) 
{
    echo "<p> Query failed: </p></body></html>";
    exit;
}  
else
{
while ($row = $queryResult->fetchObject()) 
{
    echo "<option value='{$row->category_id}' >{$row->category_name} </option>\n";
}
}
echo '</select> '
?>
</form>

<?php


try 
{
    $sql = "SELECT meal_id, meal_name, category_name 
            FROM meal
            JOIN category on meal.category_id = category.category_id";

    $queryResult = $dbConn->query($sql);

    while ($rowObj = $queryResult->fetchObject()) {
        echo 
        "<div class='meal'>\n
        <span class='meal-names'>
        <a href='editMealForm.php?meal_id={$rowObj->meal_id}'>{$rowObj->meal_name}</a>
        </span>\n
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