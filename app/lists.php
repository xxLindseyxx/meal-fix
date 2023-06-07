<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * Lists
 * 
 * This code produces the links for the shopping 
 * list and the pantry list.
 * 
 * @author Lindsey Cawthorne
 */
?>

<div>
    <h2>Your Lists</h2>

    <div class='list-1'>
        <a href='shoppinglist.php'>
        <i class='material-icons nav-icon'>checklist</i>
        <span>Shopping List</span>
        <p>Check out all of the items that have added automatically from the calendar!</p>
        </a>
    </div>

    <div class='list-2'>
        <a href='pantry.php'>
        <i class='material-icons nav-icon'>shelves</i>
        <span>Pantry</span>
        <p>Check out all of the items that have added automatically from the shopping list!</p>
        </a>
    </div>
</div>

<?php
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>