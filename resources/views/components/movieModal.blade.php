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