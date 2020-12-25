let mi = "miki";
mi.toLowerCase
class Osoba {
    name = "";
    boja = "#000000";
    poeni = 0;
    pitanjeRed = 0;

    pitanje2Tipa = [4, 8, 12, 14, 15];
    s = 0;

    constructor(ime, boja) {

        this.name = ime;
        this.boja = boja;
    }
    getOsoba() {
        console.log("ime ", this.name, " poen ", this.poeni, " boja: ", this.boja);
    }
    incS() {
        this.s++;
    }


    generateQuestion() {


        if (this.pitanje2Tipa[this.s] - 1 == this.pitanjeRed) {
            document.getElementById("pr5").style.display = "none";
            document.getElementById("odgovor1").style.display = "flex";
            document.getElementById("odgovor2").style.display = "none";
            document.getElementById("upis").value = "";
            document.getElementById("pitanje").innerText = jsonData[this.pitanjeRed].q;


        } else {
            document.getElementById("odgovor2").style.display = "block";
            document.getElementById("odgovor1").style.display = "none";
            document.getElementById("pr5").style.display = "none";
            document.getElementById("a").style.backgroundColor = "goldenrod";
            document.getElementById("b").style.backgroundColor = "goldenrod";
            document.getElementById("c").style.backgroundColor = "goldenrod";
            document.getElementById("d").style.backgroundColor = "goldenrod";
            document.getElementById("pitanje").innerText = jsonData[this.pitanjeRed].q;
            document.getElementById("a").innerText = "A) " + jsonData[this.pitanjeRed].opt1;
            document.getElementById("b").innerText = "B) " + jsonData[this.pitanjeRed].opt2;
            document.getElementById("c").innerText = "C) " + jsonData[this.pitanjeRed].opt3;
            document.getElementById("d").innerText = "D) " + jsonData[this.pitanjeRed].opt4;

        }
    }

}


let slide = 0;
var topTen = -1; //niko nije upisan u Top10
var igrac;
let ime;
let boja;


pitanje2 = [4, 8, 12, 14, 15];
s1 = 0;

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
        igrac.generateQuestion();

    })

})
document.getElementById("a").addEventListener('click', function() {
    if (jsonData[igrac.pitanjeRed].opt1 == jsonData[igrac.pitanjeRed].answer) {
        document.getElementById("a").style.background = "lightgreen";
        igrac.poeni++;

    } else {
        document.getElementById("a").style.background = "red";
        if (jsonData[igrac.pitanjeRed].opt2 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("b").style.background = "lightgreen";
        }

        window.setTimeout("this.nextQuest()", 20000);
        if (jsonData[igrac.pitanjeRed].opt3 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("c").style.background = "lightgreen";
        }
        if (jsonData[igrac.pitanjeRed].opt4 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("d").style.background = "lightgreen";
        }
    }

    igrac.pitanjeRed++;
    window.setTimeout("igrac.generateQuestion()", 3000);





})
document.getElementById("b").addEventListener('click', function() {
    if (jsonData[igrac.pitanjeRed].opt2 == jsonData[igrac.pitanjeRed].answer) {
        document.getElementById("b").style.background = "lightgreen";
        igrac.poeni++;
    } else {
        document.getElementById("b").style.background = "red";
        if (jsonData[igrac.pitanjeRed].opt1 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("a").style.background = "lightgreen";
        }
        if (jsonData[igrac.pitanjeRed].opt3 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("c").style.background = "lightgreen";
        }
        if (jsonData[igrac.pitanjeRed].opt4 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("d").style.background = "lightgreen";
        }
    }
    igrac.pitanjeRed++;
    window.setTimeout("igrac.generateQuestion()", 3000);


})
document.getElementById("c").addEventListener('click', function() {
    if (jsonData[igrac.pitanjeRed].opt3 == jsonData[igrac.pitanjeRed].answer) {
        document.getElementById("c").style.background = "lightgreen";
        igrac.poeni++;
    } else {
        document.getElementById("c").style.background = "red";
        if (jsonData[igrac.pitanjeRed].opt1 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("a").style.background = "lightgreen";
        }
        if (jsonData[igrac.pitanjeRed].opt2 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("b").style.background = "lightgreen";
        }
        if (jsonData[igrac.pitanjeRed].opt4 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("d").style.background = "lightgreen";
        }
    }
    igrac.pitanjeRed++;
    window.setTimeout("igrac.generateQuestion()", 3000);
})
document.getElementById("d").addEventListener('click', function() {
    if (jsonData[igrac.pitanjeRed].opt4 == jsonData[igrac.pitanjeRed].answer) {
        document.getElementById("d").style.background = "lightgreen";
        igrac.poeni++;
    } else {
        document.getElementById("d").style.background = "red";
        if (jsonData[igrac.pitanjeRed].opt1 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("a").style.background = "lightgreen";
        }
        if (jsonData[igrac.pitanjeRed].opt3 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("c").style.background = "lightgreen";
        }
        if (jsonData[igrac.pitanjeRed].opt2 == jsonData[igrac.pitanjeRed].answer) {
            document.getElementById("b").style.background = "lightgreen";
        }
    }
    igrac.pitanjeRed++;

    window.setTimeout("igrac.generateQuestion()", 3000);
})

