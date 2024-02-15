import React, { useState, useRef } from "react";
import axios from "axios";
import SearchBar from "./search.components"; // Update the import
import { useNavigate } from "react-router-dom";

const PostSearch = () => {
  const [searchResults, setSearchResults] = useState([]);
  const [searchPerformed, setSearchPerformed] = useState(false);
  const searchInputRef = useRef(null);
  const searchResultsRef = useRef(null);
  const navigate = useNavigate();

  const handleSearch = (searchText) => {
    console.log("Searching for:", searchText);
    if (searchText.trim() === "") {
      setSearchResults([]);
      setSearchPerformed(false);
    } else {
      axios
        .get(`http://localhost:8000/api/post/search/${searchText}`)
        .then((response) => {
          console.log("Search results:", response.data);
          setSearchResults(response.data);
          setSearchPerformed(true);
        })
        .catch((error) => {
          console.error(error);
        });
    }
  };

  const handleLinkClick = (title) => {
    setSearchPerformed(false);

    if (searchInputRef.current) {
      searchInputRef.current.value = "";
    }

    setSearchResults([]);

    navigate(`/post/${title}`);
  };

  const handleClickOutside = (event) => {
    if (
      searchResultsRef.current &&
      !searchResultsRef.current.contains(event.target) &&
      searchPerformed
    ) {
      setSearchPerformed(false);
    }
  };

  return (
    <div className="relative">
      <SearchBar onSearch={handleSearch} ref={searchInputRef} />
      {searchPerformed && (
        <div
          ref={searchResultsRef}
          className="search-result text-white p-2 absolute z-50 w-[400px] mt-6 bg-woodsmoke-500 h-[80vh] overflow-scroll rounded-xl border"
        >
          <h2 className="border-b mb-5">Résultats de la recherche</h2>
          {searchResults.length > 0 ? (
            searchResults.map((post) => (
              <div
                key={post.id}
                className="flex rounded-xl cursor-pointer hover:bg-yellow-500 hover:text-black transition-all ease-in-out p-4 items-center gap-5"
                onClick={() => handleLinkClick(post.title)}
              >
                <img
                  className="h-16 object-cover rounded-lg"
                  src={`http://localhost:8000/storage/images/${post.image}`}
                  alt=""
                />
                <h2>{post.title}</h2>
              </div>
            ))
          ) : (
            <p>Aucun Résultat</p>
          )}
        </div>
      )}
    </div>
  );
};

export default PostSearch;
