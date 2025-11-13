export function initSearchBar() {
  const searchForm = $('#searchForm');
  const searchInput = $('#searchInput');
  const searchSubmitBtn = $('#searchSubmitBtn');

  searchSubmitBtn.click(function(e) {
    if (!searchForm.hasClass('expanded')) {
      e.preventDefault();
      searchForm.addClass('expanded');
      searchInput.focus();
    } else {
      const searchTerm = searchInput.val().trim();
      if (!searchTerm) {
        e.preventDefault();
        searchInput.focus();
      }
    }
  });

  searchInput.focus(function() {
    searchForm.addClass('expanded');
  });

  $(document).click(function(e) {
    const searchWrapper = $('#searchBarWrapper');
    if (!searchWrapper.is(e.target) && searchWrapper.has(e.target).length === 0) {
      if (searchForm.hasClass('expanded') && !searchInput.val().trim()) {
        searchForm.removeClass('expanded');
      }
    }
  });

  $(document).keyup(function(e) {
    if (e.key === "Escape") {
      if (searchForm.hasClass('expanded')) {
        searchForm.removeClass('expanded');
        searchInput.val('');
        searchInput.blur();
      }
    }
  });

  searchForm.submit(function(e) {
    const searchTerm = searchInput.val().trim();
    if (!searchTerm) {
      e.preventDefault();
      searchInput.focus();
      return false;
    }
  });
}
