import React, { useState } from "react";
import axios from "axios";

const SearchBar = ({ onSearch }) => {
  const [searchText, setSearchText] = useState("");

  const handleSearchChange = (e) => {
    const value = e.target.value;
    setSearchText(value);
    onSearch(value);
  };

  return (
    <div className="bg-yellow-500 rounded-full w-96 p-2 relative text-black">
      <input
        type="text"
        className="bg-transparent text-black outline-none w-full custom-input"
        value={searchText}
        onChange={handleSearchChange}
        placeholder="Rechercher..."
      />
      <span className="absolute right-3">
        <svg
          className="h-5"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
        >
          <path
            fill="#000"
            fillRule="evenodd"
            d="M4 9a5 5 0 1110 0A5 5 0 014 9zm5-7a7 7 0 104.2 12.6.999.999 0 00.093.107l3 3a1 1 0 001.414-1.414l-3-3a.999.999 0 00-.107-.093A7 7 0 009 2z"
          />
        </svg>
      </span>
    </div>
  );
};

export default SearchBar;
