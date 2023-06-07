<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");
echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

$dbConn = getConnection();

$mealId = filter_has_var(INPUT_POST, 'meal_id') ? $_POST['meal_id'] : 
$breakfast = filter_has_var(INPUT_POST, 'breakfast_id') ? $_POST['breakfast_id'] : null;
$lunch = filter_has_var(INPUT_POST, 'lunch_id') ? $_POST['lunch_id'] : null;
$dinner = filter_has_var(INPUT_POST, 'dinner_id') ? $_POST['dinner_id'] : null;


//Select all of the ingredients from the meals

$dbConn = getConnection();

//insert into calendar first

$insertSql = "INSERT INTO calendar(breakfast_id, lunch_id, dinner_id, date, meal_id ) VALUES (:breakfast_id, :lunch_id, :dinner_id date_)";

        $stmt = $dbConn->prepare($insertSql);
        $stmt->execute(array(':shopping_list_id' => $shopping_list_id, ':breakfast_id' => $breakfast, ':lunch_id' => $lunch, ':dinner_id' => $dinner));

        $queryResultInsert = $dbConn->query ($insert);

        echo"$mealId";
        echo"$breakfast";
        echo"$lunch";
        echo"$dinner";



$sql = "SELECT meal_id, ingredient_per_meal.ingredient_id, ingredient_name
        FROM ingredient_per_meal
        JOIN ingredient on ingredient.ingredient_id = ingredient_per_meal.ingredient_id 
        WHERE meal_id = $meal_id";

        $queryResult = $dbConn->query($sql);

        //while to print results 

        while ($row = $queryResult->fetchObject()) 
					  {
						echo "{$row->ingredient_id}'>{$row->ingredient_name}\n";
					  }
//Get the ingredients from the meals and send them to the shopping list


/*$insertSql = "INSERT INTO shopping_list(shopping_list_id) VALUES (:shopping_list_id)";
 
			$stmt = $dbConn->prepare($insertSql);
			$stmt->execute(array(':shopping_list_id' => $shopping_list_id));

        $queryResultInsert = $dbConn->query ($insert);*/


echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>