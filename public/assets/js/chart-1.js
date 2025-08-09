// // chart 1

// var ctx = document.getElementById("chart-bars").getContext("2d");

// new Chart(ctx, {
//   type: "bar",
//   data: {
//     labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
//     datasets: [
//       {
//         label: "Sales",
//         tension: 0.4,
//         borderWidth: 0,
//         borderRadius: 4,
//         borderSkipped: false,
//         backgroundColor: "#fff",
//         data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
//         maxBarThickness: 6,
//       },
//     ],
//   },
//   options: {
//     responsive: true,
//     maintainAspectRatio: false,
//     plugins: {
//       legend: {
//         display: false,
//       },
//     },
//     interaction: {
//       intersect: false,
//       mode: "index",
//     },
//     scales: {
//       y: {
//         grid: {
//           drawBorder: false,
//           display: false,
//           drawOnChartArea: false,
//           drawTicks: false,
//         },
//         ticks: {
//           suggestedMin: 0,
//           suggestedMax: 600,
//           beginAtZero: true,
//           padding: 15,
//           font: {
//             size: 14,
//             family: "Open Sans",
//             style: "normal",
//             lineHeight: 2,
//           },
//           color: "#fff",
//         },
//       },
//       x: {
//         grid: {
//           drawBorder: false,
//           display: false,
//           drawOnChartArea: false,
//           drawTicks: false,
//         },
//         ticks: {
//           display: false,
//         },
//       },
//     },
//   },
// });

// // end chart 1



    // var ctx = document.getElementById("chart-bars").getContext("2d");

    // new Chart(ctx, {
    //     type: "bar",
    //     data: {
    //         labels: @json($months), // Months from controller
    //         datasets: [
    //             {
    //                 label: "Posts",
    //                 tension: 0.4,
    //                 borderWidth: 0,
    //                 borderRadius: 4,
    //                 borderSkipped: false,
    //                 backgroundColor: "#fff",
    //                 data: @json($postCounts), // Post counts from controller
    //                 maxBarThickness: 6,
    //             },
    //         ],
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         plugins: {
    //             legend: { display: false },
    //         },
    //         interaction: {
    //             intersect: false,
    //             mode: "index",
    //         },
    //         scales: {
    //             y: {
    //                 grid: { display: false, drawTicks: false },
    //                 ticks: {
    //                     suggestedMin: 0,
    //                     beginAtZero: true,
    //                     padding: 15,
    //                     font: { size: 14, family: "Open Sans" },
    //                     color: "#fff",
    //                 },
    //             },
    //             x: {
    //                 grid: { display: false, drawTicks: false },
    //                 ticks: { display: false },
    //             },
    //         },
    //     },
    // });


    document.addEventListener("DOMContentLoaded", function () {
    let chartDataEl = document.getElementById("chartData");

    let months = JSON.parse(chartDataEl.dataset.months);
    let postCounts = JSON.parse(chartDataEl.dataset.counts);

    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: months,
            datasets: [{
                label: "Posts",
                backgroundColor: "#fff",
                data: postCounts,
                borderRadius: 4,
                maxBarThickness: 6,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { ticks: { color: "#fff" }, grid: { display: false } },
                x: { ticks: { color: "#fff" }, grid: { display: false } },
            },
        },
    });
});

