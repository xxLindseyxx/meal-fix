<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * 
 * This is the code for the pantry
 * 
 * This code displays the pantry page this page 
 * could not be finished but their is place 
 * holders demonstrating what the page could 
 * look like.
 * 
 * @author Lindsey Cawthorne
 */

?>

<h2>Pantry</h2>
    <div class='pantry-flex'>

    <div>
        <h3>Ingredient name</h3>
        <ul>
            <li>
                Spaghetti
            </li>
        </ul>
    </div>

    <div>
        <h3>Expiry Date</h3>
        <ul>
            <li>
                15/02/2024
            </li>
        </ul>
    </div>

    <div>
        <h3>Days Left</h3>
        <ul>
            <li>
                5
            </li>
        </ul>
    </div>
<?php
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>