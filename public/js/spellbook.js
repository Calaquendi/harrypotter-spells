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

    $(window).scroll(function() {
        var position = $(window).scrollTop();

        if (position >= 200) {
            $(".navbar").removeClass("bg-transparent").addClass("bg-primary1 shadow");
        }
        else {
            $(".navbar").removeClass("bg-primary1 shadow").addClass("bg-transparent");
        }
    });
});
