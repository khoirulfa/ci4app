$(function() {
	$('.close').click(function() {
		$('.toasts-top-right').remove();
	});
});

// photo preview
function previewFoto() {
	const foto = document.querySelector('#pic');
	const previewFoto = document.querySelector('.img-preview');

	const fileFoto = new FileReader();
	fileFoto.readAsDataURL(foto.files[0]);

	fileFoto.onload = function (e) {
		previewFoto.src = e.target.result;
	};
}