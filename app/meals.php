<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * 
 * Meals page
 * 
 * This displays the meal options on that the 
 * user can use in the website like add a meal 
 * and edit a meal. 
 * 
 * @author Lindsey Cawthorne
 */

?>
<!-- This code is for the meals page on the navbar. This page takes the user to other links reguarding meals.-->
<div>
    <h2>Meals</h2>
    <div class='add-meal'>
        <a href='addameal.php'>
        <i class='material-icons nav-icon'>assignment_add</i>
        <span>Add a Meal</span>
        <p>Add a meal to the meal list</p>
        </a>
    </div>

    <div class='your-meals'>
        <a href='yourmeals.php'>
        <i class='material-icons nav-icon'>food_bank</i>
        <span>Your Meals</span>
        <p>View the meals you added</p>
        </a>
    </div>

    <div class='recipe-meal'>
        <a href='recipes.php'>
        <i class='material-icons nav-icon'>menu_book</i>
        <span>Recipes</span>
        <p>View shared recipes from our community</p>
        </a>
    </div>
</div>


<?php
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>