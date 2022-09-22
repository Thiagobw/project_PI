
/* check if jquery is loaded */
$(document).ready(function () {

    function checkCPF(strCPF) {

        var Sum;
        var Resto;
        Sum = 0;

        strCPF = strCPF.replace(/[^0-9]/g, '');

        if (strCPF == "00000000000") return false;

        for (i = 1; i <= 9; i++) Sum = Sum + parseInt(strCPF.substring(i - 1, i)) * (11 - i);

        Resto = (Sum * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;

        Sum = 0;
        for (i = 1; i <= 10; i++) Sum = Sum + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Sum * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) return false;
        return true;
    }



    /* log in */
    $('#form1').submit(function (e) {
        e.preventDefault();
        var cpfLog = $('#CpfLog').val();
        var passLog = $('#passLog').val();

        if (cpfLog.length == 0 || passLog.length == 0) {
            alert("preencha todos os campos para poder fazer log in!");
        } else {

            if (checkCPF(cpfLog)) {

                let link_server = window.location.pathname + '../control/authentication.php';

                $.ajax({
                    type: 'POST',
                    url: link_server,
                    dataType: 'json',
                    data: { cpf: cpfLog, pass: passLog },

                    success: function (data) {

                        if (data.status == true) {
                            location.reload('project_PI/view/salePage.php');
                        } else {
                            alert(data.msg);
                        }
                    },

                    error: function () {
                        alert('Erro: contate o suporte')
                    }
                });

            } else {
                alert('CPF invalido');
            }
        }
    })
    /* ------------------- */


    /* create account */
    $('#form2').submit(function (e) {
        e.preventDefault();

        var name = $('#name').val();
        var cpf = $('#cpf').val();
        var tell = $('#tell').val();
        var email = $('#email').val();
        var pass = $('#pass').val();

        if (name.length == 0 || cpf.length == 0 || tell.length == 0 || email.length == 0 || pass.length == 0) {
            alert("preencha todos os campos para poder fazer cadastro!");

        } else {

            if (checkCPF(cpf)) {

                let link_server = window.location.pathname + '../control/control_registration.php';

                $.ajax({

                    type: 'POST',
                    url: link_server,
                    dataType: 'json',
                    data: {
                        cpf: cpf,
                        pass: pass,
                        name: name,
                        tell: tell,
                        email: email
                    },
                    success: function (data) {

                        if (data.status == true) {
                            location.reload();

                        } else {
                            alert(data.msg);
                        }

                    },
                    error: function (data) {
                        alert(data.responseText)
                    }
                });

            } else {
                alert('CPF invalido');
            }
        }
    })
})