$(function() {
	$('.close').click(function() {
		$('.toasts-top-right').remove();
	});

	$('.datepicker').datepicker({
		format: 'dd-mm-yyyy'
	});
});

let label = [ '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020' ];
let manData = [ 467, 453, 470, 367, 387, 427, 389, 320, 308, 340, 346 ];
let womanData = [ 463, 464, 443, 337, 356, 467, 447, 316, 279, 275, 338 ];
let allStudent = [
	manData[0] + womanData[0],
	manData[1] + womanData[1],
	manData[2] + womanData[2],
	manData[3] + womanData[3],
	manData[4] + womanData[4],
	manData[5] + womanData[5],
	manData[6] + womanData[6],
	manData[7] + womanData[7],
	manData[8] + womanData[8],
	manData[9] + womanData[9],
	manData[10] + womanData[10],
	manData[18] + womanData[11]
];

// 10 years student
let line = document.getElementById('10-years-student').getContext('2d');
let lineChart = new Chart(line, {
	type: 'line',
	data: {
		labels: label,
		datasets: [
			{
				fill: true,
				data: allStudent,
				backgroundColor: 'rgba(60,141,188,0.3)',
				borderColor: 'rgba(60,141,188,0.9)',
				borderWidth: 2
			}
		]
	},
	options: {
		legend: {
			display: false
		},
		scales: {
			yAxes: [
				{
					ticks: {
						beginAtZero: false
					}
				}
			]
		}
	}
});

// student  at 10 years  by gender
let ctx = document.getElementById('10-years-student-gender').getContext('2d');
let myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: label,
		datasets: [
			{
				fill: false,
				label: 'Laki - Laki',
				data: manData,
				backgroundColor: 'rgba(60,141,188,0.9)',
				borderColor: 'rgba(60,141,188,0.9)',
				borderWidth: 2
			},
			{
				fill: false,
				label: 'Perempuan',
				data: womanData,
				backgroundColor: 'rgba(210, 214, 222, 1)',
				borderColor: 'rgba(210, 214, 222, 1)',
				borderWidth: 2
			}
		]
	},
	options: {
		legend: {
			display: true
		},
		scales: {
			yAxes: [
				{
					ticks: {
						beginAtZero: false
					}
				}
			]
		}
	}
});

// major
var donutData = {
	labels: [ 'IPA', 'IPS', 'BAHASA' ],
	datasets: [
		{
			data: [ 700, 500, 400 ],
			backgroundColor: [ '#f56954', '#00a65a', '#f39c12' ]
		}
	]
};

let major = document.getElementById('major').getContext('2d');
var pieData = donutData;
var pieOptions = {
	maintainAspectRatio: false,
	responsive: true
};

var pieChart = new Chart(major, {
	type: 'pie',
	data: pieData,
	options: pieOptions
});

// photo preview
function previewFoto() {
	const foto = document.querySelector('#pic');
	const previewFoto = document.querySelector('.img-preview');

	const fileFoto = new FileReader();
	fileFoto.readAsDataURL(foto.files[0]);

	fileFoto.onload = function(e) {
		previewFoto.src = e.target.result;
	};
}
