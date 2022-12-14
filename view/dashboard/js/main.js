(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


    // Calender
    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav : false
    });


    // Chart Global Color
    Chart.defaults.color = "#6C7293";
    Chart.defaults.borderColor = "#000000";


    // Worldwide Sales Chart
    var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [{
                    label: "USA",
                    data: [15, 30, 55, 65, 60, 80, 95],
                    backgroundColor: "rgba(235, 22, 22, .7)"
                },
                {
                    label: "UK",
                    data: [8, 35, 40, 60, 70, 55, 75],
                    backgroundColor: "rgba(235, 22, 22, .5)"
                },
                {
                    label: "AU",
                    data: [12, 25, 45, 55, 65, 70, 60],
                    backgroundColor: "rgba(235, 22, 22, .3)"
                }
            ]
            },
        options: {
            responsive: true
        }
    });


    // Salse & Revenue Chart
    var ctx2 = $("#salse-revenue").get(0).getContext("2d");
    var myChart2 = new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [{
                    label: "Salse",
                    data: [15, 30, 55, 45, 70, 65, 85],
                    backgroundColor: "rgba(235, 22, 22, .7)",
                    fill: true
                },
                {
                    label: "Revenue",
                    data: [99, 135, 170, 130, 190, 180, 270],
                    backgroundColor: "rgba(235, 22, 22, .5)",
                    fill: true
                }
            ]
            },
        options: {
            responsive: true
        }
    });
    


    // Single Line Chart
    var ctx3 = $("#line-chart").get(0).getContext("2d");
    var myChart3 = new Chart(ctx3, {
        type: "line",
        data: {
            labels: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150],
            datasets: [{
                label: "Salse",
                fill: false,
                backgroundColor: "rgba(235, 22, 22, .7)",
                data: [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Single Bar Chart
    var ctx4 = $("#bar-chart").get(0).getContext("2d");
    var myChart4 = new Chart(ctx4, {
        type: "bar",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(235, 22, 22, .7)",
                    "rgba(235, 22, 22, .6)",
                    "rgba(235, 22, 22, .5)",
                    "rgba(235, 22, 22, .4)",
                    "rgba(235, 22, 22, .3)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Pie Chart
    var ctx5 = $("#pie-chart").get(0).getContext("2d");
    var myChart5 = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(235, 22, 22, .7)",
                    "rgba(235, 22, 22, .6)",
                    "rgba(235, 22, 22, .5)",
                    "rgba(235, 22, 22, .4)",
                    "rgba(235, 22, 22, .3)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Doughnut Chart
    var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
    var myChart6 = new Chart(ctx6, {
        type: "doughnut",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(235, 22, 22, .7)",
                    "rgba(235, 22, 22, .6)",
                    "rgba(235, 22, 22, .5)",
                    "rgba(235, 22, 22, .4)",
                    "rgba(235, 22, 22, .3)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: {
            responsive: true
        }
    });

    
})(jQuery);




function getCustomerData(idCust) {
    BASE_URL = '/project_PI';
    $.get( BASE_URL+"/control/customers_select.php?id="+idCust, function( data ) {
        data = JSON.parse(data);
        $("#idCustomerChange").val(data['id']);
        $("#changeNameCustomers" ).val(data['nome']);
        $("#changeCpfCustomers" ).val(data['cpf']);
        $("#changeEmailCustomers").val(data['email']);
        $("#changeTellCustomers").val(data['tell']);

        const ttl = document.querySelector('#ttlCust');
        ttl.style.display = 'flex';
        const content = document.querySelector('#contentAlterCust');
        content.style.display = 'flex';

    });
}

function getEmployeerData(idEmp) {
    BASE_URL = '/project_PI';
    $.get( BASE_URL+"/control/employees_select.php?id="+idEmp, function( data ) {
        data = JSON.parse(data);
        $("#idEmployeesChange").val(data['id']);
        $("#changeNameEmployees").val(data['nome']);
        $("#changeCpfEmployees").val(data['cpf']);
        $("#changeEmailEmployees").val(data['email']);
        $("#changeTellEmployees").val(data['tell']);

        const ttl = document.querySelector('#ttlEmploy');
        ttl.style.display = 'flex';

        const content = document.querySelector('#contentAlterEploy');
        content.style.display = 'flex';

    });
}

function getProductData(idProd) {
    BASE_URL = '/project_PI';
    $.get( BASE_URL+"/control/products_select.php?id="+idProd, function( data ) {
        data = JSON.parse(data);
        $("#idProductChange").val(data['id']);
        $("#idImage").val(data['idImg']);
        $("#changeNameProduct").val(data['name']);
        $("#changePriceProduct").val(data['price']);

        const { sizes } = data;

        sizes.forEach((obj) => {
            console.log(obj.amount)
            // call the function to display on the screen(checkbox id, imput id and value)
            selectOptionChangeData("changeCheckSize" + obj.size, "changeAmountProdSize" + obj.size, obj.amount)
        });

        
        const ttl = document.querySelector('#ttlProd');
        ttl.style.display = 'flex';
        
        const content = document.querySelector('#contentAlterProd');
        content.style.display = 'flex';
    })
}

function getProviderData(idProv) {
    BASE_URL = '/project_PI';
    $.get( BASE_URL+"/control/providers_select.php?id="+idProv, function( data ) {
        data = JSON.parse(data);
        $("#idProviderChange").val(data['id']);
        $("#changeNameProviders").val(data['nome']);
        $("#changeCnpjProviders").val(data['cnpj']);
        $("#changeEmailProviders").val(data['email']);
        $("#changeTellProviders").val(data['tell']);

        const ttl = document.querySelector('#ttlProv');
        ttl.style.display = 'flex';
        
        const content = document.querySelector('#contentAlterProv');
        content.style.display = 'flex';
        
    })
}


function selectOption(idCheck, idInput) {
    let checkboxSize = document.getElementById(idCheck);
    let inputAmount = document.getElementById(idInput);
    

    if(checkboxSize.checked) {

        inputAmount.style.display = 'flex';
        inputAmount.readOnly = false;
        inputAmount.value = '';
    } else {
        inputAmount.style.display = 'none';
        inputAmount.readOnly = true;
        inputAmount.value = 0;
    }
}

function selectOptionChangeData(idCheck, idInput, value) {

    let checkboxSize = document.getElementById(idCheck);
    let imputAmount = document.getElementById(idInput);
    let amount = value;
    
    if (amount === null && checkboxSize.checked && imputAmount.value == 0) {
            imputAmount.style.display = 'flex';
            imputAmount.readOnly = false;
            imputAmount.value = "";
    }
    if (amount === null && checkboxSize.checked == false && imputAmount.value == "") {
        imputAmount.style.display = 'none';
        imputAmount.readOnly = true;
    }
    
    if (amount === null && checkboxSize.checked == false && imputAmount.style.display == 'flex' && imputAmount.value != "") {
        checkboxSize.checked = true;
    }
    
    if (amount != null && checkboxSize.checked == false) {

        checkboxSize.checked = true;
        imputAmount.style.display = 'flex';
        imputAmount.readOnly = false;
        imputAmount.value = amount
    }
}