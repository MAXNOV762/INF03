
// zmienna dla licznika zeby sie zwiekszal co 1
let licznik = 1;

// walidacja formularza
document.getElementById("MyForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    // pobieranie danych z formularza
    let przedmiot = document.getElementById("przedmiot").value;
    let ocena = parseInt(document.getElementById("ocena").value);


    // tworzenie elementow tabeli 
    let tr = document.createElement("tr");
    let td_licznik = document.createElement("td");
    let td_przedmiot = document.createElement("td");
    let td_ocena = document.createElement("td");
    let td_akcja = document.createElement("td");
    let przycisk_usun = document.createElement("button");

    przycisk_usun.textContent = "Usuń";

    // przycisk usun
    przycisk_usun.onclick = function() {
        this.parentElement.parentElement.remove();
        srednia();
    }


    // jesli ocena jest 1
    if(ocena < 2) {
        td_ocena.style.color = "red";
    }

    //to co musi zawierac komorki tabeli
    td_licznik.textContent = licznik;
    td_przedmiot.textContent = przedmiot;
    td_ocena.textContent = ocena;
    td_akcja.appendChild(przycisk_usun);


     // dodawanie do wiersza
    tr.appendChild(td_licznik);
    tr.appendChild(td_przedmiot);
    tr.appendChild(td_ocena);
    tr.appendChild(td_akcja);

    // dodawanie wiersza do ciala tabeli
    document.getElementById("cialo").appendChild(tr);


    // licznik numeru
    licznik++;

    
})

// obliczanie sredniej
function srednia() {
    let cialo = document.getElementById("cialo");
    let wiersze = cialo.getElementsByTagName("tr");
    let suma = 0;
    let ilosc = wiersze.length;

    //warunek jesli nie ma zadnych ocen
    if (ilosc === 0) {
        document.getElementById("srednia").textContent = "0.00";
        return;
        
    }


     //petla ktora pozwala liczyc sume ocen
    for (let i = 0; i<ilosc; i++) {

        //cells[2] bo oceny sa w 3 wierszu a indeks jest od 0
        let wartosc = parseFloat(wiersze[i].cells[2].textContent);
        suma += wartosc;
    }
           
    //wynik obliczania  
    let wynik = suma / ilosc;

    document.getElementById("srednia").textContent = wynik.toFixed(2);
}



