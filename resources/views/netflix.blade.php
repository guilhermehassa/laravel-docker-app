@extends('layouts.app')

@section('content')
  <x-hero :featured-movie="$featuredMovie" />

  <!-- Movies Sections -->
  <main class="main-content">
    @foreach($categories as $category)
      <x-movieSection :category="$category" />
    @endforeach
  </main>

  <x-movieModal />

  <!-- Movie Data for JavaScript -->
  <script>
    window.movieData = @json([
      'featured' => $featuredMovie,
      'categories' => $categories
    ]);
  </script>
@endsection