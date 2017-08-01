(function() {
  // For toggling the accordiong chevron
  function toggleChevron(e) {
    $(e.target)
      .prev('.panel-heading')
      .find('i.fa')
      .toggleClass('fa-caret-right fa-caret-down');
  }
  $("div[id^='accordion']").on('hidden.bs.collapse', toggleChevron);
  $("div[id^='accordion']").on('shown.bs.collapse', toggleChevron);
  
  // Anchor link position fix due to fixed header
  $("a.anchor[href^='#']").on('click', function(e) {
    // prevent default anchor click behavior
    e.preventDefault();

    // animate
    $('html, body').animate({
      scrollTop: $(this.hash).offset().top - 60
    }, 300, function() {});
  });
  
  // Print link handler
  $(".printMe").on('click', function(e) {
    // Construct the pieces
    var documentStart = '<!DOCTYPE html><html lang="fi"><head>' + $("head").html() + '</head><body><div class="container">',
      title = $("#collapse" + $(this).data('target')).parent().find('.workoutTitle').html(),
      content = $("#collapse" + $(this).data('target')).html(),
      documentEnd = '</div></body></html>';
    // Put the pieces to the new window, print and close
    newWin = window.open();
    newWin.document.write(documentStart + '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">' 
        + title + '</h4></div>' 
        + content + '</div>' 
        + documentEnd);
    newWin.print();
    newWin.close();
  });
  
})();