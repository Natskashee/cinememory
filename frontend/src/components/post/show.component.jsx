import React, { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import Swal from "sweetalert2";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import Skeleton from "@mui/material/Skeleton";
import YouTubeSearch from "../youtubeSearch.components";

const Showpost = () => {
  const { title } = useParams();
  const [post, setPost] = useState(null);
  const navigate  = useNavigate();

  useEffect(() => {
    fetchPost();
  }, [title]);

  const fetchPost = async () => {
    try {
      const response = await axios.get(`http://localhost:8000/api/post/${title}`);
      const { post } = response.data;
      setPost(post);
    } catch (error) {
      console.error(error);
    }
  };

  const deletePost = async () => {
    try {
      const isConfirmed = await Swal.fire({
        title: "Êtes-vous sûr?",
        text: "Vous ne pourrez pas revenir en arrière !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Oui, supprimer !",
      });

      if (isConfirmed) {
        const response = await axios.delete(`http://localhost:8000/api/post/${post.id}`);
        Swal.fire({
          icon: "success",
          text: response.data.message,
        });
        navigate("/");
      }
    } catch (error) {
      // If the server returned a specific error message, use it; otherwise, show a generic message
      const errorMessage = error.response?.data?.message || "Quelque chose s'est mal passé lors de la suppression du post.";
      Swal.fire({
        text: errorMessage,
        icon: "error",
      });
    }
  };

  if (!post) {
    return (
      <div className="container relative h-[86.5vh]">
        <Skeleton variant="rectangular" className="bg-gray-500" width={800} height={400} />
        <Skeleton variant="text" className="bg-gray-500" width={200} height={24} />
        <Skeleton variant="text" className="bg-gray-500" width={150} height={18} />
        <Skeleton variant="text" className="bg-gray-500" width={100} height={18} />
      </div>
    );
  }

  return (
    <div className="container relative h-[86.5vh] mt-[80px]">
      <div
        className="bg-center bg-cover absolute inset-0 w-full h-full filter blur-lg"
        style={{
          backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(http://localhost:8000/storage/images/${post.image})`,
          zIndex: `5`,
        }}
      ></div>

      <div className="relative z-10 flex justify-around">
        <div>
          {post.image ? (
            <div className="border p-5 rounded-xl">
              <img
                src={`http://localhost:8000/storage/images/${post.image}`}
                alt=""
                className="h-[400px] rounded-xl"
              />
            </div>
          ) : (
            <Skeleton variant="rectangular" width={400} height={400} />
          )}
        </div>

        <div className="text-white flex flex-col gap-4">
          <h2 className="font-bold text-2xl flex">
            <span>{post.title}</span>
          </h2>

          {post.episode ? (
            <>
              <div className="border rounded-xl p-5 flex">
                <div>
                  <h4 className="text-xl font-bold">Où est-ce que j'en suis ...</h4>
                  <p>Episode: {post.episode}</p>
                  <p>Type : {post.type}</p>
                  <p>
                    Statut: <span className="text-yellow-500">{post.statut}</span>
                  </p>
                  <p>Date d'ajout: {post.date_ajout}</p>
                </div>

                <div className="flex flex-col gap-5 w-1/2 justify-end items-end">
                  <Link to={`/post/edit/${post.title}`} className="bg-yellow-500 p-2 rounded-full">
                    Modifier
                  </Link>
                  <button className="bg-red-500 p-2 rounded-full" onClick={deletePost}>
                    Supprimer
                  </button>
                </div>
              </div>
            </>
          ) : (
            <>
              <Skeleton variant="text" width={100} height={18} />
              <Skeleton variant="text" width={100} height={18} />
              <Skeleton variant="text" width={150} height={18} />
            </>
          )}

          <div className="border rounded-xl p-5">
            <YouTubeSearch postTitle={post.title} />
          </div>
        </div>
      </div>
    </div>
  );
};

export default Showpost;
