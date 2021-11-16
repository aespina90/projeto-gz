$(document).ready(function(){
    $(document).on('click', '.mobile', function(event){
        event.preventDefault();
        event.stopPropagation();

        $('.mobile-options').fadeIn();
    });

    $(document).on('click', '.close-button', function(event){
        event.preventDefault();
        event.stopPropagation();

        $('.mobile-options').fadeOut();
    });
});
$(document).ready(function(){
  var zindex = 10;

  $("div.card").click(function(e){
    e.preventDefault();

    var isShowing = false;

    if ($(this).hasClass("show")) {
      isShowing = true
    }

    if ($("div.cards").hasClass("showing")) {
      // a card is already in view
      $("div.card.show")
        .removeClass("show");

      if (isShowing) {
        // this card was showing - reset the grid
        $("div.cards")
          .removeClass("showing");
      } else {
        // this card isn't showing - get in with it
        $(this)
          .css({zIndex: zindex})
          .addClass("show");

      }

      zindex++;

    } else {
      // no cards in view
      $("div.cards")
        .addClass("showing");
      $(this)
        .css({zIndex:zindex})
        .addClass("show");

      zindex++;
    }

  });
});
$(document).ready(function() {

    var tl = new TimelineMax({
        repeat: -1,
        yoyo: true
    }).timeScale(4);

    var tl2 = new TimelineMax({
        repeat: -1,
        yoyo: true
    }).timeScale(4);

    $("svg .internetdots").each(function() {
        tl.to($(this), 1, {transformOrigin: "50% 50%", scale: 2, ease: Power0.easeInOut},"-=2");
        tl.to($(this), 1, {transformOrigin: "50% 50%", scale: 1, ease: Power0.easeInOut},"-=0.5");
    });
    $("svg .devdots").each(function() {
        tl2.to($(this), 1, {transformOrigin: "50% 50%", scale: 2, ease: Power0.easeInOut},"-=2");
        tl2.to($(this), 1, {transformOrigin: "50% 50%", scale: 1, ease: Power0.easeInOut},"-=0.5");
    });

});
// for http://signature.io
var cloud = $('.cloud');
var process = $(".cloud-processing");

process.addClass("process");


// to restart the animation click and hold on the cloud
cloud.on("mousedown", function(){
  process.addClass("process");
});

cloud.on("mouseup", function(){
  process.removeClass("process");
});

// TODO
//- settup mobile friendly version
