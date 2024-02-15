import React from "react";
import { Link } from "react-router-dom";

function AddPlus() {
  return (
    <div>
      <Link to="/post/create">
        <button className="bg-yellow-500 hover:bg-yellow-700 z-[999] text-white font-bold py-2 px-4 rounded-full fixed bottom-24 right-10">
          <span className="text-2xl text-black">+</span>
        </button>
      </Link>
    </div>
  );
}

export default AddPlus;
