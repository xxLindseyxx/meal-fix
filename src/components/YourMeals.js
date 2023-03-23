import React, { useState, useEffect } from 'react';
import './YourMeals.css';

export default function Yourmeals() {
  const [meals, setMeals] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect( () => {
      fetch("http://unn-w20019235.newnumyspace.co.uk/mealfix/api/meals")
      .then( 
          (response) => response.json()
      )
      .then( 
          (json) => {
            setMeals(json.data);
            setLoading(false);
            console.log(json)} 
      )
      .catch((err) => {
          console.log(err.message);
      });
  }, []);

  const listOfMeals = <ul>
      { meals.map(
          (value, key) => <li key={key}>{value.meal_name}</li>
      )}
  </ul>

  return (
      <div>
          <h1>Meals</h1>
          {loading && <p>Loading...</p>}
          {listOfMeals}
      </div>
  )
}

