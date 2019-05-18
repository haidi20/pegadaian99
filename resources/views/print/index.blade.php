<!DOCTYPE html>
<!--
value
  No ID = #id_no_id
  Nama = #id_nama  //hanya untuk label yang memiliki 1 kata
  all =>
        label = #id_value
                    value = first_string
  except tanggal
label
  No ID = #id_label_no_id
  all =>
        label = #id_label_value
                    value = first_string
  except tanggal
 -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Citra 99 Jasa Gadai Syariah</title>
    <!-- <link rel="stylesheet" src="print.css" type="text/css" media="print" /> -->
    {{-- <link rel="stylesheet" href="print.css" /> --}}
    <style>
        @media print {
            a[href*='//']:after {
                content: " ("attr(href) ") ";
            }
        }

        @media print {
            a:after {
                content: " ("attr(href) ") ";
            }
        }

        @page {
            margin-top: 2cm;
            margin-bottom: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
        }

        /* not use */
        .book-date {
            page-break-after: always;
        }

        .post-content {
            page-break-before: always;
        }

        /* end of not use */
        p {
            page-break-inside: avoid;
        }

        .text-center {
            text-align: center;
        }

    </style>
</head>

<body onload="window.print()">
    <h3 class="text-center" id="id_first_title">
        <strong>CITRA 99</strong>
    </h3>
    <p class="text-center" id="id_twice_title">
        Jasa Gadai Syariah
    </p>
    <p class="text-center" id="id_alamat">
        Jl. Bhayangkara No. 51
    </p>
    <p class="text-center" id="id_telp">
        TELP. 085752506463
    </p>

    <!-- DATA FIELD & VALUE -->
    {{-- <div class="col-md-4" id="id_data"> --}}
    <label for="DATA"> <strong>DATA</strong> </label>

    <p>
        <!-- No ID -->
        <span id="id_label_no_id">No. ID</span>
        <span class="pull-right " style="margin-left: 290px"> : </span>
        <span class="pull-right" id="id_no_id">C99-03-030519-001</span>
        <!-- <br> should -->
        <!-- Nama -->
        <br />
        <span id="id_label_name">Nama</span>
        <span class="pull-right " style="margin-left: 296px">
            : <span id="id_nama">IKRAM MUHITH</span>
        </span>

        <br />
        <span id="id_label_no_telp">No. Telp</span>
        <span class="pull-right " style="margin-left: 279px">
            : <span id="id_no_telp">081545778612</span>
        </span>

        <br />
        <span id="id_label_tempo">Tempo Gadai (Titip)</span>
        <span class="pull-right " style="margin-left: 204px">
            : <span id="id_tempo">60</span> Hari
        </span>

        <br />
        <span id="id_label_uang">Uang Pinjaman</span>
        <span class="pull-right " style="margin-left: 237px">
            : Rp. <span id="id_uang">1.800.000</span>
        </span>

        <br />
        <span id="id_label_btitip">B. Titip Per 7 Hari</span>
        <span class="pull-right " style="margin-left: 218px">
            : Rp. <span id="id_btitip">85.000</span>
        </span>
    </p>
    <!-- pembayaran -->
    <label for="PEMBAYARAN"> <strong>PEMBAYARAN</strong> </label>
    <p>
        <!-- No ID -->
        <span id="id_label_tanggal">Tanggal Pembayaran</span>
        <span class="pull-right " style="margin-left: 202px"> : </span>
        <span class="pull-right" id="id_tanggal_pembayaran">03-05-2019</span>
        <!-- <br> should -->
        <!-- Nama -->
        <br />
        <span id="id_label_titip">B. Titip Minggu ke</span>
        <span class="pull-right " style="margin-left: 214px">
            : <span id="id_btitipmingguke">1-2</span>
        </span>

        <br />
        <span id="id_label_btitip">Pembayaran B. Titip</span>
        <span class="pull-right " style="margin-left: 204px">
            : Rp. <span id="id_btitip">170.000</span>
        </span>

        <br />
        <span id="id_label_badmin">Pembayaran B. Admin</span>
        <span class="pull-right " style="margin-left: 190px">
            : Rp. <span id="id_badmin">10.000</span> Hari
        </span>
    </p>
    <label for="TANGGALJATUHTEMPO">
        <strong>TANGGAL JATUH TEMPO</strong>
        <span class="pull-right " style="margin-left: 138px">
            : <strong><span id="id_tempo">17-05-2019</span></strong>
        </span>
    </label>

    <!-- notification -->
    <p class="text-center" style="padding: 2px 100px 2px 100px">
        <label for="notification" id="id_middlnotif">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
            optio ullam id? Dolor quas tempora doloribus
        </label>
    </p>
    <p style="margin-top: 50px">
        &nbsp;
    </p>
    <label for="signature">
        <span style="margin-left: 150px" id="id_petugas1">Petugas1</span>
        <span style="margin-left: 240px" id="id_petugas2">Petugas2</span>
    </label>
    <p style="margin-top: 100px">
        &nbsp;
    </p>
    <label for="signature2">
        <span style="margin-left: 110px" id="id_hr1">
            <!-- <hr width="120px" /> -->
            <span>__________________</span>
        </span>

        <span style="margin-left: 150px" id="id_hr1">
            <!-- <hr width="120px" /> -->
            <span>__________________</span>
        </span>
    </label>
    <p style="margin-top: 40px">
        &nbsp;
    </p>

    <!-- notification bottom -->
    <p class="text-center" style="padding: 2px 120px 2px 120px">
        <label for="notification" id="id_bottomnotif">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
            optio ullam id? Dolor quas tempora doloribus
        </label>
    </p>
    {{-- </div> --}}
</body>

</html>