import React, { useEffect, useState } from "react";
import axios from "axios";
import "../profile.css";


function Profile() {
  const [ProgressCount, setProgressCount] = useState(0);
  const [CompletedCount, setCompletedCount] = useState(0);
  const [ToSeeCount, setToSeeCount] = useState(0);

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = async (page = 1) => {
    try {
      const response = await axios.get(
        `http://localhost:8000/api/posts?page=${page}`
      );
  
      setProgressCount(response.data.ProgressCount);
      setToSeeCount(response.data.ToSeeCount);
      setCompletedCount(response.data.CompletedCount);
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };
  

  return (
    <div className="bg-woodsmoke-500 text-white pt-[80px] relative">
      <div className="w-full flex justify-center items-center">
        <div className="flex justify-between w-[80%]">
          <div className="w-1/2 border rounded-xl p-6 h-fit">
            <h1 className="text-2xl font-bold mb-4">Natsukashii</h1>
            <div className="mb-4">
              <b>En cours : {ProgressCount}</b>
            </div>
            <div className="mb-4">
              <b>A voir : {ToSeeCount}</b>
            </div>
            <div>
              <b>Terminé : {CompletedCount}</b>
            </div>
          </div>

          <div className="w-1/2 flex justify-end">
            <img
              src="https://i.pinimg.com/564x/8c/7e/fa/8c7efae8a1b9fe7e6e44db64d2774228.jpg"
              className="h-1/2 rounded-xl"
              alt=""
            />
          </div>
        </div>
      </div>

      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  );
}

export default Profile;
