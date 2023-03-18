//Imports
import React from 'react'
import { Link } from "react-router-dom";

//Pages
import './Lists.css';

//Icons
import { HiShoppingCart } from 'react-icons/hi';
import { MdShelves } from 'react-icons/md';

export default function Lists() {
  return (
    <div>
    <h2>Your Lists</h2>

    <Link to="/shoppinglist">
      <div className='list-1'>
        <i className='material-icons nav-icon'><HiShoppingCart/> </i>
        <span>Shopping List</span>
        <p>Check out all of the items that have added automatically from the calendar!</p>
      </div>
    </Link>
    
    <Link to="/pantry">
      <div className='list-2'>
        <i className='material-icons nav-icon'><MdShelves/> </i>
        <span>Pantry</span>
        <p>Check out all of the items that have added automatically from the shopping list!</p>
      </div>
    </Link>
</div>
  )
}
