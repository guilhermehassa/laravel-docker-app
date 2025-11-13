import $ from 'jquery';
window.$ = window.jQuery = $;

import { initHeaderScroll, initSmoothScroll, initProfileMenu } from './components/Header';
import { initSearchBar } from './components/SearchBar';
import { initCarousel } from './components/Carousel';
import { initMovieCardHover, initMovieActions } from './components/MovieCard';
import { initMovieModal } from './components/MovieModal';
import { showNotification } from './components/Notification';
import { showLoading, hideLoading } from './components/Loading';

$(document).ready(function() {
  
  function findMovie(movieId) {
    if (movieId === 'featured') {
      return window.movieData.featured;
    }
    
    for (let category of window.movieData.categories) {
      const movie = category.movies.find(m => m.id == movieId);
      if (movie) return movie;
    }
    return null;
  }

  function getMovieTitle(movieId) {
    const movie = findMovie(movieId);
    return movie ? movie.title : 'Filme';
  }

  function showMovieDetails(movieId) {
    const movie = findMovie(movieId);
    
    if (!movie) return;

    $('#modalTitle').text(movie.title);
    $('#modalRating').text(movie.rating);
    $('#modalYear').text(movie.year);
    $('#modalDuration').text(movie.duration);
    $('#modalDescription').text(movie.description);
    $('#modalGenre').text(movie.genre);
    $('#modalHero').css('background-image', `url('${movie.image}')`);
    
    $('#movieModal').fadeIn(300);
    $('#movieModal').css('display', 'flex');
    $('body').css('overflow', 'hidden');
  }

  function closeModal() {
    $('#movieModal').fadeOut(300);
    $('body').css('overflow', 'auto');
  }

  initHeaderScroll();
  initSmoothScroll();
  initProfileMenu(showNotification);
  initSearchBar();
  initCarousel();
  initMovieCardHover();
  initMovieActions(showLoading, hideLoading, showNotification, showMovieDetails, findMovie, getMovieTitle);
  initMovieModal(closeModal);

  setTimeout(() => {
    if (!sessionStorage.getItem('netflix-tour-shown')) {
      showNotification('Passe o mouse sobre os filmes para mais opções!');
      sessionStorage.setItem('netflix-tour-shown', 'true');
    }
  }, 2000);

});
