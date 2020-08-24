 new WOW().init();
  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 100) {
        //clearHeader, not clearheader - caps H
        $("header").addClass("bg-theme");
    }
    else{
        $("header").removeClass("bg-theme");

    }
});
  $(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

 $('.navbar-toggler').click(function(e){//navbar body fixed
        
           $('.navbar-toggler').toggleClass('cross');
       
        })

 $('#navbarNavDropdown').on('show.bs.collapse', function () {
  // do something…
  $('body').css('overflow', 'hidden');
})
$('#navbarNavDropdown').on('hide.bs.collapse', function () {
 $('body').css('overflow', 'initial');
})