document.getElementById("rez").addEventListener('click', function() {
    if (document.getElementById("upis").value.toLowerCase() == jsonData[igrac.pitanjeRed].answer.toLowerCase()) {
        document.getElementById("upis").value = "tačno je ";
        igrac.poeni++;
    } else {
        document.getElementById("upis").value = "rezulta je " + jsonData[igrac.pitanjeRed].answer;
    }
    igrac.pitanjeRed++;
    igrac.incS();
    if (14 < igrac.pitanjeRed) {
        document.getElementById("pr4").style.display = "none";
        slide++;
        document.getElementById("pr5").style.display = "flex";
        document.getElementById("text").style.color = igrac.boja
        document.getElementById("ime").innerHTML = igrac.name;
        document.getElementById("poen").innerHTML = igrac.poeni;


    } else {
        window.setTimeout("igrac.generateQuestion()", 3000);
    }

})

document.getElementById("odustani").addEventListener("click", function() {
    document.getElementById("pr4").style.display = "none";
    slide++;
    document.getElementById("pr5").style.display = "flex";
    document.getElementById("text").style.color = igrac.boja
    document.getElementById("ime").innerHTML = igrac.name;
    document.getElementById("poen").innerHTML = igrac.poeni;
    igrac = null;
})

document.getElementById("sledece").addEventListener("click", function() {
    igrac.pitanjeRed++;
    if (pitanje2[s1] == igrac.pitanjeRed) {
        igrac.incS();
        s1++;
    }
    if (igrac.pitanjeRed == 15) {
        document.getElementById("pr4").style.display = "none";
        slide++;
        document.getElementById("pr5").style.display = "flex";
        document.getElementById("text").style.color = igrac.boja
        document.getElementById("ime").innerHTML = igrac.name;
        document.getElementById("poen").innerHTML = igrac.poeni;
        igrac = null;
    } else {
        igrac.generateQuestion();
    }
})
var timer = 0;

function nextQuest() {
    igrac.pitanjeRed++;
    if (pitanje2[s1] == igrac.pitanjeRed) {
        igrac.incS();
        s1++;
    }
    if (igrac.pitanjeRed == 15) {
        document.getElementById("pr4").style.display = "none";
        slide++;
        document.getElementById("pr5").style.display = "flex";
        document.getElementById("text").style.color = igrac.boja
        document.getElementById("ime").innerHTML = igrac.name;
        document.getElementById("poen").innerHTML = igrac.poeni;
        igrac = null;
    } else {
        igrac.generateQuestion();
    }
}
incTimer()