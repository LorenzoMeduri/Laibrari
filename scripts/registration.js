document.getElementById("form").addEventListener('submit', registration);

function registration(e){
    e.preventDefault();
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var nome = document.getElementById("nome").value;
    var cognome = document.getElementById("cognome").value;
    var codiceFiscale = document.getElementById("codiceFiscale").value;
    var nTelefono = document.getElementById("nTelefono").value;

    if(email == "" || password == "" || nome == "" || cognome == "" || codiceFiscale == "" || nTelefono == ""){
        document.getElementById("failed").innerHTML = "Compila tutti i campi";
        return;
    }
    else{
        var parameters = "email=" + email + "&password=" + password + "&nome=" + nome + "&cognome=" + cognome + "&codiceFiscale=" + codiceFiscale + "&nTelefono=" + nTelefono;
    }
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api/newUser.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        window.location.replace(window.location.href.split('/').slice(0, -1).join('/') + '/' + "index.php");
    }

    xhr.send(parameters);
}