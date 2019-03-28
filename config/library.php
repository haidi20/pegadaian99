<?php 

return [
	'menu_header' => [
		/*
		* title = just title for this menu
		* name 	= for show in view menu header
		* link 	= for tag a and function is what redirect to
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
			'child'	=> false,
		],
	],
	'list_nasabah_akad' => [
		'nama',
		'no_telp',
		'no_id',
		'jaminan',
		'pinjaman',
		'tunggakan',
		'tanggal_akad',
		'jatuh_tempo',
		'prosedur',
	],
];