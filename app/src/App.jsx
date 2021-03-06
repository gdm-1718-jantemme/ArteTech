import React, { useState, useEffect } from 'react'
import './App.sass'
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom"

import LoginPage from './pages/LoginPage'
import AddTaskPage from './pages/AddTaskPage'
import TasksPage from './pages/TasksPage'
import TaskDetailPage from './pages/TaskDetailPage'
import ProfilePage from './pages/ProfilePage'
import EditRatesPage from './pages/EditRatesPage'

function App() {
	const [displayMobile, setDisplayMobile] = useState("none")

	return (
		<Router>
			<div className="header">
				<h1>ArteTech</h1>
				<nav className="menu">
					<Link to="/">Voltooide Taken</Link> |
					<Link to="/addTask">Taak Toevoegen</Link> |
					<Link to="/profile">Profiel</Link>
				</nav>
				<p onClick={() => setDisplayMobile("flex")}>Menu</p>
			</div>

			<div className="menu_mobile" style={{display: displayMobile}}>
				<h1>Menu</h1>
				<nav>
					<Link onClick={() => setDisplayMobile("none")} to="/">Voltooide Taken</Link> |
					<Link onClick={() => setDisplayMobile("none")} to="/addTask">Taak Toevoegen</Link> |
					<Link onClick={() => setDisplayMobile("none")} to="/profile">Profiel</Link>
				</nav>
				<p onClick={() => setDisplayMobile("none")}>&#x2715;</p>
			</div>


			<Switch>
				<Route exact path="/login">
					<LoginPage />
				</Route>
				<Route exact path="/profile">
					<ProfilePage />
				</Route>
				<Route exact path="/tasks/:id">
					<TaskDetailPage />
				</Route>
				<Route exact path="/addTask">
					<AddTaskPage />
				</Route>
				<Route exact path="/">
					<TasksPage />
				</Route>
				<Route exact path="/editRates">
					<EditRatesPage />
				</Route>
			</Switch>
		</Router>
	)
}

export default App;
