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
            .print{
                display:none;
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

<body >
    <button onClick="window.print()" class="print">Print</button>
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
        <span class="pull-right" id="id_no_id">{{$data['no_id']}}</span>
        <!-- <br> should -->
        <!-- Nama -->
        <br />
        <span id="id_label_name">Nama</span>
        <span class="pull-right " style="margin-left: 296px">
            : <span id="id_nama">{{$data['nama_lengkap']}}</span>
        </span>

        <br />
        <span id="id_label_no_telp">No. Telp</span>
        <span class="pull-right " style="margin-left: 279px">
            : <span id="id_no_telp">{{$data['no_telp']}}</span>
        </span>

        <br />
        <span id="id_label_tempo">Tempo Gadai (Titip)</span>
        <span class="pull-right " style="margin-left: 204px">
            : <span id="id_tempo">{{$data['jangka_waktu_akad']}}</span> Hari
        </span>

        <br />
        <span id="id_label_uang">Uang Pinjaman</span>
        <span class="pull-right " style="margin-left: 237px">
            : Rp. <span id="id_uang">{{$data['marhun_bih']}}</span>
        </span>

        <br />
        @if($data['nilai_opsi_pembayaran'] == 1)
            <span id="id_label_btitip">B. Titip Per harian</span>
            <span class="pull-right " style="margin-left: 218px">
                : Rp. <span id="id_btitip">{{$data['jml_bt_yang_dibayar']}}</span>
            </span>
        @elseif($data['nilai_opsi_pembayaran'] == 7)
            <span id="id_label_btitip">B. Titip Per {{$data['nilai_opsi_pembayaran']}} Hari</span>
            <span class="pull-right " style="margin-left: 218px">
                : Rp. <span id="id_btitip">{{$data['jml_bt_yang_dibayar']}}</span>
            </span>
        @elseif($data['nilai_opsi_pembayaran'] == 15)
            <span id="id_label_btitip">B. Titip Per {{$data['nilai_opsi_pembayaran']}} Hari</span>
            <span class="pull-right " style="margin-left: 210px">
                : Rp. <span id="id_btitip">{{$data['jml_bt_yang_dibayar']}}</span>
            </span>
        @endif
    </p>
    <!-- pembayaran -->
    <label for="PEMBAYARAN"> <strong>PEMBAYARAN</strong> </label>
    <p>
        <!-- No ID -->
        <span id="id_label_tanggal">Tanggal Pembayaran</span>
        <span class="pull-right " style="margin-left: 202px"> : </span>
        <span class="pull-right" id="id_tanggal_pembayaran">{{$data['tanggal_akad']}}</span>
        <!-- <br> should -->
        <!-- Nama -->
        <br />
        <span id="id_label_titip">B. Titip Minggu ke</span>
        <span class="pull-right " style="margin-left: 214px">
            : <span id="id_btitipmingguke">{{$data['biaya_titip_minggu_ke']}}</span>
        </span>

        <br />
        <span id="id_label_btitip">Pembayaran B. Titip</span>
        <span class="pull-right " style="margin-left: 204px">
            : Rp. <span id="id_btitip">{{$data['biaya_titip']}}</span>
        </span>

        <br />
        <span id="id_label_badmin">Pembayaran B. Admin</span>
        <span class="pull-right " style="margin-left: 190px">
            : Rp. <span id="id_badmin">{{$data['biaya_admin']}}</span> Hari
        </span>
    </p>
    <label for="TANGGALJATUHTEMPO">
        <strong>TANGGAL JATUH TEMPO</strong>
        <span class="pull-right " style="margin-left: 138px">
            : <strong><span id="id_tempo">{{$data['tanggal_jatuh_tempo']}}</span></strong>
        </span>
    </label>

    <!-- notification -->
    <p class="text-center" style="padding: 2px 100px 2px 100px">
        {{-- <label for="notification" id="id_middlnotif">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
            optio ullam id? Dolor quas tempora doloribus
        </label> --}}
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
        {{-- <label for="notification" id="id_bottomnotif">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
            optio ullam id? Dolor quas tempora doloribus
        </label> --}}
    </p>
    {{-- </div> --}}
    <script type="text/javascript" src="{{asset('adminty/files/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
    <script>
        var data = '{{json_encode($input)}}';
        
        if(data){
            $.redirect('{{$url_pdf}}', {
                kota: '{{$data["kota"]}}',
                no_id: '{{$data["no_id"]}}',
                alamat: '{{$data["alamat"]}}',
                no_telp: '{{$data["no_telp"]}}',
                jenis_id: '{{$data["jenis_id"]}}',
                terbilang: '{{$data["terbilang"]}}',
                kekurangan: '{{$data["kekurangan"]}}',
                marhun_bih: '{{$data["marhun_bih"]}}',
                key_nasabah: '{{$data["key_nasabah"]}}',
                biaya_admin: '{{$data["biaya_admin"]}}',
                kelengkapan: '{{$data["kelengkapan"]}}',
                nama_barang: '{{$data["nama_barang"]}}',
                biaya_titip: '{{$data["biaya_titip"]}}',
                nama_lengkap: '{{$data["nama_lengkap"]}}',
                tanggal_akad: '{{$data["tanggal_akad"]}}',
                jenis_barang: '{{$data["jenis_barang"]}}',
                no_identitas: '{{$data["no_identitas"]}}',
                nama_lengkap: '{{$data["nama_lengkap"]}}',
                jenis_kelamin: '{{$data["jenis_kelamin"]}}',
                tanggal_lahir: '{{$data["tanggal_lahir"]}}',
                taksiran_marhun: '{{$data["taksiran_marhun"]}}',
                jangka_waktu_akad: '{{$data["jangka_waktu_akad"]}}',
                tanggal_jatuh_tempo: '{{$data["tanggal_jatuh_tempo"]}}',
                jml_bt_yang_dibayar: '{{$data["jml_bt_yang_dibayar"]}}',
                biaya_titip_minggu_ke: '{{$data["biaya_titip_minggu_ke"]}}',
            }, "GET", "_blank");
        }
    </script>
</body>

</html>