import React from "react";
import "./styles/tailwind.css";
import "./App.css";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Editpost from "./components/post/edit.component";
import Showpost from "./components/post/show.component";
import Createpost from "./components/post/create.component";
import Inprogress from "./components/post/inprogress.component";
import Tosee from "./components/post/to-see.component";
import Completed from "./components/post/completed.component";
import List from "./components/post/list.component";
import Navbar from "./components/navbar.components";
import Profile from "./components/profile.component";
import SearchButton from "./components/searchButton.component";
import AddPlus from "./components/AddPlus.component";

function App() {
  return (
    <Router>
        <Navbar />
        <AddPlus />
        <SearchButton />

        <div className="container mx-auto bg-woodsmoke-500">
          <div className="grid grid-cols-1 md:grid-cols-12 gap-4">
            <div className="md:col-span-12">
              <Routes>
                <Route path="/" element={<List />} />
                <Route path="/profile" element={<Profile />} />
                <Route path="/post/create" element={<Createpost />} />
                <Route path="/post/edit/:id" element={<Editpost />} />
                <Route path="/post/:title" element={<Showpost />} />
                <Route path="/post/inprogress" element={<Inprogress />} />
                <Route path="/post/completed" element={<Completed />} />
                <Route path="/post/to-see" element={<Tosee />} />
              </Routes>
            </div>
          </div>
        </div>
    </Router>
  );
}

export default App;