var buttons = document.querySelectorAll('#product-box button');
buttons.forEach(function (button){
    button.addEventListener('click', function() { prenota(button.id) });
});

function prenota(isbn){
    var parameter = "isbn=" + isbn;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api/prenota.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.responseText == 1){
            document.getElementById(isbn).innerHTML = "PRENOTATO";
            document.getElementById(isbn).style.backgroundColor = 'red';
        }else if(this.responseText == 0){
            alert("Devi essere loggato per prenotare un prodotto");
            window.location.replace(window.location.href.split('/').slice(0, -1).join('/') + '/' + "login.php");
        }
    }

    xhr.send(parameter);
}