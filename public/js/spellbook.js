$(document).ready(function() {
    //Parallax
    if (location.pathname == "/") {
        var scene = document.getElementById('parallax-scene');
        var parallaxInstance = new Parallax(scene, {
            relativeInput: true,
            frictionX: 0.2,
            frictionY: 0.2
        });
    }
    //End of Parallax

    //Navbar background on scrolling
    $(window).scroll(function() {
        var position = $(window).scrollTop();

        if (position >= 200) {
            $(".navbar").removeClass("bg-transparent").addClass("bg-primary1 shadow");
        }
        else {
            $(".navbar").removeClass("bg-primary1 shadow").addClass("bg-transparent");
        }
    });
    //End of Navbar

    //Dropdown on hover mouse
    function isMobile() {
        return ( "ontouchstart" in window || navigator.maxTouchPoints );
    }
    
    if (!isMobile()) {
        $(".dropdown, .btn-group").hover(
            function() {
            $(".dropdown-menu", this).stop( true, true ).fadeIn("fast");
                $(this).addClass("show");
            },
            function() {
            $(".dropdown-menu", this).stop( true, true ).fadeOut("fast");
                $(this).removeClass("show");
            }
        );
    }
    //End of Dropdown on hover mouse
});
