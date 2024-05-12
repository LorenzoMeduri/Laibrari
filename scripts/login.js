document.getElementById("form").addEventListener('submit', auth);

function auth(e){
    e.preventDefault();
    var parameters = "email=" + document.getElementById("email").value + "&password=" + document.getElementById("password").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api/auth.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.responseText == 1){
            window.location.replace(window.location.href.split('/').slice(0, -1).join('/') + '/' + "index.php");
        }
        else{
            document.getElementById("failed").innerHTML = "Credenziali errate";
            document.getElementById("password").value = "";
        }
    }

    xhr.send(parameters);
}