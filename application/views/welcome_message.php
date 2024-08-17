<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		function changeList(jenis) {
			switch (jenis) {
				case 0:
					document.getElementById("listdlp").classList.remove("hidden");
					document.getElementById("listdl").classList.add("hidden");
					document.getElementById("listdp").classList.add("hidden");
					break;
				case 1:
					document.getElementById("listdlp").classList.add("hidden");
					document.getElementById("listdl").classList.add("hidden");
					document.getElementById("listdp").classList.remove("hidden");
					break;
				case 2:
					document.getElementById("listdlp").classList.add("hidden");
					document.getElementById("listdl").classList.remove("hidden");
					document.getElementById("listdp").classList.add("hidden");
					break;
				default:
			}
		}
	</script>
</head>
<body class="text-white bg-gray-800">

<div class="p-4 w-full text-2xl bg-gray-500 flex justify-between">
	<h1>TES SELEKSI PROGRAM MAGANG SOFTWARE ENGINEER PT. SURYA ENERGI INDOTAMA</h1>
	<a href="https://v-project.my.id">Oliver Dillon</a>
</div>

<div class="w-full">
	<div class="w-10/12 mx-auto grid grid-cols-2 gap-4 bg-gray-800 p-4">
		<div class="flex gap-x-4 col-span-2 justify-center">
			<a href="javascript:void(0);" onclick="changeList(0)" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">List Lokasi Proyek</a>
			<a href="javascript:void(0);" onclick="changeList(1)" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">List Proyek</a>
			<a href="javascript:void(0);" onclick="changeList(2)" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">List Lokasi</a>
		</div>
		<div class="flex gap-x-4 col-span-2 justify-center">
			<a href="/tambah_proyek" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">Tambah Proyek</a>
			<a href="/edit_proyek" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">Edit Proyek</a>
			<a href="/hapus_proyek" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">Hapus Proyek</a>
			<a href="/tambah_lokasi" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">Tambah Lokasi</a>
			<a href="/edit_proyek" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">Edit Lokasi</a>
			<a href="/hapus_proyek" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">Hapus Lokasi</a>
		</div>
	</div>
	<div class="w-10/12 mx-auto grid grid-cols-3 gap-4 bg-gray-700 p-4 hidden" id="listdp">
		<?php foreach ($proyek as $item) { ?>
				<div>
					<h1>Lokasi = <?= $item['namaProyek']?></h1>
					<h1>Client = <?= $item['client']?></h1>
					<h1>tglMulai = <?php $a = new Datetime($item['tglMulai']); echo $a->format('Y-m-d'); ?></h1>
					<h1>tglSelesai = <?php $a = new Datetime($item['tglSelesai']); echo $a->format('Y-m-d'); ?></h1>
					<h1>pimpinanProyek = <?= $item['pimpinanProyek']?></h1>
					<h1>keterangan = <?= $item['keterangan']?></h1>
				</div>
		<?php } ?>
	</div>
	<div class="w-10/12 mx-auto grid grid-cols-3 gap-4 bg-gray-700 p-4 hidden" id="listdl">
		<?php foreach ($lokasi as $item) { ?>
				<div>
					<h1>Lokasi = <?= $item['namaLokasi']?></h1>
					<h1>Negara = <?= $item['negara']?></h1>
					<h1>Provinsi = <?= $item['provinsi']?></h1>
					<h1>Kota = <?= $item['kota']?></h1>
				</div>
		<?php } ?>
	</div>
	<div class="w-10/12 mx-auto grid grid-cols-3 gap-4 bg-gray-700 p-4" id="listdlp">
		<?php
		$proyek = [];
		$lokasiProyek = [];

		foreach ($data["data"] as $item) {
			if (isset($item['proyek']['namaProyek']) && isset($item['lokasi']['namaLokasi'])) {
				$namaProyek = $item['proyek']['namaProyek'];
				$client = $item['proyek']['client'];
				$pimpinanProyek = $item['proyek']['pimpinanProyek'];
				$tglMulai = $item['proyek']['tglMulai'];
				$tglSelesai = $item['proyek']['tglSelesai'];
				$keterangan = $item['proyek']['keterangan'];

				$namaLokasi = $item['lokasi']['namaLokasi'];

				if (!isset($proyek[$namaProyek])) {
					$proyek[$namaProyek] = true;
					$lokasiProyek[$namaProyek] = [];
				}
				$lokasiProyek[$namaProyek][] = $namaLokasi;
			}
		}
		foreach ($lokasiProyek as $namaProyek => $lokasi) { ?>
			<div class="flex flex-col bg-gray-800 p-4">
				<div class="mb-4">
					<h2 class="text-2xl text-center my-2"><?= htmlspecialchars($namaProyek) ?></h2>
					<div class="flex flex-col gap-2">
						<h2 class="text-sm"> Client : <?= htmlspecialchars($client) ?></h2>
						<h2 class="text-sm"> Pimpinan Proyek : <?= htmlspecialchars($pimpinanProyek) ?></h2>
						<div class="flex flex-row justify-between">
							<h2 class="text-sm"> Mulai : <?php $a = new Datetime($tglMulai); echo $a->format('Y-m-d'); ?></h2>
							<h2 class="text-sm"> Selesai : <?php $a = new Datetime($tglSelesai); echo $a->format('Y-m-d'); ?></h2>
						</div>
						<h2 class="text-sm"><?= htmlspecialchars($keterangan) ?></h2>
					</div>
				</div>
				<hr>
				<h2 class="my-2">Lokasi Terdampak</h2>
				<hr>
				<div class="grid grid-cols-2 text-center my-4 gap-2">
					<?php foreach ($lokasi as $dl) { ?>
						<div><?= htmlspecialchars($dl) ?></div>
					<?php } ?>
				</div>
				<hr>
			</div>
		<?php } ?>
	</div>
		
</div>

<div class="p-4 bg-gray-700 mt-4">
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>
