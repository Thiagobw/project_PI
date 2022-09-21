
/* check if jquery is loaded */
$(document).ready(function() {
    console.log("jquery successfully loaded");
    

    /* log in */
    $('#form1').submit(function(e){
        e.preventDefault();
        var cpfLog = $('#CpfLog').val();
        var passLog = $('#passLog').val();

        if(cpfLog.length == 0 || passLog.length == 0) {
            alert("preencha todos os campos para poder fazer log in!");
        } else{
            alert("chegou aqui..");
            $.ajax({
                url: 'Project_PI/control/autenticacao.php',
                method: 'post',
                data: $('#form1').serialize(),
                dataType: 'json'
            }).done(function(result){
                if(result.status == true){
                    window.location="/project_PI/view/salePage.php";
                } else{
                    alert(result.msg);
                }
            })
        }
    })
    /* ------------------- */
    

    /* create account */
    $('#form2').submit(function(e){
        e.preventDefault();

        var name = $('#name').val();
        var cpf = $('#cpf').val();
        var tell = $('#tell').val();
        var email = $('#email').val();
        var pass = $('#pass').val();

        if(name.length == 0 || cpf.length == 0 || tell.length == 0 || email.length == 0 || pass.length == 0){
            alert("preencha todos os campos para poder fazer cadastro!");
        } else{
            alert("tudo certo!");

        }
    })
})