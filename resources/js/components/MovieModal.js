export function initMovieModal(closeModal) {
  $('#closeModal').click(function() {
    closeModal();
  });

  $('.movie-modal').click(function(e) {
    if (e.target === this) {
      closeModal();
    }
  });

  $(document).keyup(function(e) {
    if (e.key === "Escape") {
      closeModal();
    }
  });
}
