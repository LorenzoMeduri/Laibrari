var buttons = document.querySelectorAll('#product-box button');
buttons.forEach(function (button){
    button.addEventListener('click', function() { prenota(button.id) });
});

function prenota(isbn){
    var parameter = "isbn=" + isbn;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api/eliminaPrenotazione.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.responseText){
            document.getElementById(isbn).innerHTML = "ELIMINATO";
            document.getElementById(isbn).style.backgroundColor = 'red';
        }
    }
    xhr.send(parameter);
}