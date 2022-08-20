var btnCreateAcc = document.querySelector('#btncreateAcc');
var containerAccount = document.querySelector('#account');
var containerCreateAcc = document.querySelector('#createAcc');
var headerAccount = document.querySelector('#title-account');
var headerCreateAcc = document.querySelector('#title-createAcc');
btnCreateAcc.addEventListener('click', function(){

    if(containerAccount.style.display != 'none') {
        containerAccount.style.display = 'none';
        headerAccount.style.display = 'none';
        containerCreateAcc.style.display = 'block';
        headerCreateAcc.style.display = 'block';
    }
})