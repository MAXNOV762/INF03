function wykonane(przycisk) {
    przycisk.parentElement.style.textDecoration = "line-through";
}


function dodaj() {
    let dodanie = document.getElementById("dodanie").value;
    let lista = document.getElementById("lista");

    if (dodanie === "") {
        alert("Napisz zadanie!");
        return;
    }


    let li = document.createElement("li");
    let przycisk_wykonaj = document.createElement("button");

    przycisk_wykonaj.textContent = "Wykonane";
    przycisk_wykonaj.className = "wykonanie";


    li.textContent = dodanie + " ";

    lista.appendChild(li);
    li.appendChild(przycisk_wykonaj);
    
    przycisk_wykonaj.onclick = function() {
        wykonane(this);
    }
}