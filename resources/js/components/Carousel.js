// Carousel functionality
export function initCarousel() {
  $('.carousel-btn').click(function() {
    const direction = $(this).data('direction');
    const carousel = $(this).closest('.movies-carousel');
    const moviesRow = carousel.find('.movies-row');
    const movieCard = moviesRow.find('.movie-card').first();
    const cardWidth = movieCard.outerWidth(true);
    const visibleCards = Math.floor(carousel.width() / cardWidth);
    const scrollAmount = cardWidth * Math.min(visibleCards, 3);
    
    let currentTransform = parseInt(moviesRow.css('transform').split(',')[4]) || 0;
    
    if (direction === 'next') {
      const maxScroll = -(moviesRow.find('.movie-card').length - visibleCards) * cardWidth;
      currentTransform = Math.max(currentTransform - scrollAmount, maxScroll);
    } else {
      currentTransform = Math.min(currentTransform + scrollAmount, 0);
    }
    
    moviesRow.css('transform', `translateX(${currentTransform}px)`);
  });
}
