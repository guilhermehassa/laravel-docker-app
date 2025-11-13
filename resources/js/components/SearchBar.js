// Search bar functionality
export function initSearchBar() {
  const searchForm = $('#searchForm');
  const searchInput = $('#searchInput');
  const searchSubmitBtn = $('#searchSubmitBtn');

  // Expandir o form ao clicar no botão de pesquisa
  searchSubmitBtn.click(function(e) {
    if (!searchForm.hasClass('expanded')) {
      e.preventDefault();
      searchForm.addClass('expanded');
      searchInput.focus();
    } else {
      // Se já está expandido, verifica se tem texto para pesquisar
      const searchTerm = searchInput.val().trim();
      if (!searchTerm) {
        e.preventDefault();
        searchInput.focus();
      }
    }
  });

  // Expandir ao clicar no input (caso mobile)
  searchInput.focus(function() {
    searchForm.addClass('expanded');
  });

  // Fechar ao clicar fora
  $(document).click(function(e) {
    const searchWrapper = $('#searchBarWrapper');
    if (!searchWrapper.is(e.target) && searchWrapper.has(e.target).length === 0) {
      if (searchForm.hasClass('expanded') && !searchInput.val().trim()) {
        searchForm.removeClass('expanded');
      }
    }
  });

  // Fechar com ESC
  $(document).keyup(function(e) {
    if (e.key === "Escape") {
      if (searchForm.hasClass('expanded')) {
        searchForm.removeClass('expanded');
        searchInput.val('');
        searchInput.blur();
      }
    }
  });

  // Submit do form
  searchForm.submit(function(e) {
    const searchTerm = searchInput.val().trim();
    if (!searchTerm) {
      e.preventDefault();
      searchInput.focus();
      return false;
    }
  });
}
