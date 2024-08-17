<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
   $(document).ready(function() {
      $('#kirim').click(function() {
		var formData = {
					id: $('select[name="id"]').val(),
					namaLokasi: $('input[name="namaLokasi"]').val(),
					negara: $('input[name="negara"]').val(),
					provinsi: $('input[name="provinsi"]').val(),
					kota: $('input[name="kota"]').val(),
				};
         $.ajax({
            url: 'http://localhost:8080/lokasi',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function(response) {
               alert('berhasil!');
            },
            error: function(xhr, status, error) {
				console.log(xhr.responseText);
				alert('Error: ' + error + '\nResponse: ' + xhr.responseText);
			}
         });
      });
   });
</script>

</head>
<body>

<div class="p-4 w-full text-2xl bg-red-500 flex justify-between">
	<h1>TES SELEKSI PROGRAM MAGANG SOFTWARE ENGINEER PT. SURYA ENERGI INDOTAMA</h1>
	<a href="https://v-project.my.id">Oliver Dillon</a>
</div>

<div class="w-full">
	<div class="w-10/12 mx-auto text-white gap-4 bg-gray-800 p-4">
		<div class="flex gap-x-4 justify-center">
			<a href="/">Halaman Utama</a>
		</div>
	</div>
	<div class="my-2 mx-auto w-6/12">
	<form id="pform" class="items-center grid grid-cols-2 text-end gap-2">
				<h1>Nama Lokasi : </h1>
				<input type="text" name="namaLokasi" class="border rounded-sm border-black p-2">
				<h1>Negara : </h1>
				<input type="text" name="negara" class="border rounded-sm border-black p-2">
				<h1>Provinsi : </h1>
				<input type="text" name="provinsi" class="border rounded-sm border-black p-2">
				<h1>Kota : </h1>
				<input type="text" name="kota" class="border rounded-sm border-black p-2">
				<h1></h1>
				<input type="submit" id="kirim" value="Kirim" class="col-span-2 border rounded-sm border-blue-500 p-2">
			</div>
		</form>
	</div>
</div>

<div class="p-4">
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>
