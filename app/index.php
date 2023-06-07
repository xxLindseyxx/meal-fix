<?php 
require_once('functions.php');

echo makePageStart("Meal Fix!", "styles/index.css", "");

echo makeHeader("MEAL-FIX");
echo makeNavMenu(array());
echo startMain();

/**
 * 
 * The index page
 * 
 * The index page is what the user sees first when 
 * they enter the website. It could include some 
 * useful infomation about the website. 
 * 
 * @author Lindsey Cawthorne
 */
?>

<h2 class="recipe-title">Latest Recipes</h2>

<div class= 'recipe-container'>

    <div class="recipe-box"></div>

    <div class="recipe-box-1"></div>

    <div class="recipe-box-2"></div>

</div>

<div class= 'news'>
    <h2>News</h2>

    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio repellat, incidunt cum quibusdam amet eos rerum fugit, nulla facere minima minus corrupti. Praesentium ipsa blanditiis asperiores? Ullam mollitia autem totam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum illo maiores temporibus nemo nisi cupiditate culpa ut eligendi facilis magni, corrupti ea assumenda veniam obcaecati perferendis, amet, distinctio earum? Molestiae.
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore, voluptate fugit deleniti, incidunt vero quasi optio blanditiis aut esse officiis aliquid assumenda? Ut expedita molestias architecto nulla harum, labore repudiandae!

    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio repellat, incidunt cum quibusdam amet eos rerum fugit, nulla facere minima minus corrupti. Praesentium ipsa blanditiis asperiores? Ullam mollitia autem totam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum illo maiores temporibus nemo nisi cupiditate culpa ut eligendi facilis magni.


<?php
echo endMain();
echo makeFooter(array(""), "Meal-Fix");
echo makePageEnd();
?>
