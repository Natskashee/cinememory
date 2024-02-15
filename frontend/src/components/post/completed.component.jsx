import React, { useEffect, useState } from "react";
import Skeleton from "@mui/material/Skeleton";
import axios from "axios";
import Card from "./card.component";
import ReactPaginate from "react-paginate";
import { Link } from "@mui/material";

export default function SeriesList() {
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
      const { postsTermines } = response.data;
      setSeriesTermines(postsTermines.data);
      setCurrentPage(postsTermines.current_page - 1);
      setTotalPages(postsTermines.last_page);
      setIsLoading(false);
    } catch (error) {
      console.error(error);
      setIsLoading(false);
    }
  };

  const handlePageChange = ({ selected }) => {
    const page = selected + 1;
    fetchData(page);
  };

  const renderSeriesTermines = () => {
    if (isLoading) {
      return (
        <div className="p-4 mb-4">
          <Skeleton variant="rectangular" className="bg-gray-500" height={200} />
        </div>
      );
    }

    if (seriesTermines.length === 0) {
      return <p>Aucune memorie terminés.</p>;
    }

    return seriesTermines.map((post) => <Card key={post.id} post={post} />);
  };

  return (
    <div className="min-h-screen text-white text-center pb-10 mt-[80px]">
      <h2 className="text-4xl font-bold font-metro mb-4 text-center">
        Completed
      </h2>
      <div className="w-full flex flex-wrap gap-4 justify-center">
        {renderSeriesTermines()}
      </div>
      <ReactPaginate
        previousLabel={"Précédent"}
        nextLabel={"Suivant"}
        breakLabel={"..."}
        pageCount={totalPages}
        marginPagesDisplayed={2}
        pageRangeDisplayed={5}
        onPageChange={handlePageChange}
        containerClassName={"pagination flex justify-center mt-4"}
        pageClassName={"px-2"}
        pageLinkClassName={"text-white px-3 py-1 rounded-full"}
        activeClassName={"bg-yellow-500 px-3 py-1 rounded-full w-fit"}
        breakClassName={"px-2"}
        breakLinkClassName={"text-gray-500 px-3 py-1"}
        previousClassName={"px-2"}
        previousLinkClassName={"bg-yellow-500 text-black p-3 rounded-full"}
        nextClassName={"px-2"}
        nextLinkClassName={"bg-yellow-500 text-black p-3 rounded-full w-fit"}
      />{" "}
    </div>
  );
}
