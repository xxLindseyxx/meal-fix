<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();
/**
 * 
 * The calendar
 * 
 * The calendar is suposed to add the meal to the day 
 * specified then add the ingredients to the shopping list
 * unfortunately there was not enough time to complete. 
 * 
 * 
 */
?>

  <!-- Form fo adding meals to days -->  
    <div class='calendar-form'><p>Add meal to calendar</p>

      <form>
      <input type="date" name="date1">
      <br>
      <br>

        <label for='breakfast_id'>Breakfast:</label><br>
        <select type='text' id='breakfast_id' name='breakfast_id' value=''><br>

<?php 

      require_once("functions.php");
      $dbConn = getConnection(); // Connect to the database.

      $sql = "SELECT meal_id, meal_name FROM meal";

      $queryResult = $dbConn->query ($sql);

      if ($queryResult === false) {
      echo "<p> Query failed: </p></body></html>";
      exit;
      }  
      else
      {
      while ($row = $queryResult->fetchObject()) 
      {
      echo "<option value='{$row->meal_id}'>{$row->meal_name}</option>\n";
      }
      }
      echo '</select> '
?>

        <label for='lunch_id'>Lunch:</label><br>
        <select type='text' id='lunch_id' name='lunch_id' value=''><br>

        <?php 

      require_once("functions.php");
      $dbConn = getConnection(); // Connect to the database.

      $sql = "SELECT meal_id, meal_name FROM meal";

      $queryResult = $dbConn->query ($sql);

      if ($queryResult === false) {
      echo "<p> Query failed: </p></body></html>";
      exit;
      }  
      else
      {
      while ($row = $queryResult->fetchObject()) 
      {
      echo "<option value='{$row->meal_id}'>{$row->meal_name}</option>\n";
      }
      }
      echo '</select> '
?>

        <label for='dinner_id'>Dinner:</label><br>
        <select type='text' id='dinner_id' name='dinner_id' value=''><br>

        <?php 

      require_once("functions.php");
      $dbConn = getConnection(); // Connect to the database.

      $sql = "SELECT meal_id, meal_name FROM meal";

      $queryResult = $dbConn->query ($sql);

      if ($queryResult === false) {
      echo "<p> Query failed: </p></body></html>";
      exit;
      }  
      else
      {
      while ($row = $queryResult->fetchObject()) 
      {
      echo "<option value='{$row->meal_id}'>{$row->meal_name}</option>\n";
      }
      }
      echo '</select> '
?>
        
        <input type='submit' value='Add Meals to Calendar'>
      </form>
      
    </div>

</div>
    
<?php
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>