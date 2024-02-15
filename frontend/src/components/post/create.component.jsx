import React, { useState } from "react";
import axios from "axios";
import Swal from "sweetalert2";
import styled from "styled-components";
import { useNavigate } from "react-router-dom";

const FormContainer = styled.div`
  margin: 0 auto;
  padding: 20px;
  background-color: transparent;
  color: #fff;
  padding: 20px;
  border-left: none;
`;


const FormGroup = styled.div`
  margin-bottom: 20px;
`;

const Label = styled.label`
  display: block;
  margin-bottom: 5px;
`;

const Input = styled.input`
  width: 100%;
  padding: 8px;
  background-color: transparent;
  border: 1px solid #ffff;
  border-radius: 999px;
  font-size: 16px;
`;

const Select = styled.select`
  width: 100%;
  padding: 8px;
  border: 1px solid #ffff;
  border-radius: 999px;
  background-color: transparent;
  color: #fff;
`;

const FileInput = styled.input`
  width: 100%;
  padding: 8px;
  border: 1px solid #ffff;
  border-radius: 999px;
`;

const Button = styled.button`
  background-color: #E34554;
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

export default function CreatePost() {
  const [title, setTitle] = useState("");
  const [type, setType] = useState("Série");
  const [statut, setStatut] = useState("En cours");
  const [episode, setEpisode] = useState("");
  const [dateAjout, setDateAjout] = useState("");
  const [file, setFile] = useState(null);
  const [isSubmitting, setIsSubmitting] = useState(false);
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setIsSubmitting(true);

    const formData = new FormData();
    formData.append("title", title);
    formData.append("type", type);
    formData.append("statut", statut);
    formData.append("episode", episode);
    formData.append("date_ajout", dateAjout);
    formData.append("file", file);

    try {
      const response = await axios.post("http://localhost:8000/api/posts", formData);

      if (response.data.success) {
        Swal.fire({
          icon: "success",
          text: response.data.message,
        });

        // Use the post ID for navigation
        const postId = response.data.postId;

        // Rediriger vers le composant approprié en fonction de l'existence du post
        if (postId) {
          navigate(`/post/${postId}`);
        } else {
          navigate(`/post/create`);
        }

        setTitle("");
        setEpisode("");
        setDateAjout("");
        setFile(null);
      } else {
        Swal.fire({
          icon: "error",
          text: "Quelque chose s'est mal passé lors de la création du post.",
        });
      }
    } catch (error) {
      console.error("Error during post creation:", error);
      // Handle errors appropriately
    } finally {
      setIsSubmitting(false);
    }
  };

  return (
    <div className="h-[86.5vh] w-full flex flex-col justify-center items-center text-white mt-[80px]">
      <div className="flex h-full justify-center items-center w-[60%] border rounded-xl p-5">
        <div
          className="h-full w-1/2 flex items-center justify-center bg-center bg-cover flex-col"
        >
          <h3 className="text-3xl font-bold font-metro animate-pulse text-yellow-500">Créer une nouvelle Mémorie</h3>

          <div className="flex relative">
            <img src="http://localhost:8000/storage/images/jXiQ24wkPijSYUck.webp" className="rounded-xl h-72 -rotate-12" alt="" />
            <img src="https://tickets.imagix.be/system/images/posters/000/000/905/medium.jpg?1684928515" className="rounded-xl h-72 z-40 absolute left-[30%]" alt="" />
            <img src="http://localhost:8000/storage/images/2LnnF6NxWUjDZ0dN.webp" className="rounded-xl h-72 rotate-12" alt="" />
          </div>
        </div>

        <FormContainer className="h-full w-1/2 overflow-y-scroll">
          <form onSubmit={handleSubmit}>
            <FormGroup>
              <Label htmlFor="title">Titre</Label>
              <Input
                type="text"
                id="title"
                value={title}
                onChange={(e) => setTitle(e.target.value)}
              />
            </FormGroup>
            <FormGroup>
              <Label htmlFor="type">Type</Label>
              <Select
                id="type"
                value={type}
                onChange={(e) => setType(e.target.value)}
              >
                <option value="Série" className="text-gray-500">
                  Série
                </option>
                <option value="Film" className="text-gray-500">
                  Film
                </option>
              </Select>
            </FormGroup>

            <FormGroup>
              <Label htmlFor="statut">Statut</Label>
              <Select
                id="statut"
                value={statut}
                onChange={(e) => setStatut(e.target.value)}
              >
                <option value="En cours" className="text-gray-500">
                  En cours
                </option>
                <option value="A voir" className="text-gray-500">
                  A voir
                </option>
                <option value="Terminé" className="text-gray-500">
                  Terminé
                </option>
              </Select>
            </FormGroup>

            <FormGroup>
              <Label htmlFor="episode">Episode</Label>
              <Input
                type="text"
                id="episode"
                value={episode}
                onChange={(e) => setEpisode(e.target.value)}
              />
            </FormGroup>
            <FormGroup>
              <Label htmlFor="dateAjout">Date d'ajout</Label>
              <Input
                type="date"
                id="dateAjout"
                value={dateAjout}
                onChange={(e) => setDateAjout(e.target.value)}
              />
            </FormGroup>
            <FormGroup>
              <Label htmlFor="file">Image</Label>
              <FileInput
                type="file"
                id="file"
                onChange={(e) => setFile(e.target.files[0])}
              />
            </FormGroup>
            <Button type="submit"  disabled={isSubmitting}>
              {isSubmitting ? "En cours..." : "Créer"}
            </Button>
          </form>
        </FormContainer>
      </div>
    </div>
  );
}
