@extends('Layout.blank_admin');

@section('main')
    <canvas id="canvas" height="280" width="600"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var date_time = <?php echo $datetime_borrow; ?>;
        var quantity = <?php echo $count_quantity; ?>;
        var sum_price = <?php echo $sum_price; ?>;
        var delayed;
        var barChartData = {
            labels: date_time,
            datasets: [{
                    label: 'Số Lượng Sách',
                    backgroundColor: "pink",
                    data: quantity,
                    fill: true,
                    yAxisID: 'y-axis-1',
                },
                {
                    label: 'Doanh Thu',
                    backgroundColor: "blue",
                    data: sum_price,
                    fill: true,
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
                        text: 'Yearly User Joined'
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
    </script>
@stop
