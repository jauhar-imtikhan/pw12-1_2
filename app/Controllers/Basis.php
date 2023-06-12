<?php

namespace App\Controllers;

use App\Libraries\SimpleXLSXGen;
use App\Models\Mdata;
use TCPDF;

class Basis extends BaseController
{
    public function index()
    {
        $dtx = new Mdata();
        $x["hal"] = "beranda";
        $x['jmlbuku'] = $dtx->getTotalBuku();
        $x['maxtahun'] = $dtx->getMaxTahun();
        $x['maxpenerbit'] = $dtx->getMaxPenerbit();
        $x['maxrak'] = $dtx->getMaxRak();
        $x['dtbuku'] = $dtx->get_buku_pertahun();
        $x['dtpenerbit'] = $dtx->getPenerbit();
        return view('home', $x);
    }

    public function data()
    {
        $dtx = new Mdata();
        $x["hal"] = "book";
        $x['databuku'] = $dtx->getbook();
        $x['dtpenerbit'] = $dtx->getPenerbit();
        $x['dtpengarang'] = $dtx->getPengarang();
        return view('home', $x);
    }

    public function AddBuku()
    {
        $session = \Config\Services::session();
        $dtx = new Mdata();
        $kode = $this->request->getVar('txtkodex');
        $judul = $this->request->getVar('txtjudulx');
        $isbn = $this->request->getVar('txtISBNx');
        $pengarang = $this->request->getVar('txtpengarangx');
        $penerbit = $this->request->getVar('txtpenerbitx');
        $tahun = $this->request->getVar('txttahunx');
        $rak = $this->request->getVar('txtrakx');
        $prosess = $dtx->TambahData($kode, $judul, $isbn, $pengarang, $penerbit, $tahun, $rak);
        if ($prosess == "1") {
            $session->setFlashdata('success', 'Data Berhasil Ditambahkan!');
            return redirect('bookdata');
        } else {
            $session->setFlashdata('gagal', 'Gagal menambahkan data!');
        }
    }

    private function os()
    {
        $ux = $_SERVER["HTTP_USER_AGENT"];
        if (preg_match("/linux/i", $ux)) {
            $platform = "Linux";
        } elseif (preg_match("/macintosh|mac os x/i", $ux)) {
            $platform = "macOS";
        } elseif (preg_match("/windows|win32/i", $ux)) {
            $platform = "Windows";
        } else {
            $platform = "Tidak Di Ketahui";
        }
        return $platform;
    }

    private function mac()
    {
        ob_start();
        system('ipconfig /all');
        $mykom = ob_get_contents();
        ob_clean();
        $findme = "Physical";
        $pmac = strpos($mykom, $findme);
        $mac  = substr($mykom, ($pmac + 36), 17);
        return $mac;
    }

    private function serial()
    {
        $seri = shell_exec('wmic diskdrive get serialnumber');
        return $seri;
    }

    public function tentang()
    {
        $x["hal"] = "tentang";
        $x["os"] = $this->os();
        $x["mac"] = $this->mac();
        $getserial = $x["os"] == "windows" ? $this->serial() : "Tidak Terdeteksi";
        $x["serial"] = str_replace("Serial Number", "", $getserial);
        return view('home', $x);
    }

    public function tugas()
    {
        $dtx = new Mdata();
        $x['minjmlbuku'] = $dtx->getTotalBuku();
        $x['mintahun'] = $dtx->getminTahun();
        $x['minpenerbit'] = $dtx->getminPenerbit();
        $x['minrak'] = $dtx->getminRak();
        $x['hal'] = "tugas";
        return view('home', $x);
    }

    public function getDataBuku()
    {
        $model = new Mdata();
        $data = $model->getbuku();
        $result = $this->response->setJSON($data);
        return $result;
    }

    public function getDataBukuId($id)
    {
        $model = new Mdata();
        $data = $model->getbukuid($id);
        $result = $this->response->setJSON($data);
        return $result;
    }

    public function update()
    {
        $dtx = new Mdata();
        $kode = $this->request->getVar('txtkodexe');
        $judul = $this->request->getVar('txtjudulxe');
        $isbn = $this->request->getVar('txtISBNxe');
        $pengarang = $this->request->getVar('txtpengarangxe');
        $penerbit = $this->request->getVar('txtpenerbitxe');
        $tahun = $this->request->getVar('txttahunxe');
        $rak = $this->request->getVar('txtrakxe');
        $prosess = $dtx->UpdateData($kode, $judul, $isbn, $pengarang, $penerbit, $tahun, $rak);
        if ($prosess == "1") {
            $message['icon'] = "success";
            $message['title'] = "Berhasil";
            $message['text'] = "Berhasil Update Data!";
            return $this->response->setJSON($message);
        } else {
            $message['icon'] = "error";
            $message['title'] = "Gagal";
            $message['text'] = "Gagal Update Data!";
            return $this->response->setJSON($message);
        }
    }

    public function delete($id)
    {
        $dtx = new Mdata();
        $process = $dtx->DelData($id);
        if ($process == '1') {
            $message['icon'] = "success";
            $message['title'] = "Berhasil";
            $message['text'] = "Berhasil Hapus Data!";
            return $this->response->setJSON($message);
        } else {
            $message['icon'] = "error";
            $message['title'] = "Gagal";
            $message['text'] = "Gagal Hapus Data!";
            return $this->response->setJSON($message);
        }
    }

