@props(['category'])

<section class="movies-section" id="{{ Str::slug($category['title']) }}">
  <h2 class="section-title">{{ $category['title'] }}</h2>
  
  <div class="movies-carousel" data-category="{{ Str::slug($category['title']) }}">
    <button class="carousel-btn prev" data-direction="prev">‹</button>
    <button class="carousel-btn next" data-direction="next">›</button>
    
    <div class="carousel-container">
      <div class="movies-row">
        @foreach($category['movies'] as $movie)
          <x-movieCard :movie="$movie" />

        @endforeach
      </div>
    </div>
  </div>
</section>