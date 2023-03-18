import React from 'react'
import { Link } from "react-router-dom";
//Icons
import { FaClipboardList } from 'react-icons/fa';
import { GiHotMeal } from 'react-icons/gi';
import { FiBookOpen } from 'react-icons/fi';

import './Meals.css';

export default function Meals() {
  return (
    <div>
      <h2>Meals</h2>
          <Link to="/addameal">
            <div className='add-meal'>
              <i className='material-icons nav-icon'><FaClipboardList/> </i>
              <span>Add a Meal</span>
              <p>Add a meal to the meal list</p>
            </div>
          </Link>

        <Link to="/yourmeals">
          <div className='your-meals'>
            <i className='material-icons nav-icon'><GiHotMeal/> </i>
            <span>Your Meals</span>
            <p>View the meals you added</p>
          </div>
        </Link>
      
        <Link to="/recipes">
          <div className='recipe-meal'>
            <i className='material-icons nav-icon'><FiBookOpen/> </i>
            <span>Recipes</span>
            <p>View shared recipes from our community</p>
          </div>
        </Link>
    </div>
  )
}
