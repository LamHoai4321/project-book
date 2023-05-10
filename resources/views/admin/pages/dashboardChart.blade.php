<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels:[''],
            datasets: [{
                label: 'Monthly Earn',
                data:{!! json_encode($datas) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            
            scales: {
                y: { // defining min and max so hiding the dataset does not change scale range
                    beginAtZero: true
                }
            }
        }
    });

    // var ctx = document.getElementById('chartHoadon').getContext('2d');
    // var myChart = new Chart(ctx, {
    //     type: 'pie',
    //     data : {
    //     labels: [
    //         'Đơn hủy',
    //         'Đơn mới',
    //         'Đơn đã duyệt',
    //         'Giao thành công',
    //         'Đang vận chuyển'
    //     ],
    //     datasets: [{
    //         label: 'My First Dataset',
    //         data: [{{ $ttHuy }}, {{ $ttDonmoi }}, {{ $ttDuyetdon }},{{ $ttGiaoThanhcong }},{{ $ttVanchuyen }}],
    //         backgroundColor: [
    //         'rgb(255, 99, 132)',
    //         'rgb(54, 162, 235)',
    //         'rgb(255, 205, 86)',
    //         'rgb(125,211,247)',
    //         'rgb(255,109,0)'
    //         ],
    //         hoverOffset: 4
    //     }]
    //     },
    // });
</script>
<script>
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Biểu đồ thống kê đơn hàng năm 2022'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y} ',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Share',
        data: [
            { name: 'Đơn Hủy', y: {{$ttHuy}} },
            { name: 'Đơn Mới', y: {{$ttDonmoi}} },
            { name: 'Đơn Duyệt', y: {{$ttDuyetdon}} },
            { name: 'Đang Giao Hàng', y: {{$ttVanchuyen}} },
            { name: 'Giao Hàng Thành Công', y: {{$ttGiaoThanhcong}} }
            
        ]
    }]
});
</script>