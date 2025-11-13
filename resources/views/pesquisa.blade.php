@extends('layouts.app')

@section('content')
  <!-- Search Results Header -->
  <div class="search-results-header">
    <div class="container">
      <h1 class="search-results-title">
        @if(isset($searchTerm) && $searchTerm)
          Resultados para: <span class="search-term">"{{ $searchTerm }}"</span>
        @else
          Pesquisar Filmes e Séries
        @endif
      </h1>
      
      @if(isset($searchTerm) && $searchTerm)
        <p class="search-results-count">
          {{ count($results) }} {{ count($results) === 1 ? 'resultado encontrado' : 'resultados encontrados' }}
        </p>
      @endif
    </div>
  </div>

  <!-- Search Results Content -->
  <main class="search-results-content">
    <div class="container">
      @if(isset($results) && count($results) > 0)
        <div class="search-results-grid">
          @foreach($results as $movie)
            <div class="search-result-card" data-movie-id="{{ $movie['id'] }}">
              <div class="search-result-image">
                <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}" loading="lazy">
                <div class="search-result-overlay">
                  <div class="search-result-actions">
                    <button class="action-btn play-btn" data-action="play" data-movie-id="{{ $movie['id'] }}">
                      <svg viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                      </svg>
                    </button>
                    <button class="action-btn add-btn" data-action="add" data-movie-id="{{ $movie['id'] }}">+</button>
                    <button class="action-btn like-btn" data-action="like" data-movie-id="{{ $movie['id'] }}">👍</button>
                    <button class="action-btn details-btn" data-action="details" data-movie-id="{{ $movie['id'] }}">
                      <svg viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="search-result-info">
                <h3 class="search-result-title">{{ $movie['title'] }}</h3>
                <div class="search-result-meta">
                  <span class="rating">{{ $movie['rating'] }}</span>
                  <span class="year">{{ $movie['year'] }}</span>
                  <span class="duration">{{ $movie['duration'] }}</span>
                </div>
                <p class="search-result-genre">{{ $movie['genre'] }}</p>
                @if(isset($movie['description']))
                  <p class="search-result-description">{{ Str::limit($movie['description'], 120) }}</p>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      @elseif(isset($searchTerm) && $searchTerm)
        <!-- No Results -->
        <div class="no-results">
          <svg class="no-results-icon" viewBox="0 0 24 24">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
          </svg>
          <h2 class="no-results-title">Nenhum resultado encontrado</h2>
          <p class="no-results-text">
            Não encontramos nada para "{{ $searchTerm }}". Tente uma pesquisa diferente.
          </p>
          <a href="/" class="btn-back-home">Voltar para a página inicial</a>
        </div>
      @else
        <!-- Empty Search State -->
        <div class="empty-search">
          <svg class="empty-search-icon" viewBox="0 0 24 24">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
          </svg>
          <p class="empty-search-text">Digite algo para pesquisar</p>
        </div>
      @endif
    </div>
  </main>

  <x-movieModal />

  <!-- Movie Data for JavaScript -->
  @if(isset($results) && count($results) > 0)
    <script>
      window.movieData = @json([
        'featured' => null,
        'categories' => [
          [
            'title' => 'Resultados da Pesquisa',
            'movies' => $results
          ]
        ]
      ]);
    </script>
  @endif

  <style>
    .search-results-header {
      padding: 120px 0 40px;
      background: linear-gradient(to bottom, rgba(0,0,0,0.8) 0%, transparent 100%);
    }

    .container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 60px;
    }

    .search-results-title {
      font-size: 36px;
      font-weight: 700;
      margin-bottom: 10px;
      color: var(--netflix-white);
    }

    .search-term {
      color: var(--netflix-red);
    }

    .search-results-count {
      font-size: 16px;
      color: var(--netflix-light-gray);
      margin-top: 10px;
    }

    .search-results-content {
      padding: 20px 0 80px;
    }

    .search-results-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
    }

    .search-result-card {
      background: var(--netflix-dark-gray);
      border-radius: 8px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .search-result-card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 24px rgba(0,0,0,0.4);
      z-index: 10;
    }

    .search-result-image {
      position: relative;
      width: 100%;
      padding-top: 56.25%; /* 16:9 aspect ratio */
      overflow: hidden;
    }

    .search-result-image img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .search-result-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0,0,0,0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .search-result-card:hover .search-result-overlay {
      opacity: 1;
    }

    .search-result-actions {
      display: flex;
      gap: 10px;
    }

    .action-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border: 2px solid var(--netflix-white);
      background: transparent;
      color: var(--netflix-white);
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .action-btn svg {
      width: 20px;
      height: 20px;
      fill: var(--netflix-white);
    }

    .action-btn:hover {
      background: var(--netflix-white);
      color: var(--netflix-black);
      transform: scale(1.1);
    }

    .action-btn:hover svg {
      fill: var(--netflix-black);
    }

    .play-btn:hover {
      background: var(--netflix-red);
      border-color: var(--netflix-red);
    }

    .play-btn:hover svg {
      fill: var(--netflix-white);
    }

    .search-result-info {
      padding: 15px;
    }

    .search-result-title {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 8px;
      color: var(--netflix-white);
    }

    .search-result-meta {
      display: flex;
      gap: 10px;
      font-size: 14px;
      color: var(--netflix-light-gray);
      margin-bottom: 8px;
      flex-wrap: wrap;
    }

    .rating {
      color: #46d369;
      font-weight: 600;
    }

    .search-result-genre {
      font-size: 13px;
      color: var(--netflix-light-gray);
      margin-bottom: 8px;
    }

    .search-result-description {
      font-size: 13px;
      color: var(--netflix-light-gray);
      line-height: 1.5;
    }

    /* No Results Styles */
    .no-results,
    .empty-search {
      text-align: center;
      padding: 80px 20px;
    }

    .no-results-icon,
    .empty-search-icon {
      width: 80px;
      height: 80px;
      fill: var(--netflix-light-gray);
      margin-bottom: 20px;
    }

    .no-results-title {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 15px;
      color: var(--netflix-white);
    }

    .no-results-text,
    .empty-search-text {
      font-size: 18px;
      color: var(--netflix-light-gray);
      margin-bottom: 30px;
    }

    .btn-back-home {
      display: inline-block;
      padding: 12px 30px;
      background: var(--netflix-red);
      color: var(--netflix-white);
      text-decoration: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: 600;
      transition: background 0.3s ease;
    }

    .btn-back-home:hover {
      background: #f40612;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .container {
        padding: 0 20px;
      }

      .search-results-header {
        padding: 100px 0 30px;
      }

      .search-results-title {
        font-size: 24px;
      }

      .search-results-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
      }

      .search-result-card:hover {
        transform: scale(1.02);
      }
    }
  </style>
@endsection
