<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdata extends Model
{
    public function getPengarang()
    {
        // $db      = \Config\Database::connect();
        // $builder = $db->table('pengarang');
        $sql = "SELECT * FROM pengarang ORDER BY Nama_Pengarang";
        $dt = db_connect()->query($sql);

        // $dt = $builder->get();
        if ($dt) {
            return $dt->getResultArray();
        } else {
            return 0;
        }
    }

    public function getPenerbit()
    {

        $sql = "SELECT * FROM penerbit ORDER BY Nama_Penerbit";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getResultArray();
        } else {
            return 0;
        }
    }

    public function getTotalBuku()
    {

        $sql = "SELECT COUNT(*) AS Jumlah FROM buku";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function getMaxTahun()
    {
        $sql = "SELECT Tahun_Terbit, COUNT(*) AS Jumlah FROM buku GROUP BY Tahun_Terbit ORDER BY COUNT(*) DESC LIMIT 1 ";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function getMaxPenerbit()
    {
        $sql = "SELECT Penerbit, COUNT(*) AS Jumlah FROM buku_view GROUP BY Penerbit ORDER BY COUNT(*) DESC LIMIT 1";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function getMaxRak()
    {
        $sql = "SELECT SUBSTRING(Rak, 1, 1) AS Rak, COUNT(*) AS Jumlah FROM buku GROUP BY SUBSTRING(Rak, 1,1) ORDER BY COUNT(*) DESC LIMIT 1";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function getminTahun()
    {
        $sql = "SELECT Tahun_Terbit, COUNT(*) AS Jumlah FROM buku GROUP BY Tahun_Terbit ORDER BY COUNT(*) ASC LIMIT 1 ";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function getminPenerbit()
    {
        $sql = "SELECT Penerbit, COUNT(*) AS Jumlah FROM buku_view GROUP BY Penerbit ORDER BY COUNT(*) ASC LIMIT 1";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function getminRak()
    {
        $sql = "SELECT SUBSTRING(Rak, 1, 1) AS Rak, COUNT(*) AS Jumlah FROM buku GROUP BY SUBSTRING(Rak, 1,1) ORDER BY COUNT(*) ASC LIMIT 1";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getRowArray();
        } else {
            return 0;
        }
    }

    public function TambahData($kode, $judul, $isbn, $pengarang, $penerbit, $tahun, $rak)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('buku');
        $data = [
            'Kode_Buku' => $kode,
            'Judul' => $judul,
            'ID_Pengarang' => $pengarang,
            'ID_Penerbit' => $penerbit,
            'ISBN' => $isbn,
            'Tahun_Terbit' => $tahun,
            'Rak' => $rak
        ];
        $dt = $builder->insert($data);
        if ($dt) {
            return "1";
        } else {
            return "0";
        }
    }

    public function getbook()
    {
        $sql = "SELECT * FROM buku 
        INNER JOIN penerbit ON buku.ID_Penerbit = penerbit.ID_Penerbit
        INNER JOIN pengarang ON buku.ID_Pengarang = pengarang.ID_Pengarang";
        $dt = db_connect()->query($sql);
        return $dt;
    }

    public function Book()
    {
        $sql = "SELECT * FROM buku 
        INNER JOIN penerbit ON buku.ID_Penerbit = penerbit.ID_Penerbit
        INNER JOIN pengarang ON buku.ID_Pengarang = pengarang.ID_Pengarang";
        // $sql = "SELECT * FROM penerbit";
        $dt = db_connect()->query($sql);
        return $dt;
    }

    public function AmbilData($id)
    {
        $sql = "SELECT * FROM buku 
        INNER JOIN penerbit ON buku.ID_Penerbit = penerbit.ID_Penerbit
        INNER JOIN pengarang ON buku.ID_Pengarang = pengarang.ID_Pengarang
        WHERE Kode_Buku = '$id'";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getResult();
        } else {
            return 0;
        }
    }

    public function UpdateData($kode, $judul, $isbn, $pengarang, $penerbit, $tahun, $rak)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('buku');
        $data = [
            'Kode_Buku' => $kode,
            'Judul' => $judul,
            'ID_Pengarang' => $pengarang,
            'ID_Penerbit' => $penerbit,
            'ISBN' => $isbn,
            'Tahun_Terbit' => $tahun,
            'Rak' => $rak
        ];
        $builder->where('Kode_Buku', $kode);
        $dt = $builder->replace($data);
        if ($dt) {
            return "1";
        } else {
            return "0";
        }
    }

    public function DelData($kode)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('buku');
        $builder->where('Kode_Buku', $kode);
        $dt = $builder->delete();
        if ($dt) {
            return "1";
        } else {
            return "0";
        }
    }

    public function getbuku()
    {
        $sql = "SELECT * FROM buku JOIN pengarang ON buku.ID_Pengarang = pengarang.ID_Pengarang JOIN penerbit ON buku.ID_Penerbit=penerbit.ID_Penerbit";
        $dt = db_connect()->query($sql);
        $data['data'] = $dt->getResult();
        return $data;
    }

    public function getbukuid($id)
    {
        $sql = "SELECT * FROM buku JOIN pengarang ON buku.ID_Pengarang = pengarang.ID_Pengarang JOIN penerbit ON buku.ID_Penerbit=penerbit.ID_Penerbit WHERE buku.Kode_Buku = '$id'";
        $dt = db_connect()->query($sql);
        $data['data'] = $dt->getRow();
        return $data;
    }

    public function get_buku_pertahun()
    {
        $sql = "SELECT Tahun_Terbit, COUNT(*) AS Jumlah FROM buku GROUP BY Tahun_Terbit ORDER BY Tahun_Terbit";
        $dt = db_connect()->query($sql);
        if ($dt) {
            return $dt->getResultArray();
        } else {
            return 0;
        }
    }
}
