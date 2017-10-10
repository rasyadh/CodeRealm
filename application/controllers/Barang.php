<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    function index(){
        $this->load->model('model_barang');
        $title['title'] = "Daftar Barang";
        $data['barang'] = $this->model_barang->list_barang()->result();
        $this->load->view('templates/header', $title);
        $this->load->view('list_barang', $data);
        $this->load->view('templates/footer');
    }

    function input(){
        $title['title'] = "Input Barang";
        $this->load->view('templates/header', $title);
        $this->load->view('input_barang');
        $this->load->view('templates/footer');
    }

    function save_input(){
        if (!empty($this->input->post('kode_barang')) && !empty($this->input->post('nama_barang')) && !empty($this->input->post('harga'))) {
            $data_barang = array(
                'kode_barang'   =>  $this->input->post('kode_barang'),
                'nama_barang'   =>  $this->input->post('nama_barang'),
                'harga'         =>  $this->input->post('harga')
            );
            $this->db->insert('barang', $data_barang);
            redirect('barang');
        }
        else {
            redirect('barang/input');
        }
    }

    function edit(){
        $this->load->model('model_barang');
        $kode_barang = $this->uri->segment(3);
        $title['title'] = "Edit Barang";
        $data['product'] = $this->model_barang->product($kode_barang)->row_array();
        $this->load->view('templates/header', $title);
        $this->load->view('edit_barang', $data);
        $this->load->view('templates/footer');
    }

    function save_edit(){
        $id = $this->input->post('id');
        $data_barang = array(
            'kode_barang'   =>  $this->input->post('kode_barang'),
            'nama_barang'   =>  $this->input->post('nama_barang'),
            'harga'         =>  $this->input->post('harga_barang')
        );

        $this->db->where('kode_barang', $id);
        $this->db->update('barang', $data_barang);
        redirect('barang');
    }

    function delete(){
        $kode_barang = $this->uri->segment(3);
        $this->db->where('kode_barang', $kode_barang);
        $this->db->delete('barang');
        redirect('barang');
    }

    function money_parser($data){
        $result = array();
        $datas = str_split($data);

        for ($i = strlen($data) - 1; $i >= 0; $i--){
            if (strcasecmp(".", $datas[$i])){
                //$result[$i] = $datas[$i];
                array_push($result, $datas[$i]);
            }
        }

        $strHasil = "";
        $x = 1;

        for ($i = 0; $i < count($result); $i++){
            if ($x == 3 && $i != (count($result) -1)){
                $strHasil = ".".$result[$i].$strHasil;
                $x = 0;
            }
            else {
                $strHasil = $result[$i].$strHasil;
            }
            $x++;
        }

        return $strHasil;
    }
}