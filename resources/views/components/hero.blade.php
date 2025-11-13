@props(['featuredMovie'])

<section class="hero-section" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ $featuredMovie['image'] }}')">
  <div class="hero-content">
    <h1 class="hero-title">{{ $featuredMovie['title'] }}</h1>
    <p class="hero-description">{{ $featuredMovie['description'] }}</p>
    
    <div class="hero-buttons">
      <a href="{{ route('filme.show', 'featured') }}" class="btn btn-play">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
          <path d="M8 5v14l11-7z"/>
        </svg>
        Assistir
      </a>
      <a href="{{ route('filme.show', 'featured') }}" class="btn btn-info">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
        </svg>
        Mais Informações
      </a>
    </div>
  </div>
</section>