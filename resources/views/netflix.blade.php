<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Netflix</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎬</text></svg>">
    
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- Netflix Header -->
    <header class="netflix-header">
        <nav class="navbar">
            <div class="logo">
                <a href="/" class="logo">NETFLIX</a>
            </div>
            
            
            
            <div class="nav-actions">
                <svg class="search-icon" viewBox="0 0 24 24">
                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                </svg>
                
                <svg class="profile-icon" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ $featuredMovie['image'] }}')">
        <div class="hero-content">
            <h1 class="hero-title">{{ $featuredMovie['title'] }}</h1>
            <p class="hero-description">{{ $featuredMovie['description'] }}</p>
            
            <div class="hero-buttons">
                <a href="#" class="btn btn-play" data-movie-id="featured">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                    Assistir
                </a>
                <a href="#" class="btn btn-info" data-movie-id="featured" data-action="details">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                    </svg>
                    Mais Informações
                </a>
            </div>
        </div>
    </section>

    <!-- Movies Sections -->
    <main class="main-content">
        @foreach($categories as $category)
        <section class="movies-section" id="{{ Str::slug($category['title']) }}">
            <h2 class="section-title">{{ $category['title'] }}</h2>
            
            <div class="movies-carousel" data-category="{{ Str::slug($category['title']) }}">
                <button class="carousel-btn prev" data-direction="prev">‹</button>
                <button class="carousel-btn next" data-direction="next">›</button>
                
                <div class="carousel-container">
                    <div class="movies-row">
                        @foreach($category['movies'] as $movie)
                        <div class="movie-card" 
                             data-movie-id="{{ $movie['id'] }}"
                             style="background-image: url('{{ $movie['image'] }}')">
                            <div class="movie-info">
                                <h3 class="movie-title">{{ $movie['title'] }}</h3>
                                <div class="movie-meta">
                                    <span class="rating">{{ $movie['rating'] }}</span>
                                    <span class="year">{{ $movie['year'] }}</span>
                                    <span class="duration">{{ $movie['duration'] }}</span>
                                </div>
                                <div class="movie-actions">
                                    <button class="play-btn" data-movie-id="{{ $movie['id'] }}" data-action="play">▶</button>
                                    <button data-movie-id="{{ $movie['id'] }}" data-action="add">+</button>
                                    <button data-movie-id="{{ $movie['id'] }}" data-action="like">👍</button>
                                    <button data-movie-id="{{ $movie['id'] }}" data-action="details">ⓘ</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    </main>

    <!-- Movie Modal -->
    <div class="movie-modal" id="movieModal">
        <div class="modal-content">
            <button class="modal-close" id="closeModal">×</button>
            
            <div class="modal-hero" id="modalHero">
                <div class="modal-overlay"></div>
                <div class="modal-hero-content">
                    <h2 class="modal-title" id="modalTitle"></h2>
                    <div class="modal-buttons">
                        <button class="btn btn-play" id="modalPlayBtn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            Assistir
                        </button>
                        <button class="btn btn-add" id="modalAddBtn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                            </svg>
                            Minha Lista
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="modal-info">
                <div class="modal-meta">
                    <span class="rating" id="modalRating"></span>
                    <span class="year" id="modalYear"></span>
                    <span class="duration" id="modalDuration"></span>
                </div>
                
                <p class="modal-description" id="modalDescription"></p>
                
                <div class="modal-details">
                    <div class="detail-row">
                        <span class="label">Gênero:</span>
                        <span class="value" id="modalGenre"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Movie Data for JavaScript -->
    <script>
        window.movieData = @json([
            'featured' => $featuredMovie,
            'categories' => $categories
        ]);
    </script>
</body>
</html>