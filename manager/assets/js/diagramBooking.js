$(document).ready(function () {
    $.ajax({
        url: "http://localhost/flocity/admin/dataBooking.php",
        type: "GET",
        success: function (data) {
            console.log(data);

            var tanggal = [];
            var total = [];
            for (var i in data) {
                tanggal.push(data[i].tanggal);
                total.push(data[i].total);
            }

            var chartdata = {
                labels: tanggal,
                datasets: [{
                    label: "",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(300,135,126, 0.5)",
                    borderColor: "#e94340",
                    pointHoverBackgroundColor: "rgba(248,135,126, 1)",
                    pointHoverBorderColor: "rgba(248,135,126, 1)",
                    data: total
                }]
            };

            var ctx = $("#diagramBooking");

            var LineGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    backgroundColor: 'rgb(100,200,100)',
                    title: {
                        display: true,
                        fontStyle: 'bold',
                        text: "Rekapitulasi Booking",
                        fontSize: 18,
                        fontColor: "#111"
                    },
                    legend: {
                        display: false,
                        position: "bottom",
                        labels: {}
                    },
                    scales: {
                        xAxes: [{
                            ticks: {}
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                            }
                        }]
                    },
                    responsive: true,
                }
            });
        },
        error: function (data) {

        }
    });
});