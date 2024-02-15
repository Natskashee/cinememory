import React from "react";

function Banner() {
  return (
    <div className="flex">
      <div
        className="w-full h-[30vh] flex absolute"
        style={{
          background: `linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)), url('TheOnesWhoLiveKeyArt.webp') center/cover`,
        }}
      >


      </div>
    </div>
  );
}

export default Banner;
