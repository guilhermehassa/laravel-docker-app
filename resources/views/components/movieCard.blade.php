@props(['movie'])

<a href="{{ route('filme.show', $movie['id']) }}" class="movie-card-link">
  <div class="movie-card" 
    data-movie-id="{{ $movie['id'] }}"
    style="background-image: url('{{ $movie['image'] }}')"
    >
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
</a>