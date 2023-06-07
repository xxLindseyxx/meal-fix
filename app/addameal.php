<?php 
	require_once('functions.php');

	echo makePageStart("Meal Fix!", "styles/index.css", "script/addIng.js");
	echo makeHeader("MEAL-FIX");
	echo makeNavMenu(array());
	echo startMain();

/**
 * 
 * Adds a new meal to the database
 * 
 * This script is used to add a meal to the database
 * it gets all of the imputs from the user then processes 
 * then in process add a meal
 * 
 * @author Lindsey Cawthorne
 */

?>
	<h2>Add a Meal</h2>
	<div class='container'>
		<div class="add-meal-form">
		<!-- Start of the form -->
			<form id="form" action="processaddmeal.php" method="post">
<?php 
			// Connect to the database.
				$dbConn = getConnection(); 
				$sql = "SELECT meal_id, share FROM meal";
				$queryResult = $dbConn->query ($sql);

			// If the query fails exit!
				if ($queryResult === false) 
				{
					echo "<p> Query failed: </p></body></html>";
					exit;
				}

			//This allows the user to make their meal private or public if the user chooses public they will be sharing their meal
				$row = $queryResult->fetchObject();
				
				if($row->share==0)
				{
					$shareType = "Private";
				}
					
				else
				{
					$shareType = 'Public';
				}

				echo 
					"<label for='share'>Share</label>
					<select id='share' name='share 'tabindex='1'>
					<option selected value='{$row->share}'>$shareType</option>";

					if($row->share==1)
					{
						echo "<option value = '1'>Private</option>";
					}
					else
					{
						echo"<option value = '0'>Public</option>";
					}
						echo "</select>";
?>

			<!-- Field for Meal Name ----------------------------------------------->
				<input type='text' id='meal-name' name='meal-name' placeholder='Meal name..' tabindex="2">

			<!-- This is the code is to select the category name ------------------->
				<select id='category' name='category' onchange = 'newCategory()' tabindex="3">
				<option>Select category or add a new category</p>
				<option value="new-cat"><p id = 'new-cat'>Add a New Category</p></option>

<?php 

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
					echo "<option value='{$row->category_id}'>{$row->category_name} </option>\n";
				}
				}
				echo '</select> '
?>

			<!-- This code adds a new category -------------------------------------->
				<div id = 'newCat' style="display: none" >
					<!-- This field will appear when user clicks add anew category -->
					<input type='text' id='add-category' name='add-category' placeholder='New category name here' tabindex="4">
				</div> 

				<p><em>Choose an ingredient from the list below or if you want to add an ingredient not in the list, click 'Enter new ingredient' and enter a new ingredient name</em></p>

	<span id='displayIngredientsBox'>Add Ingredient</span><br><br>
	<div id='ingredientsArea'>

		<label for='ing_select_nameID'>Select an existing ingerdient</label>
		<select id='ing_select_nameID' name='ing_select_nameID'>
			<?php 
				  $sql = "SELECT ingredient_id, ingredient_name 
						  FROM ingredient";
				  $queryResult = $dbConn->query ($sql);

				  if ($queryResult === false) {
					echo "<p> Query failed: </p></body></html>";
				  exit;
				  }  
				  else
				  {
					  while ($row = $queryResult->fetchObject()) 
					  {
						echo "<option value='{$row->ingredient_id}'>{$row->ingredient_name}</option>\n";
					  }
				  }
			?>
		</select>
		<span id='displayNewIngredientsBox'> or Enter new ingredient</span><br>
		<div id='newIngredientNameArea'>
			New ingredient Name 
			<input type='text' id='new_ing_nameTxt' name='new_ing_nameTxt'>
		</div>
		<br><br>
		
		Weight <input type='text' id='ing_WeightValueTxt' name='ing_WeightValueTxt'>
		
		Unit
					<select id='ing_WeightUnit' name='ing_WeightUnit' tabindex="8">
<?php 
					$sql = "SELECT weight_unit_id, weight_unit 
							FROM weight_unit";
					$queryResult = $dbConn->query ($sql);

					if ($queryResult === false) {
						echo "<p> Query failed: </p></body></html>";
						exit;
					}  
					else
					{
						while ($row = $queryResult->fetchObject()) 
						{
							echo "<option value='{$row->weight_unit_id}'>{$row->weight_unit}</option>\n";
						}
					}
?>
					</select>
					<br>
					<div>
						<input value='Add ingredient to your meal' id='addIngBtn' name='addIngButton' placeholder="Add new ingredient to meal" tabindex="9"></div>
					</div>
					
					<input type='hidden' name='ingredientID_List'>
					<input type='hidden' name='weightList'>
					<input type='hidden' name='unitList'>
					<input type='hidden' name='new_ingredientNameList' placeholder="Add new ingerdient" tabindex="9">
					<input type='hidden' name='new_weightList'>
					<input type='hidden' name='new_unitList' >
					
					<textarea id='notes' name='notes' placeholder='Write notes about the meal here..' style='height:200px' tabindex="10"></textarea>

				<button id="submit" name="submit" type="submit" tabindex="11">Add meal </button>
			</form>
		</div>
	</div>
<?php
	echo endMain();
	echo makeFooter(array(""), "Meal-Fix");
	echo makePageEnd();
?>