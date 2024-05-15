<?php
/**
 * $Desc
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2020 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */ 
$header = apply_filters('krowd_get_header_layout', null );
if(!empty($header) && class_exists('Gavias_Themer_Header')){
  get_template_part('header', 'builder');
}else{
  get_template_part('header', 'default');
}