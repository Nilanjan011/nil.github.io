<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
	}
	function index(){
		$this->load->view('v_barang');
	}

	function data_barang(){
		$data=$this->m_barang->barang_list();
		$result=[];
		$i=1;
		$edit='';
		foreach ($data as $key => $value) {
			$edit='<a href="javascript:;" class="btn btn-info btn-xs" onclick="editdata('.$value['barang_kode'].')" >Edit</a>';
			// $edit='<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'.$value['barang_kode'].'">Edit</a>';

			$result['data'][]=[
				$value['barang_kode'],
				$value["barang_nama"],
				$value['barang_harga'],
				$edit
			];
		}
		
		echo json_encode($result);
	}

	function get_barang(){
		$kobar=$this->input->get('id');
		$data=$this->m_barang->get_barang_by_kode($kobar);
		echo json_encode($data);
	}

	function simpan_barang(){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$harga=$this->input->post('harga');
		$data=$this->m_barang->simpan_barang($kobar,$nabar,$harga);
		echo json_encode($data);
	}

	function update_barang(){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$harga=$this->input->post('harga');
		$data=$this->m_barang->update_barang($kobar,$nabar,$harga);
		echo json_encode($data);
	}

	function hapus_barang(){
		$kobar=$this->input->post('kode');
		$data=$this->m_barang->hapus_barang($kobar);
		echo json_encode($data);
	}

}