<?php

use Carbon\Carbon;

if( ! function_exists('terpilih') )
{
	function terpilih($parm1, $parm2){
		return $parm1 == old($parm2) ? 'selected' : '' ;
	}
}