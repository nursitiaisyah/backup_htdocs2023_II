<?php

  // define ('SITE_ROOT', realpath(dirname(__FILE__)));
  require_once __DIR__ . './../../asset/vendor/mPDF-8/autoload.php';
  require __DIR__ . './../../load/function.php';

  $pelanggan = viewAllData("tbl_pelanggan");
  $reportDate = date('l, d M Y');

  $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./../../asset/css/style.laporan.css" type="text/css">
      <title>Laporan Data Pelanggan</title>
    </head>

    <body>
      <h1>Laporan Data Pelanggan</h1>
      <p>'. $reportDate .'</p>
      <table border="1">
        <thead>
          <tr>
            <th>No</th>
            <th>Id Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Alamat Pelanggan</th>
            <th>No Handphone</th>
          </tr>
        </thead>
        <tbody>';
        $no = 1;
        foreach ($pelanggan as $data) {
        $html .= '
          <tr>
            <td>'. $no++ .'</td>
            <td>'. $data['id'] .'</td>
            <td>'. $data['nama'] .'</td>
            <td>'. $data['alamat'] .'</td>
            <td>'. $data['no_hp'] .'</td>
          </tr>';
        }

  $html .= '
        </tbody>
      </table>
    </body>
    </html>
  '; 

  $mpdf = new \Mpdf\Mpdf();
  
  $date = date('d-M-Y');
  $mpdf->setFooter('{PAGENO}');
  $mpdf->WriteHTML($html);
  $mpdf->Output($date. '-Laporan-Data-Pelanggan.pdf', 'I');
?>