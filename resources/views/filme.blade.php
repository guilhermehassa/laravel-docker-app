@extends('layouts.app')

@section('content')
<div class="filme-page">
  <div class="video-background">
    <video autoplay muted loop playsinline>
      <source src="{{ asset('videos/video.mp4') }}" type="video/mp4">
    </video>
    <div class="video-overlay"></div>
  </div>

  <div class="filme-content">
    <button class="play-center">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path d="M8 5v14l11-7z"/>
      </svg>
    </button>

    <div class="filme-info">
      <h1 class="filme-title">{{ $movie['title'] }}</h1>
      
      <div class="filme-meta">
        <span class="filme-rating">{{ $movie['rating'] }}</span>
        <span class="filme-year">{{ $movie['year'] }}</span>
        <span class="filme-duration">{{ $movie['duration'] }}</span>
      </div>

      <div class="filme-genre">
        <strong>Gênero:</strong> {{ $movie['genre'] }}
      </div>

      <p class="filme-description">{{ $movie['description'] }}</p>

      <div class="filme-actions">
        <button class="btn btn-play">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M8 5v14l11-7z"/>
          </svg>
          Assistir
        </button>
        <button class="btn btn-add">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
          </svg>
          Minha Lista
        </button>
        <button class="btn btn-like">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2z"/>
          </svg>
        </button>
      </div>
    </div>

    <a href="/" class="back-button" title="Voltar">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
      </svg>
    </a>
  </div>
</div>
@endsection
