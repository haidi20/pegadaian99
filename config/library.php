<?php 

return [
	// LIST MENU ON HEADER
	'menu_header' => [
		/* NOTE : 
		* url 	= for condition active which is use function requeset()->is() in helpers.php
		* name 	= for show in view menu header
		* title = just title for this menu
		* class = for name class by that menu
		* child = for sub menu
		*/
		0 => [
			 
			'name' 	=> 'Akad Baru', 
			'icon'	=> 'feather icon-file-plus',
			'route'	=> 'akad.create',
			'title'	=> 'akad',
			'class' => false,
			'child'	=> false,
		],
		1 => [
			'name' 	=> 'Cabang',
			'icon'	=> 'feather icon-list',
			'route'	=> false,
			'title'	=> 'cabang',
			'class' => 'pcoded-hasmenu',
			'child'	=> [
				0	=> [
					'url'	=> 'cabang/create',
					'name'	=> 'Tambah Cabang',
                    'route'	=> 'cabang.create',
                    'subChild' 	=> false,
				],
				1	=> [
					'url'	=> 'cabang/edit',
					'name'	=> 'Edit Cabang',
                    'route'	=> 'cabang.edit',
                    'subChild' 	=> false,
				],
				2	=> [
					'url'	=> 'cabang',
					'name'	=> 'Data Cabang',
                    'route'	=> 'cabang.index',
                    'subChild' 	=> false,
				],
			],
		],
		2 => [
			'name' 	=> 'Database',
			'icon'	=> 'icofont icofont-database',
			'route'	=> false,
			'title'	=> 'database',
			'class' => 'pcoded-hasmenu',
			'child'	=> [
				0	=> [
					'url'		=> 'nasabah',
					'name'		=> 'Data Nasabah',
					'route'		=> 'nasabah.index',
					'subChild' 	=> false,
				],
				1	=> [
					'url'		=> 'akad',
					'name'		=> 'Data Akad Nasabah',
					'route'		=> false,
                    'subChild' 	=> [
						0 => [
							'url'	=> 'akad/nasabah-akad',
							'name'	=> 'Nasabah Akad',
							'route'	=> 'akad.nasabah-akad',
						],
						1 => [
							'url'	=> 'akad/ringkasan-harian',
							'name'	=> 'Ringkasan Harian',
							'route'	=> 'akad.ringkasan-harian',
						],
						2 => [
							'url'	=> 'akad/akad-jatuh-tempo',
							'name'	=> 'Akad Jatuh Tempo',
							'route'	=> 'akad.akad-jatuh-tempo',
						],
						3 => [
							'url'	=> 'akad/pelunasan-lelang',
							'name'	=> 'Pelunasan dan Lelang',
							'route'	=> 'akad.pelunasan-lelang',
						],
						4 => [
							'url'	=> 'akad/lokasi-distribusi',
							'name'	=> 'Lokasi / Distribusi',
							'route'	=> 'akad.lokasi-distribusi',
						],
						5 => [
							'url'	=> 'akad/maintenance',
							'name'	=> 'Maintenance',
							'route'	=> 'akad.maintenance',
						],
					],
				],
			],
		],
		3 => [
			'name' 	=> 'Data Pembayaran',
			'icon'	=> 'zmdi zmdi-money',
			'route'	=> false,
			'title'	=> 'pembayaran',
			'class' => 'pcoded-hasmenu',
			'child'	=> [
				0	=> [
					'url'	=> 'pembayaran/pendapatan',
					'name'	=> 'Pendapatan',
                    'route'	=> 'pembayaran.pendapatan',
                    'subChild' 	=> false,
				],
				1	=> [
					'url'	=> 'pembayaran/bku',
					'name'	=> 'BKU',
                    'route'	=> 'pembayaran.bku',
                    'subChild' 	=> false,
				],
			],
		],
		4 => [
			'name' 	=> 'Data Permodalan',
			'icon'	=> 'zmdi zmdi-money-box',
			'route'	=> false,
			'title'	=> 'permodalan',
			'class' => 'pcoded-hasmenu',
			'child'	=> [
				0	=> [
					'url'	=> 'permodalan/create/tambah-saldo',
					'name'	=> 'Tambah Saldo',
                    'route'	=> 'permodalan.create.tambah-saldo',
                    'subChild' 	=> false,
				],
				1	=> [
					'url'	=> 'permodalan/penambahan-saldo',
					'name'	=> 'List Penambahan Saldo',
                    'route'	=> 'permodalan.penambahan',
                    'subChild' 	=> false,
				],
				2	=> [
					'url'	=> 'permodalan/create/refund-saldo',
					'name'	=> 'Refund Saldo',
                    'route'	=> 'permodalan.create.refund-saldo',
                    'subChild' 	=> false,
				],
				3	=> [
					'url'	=> 'permodalan/list-data-refund-saldo',
					'name'	=> 'List Data Refund Saldo',
                    'route'	=> 'permodalan.list.refund',
                    'subChild' 	=> false,
				],
				4	=> [
					'url'	=> 'permodalan/hutang-dan-piutang',
					'name'	=> 'Hutang dan Piutang',
                    'route'	=> 'permodalan.hutang',
                    'subChild' 	=> false,
				],
			],
		],
		5 => [
			'name' 	=> 'Biaya Operasional',
			'icon'	=> 'zmdi zmdi-settings-square',
			'route'	=> false,
			'title'	=> 'operasional',
			'class' => 'pcoded-hasmenu',
			'child'	=> [
				0	=> [
					'url'	=> 'operasional/create',
					'name'	=> 'Tambah Data',
                    'route'	=> 'operasional.create',
                    'subChild' 	=> false,
				],
				1	=> [
					'url'	=> 'operasional/data-pengeluaran',
					'name'	=> 'Data Pengeluaran',
                    'route'	=> 'operasional.pengeluaran',
                    'subChild' 	=> false,
				],
				2	=> [
					'url'	=> 'operasional/bku-admin',
					'name'	=> 'BKU Admin',
                    'route'	=> 'operasional.bku',
                    'subChild' 	=> false,
				],
				3	=> [
					'url'	=> 'operasional/hutang-dan-pembayaran',
					'name'	=> 'Hutang dan Pembayaran',
                    'route'	=> 'operasional.hutang',
                    'subChild' 	=> false,
				],
			],
		],
	],
	// LIST COLUMN ON TABLE
	'column' => [
		'akad_nasabah' => [
			'list_akad_nasabah' => [
				'nama_lengkap' 	=> 'Nama',
				'no_telp' 		=> 'No. telp',
				'no_id' 		=> 'ID',
				'nama_barang' 	=> 'Jaminan',
				'pinjaman'	 	=> 'Pinjaman',
				'tunggakan' 	=> 'Tunggakan',
				'tanggal_akad'	=> 'Tanggal Akad',
				'jatuh_tempo'	=> 'Jatuh Tempo',
				'prosedur' 		=> 'Prosedur',	
			],
			'akad_jatuh_tempo'	=> [
				'nama_lengkap' 		=> 'Nama',
				'no_telp' 			=> 'No. telp',
				'no_id' 			=> 'ID',
				'jaminan' 			=> 'Jaminan',
				'pinjaman'	 		=> 'Pinjaman',
				'b_titip_berbayar'	=> 'B. Titip Terbayar',
				'tunggakan' 		=> 'Tunggakan',
				'tanggal_akad'		=> 'Tanggal Akad',
				'jatuh_tempo'		=> 'Jatuh Tempo',
			],	
			'pelunasan_dan_lelang' => [
				'lunas' => [
					'nama_lengkap' 		=> 'Nama',
					'no_telp' 			=> 'No. telp',
					'no_id' 			=> 'ID',
					'jaminan' 			=> 'Jaminan',
					'pinjaman'	 		=> 'Pinjaman',
					'b_titip_terbayar'	=> 'B. Titip Terbayar',
					'tanggal_akad'		=> 'Tanggal Akad',
					'tanggal_pelunasan'	=> 'Tanggal Pelunasan',
				],
				'lelang' => [
					'nama_lengkap' 		=> 'Nama',
					'no_telp' 			=> 'No. telp',
					'no_id' 			=> 'ID',
					'jaminan' 			=> 'Jaminan',
					'pinjaman'	 		=> 'Pinjaman',
					'b_titip_terbayar'	=> 'B. Titip Terbayar',
					'tanggal_akad'		=> 'Tanggal Akad',
					'tanggal_lelang'	=> 'Tanggal Lelang',
					'nomor_lelang'		=> 'N. Lelang',
					'admin_lelang'		=> 'Adm. Lelang',
				],
				'refund' => [
					'nama_lengkap' 		=> 'Nama',
					'no_telp' 			=> 'No. telp',
					'no_id' 			=> 'ID',
					'jaminan' 			=> 'Jaminan',
					'pinjaman'	 		=> 'Pinjaman',
					'tunggakan' 		=> 'Tunggakan',
					'admin'				=> 'Admin',
					'nilai_terlelang'	=> 'Nilai Terlelang',
					'pengembalian'		=> 'Pengembalian',
				],
			],	
			'maintenance' => [
				'no_id' 		=> 'ID',
				'nama_lengkap' 	=> 'Nama Nasabah', 
				'nama_barang' 	=> 'Nama Barang',
				'tanggal_akad' 	=> 'Tanggal Akad',
			],
		],
		'nasabah' => [
			'nama_lengkap' 	=> 'Nama',
			'no_telp'		=> 'No Telp',
			'alamat' 		=> 'Alamat',
			'action'		=> 'Action'
		],
		'pendapatan' => [
			'list_biaya_titip' => [
				'tanggal_akad'  => 'Tanggal Transaksi',
				'nama_investor' => 'Nama',
				'no_id' 		=> 'Nomor ID',
				'total_bt'		=> 'Debit',
				'kredit'		=> 'Kredit',
				'saldo'			=> 'Saldo',
			],
			'list_biaya_administrasi' => [
				'tanggal_transaksi' => 'Tanggal Transaksi',
				'jumlah' 			=> 'Jumlah',
				'keterangan'		=> 'Keterangan',
			],
		],
		'bku' => [
			'tanggal' 	=> 'Tanggal',
			'uraian' 	=> 'Uraian',
			'debit'		=> 'debit',
			'kredit'	=> 'Kredit',
			'saldo'		=> 'Saldo',
		],
		'penambahan' => [
			'tanggal' 	=> 'Tanggal',
			'keterangan'=> 'Uraian',
			'jumlah'	=> 'Jumlah',
		],
		'list_refund' => [
			'tanggal' 	=> 'Tanggal',
			'uraian'	=> 'Uraian',
			'jumlah'	=> 'Jumlah',
		],
		'hutang_piutang'=> [
			'hp' => [
				'keterangan_hutang'	=> 'Keterangan',
				'status_hutang'		=> 'Status',
				'jumlah_hutang'		=> 'Jumlah',
			],
			'hc' => [
				'uraian_hutang'		=> 'Keterangan',
				'status'			=> 'Status',
				'jumlah'			=> 'Jumlah',
			],
			'pc' => [
				'uraian_piutang'	=> 'Keterangan',
				'status'			=> 'Status',
				'jumlah'			=> 'Jumlah',
			],
		],
		'pengeluaran' 	=> [
			'tanggal_atk'	=> 'Tanggal',
			'keterangan'	=> 'Keterangan',
			'jumlah_atk'	=> 'Jumlah',
		],
		'bku'			=> [
			'tanggal'   => 'Tanggal',
			'uraian'	=> 'Uraian',
			'debit'		=> 'Debit',
			'kredit'	=> 'Kredit',
			'saldo'		=> 'Saldo',
		],
		'hutang' 		=> [
			'jumlah'		=> 'Jumlah',
			'uraian'		=> 'Keterangan',
			'tanggal_hutang'=> 'Tanggal',
			'status_hutang'	=> 'Status',
		],
		'login' 		=> [
			'username_login'=> 'Username',
			'ip_addr' 		=> 'Alamat IP',
			'waktu_login'	=> 'Cek IN',
			'waktu_logout'	=> 'Cek OUT',
			'total'			=> 'Total',
			'status' 		=> 'Status',
		],
	],
	// LIST NAME TABLE IN FEATURE DATA AKAD NASABAH
	'name_tables' => [
		'akad_nasabah' 	=> [
			'akad_jatuh_tempo' => [
				0 => [
					'key' 	=> '7',
					'name' 	=>'List Jatuh Tempo 7 Hari',
				],
				1 => [
					'key' 	=> '15',
					'name' 	=>'List Jatuh Tempo 15 Hari',
				],
				2 => [
					'key' 	=> '30',
					'name' 	=>'List Jatuh Tempo 30 Hari',
				],
				3 => [
					'key' 	=> '60',
					'name' 	=>'List Jatuh Tempo 60 Hari',
				],
				4 => [
					'key' 	=> 'tertunggak',
					'name' 	=>'List Nasabah Tertunggak',
				],
				5 => [
					'key' 	=> 'mendekati_tempo_lelang',
					'name' 	=>'List Nasabah Mendekati Jatuh Tempo Lelang',
				],
				6 => [
					'key' 	=> 'tempo_lelang',
					'name' 	=>'List Nasabah Jatuh Tempo Lelang',
				],
				7 => [
					'key' 	=> 'tunda_lelang',
					'name' 	=>'List Nasabah Tunda Lelang',
				],
			],
			'pelunasan_dan_lelang' => [
				0 => [
					'key' => 'lunas',
					'name'=> 'List Nasabah Lunas',
				],
				1 => [
					'key' => 'lelang',
					'name'=> 'List Nasabah Lelang',
				],
				2 => [
					'key' => 'refund',
					'name'=> 'List Nasabah Refund',
				],
			],
		],	
		'hutang_piutang'=> [
			0 => [
				'key' 	=> 'hp',
				'name' 	=> 'Hutang Personal',
			],
			1 => [
				'key' 	=> 'hc',
				'name' 	=> 'Hutang Cabang',
			],
			2 => [
				'key' 	=> 'pc',
				'name' 	=> 'Piutang Cabang',
			],
		],
		'lokasi_distribusi' => [
			0 => [
				'key' 	=> 'kantor',
				'name' 	=> 'Lokasi Kantor',
			],
			1 => [
				'key' 	=> 'proses',
				'name' 	=> 'Sedang Proses',
			],
			2 => [
				'key' 	=> 'gudang',
				'name' 	=> 'Lokasi Gudang',
			],
		] 
	],
	// LIST 'JATUH TEMPO' in AKAD FORM
	'form' => [
		'akad' => [
			'list_time' => [
				0 => [
					'text'	=> '7 Hari',
					'value' => 7,	
				],
				1 => [
					'text'	=> '15 Hari',
					'value' => 15,	
				],
				2 => [
					'text'	=> '30 Hari',
					'value' => 30,	
				],
				3 => [
					'text'	=> '60 Hari',
					'value' => 60,	
				],
			],
			'payment_option' => [
				0 => [
					'text'	=> 'Harian',
					'value' => 1,	
				],
				1 => [
					'text'	=> '7 Hari',
					'value' => 7,	
				],
				2 => [
					'text'	=> '15 Hari',
					'value' => 15,	
				],
			],
		],
	],
	'special' => [
		'cabang' => [
			0 	=> 'Modal Cabang',
			1 	=> 'Pinjaman Nasabah',
			2 	=> 'Hutang',
			3 	=> 'Piutang',
			4 	=> 'Refund',
			5 	=> 'Sisa Saldo',
			6 	=> 'Biaya Operasional',
			7 	=> 'Jumlah Akad Bulan',
			8 	=> 'Saldo Kas Administrasi',
			9 	=> 'Pendapatan B.Titip Bulan',
			10 	=> 'Hutang Biaya Operasional',
			11 	=> 'Pendapatan B.Admin Akad',
			12 	=> 'Pendapatan B.Admin Lelang',
		],
		'nasabah_akad' => [
			'detail_jenis_barang' => [
				'' 			=> 'Semua Detail Jenis Barang',
				'smartphone'=> 'Smartphone',
				'laptop'	=> 'Laptop',
				'kamera'	=> 'Kamera',
				'tv'		=> 'TV',
				'motor'		=> 'Motor',
				'mobil'		=> 'Mobil',
				'lain_lain'	=> 'Lain - lain',
			],
			'waktu_akad' => [
				''		=> 'Seluruh Data Opsi Pembayaran',
				'1' 	=> 'harian',
				'7' 	=> '7 Hari',
				'15'	=> '15 Hari',
			],
			'jangka_waktu_akad' => [
				0 	=> 'Semua Hari Jangka Waktu Akad',
				7 	=> '7 Hari',
				15 	=> '15 Hari',
				30 	=> '30 Hari',
				60 	=> '60 Hari',
			]
		],
	],
];