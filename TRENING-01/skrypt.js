

//pobieranie zmiennych z strony głównej
let wynik = document.getElementById("wynik");

//pobieramy kazdy element tabeli oprocz naglowka
let komorki = document.querySelectorAll("table tbody tr"); 

//walidacja formularza
document.getElementById("MyForm").addEventListener("submit", function(event) {
    event.preventDefault();

    //dynamiczne pobeiranie danych z pola edycyjnego oraz jego formatowanie
    let szukanie = document.getElementById("szukanie").value;
    let sprawdzenie = szukanie.toLowerCase().trim();

    //zmienna dla obliczenia ilosci filmow
    let ilosc = 0;


    //sprawdza czy pole edycyjne jest puste, jesli tak to zmian nie ma
    if (sprawdzenie === '') {
        komorki.forEach(komorka =>  komorka.style.display = '');
        wynik.textContent = "Wyświetlono wszystkie filmy";
        return;
    }
    
    //petla zeby przejsc przez kazdy element tabeli oprocz naglowka
    komorki.forEach(komorka => {
        
        //zmienna dla zawartosci komorki
        let zawartosc = komorka.textContent.toLowerCase();


        //sprawdza czy slowo wpisane do pola edycyjnego zgadza sie z zawasrtosciami tabeli
        if (zawartosc.includes(sprawdzenie)) {
            komorka.style.display = '';

            // zwiekszamy ilosc o 1 z kazdym znalezionym filmem
            ilosc++;
        }
        // jesli nie to chowamy wiersz
        else {
            komorka.style.display = 'none';
        }
    });
      
    //komunikat ile znaleziono filmów
    wynik.textContent = `Znaleziono ${ilosc} filmów`;
});