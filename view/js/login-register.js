/* log in */
$('#form1').submit(function(e){
    e.preventDefault();
    var cpfLog = $('#CpfLog').val();
    var passLog = $('#passLog').val();

    //fazer evento de validalção em tempo real
    if(cpfLog.length == 0 || passLog.length == 0){
        alert("preencha todos os campos para poder fazer log in!");
    } else{
        alert("tudo certo!");

        ajaxLog();
    }
})

/* create account */
$('#form2').submit(function(e){
    e.preventDefault();

    var name = $('#name').val();
    var cpf = $('#cpf').val();
    var tell = $('#tell').val();
    var email = $('#email').val();
    var pass = $('#pass').val();

    //fazer evento de validalção em tempo real
    if(name.length == 0 || cpf.length == 0 || tell.length == 0 || email.length == 0 || pass.length == 0){
        alert("preencha todos os campos para poder fazer cadastro!");
    } else{
        alert("tudo certo!");

        ajaxCreate();
    }
})

function ajaxLog() {
    $ajax({
        URL: 'project_PI/control/atutenticacao.php',
        method: 'post',
        data: {name: name, cpf: cpf, tell: tell, email: email, pass: pass},
        dataType: 'json'
    }).done(function(result){
        
        
    })
}

function ajaxCreate() {
    $ajax({

    })
}