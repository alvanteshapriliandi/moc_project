<?php

    include('database/koneksi.php');

    class Gudang
    {
        private $koneksi;

        public function __construct()
        {
            $koneksi = new Koneksi;
            $this->koneksi = $koneksi;
        }

        function index($tbl_name, $params = [])
        {
            $add_on_query = null;

            if (count($params) > 0 && !is_null($params['nama']) && $params['nama']) {
                $add_on_query .= " where nama LIKE '%".$params['nama']."%'";
            }

            $sql = "SELECT * FROM " . $tbl_name . $add_on_query;
            $row = $this->koneksi->get()->prepare($sql);
            $row->execute();
            $hasil = $row->fetchAll();
            return $hasil;
        }

        function detail ($tbl_name, $id) 
        {
            $sql = "SELECT * FROM $tbl_name WHERE id= ?";
            $row = $this->koneksi->get()->prepare($sql);
            $row->execute(array($id));
            $hasil = $row->fetch();
            return $hasil;
        }

        function create ($tbl_name, $request) {
            $sql = 'INSERT INTO '.$tbl_name.' (nama,deskripsi,harga_modal,harga_jual,stok,tgl_masuk)VALUES (?,?,?,?,?,?)';
            $row = $this->koneksi->get()->prepare($sql);
            $row = $row->execute($request);
            return $row;
        }

        function update ($tbl_name, $request) {
            $sql = 'UPDATE '.$tbl_name.' set nama = ?, deskripsi=?, harga_modal=?, harga_jual=?, stok=?,tgl_masuk=? WHERE id=?';
            $row = $this->koneksi->get()->prepare($sql);
            $row = $row->execute($request);
            return $row;
        }

        function delete($tbl_name, $id)
        {
            $sql = "DELETE FROM " . $tbl_name . " where id = ?";
            $row = $this->koneksi->get()->prepare($sql);
            $row = $row->execute(array($id));
            return $row;
        }
        
    }
    