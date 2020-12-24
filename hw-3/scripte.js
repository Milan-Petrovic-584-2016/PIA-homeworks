$(document).ready(function() {
    $("#zi").click(function() {
        $("#pr1").css("display", "none");
        $("#pr2").css("display", "flex");
    })
    $("#sbm").click(function() {
        $("#pr2").css("display", "none");
        $("#pr3").css("display", "block");
    })
    $("#cnl").click(function() {
        /*napisi ovde
         */

    })
    $("#start").click(function() {
        $("#pr3").css("display", "none");
        $("#pr4").css("display", "block");
    })
})