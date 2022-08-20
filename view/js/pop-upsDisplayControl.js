var btn = document.querySelector('#createAcc');
var container = document.querySelector('#pop-upAccount');

btn.addEventListener('click', function(){

    if(container.style.display === 'block') {
        container.style.display = 'none';
    }
})