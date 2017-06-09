function mainnav() {

    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('header').removeClass('mainnav--down').addClass('mainnav--up');
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('header').removeClass('mainnav--up').addClass('mainnav--down');
            }
        }

        lastScrollTop = st;
    }

    $(document).ready(function(){
        $(".mainnav__burger").click(function(e){
            e.stopPropagation();
            $(this).toggleClass("is-active");
        });
        $(".closed").click(function(e){
            e.preventDefault();
            $(this).toggleClass("closed open");
        });

    });
}

mainnav();