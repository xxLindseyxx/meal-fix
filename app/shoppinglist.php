<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * 
 * The shopping list
 * 
 * The shopping list could not be finished because 
 * there was no time but this is what it could 
 * look like if it was finished. 
 * 
 * @author Lindsey Cawthorne
 */

echo 

"<div>

<h2>Shopping List</h2>

<fieldset>
    <legend>Your Shpping List</legend>

    <div>
      <input type='checkbox' id='food-item' name='spaghetti' checked>
      <label for='food-item'>Spaghetti</label>
    </div>

    <div>
      <input type='checkbox' id='food-item' name='minced-beef'>
      <label for='food-item'>Minced Beef</label>
    </div>
</fieldset>
</div>";

echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>