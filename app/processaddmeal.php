<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

?>

<div>
    <h2>Meal Details</h2>
</div>

<?php


$dbConn = getConnection();

// Function to insert the ingredient details for the meal ingredient_per_meal

function add_ing_per_meal ($dbConn, $meal_id, $ingredientID, $count, $weight_list, $unit_list) {
	echo "<p>---------- Adding ingredients per meal ----------------</p>";
	$weightArray = explode(',', $weight_list);
	#$weightArrayLength = count($weightArray);

	$unitArray = explode(',', $unit_list);
	
	//for ($i=0; $i<$weightArrayLength; $i++) {
		$w = $weightArray[$count];
		echo "<p>w: $w</p>";
		$u = $unitArray[$count];
		echo "<p>u: $u</p>";
		
		$insertIngPM = "INSERT INTO ingredient_per_meal (meal_id, ingredient_amount, weight_unit_id, ingredient_id) VALUES (:meal_id, :ingredient_amount, :weight_unit_id, :ingredient_id)";
		$stmt = $dbConn->prepare($insertIngPM);
		$stmt->execute(array(
			 ':meal_id' => $meal_id,
			 ':ingredient_amount' => $w, 
			 ':weight_unit_id' => $u,
			 ':ingredient_id' => $ingredientID
			));
	#}
}

// Function for sanitizing the data
function validate_input($input) 
{
	// Remove whitespace from beginning and end of input
	$input = trim($input);
	
	// Remove backslashes from the input
	$input = stripslashes($input);
	
	// Convert special characters to HTML entities
	$input = htmlspecialchars($input, ENT_QUOTES);
	
	// Return the sanitized input
	return $input;
}

$mealName = filter_has_var(INPUT_POST, 'meal-name') ? $_POST['meal-name'] : null;
$category = filter_has_var(INPUT_POST, 'category') ? $_POST['category'] : null;
$addCategory = filter_has_var(INPUT_POST, 'add-category') ? $_POST['add-category'] : null;
$notes = filter_has_var(INPUT_POST, 'notes') ? $_POST['notes'] : null;
//$share = filter_has_var(INPUT_POST, 'share') ? $_POST['share'] : null;
$share = 1;

validate_input($mealName);
validate_input($addCategory);
validate_input($notes);

if(!empty(trim($addCategory))){
	$insertCat = "INSERT INTO category (category_name ) VALUES (:category_name)";
	$stmt = $dbConn->prepare($insertCat);
	
	$stmt->execute(array(':category_name' => $addCategory));
	$getNewCatId = 'SELECT MAX(category_id) as newCatId from category'; 
	$newCatNum = $dbConn->query($getNewCatId);
	$categoryRow = $newCatNum->fetchObject();
	$category = $categoryRow->newCatId;
}

$ingredientID_List = filter_has_var(INPUT_POST, 'ingredientID_List') ? $_POST['ingredientID_List'] : null;
$newInameL = filter_has_var(INPUT_POST, 'new_ingredientNameList') ? $_POST['new_ingredientNameList'] : null;

$weightL = filter_has_var(INPUT_POST, 'weightList') ? $_POST['weightList'] : null;
$unitL = filter_has_var(INPUT_POST, 'unitList') ? $_POST['unitList'] : null;

$new_weightL = filter_has_var(INPUT_POST, 'new_weightList') ? $_POST['new_weightList'] : null;
$new_unitL = filter_has_var(INPUT_POST, 'new_unitList') ? $_POST['new_unitList'] : null;

echo "<p>existing ing list: $ingredientID_List</p>";
echo "<p>weight list: $weightL</p>";
echo "<p>unit list: $unitL</p>";
echo "<p>-----------------------------</p>";
echo "<p>new ing list: $newInameL</p>";
echo "<p>weight list: $new_weightL</p>";
echo "<p>unit list: $new_unitL</p>";

// Insert new meal
$insertSql = "INSERT INTO meal (meal_name, category_id, notes, share) VALUES (:meal_name, :category_id, :notes, :share)";
			$stmt = $dbConn->prepare($insertSql);
			$stmt->execute(array(':meal_name' => $mealName, ':category_id' => $category, ':notes' => $notes, ':share' => $share));

$getNewMealId = 'SELECT MAX(meal_id) as newMealId from meal'; 
$newMealRow = $dbConn->query($getNewMealId);
$mealRow = $newMealRow->fetchObject();
$meal_id = $mealRow->newMealId;

echo "<p>meal id: $meal_id</p>";

// If adding new ingredients to the ingredient table
if(!empty(trim($newInameL))){
	$new_namesArray = explode(',', $newInameL);
	$count1 = 0;
	foreach ($new_namesArray as $n) {
		echo "<p>################### new ing: $n ####################</p>";
		
		$insertIng = "INSERT INTO ingredient (ingredient_name) VALUES (:ingredient_name)";
		$stmt = $dbConn->prepare($insertIng);
		$stmt->execute(array(':ingredient_name' => $n));

		$getNewIngId = 'SELECT MAX(ingredient_id) as newIngredientId from ingredient'; 
		$newingRow = $dbConn->query($getNewIngId);
		$ingredientRow = $newingRow->fetchObject();
		$addIngredientID = $ingredientRow->newIngredientId;
		
		add_ing_per_meal ($dbConn, $meal_id, $addIngredientID, $count1, $new_weightL, $new_unitL);
		$count1 = $count1 + 1;
	}
}


// If using existing ingredients
if(!empty(trim($ingredientID_List))){
	$existingID_Array = explode(',', $ingredientID_List );
	$count2 = 0;
	
	foreach ($existingID_Array as $addIngredientID) {
		echo " ################### existing ing: $addIngredientID  ####################<br>";
	
		add_ing_per_meal ($dbConn, $meal_id, $addIngredientID, $count2, $weightL, $unitL);
		$count2 = $count2 + 1;
	}
}

echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>