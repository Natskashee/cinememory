import React, { useState, useEffect, useRef } from "react";
import Logo from "./logo.components";
import { Link } from "react-router-dom";
import PostSearch from "./searchPost.components";
import Profile from "./profile.component";

function Navbar() {
  const [showOptions, setShowOptions] = useState(false);
  const optionsRef = useRef(null);

  useEffect(() => {
    function handleClickOutside(event) {
      if (optionsRef.current && !optionsRef.current.contains(event.target)) {
        setShowOptions(false);
      }
    }

    document.addEventListener("click", handleClickOutside);
    return () => {
      document.removeEventListener("click", handleClickOutside);
    };
  }, []);

  const handleOptionsClick = (event) => {
    event.stopPropagation();
    setShowOptions(!showOptions);
  };
  return (
    <div
      className="shadow-lg h-[80px] w-full flex justify-center items-center bg-woodsmoke-500"
    >
      <nav className="flex justify-between p-4 w-[95%] bg-woodsmoke-500">
        <div className="flex text-white items-center">
          <Logo />
          <nav className="hidden md:block">
            <ul className="flex gap-3">
              <li>En cours</li>
              <li>A voir</li>
              <li>Terminé</li>
            </ul>
          </nav>
        </div>

        <PostSearch />


        <div className="flex gap-4 w-fit items-center">
          <img
            src={`${process.env.PUBLIC_URL}/Netflix.svg`}
            className="h-8"
            alt="Netflix icon"
          />
          <img
            src={`${process.env.PUBLIC_URL}/Hulu.svg`}
            className="h-4"
            alt="Hulu icon"
          />
          <Link
            className="bg-white p-2 rounded-full lg:block"
            to="/post/create"
          >
            Create memory
          </Link>
          <img
            src={`${process.env.PUBLIC_URL}/Linux.png`}
            className="h-10 w-14 lg:h-12 lg:w-12 object-cover bg-yellow-500 rounded-full cursor-pointer"
            alt="Profil"
            onClick={handleOptionsClick}
          />
        </div>

        {showOptions && (
          <div
            ref={optionsRef}
            className="absolute -bottom-28 right-4 bg-woodsmoke-500 lg:w-1/4 w-1/2 text-white border rounded-xl p-2 shadow"
          >
            <ul className="w-full">
              <li className="w-full cursor-pointer hover:bg-yellow-500 rounded-full p-2">
                <Link to="/profile">Profil</Link>
              </li>
              <li className="w-full cursor-pointer hover:bg-yellow-500 rounded-full p-2">
                <Link
                  className="whitespace-nowrap rounded-full"
                  to="/post/create"
                >
                  Create memory
                </Link>{" "}
              </li>
            </ul>
          </div>
        )}
      </nav>
    </div>
  );
}

export default Navbar;
