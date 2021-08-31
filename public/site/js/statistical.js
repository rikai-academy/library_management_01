var delayed;
var barChartData = {
    labels: date_time,
    datasets: [{
            label: 'Số Lượng Sách',
            data: quantity,
            yAxisID: 'y-axis-1',
        },
        {
            label: 'Doanh Thu',
            data: sum_price,
            yAxisID: 'y-axis-2',
        },
    ],
};

window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx, {
        type: 'line',
        data: barChartData,
        options: {
            elements: {
                rectangle: {
                    borderWidth: 3,
                    borderColor: '#c1c1c1',
                    borderSkipped: 'bottom',
                }
            },
            legend: {
                position: 'top',
            },
            responsive: true,
            title: {
                display: true,
                text: 'Doanh Thu Sách'
            },
            animation: {
                onComplete: () => {
                    delayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            },
            interaction: {
                mode: 'index',
                intersect: false,
            },
            stacked: false,
            scales: {
                yAxes: [{
                    id: 'y-axis-1',
                    type: 'linear',
                    position: 'left',
                }, {
                    id: 'y-axis-2',
                    type: 'linear',
                    position: 'right',
                }]
            }
        },
    });
};

function updateChart() {
    myBar.data.datasets[0].data = quantity_borrow;
    myBar.data.datasets[1].data = sum_price_borrow;
    myBar.update();
};

function updateChart_return() {
    myBar.data.datasets[0].data = quantity;
    myBar.data.datasets[1].data = sum_price;
    myBar.update();
};


$("select[name='select_day']").change(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var day_select = $(this).val();
    $.ajax({
        url: url,
        method: 'GET',
        data: {
            day_select: day_select
        },
        success: function(data) {
            myBar.data.labels = data['day'];
            myBar.data.datasets[0].data = data['count_quantity_book_return'];
            myBar.data.datasets[1].data = data['sum_price_book_return'];
            myBar.update();
        }
    });
});