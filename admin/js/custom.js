$(document).ready(function() {
    // This will fire when document is ready:
    $(window).resize(function() {
        // This will fire each time the window is resized:
        if($(window).width() <= 500) {
            drawer.open = !drawer.open;
            $("aside.mdc-persistent-drawer").css("position","fixed")
        }
    }).resize(); // This will simulate a resize to trigger the initial run.
});