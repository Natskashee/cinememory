import React, { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import { useAsyncFn } from "react-use";
import axios from "axios";

const SearchTMDB = () => {
  const [searchText, setSearchText] = useState("");
  const [results, setResults] = useState([]);
  const navigate = useNavigate();

  const apiKey = "8407efb6f65154e152ebe1d1c2f46603";

  const [state, exec] = useAsyncFn(
    async (query) => {
      try {
        const response = await axios.get(
          `https://api.themoviedb.org/3/search/multi?api_key=${apiKey}&query=${query}`
        );

        const resultsWithPosters = response.data.results.map((result) => {
          result.posterUrl = result.poster_path
            ? `https://image.tmdb.org/t/p/w500${result.poster_path}`
            : null;

          return result;
        });

        return resultsWithPosters;
      } catch (error) {
        console.error("Erreur lors de la recherche TMDB :", error);
        throw error;
      }
    },
    [apiKey]
  );

  const handleSearch = async () => {
    console.log("Recherche en cours avec le texte :", searchText);
    await exec(searchText);
  };

  useEffect(() => {
    handleSearch();
  }, [searchText, exec]);

  useEffect(() => {
    if (state.value) {
      console.log("Résultats de la recherche :", state.value);
      setResults(state.value);
    }
  }, [state.value]);

  const [tvDetails, setTvDetails] = useState({});

  const fetchTvDetails = async (tvId) => {
    try {
      const response = await axios.get(
        `https://api.themoviedb.org/3/tv/${tvId}?api_key=${apiKey}`
      );
      setTvDetails((prevDetails) => ({
        ...prevDetails,
        [tvId]: {
          number_of_seasons: response.data.number_of_seasons,
          number_of_episodes: response.data.number_of_episodes,
        },
      }));
    } catch (error) {
      console.error(
        "Erreur lors de la récupération des détails de la série TV :",
        error
      );
    }
  };

  useEffect(() => {
    if (results.length > 0) {
      const tvIdsToFetch = results
        .filter((result) => result.media_type === "tv" && result.id)
        .map((tvResult) => tvResult.id);

      // Utilisez Promise.all pour attendre toutes les requêtes en parallèle
      Promise.all(tvIdsToFetch.map(fetchTvDetails));
    }
  }, [results]);

  const handleAddToMyList = async (selectedResult) => {
    try {
      console.log("Tentative d'ajout à la liste :", selectedResult);
    
      // Assurez-vous que le nom est correctement encodé dans l'URL
      const encodedName = encodeURIComponent(selectedResult.name);
      console.log("Nom encodé :", encodedName);
    
      // Construisez l'URL avec le nom encodé
      const url = `http://localhost:8000/api/post/${encodedName}`;
      console.log("URL de la requête axios :", url);
    
      const response = await axios.get(url);
    
      console.log("Réponse de la requête POST :", response.data);
    
      const existingPost = response.data.post;
    
      if (existingPost) {
        // Si le film existe déjà, rediriger vers le composant Show
        navigate(`/post/${encodedName}`);
      } else {
        // Si le post n'est pas trouvé, rediriger vers le formulaire de création avec les informations nécessaires
        navigate(
          `/post/create?title=${encodedName}&image=${selectedResult.posterUrl}`
        );
      }
    } catch (error) {
      // Gérer d'autres erreurs si nécessaire
      console.error(error);
    }
  };
  

  return (
    <div>
      <input
        type="text"
        className="bg-transparent text-black outline-none w-full"
        value={searchText}
        onChange={(e) => setSearchText(e.target.value)}
        placeholder="Rechercher..."
      />

      {state.loading && <p>Chargement...</p>}
      {state.error && <p>Erreur lors de la recherche</p>}

      {results.length > 0 && (
        <div className="text-white">
          <p className="font-metro text-3xl">Résultats de la recherche</p>
          <ul className="flex text-white gap-5 flex-wrap">
            {results.map((result) => (
              <li
                key={result.id}
                className="h-[400px] w-[200px] border p-2 rounded-xl"
              >
                {result.posterUrl && (
                  <img
                    src={result.posterUrl}
                    className="rounded-xl"
                    alt={result.title}
                  />
                )}
                <p>{result.title}</p>

                {result.media_type === "tv" && tvDetails[result.id] && (
                  <p>
                    Saisons: {tvDetails[result.id].number_of_seasons}, Épisodes:{" "}
                    {tvDetails[result.id].number_of_episodes}
                  </p>
                )}

                {/* Ajouter le bouton d'ajout ici */}
                <button
                  onClick={() => handleAddToMyList(result)}
                  className="bg-white text-black p-2 rounded-full"
                >
                  Ajouter à ma liste
                </button>
              </li>
            ))}
          </ul>
        </div>
      )}
    </div>
  );
};

export default SearchTMDB;
