function newCategory() 
{
	const catSelect = document.getElementById("category");
	const newCat = document.getElementById("newCat");
	newCat.style.display = category.value == "new-cat" ? "block" : "none";
 }

window.addEventListener('load', function() {
	'use strict';

// Display the html element that adds a new category when the element is clicked


	const addMealForm = document.getElementById('form');
	const ingBox = document.getElementById('displayIngredientsBox');
	const ingArea = document.getElementById('ingredientsArea');
	
	const displayNewIngredientsBox = document.getElementById('displayNewIngredientsBox');
	const newIngredientNameArea = document.getElementById('newIngredientNameArea');
	
	const ing_selectnameID = document.querySelector('#ing_select_nameID');
	const new_ing_nameTxt = document.getElementById('new_ing_nameTxt');
	
	const ing_WeightValueTxt = document.getElementById('ing_WeightValueTxt');
	const iWeightUnit = document.getElementById('ing_WeightUnit');
	
	const addIngBtn = document.getElementById('addIngBtn');
	
	const ingredient_ID_array = []
	const new_ing_name_array = []
	
	const weight_array = []
	const new_weight_array = []
	
	const unit_array = []
	const new_unit_array = []


	
	ingArea.style.display='none';
	newIngredientNameArea.style.display='none';
	
	ingBox.addEventListener('click', () => {
		ingArea.style.display='inline-block';
		ingBox.style.display='none';
	});
	
	displayNewIngredientsBox.addEventListener('click', () => {
		newIngredientNameArea.style.display='block';
		displayNewIngredientsBox.style.display='none';
	});
	
	addIngBtn.addEventListener('click', () => {

		if (new_ing_nameTxt.value != '') {
			let new_iName = new_ing_nameTxt.value;
			new_ing_nameTxt.value = '';
			console.log("New name" + new_iName);
			//getElementById('newIngredient').innerHTML = new_iName; 
			
			let new_iWeight = ing_WeightValueTxt.value;
			ing_WeightValueTxt.value = '';
			
			let new_iUnit = iWeightUnit.value;
			iWeightUnit.value = '';
			
			ingArea.style.display = 'none';
			ingBox.style.display = 'block';
			ingBox.style.display = 'block';
			ingBox.innerHTML = 'Add another ingredient';
			newIngredientNameArea.style.display='none';
			displayNewIngredientsBox.style.display='inline-block';	
			
			new_ing_name_array.push([new_iName]);
			new_weight_array.push([new_iWeight]);
			new_unit_array.push([new_iUnit]);
			
			addMealForm.new_ingredientNameList.value = new_ing_name_array;
			addMealForm.new_weightList.value = new_weight_array;
			addMealForm.new_unitList.value = new_unit_array;
		}
		else {
			let iName = ing_selectnameID.value;
			ing_selectnameID.value = '';

			console.log("name" + iName);
			
			let iWeight = ing_WeightValueTxt.value;
			ing_WeightValueTxt.value = '';
			
			let iUnit = iWeightUnit.value;
			iWeightUnit.value = '';
			
			ingArea.style.display='none';
			ingBox.style.display = 'block';
			ingBox.innerHTML = 'Add another ingredient';
			displayNewIngredientsBox.style.display='inline-block';
			newIngredientNameArea.style.display='none';		
			
			ingredient_ID_array.push([iName]);
			weight_array.push([iWeight]);
			unit_array.push([iUnit]);
			
			addMealForm.ingredientID_List.value = ingredient_ID_array;		
			addMealForm.weightList.value = weight_array;
			addMealForm.unitList.value = unit_array;			
		}
		
		console.log('Ingredient ID list: ' + addMealForm.ingredientID_List.value +
		' weight list: ' +addMealForm.weightList.value+ ' unit list: ' + addMealForm.unitList.value);
		console.log('New ingredient list: ' + addMealForm.new_ingredientNameList.value +
		' new weight list: ' +addMealForm.new_weightList.value+ ' new unit list: ' + addMealForm.new_unitList.value);
	});
});