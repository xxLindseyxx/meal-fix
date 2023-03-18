//Imports
import './App.css';
import { Routes, Route } from 'react-router-dom';

//Pages
import Pantry from './components/Pantry';
import Header from './components/Header';
import Footer from './components/Footer';
import Navbar from './components/Navbar';
import HomePage from './components/HomePage';
import Account from './components/Account';
import Calendar from './components/Calendar';
import Meals from './components/Meals';
import Lists from './components/Lists';
import AddAMeal from './components/AddAMeal';
import YourMeals from './components/YourMeals';
import Recipes from './components/Recipes';
import ShoppingList from './components/ShoppingList';

function App() {
  return (
    <div className="App">
      <Header/>
      <Navbar/>
        <Routes>
          <Route path="/" element={<HomePage />}/>
          <Route path="/account" element={<Account/>}/>
          <Route path="/calendar" element={<Calendar/>}/>
          <Route path="/meals" element={<Meals/>}/>
          <Route path="/lists" element={<Lists/>}/>
          <Route path="/addameal" element={<AddAMeal/>}/>
          <Route path="/yourmeals" element={<YourMeals/>}/>
          <Route path="/recipes" element={<Recipes/>}/>
          <Route path="/shoppinglist" element={<ShoppingList/>}/>
          <Route path="/pantry" element={<Pantry/>}/>
        </Routes>
      <Footer/>
    </div>
  );
}

export default App;
