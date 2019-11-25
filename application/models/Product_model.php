<?php defined('BASEPATH') or exit ('No Direct Script Access Allowed');
class Product_model extends CI_Model {
	private $_table ="film";

	public $id_film;
	public $nama_film;
	public $tahun;
	public $genre;

	public function rules(){
		return[
			['field' => 'nama_film',
			'label' => 'Nama Film',
			'rules' => 'required'],

			['field' => 'Tahun',
			'label' => 'Tahun',
			'rules' => 'numeric'],

			['field' => 'genre',
			'label' => 'Genre',
			'rules' => 'required']
		];
	}
	public function getAll(){
		return $this->db->get($this->_table)->result();
	}
	public function getById($id){
		return $this->db->get_where($this->_table, ["id_film" => $id]) ->row();
	}
	public function save(){
		$post = $this->input->post();
		$this->id_film = uniqid();
		$this->nama_film = $post["nama_film"];
		$this->tahun = $post["tahun"];
		$this->genre = $post["genre"];
		$this->db->insert($this->_table, $this);
	}
	public function update(){
		$post = $this->input->post();
		$this->id_film = uniqid();
		$this->nama_film = $post["nama_film"];
		$this->tahun = $post["tahun"];
		$this->genre = $post["genre"];
		$this->db->insert($this->_table, $this, array('id_film' => $post['id']));
	}
	public function delete(){
		return $this->db->delete($this->_table, array("id_film" => $id));
	}
}
?>