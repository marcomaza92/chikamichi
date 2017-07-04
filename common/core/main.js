// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});
    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any JS/jQuery/helper plugins in here.

/*** Contact Form ***/

// This is for reset the form and gives an answer to the sender
$(document).ready(function(){
  $("#contact-form").submit(function(event)
     {
         // stop form from submitting normally
         event.preventDefault();

         // get some values from elements on the page
         var $form = $( this ),
             $submit = $form.find( 'button[type="submit"]' ),
             name_value = $form.find( 'input[name="name"]' ).val(),
             tel_value = $form.find( 'input[name="tel"]' ).val(),
             email_value = $form.find( 'input[name="email"]' ).val(),
             message_value = $form.find( 'textarea[name="message"]' ).val(),
             url = $form.attr('action');

         // Send the data using post
         var posting = $.post( url, {
                           name: name_value,
                           tel: tel_value,
                           email: email_value,
                           message: message_value
                       });
         posting.done(function( data )
         {
             // Reset the Form
             document.getElementById('contact-form').reset();

             // Put the results in a div
             $( "#answer" ).html(data);

             /*
               // Change the button text.
               $submit.text('Sent, Thank you');

               // Disable the button.
               $submit.attr("disabled", true);
             */
         });
    });
});

/*** End of Contact Form ***/

/*** Google Maps ***/
function initialize() {
  var mapCanvas = document.getElementById('google-maps');
  var mapOptions = {
    center: new google.maps.LatLng(-31.4217831,-64.1538063), // Here goes your location
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.HYBRID
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker();
  marker.setPosition(new google.maps.LatLng(-31.4217831,-64.1538063)); // Here goes your location
  marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

/*** End of Google Maps ***/

/*** Hamburger Menu ***/
$(document).ready(function(){
  $("#menu-open").click(function(){
    $("#menu-list").toggleClass("show")
  });
  $("li a, #menu-close").click(function(){
    $("#menu-list").toggleClass("show")
  });
});

/*** End of Hamburger Menu ***/

/*** Smooth Anchor Links Transition ***/

$(document).ready(function(){
  // .not(whattoexclude)
  if (window.innerWidth < 481) {
    $("li a").not("#menu-close").click(function(){
      $("html, body").animate({
          scrollTop: $($.attr(this, "href")).offset().top-50
      }, 750);
      return false;
    });
  } else {
    $("li a").not("#menu-close").click(function(){
      $("html, body").animate({
          scrollTop: $($.attr(this, "href")).offset().top-100
      }, 750);
      return false;
    });
  }
});

/*** End of Smooth Anchor Links Transition ***/
