import $ from "jquery";

$(document).ready(function() {
    // Check for click events on the navbar burger icon
    $(".navbar-burger").click(function() {
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });

    window.addEventListener("scroll", onScrollNavigation);

    if ($(".parallax-slider").length) window.addEventListener("scroll", onScrollAnimations);
    if ($(".parallax-bg").length) window.addEventListener("scroll", onScrollParallax);
    if ($(".section-references").length) referenceInit();
});

function onScrollAnimations(e) {
    var nDefillement = window.pageYOffset;
    const bg = $(".parallax-slider").find(".swiper-slide-bg");
    bg.css("backgroundPosition", "50%  " + nDefillement * 0.6 + "px");

    const content = $(".parallax-slider").find(".swiper-slide-inner");
    content.css("top", nDefillement * 0.2 + "px");
}

function onScrollParallax(e) {
    var nDefillement = window.pageYOffset;
    const bg = $(".parallax-bg");
    bg.css("backgroundPosition", "50%  " + nDefillement * 0.6 + "px");
}

function onScrollNavigation(e) {
    var nDefillement = window.pageYOffset;
    if (nDefillement > 280) {
        $("#mainNavbar").addClass("pinned");
    } else {
        $("#mainNavbar").removeClass("pinned");
    }
}

function referenceInit() {
    $(".ref-type-list li").on("click", onFilterReferences);
}

function onFilterReferences(e) {
    var type = $(this).data("type");
    $(this).siblings().removeClass('on');
    $(this).addClass('on');
    $(".ref-wraper").html("");
    console.log(type);
    $.ajax({
        url: adminAjax,
        method: "POST",
        data: {
            action: "get_references",
            type: type
        },
        success: function(response) {
            if (response.success) {
                //console.log(response.data);
                var content = $(response.data.html);
                content.hide()
                $(".ref-wraper").append(content);
                content.fadeIn('slow');

            } else {
                //console.log(response.data);
            }
        },
        error: function(response) {
            console.log("Erreur…");
        }
    });
}
