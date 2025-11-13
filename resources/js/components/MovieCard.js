export function initMovieCardHover() {
  $('.movie-card').hover(
    function() {
      $(this).addClass('hovered');
    },
    function() {
      $(this).removeClass('hovered');
    }
  );
}

export function initMovieActions(showLoading, hideLoading, showNotification, showMovieDetails, findMovie, getMovieTitle) {
    
  $('[data-action="play"]').click(function(e) {
    e.preventDefault();
    const movieId = $(this).data('movie-id');
    
    showLoading();
    setTimeout(() => {
      hideLoading();
      alert(`Reproduzindo ${getMovieTitle(movieId)}... 🎬`);
    }, 1000);
  });

  $('[data-action="add"]').click(function(e) {
    e.preventDefault();
    const movieId = $(this).data('movie-id');
    const movieTitle = getMovieTitle(movieId);
    const button = $(`[data-movie-id="${movieId}"][data-action="add"]`);
    
    if (button.text() === '+') {
      button.text('✓');
      button.css('background-color', '#46d369');
      showNotification(`${movieTitle} adicionado à sua lista!`);
    } else {
      button.text('+');
      button.css('background-color', 'transparent');
      showNotification(`${movieTitle} removido da sua lista!`);
    }
  });

  $('[data-action="like"]').click(function(e) {
    e.preventDefault();
    const movieId = $(this).data('movie-id');
    const button = $(`[data-movie-id="${movieId}"][data-action="like"]`);
    
    if (button.text() === '👍') {
      button.text('👎');
      showNotification('Obrigado pelo feedback!');
    } else {
      button.text('👍');
      showNotification('Obrigado pelo feedback!');
    }
  });

  $('[data-action="details"]').click(function(e) {
    e.preventDefault();
    const movieId = $(this).data('movie-id');
    showMovieDetails(movieId);
  });
}