    public function barang()
    {
        $x['hal'] = "product";
        return view('home', $x);
    }

    public function pdfdinamis()
    {
        $dtx = new Mdata();
        $x['dtbuku'] = $dtx->getbook();
        $html = view('print', $x, [true]);
        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Jauhar Imtikhan');
        $pdf->SetTitle('Daftar Buku');
        $pdf->SetSubject('Daftar Buku');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document

        $pdf->Output('data_buku.pdf', 'D');
    }

    public function pdfstatis()
    {
        $html = "<h1>Cetak PDF Statis</h1>";
        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Jauhar Imtikhan');
        $pdf->SetTitle('Daftar Buku');
        $pdf->SetSubject('Daftar Buku');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document

        $pdf->Output('pdfstatis.pdf', 'D');
    }

    public function excelstatis()
    {
        $data = new SimpleXLSXGen();
        $mydata = [
            ['Kolom 1', 'Kolom 2', 'Kolom 3'],
            ['Cell 1-1', 'Cell 1-2', 'Cell 1-3'],
            ['Cell 2-1', 'Cell 2-2', 'Cell 3-3']
        ];

        $excel = $data->fromArray($mydata);
        $excel->downloadAs('statis.xlsx');
    }

    public function exceldinamis()
    {
        $excel = new SimpleXLSXGen();
        $model = new Mdata();
        $data = [];
        array_push($data, ["<b><center>Daftar Buku</center></b>"]);
        array_push($data, ["<b><center>Kode Buku</center></b>", "<b>Judul</b>", "<b>Pengarang</b>", "<b>Penerbit</b>"]);
        $databuku = $model->getbook();
        foreach ($databuku->getResultArray() as  $items) {
            $kode = $items['Kode_Buku'];
            $judul = $items['Judul'];
            $pengarang = $items['Nama_Pengarang'];
            $penerbit = $items['Nama_Penerbit'];
            array_push($data, ["<center>$kode</center>", $judul, $pengarang, $penerbit]);
        }
        $wrapdatas = $excel->fromArray($data);
        $wrapdatas->mergeCells('A1:D1');
        $wrapdatas->setColWidth(2, 75);
        $wrapdatas->setColWidth(3, 40);
        $wrapdatas->setColWidth(4, 40);
        $wrapdatas->downloadAs('daftar_buku_dinamis.xlsx');
    }

    public function getGrafik($id)
    {
        $db      = \Config\Database::connect();

        $sql = "SELECT Tahun_Terbit, COUNT(*) AS Jumlah FROM buku WHERE ID_Penerbit = '$id' GROUP BY Tahun_Terbit ORDER BY Tahun_Terbit";
        $result = $db->query($sql)->getResultArray();
        return $this->response->setJSON($result);
    }

    public function RekapDashboard($jenis = false, $nilai = false)
    {
        $dtx = new Mdata();

        if ($jenis == "bytahun") {
            $sql = sprintf("SELECT Judul FROM buku WHERE Tahun_Terbit = '%s'", $nilai);
        } else if ($jenis == "bypenerbit") {
            $sql = sprintf("SELECT Judul FROM buku_view WHERE Penerbit = '%s'", $nilai);
        } else {
            $sql = "SELECT Judul FROM buku WHERE Rak LIKE '" . $nilai . "%'";
        }
        $result = $dtx->RekapDashboard($sql);
        echo json_encode($result);
    }

    function geTugas()
    {
        $sql = "SELECT Tahun_Terbit, COUNT(*) AS Jumlah FROM buku GROUP BY Tahun_Terbit ORDER BY COUNT(*) ASC ";
        $dt = db_connect()->query($sql);
        $sql1 = "SELECT Penerbit, COUNT(*) AS Jumlah FROM buku_view GROUP BY Penerbit ORDER BY COUNT(*) ASC ";
        $dt_1 = db_connect()->query($sql1);
        $sql2 = "SELECT SUBSTRING(Rak, 1, 1) AS Rak, COUNT(*) AS Jumlah FROM buku GROUP BY SUBSTRING(Rak, 1,1) ORDER BY COUNT(*) ASC ";
        $dt_2 = db_connect()->query($sql2);
        if ($dt || $dt_1 || $dt_2) {
            $tahun = [];
            foreach ($dt->getResultArray() as $das) {
                if ($das['Jumlah'] == '1') {
                    $tahun[] = $das['Tahun_Terbit'];
                }
            }
            $rak = [];
            foreach ($dt_2->getResultArray() as $f) {
                if ($f['Jumlah'] == '1') {
                    $rak[] = $f['Rak'];
                }
            }
            $penerbit = [];
            foreach ($dt_1->getResultArray() as $p) {
                if ($p['Jumlah'] == '1') {
                    $penerbit[] = $p['Penerbit'];
                }
            }
            $datas['data'] = [
                'tahun' => $tahun,
                'rak' => $rak,
                'penerbit' => $penerbit
            ];
            return $this->response->setJSON($datas);
        } else {
            return 0;
        }
    }
}
