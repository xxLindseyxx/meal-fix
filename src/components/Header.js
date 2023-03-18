import React from 'react'
import './Header.css';

export default function header() {
  return (
    <div>
    <header className='header'>
       <h1>Meal-Fix</h1>
    </header>
    <svg className='wave' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 180'><path fill='#1cab80' fillOpacity='1'       d='M0,32L120,64C240,96,480,160,720,176C960,192,1200,160,1320,144L1440,128L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z'></path></svg>
    </div>
  )
}
