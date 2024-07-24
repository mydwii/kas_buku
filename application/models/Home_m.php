<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model {
     public function getTotalPemasukan(){
        // $pemasukan = "SELECT sum(nominal) as pemasukan FROM transaksi WHERE jenis_transaksi = 'Pemasukan' ORDER BY sum(nominal)";
        // $this->db->from('transaksi');
        $this->db->select_sum('nominal');
        $this->db->from('transaksi');
        return $this->db->get_where('', array('jenis_transaksi' => 'Pemasukan'))->row_array();}

    public function getTotalPengeluaran(){
            $this->db->select_sum('nominal');
            $this->db->from('transaksi');
            return $this->db->get_where('', array('jenis_transaksi' => 'Pengeluaran'))->row_array();}

   
    
}
