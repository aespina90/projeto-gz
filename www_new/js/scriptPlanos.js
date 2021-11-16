// Initialize the media query
  var mediaQuery = window.matchMedia('(min-width: 600px)');

  // Add a listen event
  mediaQuery.addListener(doSomething);

  // Function to do something with the media query
  function doSomething(mediaQuery) {
    if (mediaQuery.matches) {
      $('.sep').attr('colspan',5);
      $('td:nth-child(3)').css('display','table-cell');
    } else {
      $('.sep').attr('colspan',2);
    }
  }

  // On load
  doSomething(mediaQuery);