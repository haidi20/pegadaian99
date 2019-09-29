<?php

if( ! function_exists('fa') ){
    function fa($icon='pencil', $addClass='', $style='')
    {
        return '<i class="fa fa-'.$icon.' '.$addClass.'" style="'.$style.'"></i>';
    }
}