document.getElementById("logout").addEventListener('click', logout);


function logout(){
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'api/logout.php',true);

    xhr.onload = function(){
        if(this.status == 200){
            document.getElementById("logout").innerHTML = '<a href="login.php">Login</a>';
            if(this.responseText == 1)
                document.getElementById("richieste").innerHTML = '<a href="prenotazioni.php">Prenotazioni</a>';
        }
    }
    
    xhr.send();
}