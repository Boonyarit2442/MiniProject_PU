function select_Pst(self) {
        $.ajax({
            type: "POST",
            url: "http://203.188.54.9/~u6411800010/controler/ShowG_ajax.php",
            data: {
                "value": $('#Sclect_Dep').val(),
                "_method": 'Dep'
            },
            success: function(response) {
                $('#Sclect_PST').empty();
                $('#Sclect_PST').append(response);
            }
        });
    }
    new Chart($('#H_Bar_feat'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($Pai[0]); ?>,
            datasets: [{
                label: 'Easy as',
                data: <?php echo json_encode($Pai[1]); ?>,
            }],
        },
        options: {
            indexAxis: 'y', // <-- here
            responsive: true
        }
    });



    new Chart($('#PaiCheat_depPersen'), {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($Pai[0]); ?>,
            datasets: [{
                label: 'My First Dataset',
                data: <?php echo json_encode($Pai[1]); ?>,
                hoverOffset: 4
            }]
        },
    });
    new Chart($('#Bar_Depcount'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($Pai[0]); ?>,
            datasets: [{
                label: '# of Votes',
                data: <?php echo json_encode($Pai[1]); ?>,
                borderWidth: 1
            }]
        },

    });
    new Chart($('#Bar_Depcount_EMP'), {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Red', 'Blue', 'Yellow', 'Green',
                'Purple', 'Orange'
            ],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },

    });
