<?php

$static = '';
if ($allow_booking == 0)
{
   $static = '_static';
}   


if ($number_properties == 1)
{
	 $this->options['p_lodgix_root_width_single'] = 615;
	 $this->options['p_lodgix_root_height_single'] = 676;
   $availability = '<div id="lodgix_calendar" align="center"><object height="' . $this->options['p_lodgix_root_height_single'] .'" width="' . $this->options['p_lodgix_root_width_single'] .'" id="flashcontrol" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,5,0,0"><param name="flashvars" value="propertyOwnerID=' . $owner_id . '&amp;propertyID=' . $property_id . '&amp;root_width=' . $this->options['p_lodgix_root_width_single'] .'&amp;root_height=' . $this->options['p_lodgix_root_height_single'] . '&amp;show_header=' . $this->options['p_lodgix_show_header'] . '&amp;block_corner_rad=' . $this->options['p_lodgix_block_corner_rad'] . '&amp;daysN=' . $this->options['p_lodgix_days_number'] . '&amp;row_number=' . $this->options['p_lodgix_row_number'] . '&amp;cell_color_serv=' . $this->options['p_lodgix_cell_color_serv'] . '&amp;cell_color=' . $this->options['p_lodgix_cell_color'] . '&amp;show_email=' . $this->options['p_lodgix_show_email'] . '&amp;show_site=' . $this->options['p_lodgix_show_site'] . '&amp;name_col_width=' . $this->options['p_lodgix_name_col_width'] . '&amp;labels_font_size=' . $this->options['p_lodgix_labels_font_size'] . '&amp;use_property_hyperlinks=' . $this->options['p_lodgix_use_property_hyperlinks'] . '&amp;title_size=' . $this->options['p_lodgix_title_size'] . '"><param name="src" value="http://www.lodgix.com/static/calendar12_widget'. $static .'.swf"><param name="wmode" value="transparent"><param name="allowscriptaccess" value="always"><param name="allownetworking" value="external"><embed height="' . $this->options['p_lodgix_root_height_single'] .'" width="' . $this->options['p_lodgix_root_width_single'] .'" allowscriptaccess="always" allownetworking="external" id="flashcontrolemb" name="flashcontrol" pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://www.lodgix.com/static/calendar12_widget'. $static .'.swf" flashvars="propertyOwnerID=' . $owner_id . '&amp;propertyID=' . $property_id . '&amp;root_width=' . $this->options['p_lodgix_root_width_single'] .'&amp;root_height=' . $this->options['p_lodgix_root_height_single'] . '&amp;show_header=' . $this->options['p_lodgix_show_header'] . '&amp;block_corner_rad=' . $this->options['p_lodgix_block_corner_rad'] . '&amp;daysN=' . $this->options['p_lodgix_days_number'] . '&amp;row_number=' . $this->options['p_lodgix_row_number'] . '&amp;cell_color_serv=' . $this->options['p_lodgix_cell_color_serv'] . '&amp;cell_color=' . $this->options['p_lodgix_cell_color'] . '&amp;show_email=' . $this->options['p_lodgix_show_email'] . '&amp;show_site=' . $this->options['p_lodgix_show_site'] . '&amp;name_col_width=' . $this->options['p_lodgix_name_col_width'] . '&amp;labels_font_size=' . $this->options['p_lodgix_labels_font_size'] . '&amp;use_property_hyperlinks=' . $this->options['p_lodgix_use_property_hyperlinks'] . '&amp;title_size=' . $this->options['p_lodgix_title_size'] . '" wmode="transparent"></object>';
 
}
else
{
  $availability = '<div id="lodgix_calendar" align="center"><object height="' . $this->options['p_lodgix_root_height'] .'" width="' . $this->options['p_lodgix_root_width'] .'" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,5,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="flashcontrol"><param value="propertyOwnerID=' . $owner_id . '&amp;root_width=' . $this->options['p_lodgix_root_width'] .'&amp;root_height=' . $this->options['p_lodgix_root_height'] . '&amp;show_header=' . $this->options['p_lodgix_show_header'] . '&amp;block_corner_rad=' . $this->options['p_lodgix_block_corner_rad'] . '&amp;daysN=' . $this->options['p_lodgix_days_number'] . '&amp;row_number=' . $this->options['p_lodgix_row_number'] . '&amp;cell_color_serv=' . $this->options['p_lodgix_cell_color_serv'] . '&amp;cell_color=' . $this->options['p_lodgix_cell_color'] . '&amp;show_email=' . $this->options['p_lodgix_show_email'] . '&amp;show_site=' . $this->options['p_lodgix_show_site'] . '&amp;name_col_width=' . $this->options['p_lodgix_name_col_width'] . '&amp;labels_font_size=' . $this->options['p_lodgix_labels_font_size'] . '&amp;use_property_hyperlinks=' . $this->options['p_lodgix_use_property_hyperlinks'] . '&amp;title_size=' . $this->options['p_lodgix_title_size'] . '" name="flashvars"><param value="http://www.lodgix.com/static/calendar1_widget'. $static .'.swf" name="src"><param value="transparent" name="wmode"><param value="always" name="allowscriptaccess"><param value="external" name="allownetworking"><embed height="' . $this->options['p_lodgix_root_height'] .'" width="' . $this->options['p_lodgix_root_width'] .'" wmode="transparent" flashvars="propertyOwnerID=' . $owner_id . '&amp;root_width=' . $this->options['p_lodgix_root_width'] .'&amp;root_height=' . $this->options['p_lodgix_root_height'] . '&amp;show_header=' . $this->options['p_lodgix_show_header'] . '&amp;block_corner_rad=' . $this->options['p_lodgix_block_corner_rad'] . '&amp;daysN=' . $this->options['p_lodgix_days_number'] . '&amp;row_number=' . $this->options['p_lodgix_row_number'] . '&amp;cell_color_serv=' . $this->options['p_lodgix_cell_color_serv'] . '&amp;cell_color=' . $this->options['p_lodgix_cell_color'] . '&amp;show_email=' . $this->options['p_lodgix_show_email'] . '&amp;show_site=' . $this->options['p_lodgix_show_site'] . '&amp;name_col_width=' . $this->options['p_lodgix_name_col_width'] . '&amp;labels_font_size=' . $this->options['p_lodgix_labels_font_size'] . '&amp;use_property_hyperlinks=' . $this->options['p_lodgix_use_property_hyperlinks'] . '&amp;title_size=' . $this->options['p_lodgix_title_size'] . '" src="http://www.lodgix.com/static/calendar1_widget'. $static .'.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" name="flashcontrol" id="flashcontrolemb" allownetworking="external" allowscriptaccess="always"></object>';
}
$title = 'Online Booking Instructions';
if ($lang_code == 'de')
  $title = 'Online Buchungs Instruktionen';
if (($multi_unit_helptext != '') && ($allow_booking == 1) && ($this->options['p_lodgix_display_multi_instructions'] == 1))
{
  $availability .= '<div style="width:615px"><div style="padding:5px 20px 0px;text-align:center;"><div style="text-align:left;padding:5px 0px 0px 0px;"><h2 style="margin:0px;padding:0px;color:#0299FF;font-family:Arial,sans-serif;font-size:17px;">' . $title . '</h2><p style="font-family:Arial,sans-serif;font-size:12px;margin:0px;padding:0px;">' . $multi_unit_helptext . '</p></div></div></div></div>';
}
else
{
  $availability .= '</div>';
}

?>