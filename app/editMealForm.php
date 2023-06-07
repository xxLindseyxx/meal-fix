<?php
  require_once('functions.php');

  echo makePageStart("Meal Fix!", "styles/index.css", "script/addIng.js");
  echo makeHeader("MEAL-FIX");
  echo makeNavMenu(array());
  echo startMain();

  /**
   * 
   * Edit meal form
   * 
   * This produces a form with pre populated inputs
   * the user can edit these inputs and resend them 
   * to the database. The inputs are processed in 
   * updateMeal.php
   * 
   * @author Lindsey Cawthorne
   */

  $meal_id = filter_has_var(INPUT_GET, 'meal_id') ? $_GET['meal_id'] : null;

  if (empty($meal_id)) 
  {
    echo "<p>Please <a href='yourmeals.php'>choose</a> a meal.</p>\n";
  }
  else 
  {
    try 
    {

      $dbConn = getConnection();

      $sql = "SELECT distinct meal_id, meal_name, share
      FROM meal
      WHERE meal_id = '$meal_id'";

$queryResult = $dbConn->query($sql);
$rowObj = $queryResult->fetchObject();

      //Gets the meal_name and displays it to the screen
      echo 
        "<h1>Update '{$rowObj->meal_name}'</h1>
        <form id='UpdateMeal' action='updateMeal.php' method='get'>
        <input type='hidden' name='meal_id' value='{$rowObj->meal_id}'>


        <label for='share'>Share</label>";
      // Changes 1 and 0 to share and public for the user to better understand
      

      if($rowObj->share==0)
      {
        $shareType = "Private";
      }
        else{
          $shareType = 'Public';
        }

      // Puts share into a select so the user can change the value
      echo 
        "<select id='share' name='share' tabindex='1'>
        <option selected value='{$rowObj->share}'>$shareType</option>";
        if($rowObj->share==1){
          echo "<option value = '0'>Private</option>";
        }
        else{
          echo"<option value = '1'>Public</option>";
        }

      echo "</select>";

      //Displays the meal_name
      echo "
        <label for='meal_name'>Meal Name</label>
        <input type='text' id='meal_name' name='meal_name' tabindex='2' value='{$rowObj->meal_name}' placeholder='Meal name..'>";

      // Gets all user defined categories and puts them into a select box
      echo 
        "<label for='category'>Choose a category or add a new category</label>
        <select id='category' name='category' onchange = 'newCategory()' tabindex='3'>";

        $sql = "SELECT category_id, category_name FROM category";

        $queryResult = $dbConn->query ($sql);

        if ($queryResult === false) 
        {
          echo "<p> Query failed: </p></body></html>";
          exit;
        }  
        else
        {
          while ($rowObj = $queryResult->fetchObject()) 
          {
          echo "<option value='{$rowObj->category_id}'>{$rowObj->category_name}</option>\n";
          }
        }
?>
          <option value='new-cat'><p id = 'new-cat'>Add a New Category</p></option>
          </select> 

        <!-- This code adds a new category --------------------------------------------------------------------->
          <div id = 'newCat' style="display: none" ><!-- This field will appear -->
            <input type='text' id='add-category' name='add-category' placeholder='New category name here' tabindex='4'>
          </div> 
<?php

    // This query gets all of the meal ingredients, amounts and units for the meal
      $sqlIngredient = 
        "SELECT distinct meal.meal_id, ingredient_name, ingredient_per_meal.ingredient_amount, weight_unit
          FROM meal
          JOIN ingredient_per_meal on ingredient_per_meal.meal_id = meal.meal_id
          JOIN ingredient ON ingredient.ingredient_id = ingredient_per_meal.ingredient_id
          JOIN weight_unit on weight_unit.weight_unit_id = ingredient_per_meal.weight_unit_id 
          WHERE ingredient_per_meal.meal_id = '$meal_id'";

      $ingredientResult = $dbConn->query($sqlIngredient);

    // This itterates over all the ingredients and displays them to the screen
        while($rowObj2 = $ingredientResult->fetchObject())
        {
          echo "
          <label for='ingredient_name'>Ingredient name:</label><br>
          <input type='text' id='ingredient_name' name='ingredient_name' value='{$rowObj2->ingredient_name}' tabindex='5'><br>

          <label for='ingredients'>Ingredient Amount:</label><br>
          <input type='text' id='ingredient_amount' name='ingredient_amount' value='{$rowObj2->ingredient_amount}' tabindex='6'><br>

          <label for='weight_unit'>Weight unit:</label><br>
          <input type='text' id='weight_unit' name='weight_unit' value='{$rowObj2->weight_unit}' tabindex='7' ><br>";
        }

    // Gets the notes and displays them on the screen
        $sqlNotes = "SELECT notes from meal
                    WHERE meal_id = $meal_id";

        $queryResultNotes = $dbConn->query($sqlNotes);

        $rowNotes = $queryResultNotes->fetchObject();

          echo 
          "<label for='notes'>Notes:</label><br>
          <input type='text' id='notes' name='notes' value='{$rowNotes->notes}' tabindex='8'><br>";

    //Submit button
          echo "
          <p><input type='submit' name='submit' value='Update Meal' tabindex='9'></p>
        </form>";
    }
      catch (Exception $e)
      {
        echo "<p>Details not found: ".$e->getMessage()."</p>\n";
      }
}
  echo endMain();
  echo makeFooter(array(""), "Meal-Fix");
  echo makePageEnd();
?>