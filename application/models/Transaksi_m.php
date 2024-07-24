<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {
    public function get($id = null)
    {   
        $this->db->from('transaksi');
        if ($id != null) {
            $this->db->where('id_transaksi', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getTransaksi(){
        $this->db->select('*')->from('transaksi');
        return $this->db->get()->result_array();
    }

    public function filterTotalPemasukkan($tanggal1, $tanggal2){
        $pemasukan = $this->db->query("SELECT sum(nominal) as pemasukan from transaksi where tanggal BETWEEN '$tanggal1' AND '$tanggal2' AND jenis_transaksi='Pemasukan'");
        return $pemasukan->row_array();
    }
    public function filterTotalPengeluaran($tanggal1, $tanggal2){
        $pengeluaran = $this->db->query("SELECT sum(nominal) as pengeluaran from transaksi where tanggal BETWEEN '$tanggal1' AND '$tanggal2' AND jenis_transaksi='Pengeluaran'");
        return $pengeluaran->row_array();
    }
    public function filterByTanggal($tanggal1, $tanggal2)
    {
        $query = $this->db->query("SELECT * FROM transaksi WHERE tanggal BETWEEN '$tanggal1' AND '$tanggal2'");
        return $query->result_array();
}
    public function saldo_awal($tanggal){
        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'Pemasukan');
        $this->db->where('tanggal <',$tanggal);
        $pemasukan = $this->db->get()->row()->total;

        $this->db->select('sum(nominal) as total')->from('transaksi');
        $this->db->where('jenis_transaksi', 'Pengeluaran');
        $this->db->where('tanggal <',$tanggal);
        $pengeluaran = $this->db->get()->row()->total;

        $saldo = $pemasukan - $pengeluaran;
        return $saldo;

    }
    
}