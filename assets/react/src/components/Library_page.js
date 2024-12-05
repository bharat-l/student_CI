// src/LibraryPage.js
import React, { useState } from 'react';
import './library_view.css';

const banners = [
  'https://via.placeholder.com/1500x500/ff7f7f/333333?text=Banner+1',
  'https://via.placeholder.com/1500x500/7f7fff/333333?text=Banner+2',
  'https://via.placeholder.com/1500x500/7fff7f/333333?text=Banner+3',
  'https://via.placeholder.com/1500x500/fff77f/333333?text=Banner+4'
];

function LibraryPage() {
  const [currentBanner, setCurrentBanner] = useState(0);

  const handleNext = () => {
    setCurrentBanner((prev) => (prev + 1) % banners.length);
  };

  const handlePrev = () => {
    setCurrentBanner((prev) => (prev - 1 + banners.length) % banners.length);
  };

  return (
    <div className="library-page">
      <section className="banner-section">
        <div className="banner-container">
          <img src={banners[currentBanner]} alt={`Banner ${currentBanner + 1}`} />
        </div>
        <button className="prev-btn" onClick={handlePrev}>❮</button>
        <button className="next-btn" onClick={handleNext}>❯</button>
      </section>

      <section className="library-info">
        <h1>Welcome to the Library</h1>
        <p>
          Browse our vast collection of books, journals, and resources. Our library provides an
          extensive collection for students and researchers alike. Discover the materials that will
          aid you in your academic journey.
        </p>

        <div className="resources">
          <h2>Featured Resources</h2>
          <ul>
            <li>Books</li>
            <li>Journals</li>
            <li>Research Papers</li>
            <li>Online Catalog</li>
          </ul>
        </div>
      </section>
    </div>
  );
}

export default LibraryPage;
