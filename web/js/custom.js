function alertPopUp() {
    alert("Clicked!");
}
function changeColor(){
var newColor = document.getElementById('colorChange').value;
document.getElementById('divNumberOne').style.color = newColor;

}
$(document).ready(function(){

    $("#backgroundColor").click(function(){

        var newBackgroundColor = document.getElementById('colorChange').value;
        $("body").css("background-color",newBackgroundColor);



    });
$("#fade").click(function(){

    $('.div3').fadeToggle(3000);

});





});