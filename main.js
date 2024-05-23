$(document).ready(function(){
    $('.header').height($(window).height());

    const trailer = $('#mouse-trailer');

    $(document).mousemove(function(event) {
        const mouseX = event.pageX;
        const mouseY = event.pageY;

        // Set the trailer position to follow the mouse, with a small delay for smoothness
        trailer.css({
            left: mouseX + 'px',
            top: mouseY + 'px'
        });
    });
});