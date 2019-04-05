<?php 

return [
	// LIST MENU ON HEADER
	'menu_header' => [
		/* NOTE : 
		* url 	= for condition active which is use function requeset()->is() in helper
		* name 	= for show in view menu header
		* link 	= for tag a and function is what redirect to
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
				],
				1	=> [
					'url'	=> 'cabang/edit',
					'name'	=> 'Edit Cabang',
					'route'	=> 'cabang.edit',
				],
				2	=> [
					'url'	=> 'cabang',
					'name'	=> 'Data Cabang',
					'route'	=> 'cabang.index',
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
					'url'	=> 'nasabah',
					'name'	=> 'Data Nasabah',
					'route'	=> 'nasabah.index',
				],
				1	=> [
					'url'	=> 'akad',
					'name'	=> 'Data Akad Nasabah',
					'route'	=> 'akad.index',
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
				'jaminan' 		=> 'Jaminan',
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
				'list_nasabah_lunas' => [
					'nama_lengkap' 		=> 'Nama',
					'no_telp' 			=> 'No. telp',
					'no_id' 			=> 'ID',
					'jaminan' 			=> 'Jaminan',
					'pinjaman'	 		=> 'Pinjaman',
					'b_titip_terbayar'	=> 'B. Titip Terbayar',
					'tanggal_akad'		=> 'Tanggal Akad',
					'tanggal_pelunasan'	=> 'Tanggal Pelunasan',
				],
				'list_nasabah_lelang' => [
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
				'list_nasabah_refund' => [
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
		],
		'nasabah' => [
			'nama_lengkap' 	=> 'Nama',
			'no_telp'		=> 'No Telp',
			'alamat' 		=> 'Alamat',
			'action'		=> 'Action'
		],
	],
	'name_tables' => [
		'akad_nasabah' => [
			'akad_jatuh_tempo' => [
				'List Jatuh Tempo 7 Hari',
				'List Jatuh Tempo 15 Hari',
				'List Jatuh Tempo 30 Hari',
				'List Jatuh Tempo 60 Hari',
			],
		],
	],
];