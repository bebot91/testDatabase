var keycloak = new Keycloak();

function initKeycloak() {
    sessionStorage.clear();  


    keycloak.init({onLoad: 'login-required'}).then(function() {
        //constructTableRows(keycloak.idTokenParsed);
        console.dir(keycloak);

        sessionStorage.setItem('token',keycloak.token);
        sessionStorage.setItem('rtoken',keycloak.refreshToken);     
        location.href='http://localhost/CRYBOT/Feautures/private/Welcome.php';

    }).catch(function() {
        alert('failed11')
    })

}

function constructTableRows(keycloakToken) {
    document.getElementById('row-username').innerHTML = keycloakToken.preferred_username;
    document.getElementById('row-firstName').innerHTML = keycloakToken.given_name;
    document.getElementById('row-lastName').innerHTML = keycloakToken.family_name;
    document.getElementById('row-name').innerHTML = keycloakToken.name;
    document.getElementById('row-email').innerHTML = keycloakToken.email;
}

function pasteToken(token){
    document.getElementById('token').value = token;
    document.getElementById('refreshToken').value = keycloak.refreshToken;
    }

var refreshToken = function() {
    keycloak.updateToken(-1)
    console.dir(keycloak);3
    .then(function(){
        sessionStorage.setItem('token',keycloak.token);
        sessionStorage.setItem('rtoken',keycloak.refreshToken);     
    });
}

var logout = function() {
    keycloak.logout;
}