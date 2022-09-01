var btnCreateAcc_popup = document.querySelector('#btncreateAcc');
var containerAccount = document.querySelector('#account');
var containerCreateAcc = document.querySelector('#createAcc');
var headerAccount = document.querySelector('#title-account');
var headerCreateAcc = document.querySelector('#title-createAcc');
var btnRegister = document.querySelector('#btnRegister');
var btnLogin = document.querySelector('#btnLogin');
var footerToRegister = document.querySelector('#toRegister');

btnCreateAcc_popup.addEventListener('click', function(){

    if(containerAccount.style.display != 'none') {
        containerAccount.style.display = 'none';
        headerAccount.style.display = 'none';
        containerCreateAcc.style.display = 'block';
        headerCreateAcc.style.display = 'block';
    }
    checkContainer();
});

btnRegister.addEventListener('click', function(){

    containerAccount.style.display = 'none';
    headerAccount.style.display = 'none';
    containerCreateAcc.style.display = 'block';
    headerCreateAcc.style.display = 'block';

    checkContainer();
});

btnLogin.addEventListener('click', function(){

    if(containerAccount.style.display == 'none') {
        containerCreateAcc.style.display = 'none';
        headerCreateAcc.style.display = 'none';
        containerAccount.style.display = 'block';
        headerAccount.style.display = 'block';
    }
    checkContainer();
});

function checkContainer() {
    if(containerAccount.style.display != 'none' && headerAccount.style.display != 'none') {
        footerToRegister.style.display = 'block';
    } else {
        footerToRegister.style.display = 'none';
    }
}