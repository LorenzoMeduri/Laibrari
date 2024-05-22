var buttons = document.querySelectorAll('#product-box button');
buttons.forEach(function (button){
    if(button.className == "accetta")
        button.addEventListener('click', function() { accetta(button.id) });
    else
        button.addEventListener('click', function() { restituisci(button.id) });
});

function accetta(idRichiesta){
    var parameter = "idRichiesta=" + idRichiesta;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api/accetta.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById(idRichiesta).innerHTML = '<button class="restituisci" id="' + this.responseText + '">RESTITUISCI</button>';
    }

    xhr.send(parameter);
}

function restituisci(idAccettazione){
    var parameter = "idAccettazione=" + idAccettazione;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api/restituisci.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById(idAccettazione).innerHTML = '<button style="background-color: grey;" disabled>RESTITUITO</button>';
    }

    xhr.send(parameter);
}