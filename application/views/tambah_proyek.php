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
            namaProyek: $('input[name="namaProyek"]').val(),
            client: $('input[name="client"]').val(),
            tglMulai: $('input[name="tglMulai"]').val(),
            tglSelesai: $('input[name="tglSelesai"]').val(),
            pimpinanProyek: $('input[name="pimpinanProyek"]').val(),
            keterangan: $('input[name="keterangan"]').val()
         };
         $.ajax({
            url: 'http://localhost:8080/proyek',
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
			<h1>Nama Proyek : </h1>
			<input type="text" name="namaProyek" class="border rounded-sm border-black p-2">
			<h1>Client : </h1>
			<input type="text" name="client" class="border rounded-sm border-black p-2">
			<h1>Tanggal Mulai : </h1>
			<input type="datetime-local" name="tglMulai" class="border rounded-sm border-black p-2">
			<h1>Tanggal Selesai : </h1>
			<input type="datetime-local" name="tglSelesai" class="border rounded-sm border-black p-2">
			<h1>Pimpinan Proyek : </h1>
			<input type="text" name="pimpinanProyek" class="border rounded-sm border-black p-2">
			<h1>Keterangan : </h1>
			<input type="text" name="keterangan" class="border rounded-sm border-black p-2">
			<h1></h1>
			<input type="submit" id="kirim" value="Kirim" class="border rounded-sm border-blue-500 p-2">
		</form>
	</div>
</div>

<div class="p-4">
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>
