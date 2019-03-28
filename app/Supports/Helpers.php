<?php

use Carbon\Carbon;

if( ! function_exists('selected') )
{
	function selected($parm1, $parm2){
		return $parm1 == old($parm2) ? 'selected' : '' ;
	}
}

if( ! function_exists('checked') )
{
	function checked($parm1, $parm2){
		return $parm1 == old($parm2) ? 'checked' : '' ;
	}
}

if( ! function_exists('active') )
{
	function active($choice, $menu = null){
		if($menu){
			return $choice == $menu ? 'active pcoded-trigger' : '';
		}else{
			return request()->is($choice) ? 'active' : '';
		}
	}
}

