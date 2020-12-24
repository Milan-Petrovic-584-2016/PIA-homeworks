class Osoba {
    name = "";
    boja = "#000000";
    poeni = 0;
    pitanjeRed = 0;
    timer = 0;

    pitanje2Tipa = [4, 8, 12, 14, 15];
    s = 0;

    constructor(ime, boja) {

        this.name = ime;
        this.boja = boja;
    }
    getOsoba() {
        console.log("ime ", this.name, " poen ", this.poeni, " boja: ", this.boja);
    }

    generateQuestion() {
        //popravi
        if (this.pitanje2Tipa[this.s] - 1 == this.pitanjeRed) {
            document.getElementById("odgovor1").style.display = "flex";
            document.getElementById("odgovor2").style.display = "none";
            document.getElementById("pitanje").innerText = jsonData[this.pitanjeRed].q;
            this.s++;

        } else {
            document.getElementById("odgovor2").style.display = "block";
            document.getElementById("odgovor1").style.display = "none";

            document.getElementById("pitanje").innerText = jsonData[this.pitanjeRed].q;
            document.getElementById("a").innerText = "A) " + jsonData[this.pitanjeRed].opt1;
            document.getElementById("b").innerText = "B) " + jsonData[this.pitanjeRed].opt2;
            document.getElementById("c").innerText = "C) " + jsonData[this.pitanjeRed].opt3;
            document.getElementById("d").innerText = "D) " + jsonData[this.pitanjeRed].opt4;

        }

    }
    checkAnswer(a) {
        if (this.pitanje2Tipa[this.s] - 1 == this.pitanjeRed) {

        } else {
            switch (a) {
                case 1:
                    if (jsonData[i].opt1 == "A) " + jsonData[i].answer) { tacno++; } else {
                        //pritisli smo A, ali je A ne tacno
                    }
                    break
                case 2:
                    if (jsonData[i].opt2 == "B) " + jsonData[i].answer) { tacno++; } else {
                        //pritisli smo B, ali je B ne tacno
                    }
                case 3:

                    if (jsonData[i].opt3 == "C) " + jsonData[i].answer) { tacno++; } else {
                        //pritisli smo C, ali je C ne tacno
                    }

                case 4:
                    if (jsonData[i].opt4 == "D) " + jsonData[i].answer) { tacno++; } else {
                        //pritisli smo D, ali je D ne tacno
                    }
            }
        }

        i++;
        /*
                if (jsonData.length - 1 < i) {
                    document.write("*****Yor score is : " + tacno + "*****");
                }*/
        generate(i);

    }
    startTimer() {
        document.getElementById("timer").innerText = " " + this.timer + " sec";
    }


}


let slide = 0;
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
        igrac.startTimer();
        igrac.generateQuestion();




    })
})