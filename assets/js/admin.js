$(document).ready(function() {

    $('#add').click(function() {
        $('.ui.modal.add').modal('show');
    });

    $('#tables').DataTable();
});

var user = document.getElementById('userChart').getContext('2d');
var user_chart = new Chart(user, {
    type: 'line',
    data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [
            {
                label: "Jumlah User per Bulan",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBorderWidth: 10,
                pointHoverRadius: 10,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                spanGaps: false,
            }
        ]
    },
    options: {
        animation: {
            animateScale: true
        },
        responsive: true
    }
});