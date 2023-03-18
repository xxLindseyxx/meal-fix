//Imports
import React from 'react'
//Pages

import './Navbar.css';

//Icons
import { FaHome } from 'react-icons/fa';
import { FaUserAlt } from 'react-icons/fa';
import { BsFillCalendarFill } from 'react-icons/bs';
import { GiMeal } from 'react-icons/gi';
import { BsListStars } from 'react-icons/bs';

export default function Navbar() {
  return (

    <div>
        <nav className='nav'>
            <a href='/' className='nav-link nav-link--active'>
                <i className='material-icons nav-icon'> <FaHome/></i>
                <span className='nav-text'>Home</span>
            </a>
            <a href='/account' className='nav-link'>
                <i className='material-icons nav-icon'><FaUserAlt/></i>
                <span className='nav-text'>Account</span>
            </a>
            <a href='/calendar' className='nav-link'>
                <i className='material-icons nav-icon'><BsFillCalendarFill/></i>
                <span className='nav-text'>Calendar</span>
            </a>
            <a href='/meals' className='nav-link'>
                <i className='material-icons nav-icon'><GiMeal/></i>
                <span className='nav-text'>Meals</span>
            </a>
            <a href='/lists' className='nav-link'>
                <i className='material-icons nav-icon'><BsListStars/></i>
                <span className='nav-text'>Lists</span>
            </a>
        </nav>
    </div>
  )
}
