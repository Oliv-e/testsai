<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    
	public function tambah()
	{
		$this->load->view('tambah_proyek');
	}
    public function edit()
	{
        function url($url){
			$uri = $url;
			$ch = curl_init($uri);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			$response = curl_exec($ch);
			curl_close($ch);
			return json_decode($response, true);
		}
        $dataProyek = url('http://localhost:8080/proyek');
		$this->load->view('edit_proyek', ['data' => $dataProyek]);
	}
    public function hapus()
	{
        function url($url){
			$uri = $url;
			$ch = curl_init($uri);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			$response = curl_exec($ch);
			curl_close($ch);
			return json_decode($response, true);
		}
        $dataProyek = url('http://localhost:8080/proyek');
		$this->load->view('hapus_proyek', ['data' => $dataProyek]);
	}
}
