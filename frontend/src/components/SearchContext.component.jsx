// SearchContext.js
import { createContext, useContext, useState } from "react";

const SearchContext = createContext();

export const SearchProvider = ({ children }) => {
  const [searchResults, setSearchResults] = useState([]);
  const [searchPerformed, setSearchPerformed] = useState(false);

  const setSearchState = (results, performed) => {
    setSearchResults(results);
    setSearchPerformed(performed);
  };

  const performSearch = async (query) => {
    // Implémentez votre logique de recherche ici
    // Mettez à jour setSearchResults avec les résultats de la recherche
    setSearchPerformed(true);
  };

  const clearSearch = () => {
    setSearchResults([]);
    setSearchPerformed(false);
  };

  return (
    <SearchContext.Provider value={{ searchResults, searchPerformed, setSearchState, performSearch, clearSearch }}>
      {children}
    </SearchContext.Provider>
  );
};

export const useSearch = () => {
  const context = useContext(SearchContext);
  if (!context) {
    throw new Error("useSearch must be used within a SearchProvider");
  }
  return context;
};
