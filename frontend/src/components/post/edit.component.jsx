import React, { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import axios from "axios";
import Swal from "sweetalert2";
import styled from "styled-components";

const Button = styled.button`
  background-color: #e34554;
  width: 100%;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 999px;
  transition: background-color 0.2s ease, transform 0.2s ease;

  &:hover {
    background-color: #f4b946;
    transform: scale(1.05);
  }
`;

export default function EditPost() {
  const navigate = useNavigate();
  const { id } = useParams();

  const [title, setTitle] = useState("");
  const [episode, setEpisode] = useState("");
  const [type, setType] = useState("");
  const [statut, setStatut] = useState("");
  const [image, setImage] = useState(null);
  const [dateAjout, setDateAjout] = useState("");
  const [validationError, setValidationError] = useState({});
  const [isSubmitting, setIsSubmitting] = useState(false);


  useEffect(() => {
    fetchPost();
  // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  const fetchPost = async () => {
    try {
      const response = await axios.get(`http://localhost:8000/api/post/${id}`);
      const { title, episode, type, statut, date_ajout, image } =
        response.data.post;
      setTitle(title);
      setEpisode(episode);
      setType(type);
      setStatut(statut);
      setImage(image);
      setDateAjout(date_ajout);
    } catch (error) {
      Swal.fire({
        text: error.response.data.message,
        icon: "error",
      });
    }
  };

  const changeHandler = (event) => {
    setImage(event.target.files[0]);
  };

  const updatePost = async (e) => {
    e.preventDefault();
    setIsSubmitting(true);

    const formData = new FormData();
    formData.append("_method", "PATCH");
    formData.append("title", title);
    formData.append("episode", episode);
    formData.append("type", type);
    formData.append("statut", statut);
    formData.append("date_ajout", dateAjout);
    if (image !== null) {
      formData.append("image", image);
    }

    try {
      const response = await axios.post(
        `http://localhost:8000/api/post/${id}`,
        formData
      );
      Swal.fire({
        icon: "success",
        text: response.data.message,
      });
      navigate("/");
    } catch (error) {
      if (error.response.status === 422) {
        setValidationError(error.response.data.errors);
      } else {
        Swal.fire({
          text: error.response.data.message,
          icon: "error",
        });
      }

    }
    finally {
      setIsSubmitting(false);
    }
  };

  return (
    <div className="container mx-auto mt-[80px]">
      <div className="flex justify-center h-3/4">
        <div className="w-full md:w-1/2 border rounded-xl p-5">
          <div className=" shadow-lg rounded-lg px-6 py-4">
            <h4 className="mb-4 text-white rounded-full p-4 text-4xl font-bold font-metro">
              Mettre à jour la mémorie
            </h4>
            <div className="form-wrapper mt-4">
              {Object.keys(validationError).length > 0 && (
                <div className="bg-red-500 rounded-full text-white p-4">
                  <ul className="mb-0">
                    {Object.entries(validationError).map(([key, value]) => (
                      <li key={key}>{value}</li>
                    ))}
                  </ul>
                </div>
              )}
              <form onSubmit={updatePost} method="PATCH">
                <div className="mb-4">
                  <label
                    htmlFor="title"
                    className="block font-medium text-white"
                  >
                    Title
                  </label>
                  <input
                    id="title"
                    type="text"
                    className="bg-transparent p-2 border text-gray-500 rounded-full mt-1 block w-full"
                    value={title}
                    onChange={(event) => setTitle(event.target.value)}
                  />
                </div>
                <div className="mb-4">
                  <label
                    htmlFor="episode"
                    className="block font-medium text-white"
                  >
                    Episode
                  </label>
                  <input
                    id="episode"
                    type="text"
                    className="bg-transparent p-2 border text-gray-500 rounded-full mt-1 block w-full"
                    value={episode}
                    onChange={(event) => setEpisode(event.target.value)}
                  />
                </div>

                <div className="mb-4">
                  <label
                    htmlFor="type"
                    className="block font-medium text-white"
                  >
                    Type
                  </label>
                  <select
                    id="type"
                    value={type}
                    onChange={(event) => setType(event.target.value)}
                    className="bg-transparent p-2 border text-gray-500 rounded-full mt-1 block w-full"
                  >
                    <option value="Serie">Série</option>
                    <option value="Film">Film</option>
                  </select>
                </div>
                <div className="mb-4">
                  <label
                    htmlFor="statut"
                    className="block font-medium text-white"
                  >
                    Statut
                  </label>
                  <select
                    id="statut"
                    value={statut}
                    onChange={(event) => setStatut(event.target.value)}
                    className="bg-transparent p-2 border text-gray-500 rounded-full mt-1 block w-full"
                  >
                    <option value="En cours">En cours</option>
                    <option value="A voir">A voir</option>
                    <option value="Terminé">Terminé</option>
                  </select>
                </div>

                <div className="mb-4">
                  <label
                    htmlFor="date_ajout"
                    className="block font-medium text-white"
                  >
                    Date d'ajout
                  </label>
                  <input
                    id="date_ajout"
                    type="date"
                    className="bg-transparent p-2 border text-gray-500 rounded-full mt-1 block w-full"
                    value={dateAjout}
                    onChange={(event) => setDateAjout(event.target.value)}
                  />
                </div>
                <div className="mb-4">
                  <label
                    htmlFor="image"
                    className="block font-medium text-white"
                  >
                    Image
                  </label>
                  <img
                    src={`http://localhost:8000/storage/images/${image}`}
                    className="h-64 rounded-xl"
                    alt=""
                  />
                  <input
                    id="image"
                    type="file"
                    className="bg-transparent p-2 border text-gray-500 rounded-full mt-1 block w-full"
                    onChange={changeHandler}
                    name="image"
                  />
                </div>
                <Button type="submit" disabled={isSubmitting}>
                  {isSubmitting ? "En cours..." : "Mettre à jour"}
                </Button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
