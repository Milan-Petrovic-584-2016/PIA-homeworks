class Osoba {
    name = "";
    boja = "#000000";
    poeni = 0;
    pitanje = 0;
    constructor(ime, boja) {
        //dopuni za poslednji zadatak
        this.name = ime;
        this.boja = boja;
    }
    getOsoba() {
        console.log("ime ", this.name, " poen ", this.poeni, " boja: ", this.boja);
    }


}


let slide = 0;
var timer = 0; //doradi
var topTen = -1; //niko nije upisan u Top10
let igrac;
let ime;
let boja;



$(document).ready(function() {
    $("#zi").click(function() {
        $("#pr1").css("display", "none");
        $("#pr2").css("display", "flex");
        slide = 1;

    })
    $("#sbm").click(function() {
        //dopuni
        if ($(document.getElementById("inputIme")).val() == "")
            alert('Unesite ime!!');
        else if ($(document.getElementById("boja")).val() == "#ffffff") {
            alert('Uneliste belu boju.Bela se nevidi,unestite drugu!!');
        } else {
            ime = document.getElementById("inputIme").value.toString();
            boja = document.getElementById("boja").value.toString();

            $("#pr2").css("display", "none");
            $("#pr3").css("display", "block");
            slide = 2;


        }


    })
    $("#cnl").click(function() {
        $(document.getElementById("inputIme")).val("");
        $(document.getElementById("boja")).val("#000000");

    })
    $("#start").click(function() {
        $("#pr3").css("display", "none");
        $("#pr4").css("display", "block");
        slide = 3;
        igrac = new Osoba(ime, boja);
        //igrac.getOsoba();



    })
})