import React, { useState, useRef, useEffect } from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { useInView } from 'react-intersection-observer';
import gsap from 'gsap';

const Card = ({ post }) => {
  const [isHovered, setIsHovered] = useState(false);
  const [ref, inView] = useInView({
    triggerOnce: true,
  });
  const cardRef = useRef(null);

  const cardVariants = {
    hovered: {
      scale: 1.05,
      boxShadow: '0 20px 40px rgba(0, 0, 0, 0.2)',
    },
    normal: {
      scale: 1,
      boxShadow: '0 10px 20px rgba(0, 0, 0, 0.1)',
    },
  };

  const overlayVariants = {
    hovered: {
      opacity: 1,
      transition: { duration: 0.3 },
    },
    normal: {
      opacity: 0,
      transition: { duration: 0.3 },
    },
  };

  useEffect(() => {
    const card = cardRef.current;

    if (inView) {
      // Animation de distribution de cartes avec GSAP
      gsap.fromTo(
        card,
        { opacity: 0, y: 50 },
        { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out', delay: 0.2 }
      );
    }
  }, [inView]); // Utiliser [inView] comme dépendance

  return (
    <Link
      to={`/post/${post.title}`}
      className="cursor-pointer relative overflow-hidden border p-4 rounded-xl"
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
      ref={ref}
    >
      <motion.div
        variants={cardVariants}
        animate={isHovered ? 'hovered' : 'normal'}
        initial="normal"
        ref={cardRef}
      >
        <img
          className="h-[290px] w-[180px] object-cover rounded-xl"
          src={`http://localhost:8000/storage/images/${post.image}`}
          alt=""
        />
      </motion.div>

      <motion.div
        variants={overlayVariants}
        animate={isHovered ? 'hovered' : 'normal'}
        initial="normal"
        style={{
          position: 'absolute',
          top: 0,
          left: 0,
          right: 0,
          bottom: 0,
          display: 'flex',
          flexDirection: 'column',
          justifyContent: 'center',
          alignItems: 'center',
          padding: '20px',
          backgroundColor: 'rgba(0, 0, 0, 0.8)',
          color: 'white',
          overflow: 'hidden',
        }}
      >
        <h4 className="text-xl text-yellow-500 font-bold mb-2 underline overflow-hidden text-ellipsis">
          {post.title}
        </h4>
        <p className="flex gap-2 justify-center">
          <span className="bg-gray-500 p-1 rounded-full whitespace-nowrap overflow-hidden text-ellipsis">
            {post.episode}
          </span>
          <span className="border rounded-full p-1">{post.statut}</span>
        </p>
      </motion.div>
    </Link>
  );
};

export default Card;
