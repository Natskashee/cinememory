import React, { useEffect, useState } from "react";
import Skeleton from "react-loading-skeleton";
import { Link } from "react-router-dom";
import Card from "./card.component";
import axios from "axios";
import { create } from "@mui/material/styles/createTransitions";

export default function SeriesList() {
  const [seriesEnCours, setSeriesEnCours] = useState([]);
  const [seriesAVoir, setSeriesAVoir] = useState([]);
  const [seriesTermines, setSeriesTermines] = useState([]);
  const [currentPage, setCurrentPage] = useState(0);
  const [totalPages, setTotalPages] = useState(0);
  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = async (page = 1) => {
    try {
      const response = await axios.get(
        `http://localhost:8000/api/posts?page=${page}`
      );
      const { postsEnCours, postsAVoir, postsTermines } = response.data;

      setSeriesEnCours(postsEnCours.data);
      setSeriesAVoir(postsAVoir.data);
      setSeriesTermines(postsTermines.data);
      setCurrentPage(postsEnCours.current_page - 1);
      setTotalPages(postsEnCours.last_page);
      setIsLoading(false);
    } catch (error) {
      console.error(error);
      setIsLoading(false);
    }
  };

  const renderSkeleton = () => (
    <div className="p-4 mb-4">
      <Skeleton height={200} />
    </div>
  );

  const renderSeriesEnCours = () => {
    if (isLoading) {
      return renderSkeleton();
    }

    if (seriesEnCours.length === 0) {
      return <p>Aucune memorie en cours.</p>;
    }

    return seriesEnCours.map((post) => <Card key={post.id} post={post} />);
  };

  const renderSeriesAVoir = () => {
    if (isLoading) {
      return renderSkeleton();
    }

    if (seriesAVoir.length === 0) {
      return <p>Aucune memorie à voir.</p>;
    }

    return seriesAVoir.map((post) => <Card key={post.id} post={post} />);
  };

  const renderSeriesTermines = () => {
    if (isLoading) {
      return renderSkeleton();
    }

    if (seriesTermines.length === 0) {
      return <p>Aucune memorie terminée.</p>;
    }

    return seriesTermines.map((post) => <Card key={post.id} post={post} />);
  };

  return (
    <div className="h-auto text-white text-center pt-8">
      <div className="flex items-center flex-col justify-center">
        <div className="flex justify-between w-[90%] border-b-2 border-gray-500 mb-8 pb-4">
          <h2 className="text-4xl font-bold font-metro">En cours</h2>
          <Link
            to="post/create"
            className="bg-yellow-500 text-black rounded-full flex items-center p-2"
          >
            <strong className="pr-2"> Ajouter une memory</strong>
            <span className="text-2xl">+</span>          </Link>
        </div>

        <div className="w-full flex flex-wrap gap-4 justify-center mb-8">
          {renderSeriesEnCours()}

          <Link
            to="post/create"
            className="h-[320px] w-[200px] hover:translate-y-5 cursor-pointer transition-all ease-in-out flex justify-center items-center border border-dashed rounded-xl"
          >
            <svg className="h-8" viewBox="0 0 24 24" fill="none">
              <path
                d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15"
                stroke="#FFFF"
                stroke-width="1.5"
                strokeLinecap="round"
              />
              <path
                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                stroke="#FFFF"
                stroke-width="1.5"
                strokeLinecap="round"
              />
            </svg>
          </Link>
        </div>

        <span className="">
          <Link
            to="/post/inprogress"
            className="bg-white hover:opacity-100 text-black opacity-70 p-3 rounded-full"
          >
            Voir toutes les memories en cours
          </Link>
        </span>
      </div>

      <div className="mt-8 flex flex-col justify-center items-center">
        <div className="flex justify-between w-[90%] border-b-2 border-gray-500 mb-8 pb-4">
          <h2 className="text-4xl font-bold font-metro">A voir</h2>
          <Link
            to="post/create"
            className="bg-yellow-500 text-black rounded-full flex items-center p-2"
          >
            <strong className="pr-2"> Ajouter une memory</strong>
            <span className="text-2xl">+</span>
          </Link>
        </div>

        <div className="w-full flex flex-wrap gap-4 justify-center mb-8">
          {renderSeriesAVoir()}

          <Link
            to="post/create"
            className="h-[320px] w-[200px] hover:translate-y-5 cursor-pointer transition-all ease-in-out flex justify-center items-center border border-dashed rounded-xl"
          >
            <svg className="h-8" viewBox="0 0 24 24" fill="none">
              <path
                d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15"
                stroke="#FFFF"
                stroke-width="1.5"
                strokeLinecap="round"
              />
              <path
                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                stroke="#FFFF"
                stroke-width="1.5"
                strokeLinecap="round"
              />
            </svg>
          </Link>
        </div>

        <Link
          to="/post/to-see"
          className="bg-white hover:opacity-100 text-black opacity-70 p-3 rounded-full"
        >
          Voir toutes les memorie à voir
        </Link>
      </div>

      <div className="mt-8 pb-10 flex flex-col items-center justify-center">

        <div className="flex justify-between w-[90%] border-b-2 border-gray-500 mb-8 pb-4">
          <h2 className="text-4xl font-bold font-metro">Terminés</h2>
          <Link to="post/create" className="bg-yellow-500 text-black rounded-full flex items-center p-2">
                     <strong className="pr-2"> Ajouter une memory</strong>
            <span className="text-2xl">+</span>
          </Link>
        </div>

        <div className="w-full flex flex-wrap gap-4 justify-center mb-8">
          {renderSeriesTermines()}
          <Link
            to="post/create"
            className="h-[320px] w-[200px] hover:translate-y-5 cursor-pointer transition-all ease-in-out flex justify-center items-center border border-dashed rounded-xl"
          >
            <svg className="h-8" viewBox="0 0 24 24" fill="none">
              <path
                d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15"
                stroke="#FFFF"
                stroke-width="1.5"
                strokeLinecap="round"
              />
              <path
                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                stroke="#FFFF"
                stroke-width="1.5"
                strokeLinecap="round"
              />
            </svg>
          </Link>
        </div>

        <Link
          to="/post/completed"
          className="bg-white hover:opacity-100 text-black opacity-70 p-3 rounded-full"
        >
          Voir tout les memories terminés
        </Link>
      </div>
    </div>
  );
}
