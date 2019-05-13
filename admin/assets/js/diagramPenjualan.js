$(document).ready(function () {
    $.ajax({
        url: "http://localhost/flocity/admin/dataChart.php",
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
                    fill: true,
                    lineTension: 0.1,
                    backgroundColor: "rgba(300,135,126, 0.5)",
                    borderColor: "#e94340",
                    pointHoverBackgroundColor: "rgba(248,135,126, 1)",
                    pointHoverBorderColor: "rgba(248,135,126, 1)",
                    data: total
                }]
            };

            var ctx = $("#diagramPenjualan");

            var LineGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {
                    backgroundColor: 'rgb(100,200,100)',
                    title: {
                        display: true,
                        fontStyle: 'bold',
                        text: "Rekapitulasi Penjualan",
                        fontSize: 18,
                        fontColor: "#111"
                    },
                    legend: {
                        display: false,
                        position: "bottom",
                        labels: {}
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                return "Rp " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function (c, i, a) {
                                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
                                });
                            }
                        }
                    },
                    scales: {
                        xAxes: [{
                            ticks: {}
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 10000000,
                                // Return an empty string to draw the tick line but hide the tick label
                                // Return `null` or `undefined` to hide the tick line entirely
                                userCallback: function (value, index, values) {
                                    // Convert the number to a string and splite the string every 3 charaters from the end
                                    value = value.toString();
                                    value = value.split(/(?=(?:...)*$)/);
                                    // Convert the array to a string and format the output
                                    value = value.join('.');
                                    return 'Rp. ' + value;
                                }
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