let suma = 0;

document.getElementById("MyForm").addEventListener("submit", function(event) {
    event.preventDefault();


    let produkt = document.getElementById("produkt").value;
    let cena = parseFloat(document.getElementById("cena").value);
    let ilosc = parseFloat(document.getElementById("ilosc").value);

    let wartosc = cena * ilosc;
   

    let tr = document.createElement("tr");
    let td_produkt = document.createElement("td");
    let td_cena = document.createElement("td");
    let td_ilosc = document.createElement("td");
    let td_wartosc = document.createElement("td");
    let td_akcja = document.createElement("td");
    let przycisk_usun = document.createElement("button");

    przycisk_usun.textContent = "Usuń";
    suma += wartosc;

     przycisk_usun.onclick = function() {
        suma -= wartosc;
        this.parentElement.parentElement.remove();
        
     }
   
       td_produkt.textContent = produkt;
       td_cena.textContent = cena;
       td_ilosc.textContent = ilosc;
       td_wartosc.textContent = wartosc;
       td_akcja.appendChild(przycisk_usun);

       tr.appendChild(td_produkt);
       tr.appendChild(td_cena);
       tr.appendChild(td_ilosc);
       tr.appendChild(td_wartosc);
       tr.appendChild(td_akcja);

       document.getElementById("cialo").appendChild(tr);
       
       

       document.getElementById("demo").innerHTML = "Suma całkowita zamówienia: " + suma + " zł";

  
})