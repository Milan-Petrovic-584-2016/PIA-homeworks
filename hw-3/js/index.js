var slide = 0;
$(document).ready(function() {
    $("#zi").click(function() {
        $("#pr1").css("display", "none");
        $("#pr2").css("display", "flex");
        slide++;
    })
    $("#sbm").click(function() {
        $("#pr2").css("display", "none");
        $("#pr3").css("display", "block");
        slide++;
    })
    $("#cnl").click(function() {
        $(document.getElementById("inputIme")).val("");
        $(document.getElementById("boja")).val("#000000");

    })
    $("#start").click(function() {
        $("#pr3").css("display", "none");
        $("#pr4").css("display", "block");
    })
})