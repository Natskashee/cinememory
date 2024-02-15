import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { useParams } from 'react-router-dom';

const YouTubeSearch = ({ postTitle }) => { // Accept 'postTitle' as a prop
  const [trailers, setTrailers] = useState([]);
  const { title } = useParams();

  useEffect(() => {
    searchTrailers();
  }, [postTitle]); // Use 'postTitle' as a dependency in the useEffect hook

  const searchTrailers = async () => {
    try {
      const searchTerm = `${postTitle} Bande annonce`; // Use 'postTitle' instead of 'post.title'
      const response = await axios.get(
        'https://www.googleapis.com/youtube/v3/search',
        {
          params: {
            part: 'snippet',
            q: searchTerm,
            maxResults: 1,
            key: 'AIzaSyB48CS4PY2TRd_ziBlvizftDXlKikol1OY',
          },
        }
      );

      setTrailers(response.data.items);
    } catch (error) {
      console.error(error);
    }
  };

  return (
    <div>
      {trailers.map((trailer) => (
        <div key={trailer.id.videoId}>
          <h3>{trailer.snippet.title}</h3>
          <iframe
            width="560"
            height="315"
            className="rounded-xl"
            src={`https://www.youtube.com/embed/${trailer.id.videoId}`}
            title={trailer.snippet.title}
            frameBorder="0"
            allowFullScreen
          ></iframe>
        </div>
      ))}
    </div>
  );
};

export default YouTubeSearch;
