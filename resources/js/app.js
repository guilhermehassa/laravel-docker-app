import './bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function() {
    
    // Header scroll effect
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.netflix-header').addClass('scrolled');
        } else {
            $('.netflix-header').removeClass('scrolled');
        }
    });

    // Carousel functionality
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

    // Movie card hover effect
    $('.movie-card').hover(
        function() {
            $(this).addClass('hovered');
        },
        function() {
            $(this).removeClass('hovered');
        }
    );

    // Movie actions
    $('[data-action="play"]').click(function(e) {
        e.preventDefault();
        const movieId = $(this).data('movie-id');
        playMovie(movieId);
    });

    $('[data-action="add"]').click(function(e) {
        e.preventDefault();
        const movieId = $(this).data('movie-id');
        addToList(movieId);
    });

    $('[data-action="like"]').click(function(e) {
        e.preventDefault();
        const movieId = $(this).data('movie-id');
        likeMovie(movieId);
    });

    $('[data-action="details"]').click(function(e) {
        e.preventDefault();
        const movieId = $(this).data('movie-id');
        showMovieDetails(movieId);
    });

    // Modal functionality
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

    // Functions
    function playMovie(movieId) {
        showLoading();
        
        setTimeout(() => {
            hideLoading();
            alert(`Reproduzindo ${getMovieTitle(movieId)}... 🎬`);
        }, 1000);
    }

    function addToList(movieId) {
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
    }

    function likeMovie(movieId) {
        const button = $(`[data-movie-id="${movieId}"][data-action="like"]`);
        
        if (button.text() === '👍') {
            button.text('👎');
            showNotification('Obrigado pelo feedback!');
        } else {
            button.text('👍');
            showNotification('Obrigado pelo feedback!');
        }
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

    function showLoading() {
        $('#loading').fadeIn(200);
    }

    function hideLoading() {
        $('#loading').fadeOut(200);
    }

    function showNotification(message) {
        // Remove existing notifications
        $('.notification').remove();
        
        // Create notification
        const notification = $(`
            <div class="notification" style="
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: var(--netflix-red);
                color: white;
                padding: 15px 25px;
                border-radius: 4px;
                font-size: 14px;
                z-index: 9999;
                box-shadow: 0 4px 12px rgba(0,0,0,0.3);
                opacity: 0;
                transform: translateX(100%);
                transition: all 0.3s ease;
            ">
                ${message}
            </div>
        `);
        
        $('body').append(notification);
        
        // Animate in
        setTimeout(() => {
            notification.css({
                opacity: 1,
                transform: 'translateX(0)'
            });
        }, 100);
        
        // Animate out and remove
        setTimeout(() => {
            notification.css({
                opacity: 0,
                transform: 'translateX(100%)'
            });
            
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }

    // Smooth scroll for navigation links
    $('.nav-links a').click(function(e) {
        e.preventDefault();
        const target = $(this).attr('href');
        
        if (target.startsWith('#') && target !== '#home') {
            const section = $(target);
            if (section.length) {
                $('html, body').animate({
                    scrollTop: section.offset().top - 100
                }, 500);
            }
        } else if (target === '#home') {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        }
    });

    // Search functionality (simulated)
    $('.search-icon').click(function() {
        const searchTerm = prompt('Pesquisar filmes e séries:');
        if (searchTerm) {
            showLoading();
            setTimeout(() => {
                hideLoading();
                showNotification(`Procurando por "${searchTerm}"...`);
            }, 1000);
        }
    });

    // Profile menu (simulated)
    $('.profile-icon').click(function() {
        const actions = ['Perfil', 'Conta', 'Ajuda', 'Sair da Netflix'];
        const action = actions[Math.floor(Math.random() * actions.length)];
        showNotification(`Navegando para ${action}...`);
    });

    // Initialize tooltips/hints
    setTimeout(() => {
        if (!sessionStorage.getItem('netflix-tour-shown')) {
            showNotification('Passe o mouse sobre os filmes para mais opções!');
            sessionStorage.setItem('netflix-tour-shown', 'true');
        }
    }, 2000);


});
