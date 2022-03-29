$(document).ready(function () {
    // ------------------------------------------------------------------------------ //
    // CHARTJS
    // ------------------------------------------------------------------------------ //

    const colors = {
        purple: {
            default: "rgb(52, 84, 209)",
            half: "rgba(149, 76, 233, 0.5)",
            quarter: "rgba(52, 84, 209, 0.51)",
            zero: "rgba(52, 84, 209, 0)"
        },
        indigo: {
            default: "rgba(80, 102, 120, 1)",
            quarter: "rgba(80, 102, 120, 0.25)"
        }
    };

    const weight = [60.0, 60.2, 59.1, 61.4, 59.9, 60.2, 59.8, 58.6, 59.6, 59.2, 61.4, 59.9, 60.2,];

    const labels = [
        "Jun 2019",
        "Jul 2019",
        "Aug 2019",
        "Sep 2019",
        "Oct 2019",
        "Nov 2019",
        "Dec 2019",
        "Jan 2020",
        "Feb 2020",
        "Mar 2020",
        "Apr 2020",
        "May 2020"
    ];

    const ctx = document.getElementById("myChart").getContext("2d");
    // ctx.canvas.height = 100;

    gradient = ctx.createLinearGradient(0, 25, 0, 300);
    gradient.addColorStop(0, colors.purple.half);
    gradient.addColorStop(0.35, colors.purple.quarter);
    gradient.addColorStop(1, colors.purple.zero);

    const options = {
        type: "line",
        data: {
            labels: labels,
            datasets: [
                {
                    fill: true,
                    backgroundColor: gradient,
                    pointBackgroundColor: colors.purple.default,
                    borderColor: colors.purple.default,
                    data: weight,
                    lineTension: 0.2,
                    borderWidth: 2,
                    pointRadius: 3
                }
            ]
        },
        options: {
            layout: {
                padding: 20
            },
            responsive: true,
            legend: {
                display: false
            },

            scales: {
                xAxes: [
                    {
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            padding: 10,
                            autoSkip: false,
                            maxRotation: 20,
                            minRotation: 20
                        }
                    }
                ],
                yAxes: [
                    {
                        scaleLabel: {
                            display: false,
                            labelString: "Month",
                            padding: 10
                        },
                        gridLines: {
                            display: true,
                            color: colors.indigo.quarter
                        },
                        ticks: {
                            beginAtZero: false,
                            max: 63,
                            min: 55,
                            padding: 10
                        }
                    }
                ]
            },

        }
    };

    window.onload = function () {
        window.myLine = new Chart(ctx, options);
        Chart.defaults.global.defaultFontColor = colors.indigo.default;
        Chart.defaults.global.defaultFontSize = 14;
        // Chart.defaults.global.defaultFontFamily = "Fira Sans";
    };
});