var currentIndex = 0;
var index = $(".mySlide");
var dot = $(".img-thumbnails");

$(document).ready(function(){
    index.first().show();
    dot.first().addClass("opacity");
});
function clickSlide(currentIndex){
    index.eq(currentIndex).fadeIn(900);
    index.eq(currentIndex).prevAll().fadeOut(800);
    index.eq(currentIndex).nextAll().fadeOut(800);
    console.log('click slide' + currentIndex);
}