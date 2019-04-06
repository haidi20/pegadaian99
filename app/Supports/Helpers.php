<?php

use Carbon\Carbon;

/* selected for selected on selection in anyware
* $parm1 = value of option
* $parm2 = name from field table 
* $type  = type is 'request' or 'old'
*/
if( ! function_exists('selected') )
{
	function selected($parm1, $parm2, $type = null){
		if($type == 'request'){
			return $parm1 == request($parm2) ? 'selected' : '' ;
		}else{
			return $parm1 == old($parm2) ? 'selected' : '' ;
		}
	}
}

/* checked for checked in radio button
* $parm1 = value of option
* $parm2 = name from field table
*/
if( ! function_exists('checked') )
{
	function checked($parm1, $parm2){
		return $parm1 == old($parm2) ? 'checked' : '' ;
	}
}

/* active for add class active in menu on header
* $menu 	= name menu and then set name menu from controller
* $feature 	= address url on aplication or name feature on aplication
*/
if( ! function_exists('active') )
{
	function active($feature, $menu = null){
		if($menu){
			return $feature == $menu ? 'active pcoded-trigger' : '';
		}else{
			return request()->is($feature) ? 'active' : '';
		}
	}
}

/* flash_message for show notification after some action. example after add, edit, or delete data
* $session 	= set name session 
* $messages = input messages from controller 
*/
if( ! function_exists('flash_message') )
{
    function flash_message($session, $messages='')
    {
    	$notification = '<div class="alert alert-success background-success">
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <i class="icofont icofont-close-line-circled text-white"></i>
			                </button>
			                %s
			            </div>';

        $html = sprintf($notification, $messages);
        session()->flash($session, $html);
    }
}

/* remove_dot for remove "." of value form number and then remove for input to database
* $number = value number have "."
*/
if( ! function_exists('remove_dot') ){
    function remove_dot($number)
    {
        return str_replace('.', '', $number);
    }
}
