<?php

$sql = "SELECT * FROM " . $lang_properties_table . " WHERE id=" . $property->id;
$german_details = $wpdb->get_results($sql);
$german_details = $german_details[0];
$post_id_de = $wpdb->get_var("select page_id from " . $lang_pages_table . " WHERE property_id=" . $property->id . ";"); 
$permalink = get_permalink($post_id_de);
$sql = "SELECT * FROM " . $pictures_table . " WHERE property_id=" . $property->id . ' ORDER BY position';
$photos = $wpdb->get_results($sql);
$sql = "SELECT * FROM " . $reviews_table . " WHERE language_code='de' AND property_id=" . $property->id . ' ORDER BY date DESC';
$reviews = $wpdb->get_results($sql);
$single_property .= '<div id="lodgix_photo"><a id="lodgix_aGallery" href="#Gallery"></a>     
                        <div id="lodgix_photo_top"></div>      
                        <div id="lodgix_photo_body">
                        <div id="lodgix_photo_zoom"></div>       
                        <table class="lodgix_gallery" cellpadding="0" cellspacing="12">';
$counter = 0;         
$num_pics = 4;
$single_property .= '<h2>Bilder</h2>';
if (get_current_theme() == "Thesis")              
  $num_pics = 3;
foreach($photos as $photo)
{
      $photo_url = str_replace('media/gallery','photo/800/gallery',$photo->url);
      if (($counter % $num_pics == 0) && ($counter != 0))
      {
         $single_property .= "<tr>";
      }  
                
      $single_property .= '<td valign="top" align="center" style="border-bottom: 0;">';
      $single_property .= '<a href="' . $photo_url . '" class="thickbox" rel="gallery-images"><img src="' . $photo->thumb_url .'" height="150" width="200"  style="cursor:url(/wp-content/plugins/lodgix/images/zoomin.cur), pointer" border=0 title="' . $photo->caption . '"></a>
            <div class="image_desc"></div> 
            </td>
               <div style="align:left"></div>
            </td>';
                          
        
   $counter++;
}
$single_property .= '</tr></table></div><div id="lodgix_photo_bottom"></div></div>';

if ($german_details->description_long != "")
{
  $single_property .= '<div id="lodgix_property_description"><p><h2>Kurzbeschreibung</h2></p>' . str_replace('\n', '<br>', $german_details->description_long) . '</div>';
}
$single_property .= '<div id="lodgix_property_details"><p><h2>Ausf&uuml;hrliche Beschreibung</h2></p>' . str_replace('\n', '<br>', $german_details->details) . '</div>';

if (count($amenities) >= 1)
{ 
 $single_property .= '<br><br><h2>Annehmlichkeiten</h2><br><ul class="amenities">';
 foreach($amenities as $amenity)
 {
  $amenity_name = $wpdb->get_var("select description_de from " . $lang_amenities_table . " WHERE description='" . $amenity->description . "';"); 
  $single_property .= '<li>' . $amenity_name . '</li>';
 }
 $single_property .= '</ul><br><br>';
} 

if (count($reviews) >= 1)
{ 
 $single_property .= '<br><br><h2>Bewertungen</h2>';
 $counter = 0;
 foreach($reviews as $review)
 {
  if ($counter > 0)
  {
    $single_property .= '<br   />';
  }
  $single_property .= '<p>' . $review->description . '</p><p><b>' . $this->format_date($review->date) . ', ' . $review->name . '</b></p><hr>';
  $counter++;
 }
 $single_property .= '<br><br>';
} 


$sql = "SELECT from_date,to_date,default_rate,name FROM " . $rates_table . " WHERE property_id=" . $property->id . " AND (DATE(from_date) >= DATE(NOW()) OR from_date IS NULL) AND min_nights=1 ORDER BY is_default,from_date";
$daily_rates = $wpdb->get_results($sql);

$sql = "SELECT from_date,to_date,default_rate,name FROM " . $rates_table . " WHERE property_id=" . $property->id .  " AND (DATE(from_date) >= DATE(NOW()) OR from_date IS NULL) AND min_nights=7 ORDER BY is_default,from_date";
$weekly_rates = $wpdb->get_results($sql);
 
$sql = "SELECT from_date,to_date,default_rate,name FROM " . $rates_table . " WHERE property_id=" . $property->id .  " AND (DATE(from_date) >= DATE(NOW()) OR from_date IS NULL) AND min_nights=30 ORDER BY is_default,from_date";
$monthly_rates = $wpdb->get_results($sql);
 
$sql = "SELECT min_nights,from_date,to_date FROM " . $rules_table . " WHERE property_id=" . $property->id .  " AND (DATE(from_date) >= DATE(NOW()) OR from_date IS NULL) ORDER BY is_default,from_date";
$rules = $wpdb->get_results($sql);
  

$single_property .= '<div class="lodgix_rentalrates">';

if ((count($daily_rates) != 0) && $this->options['p_lodgix_display_daily_rates'])
{
 $single_property .= "<table width='98%'>";
 $single_property .= "<thead><tr><th align=left style='width:250px;'><b>Tageskurs</b></th><th align=left style='width:200px;'>Datum</th><th>Preise</th></tr></thead>";
 
 foreach($daily_rates as $daily_rate)
 {
  if ($daily_rate->from_date == NULL) 
    $period = "Alle Zeiten";
  else
    $period = $this->format_date($daily_rate->from_date) . " to " . $this->format_date($daily_rate->to_date);
  $single_property .= "<tr><td>" .  $daily_rate->name .  "</td><td>" .  $period . "</td><td align=center>" . $property->currency_code . $daily_rate->default_rate . "</td></tr>"; 
 }
 $single_property .= "</table><br><br>";
} 


if (count($weekly_rates) != 0)
{
 $single_property .= "<table width='98%'>";
 $single_property .= "<thead><tr><th align=left style='width:250px;'><b>Wochenpreis</b></th><th align=left style='width:200px;'>Datum</th><th>Preise</th></tr></thead>";
 
 foreach($weekly_rates as $weekly_rate)
 {
  if ($weekly_rate->from_date == NULL) 
    $period = "Alle Zeiten";
  else
    $period =$this->format_date($weekly_rate->from_date) . " to " . $this->format_date($weekly_rate->to_date);
  $single_property .= "<tr><td>" .  $weekly_rate->name .  "</td><td>" .  $period  . "</td><td align=center>" . $property->currency_code . $weekly_rate->default_rate . "</td></tr>"; 
 }
 $single_property .= "</table><br><br>";
} 
if (count($monthly_rates) != 0)
{
 $single_property .= "<table width='98%'>";
 $single_property .= "<thead><tr><th align=left style='width:250px;'><b>Monatspreis</b></th><th align=left style='width:200px;'>Datum</th><th>Preise</th></tr></thead>";
 
 foreach($monthly_rates as $monthly_rate)
 {
  if ($monthly_rate->from_date == NULL) 
    $period = "Alle Zeiten";
  else
    $period = $this->format_date($monthly_rate->from_date) . " to " . $this->format_date($monthly_rate->to_date);
  $single_property .= "<tr><td>" .  $monthly_rate->name .  "</td><td>" .  $period  . "</td><td align=center>" . $property->currency_code . $monthly_rate->default_rate . "</td></tr>"; 
 }
 $single_property .= "</table><br><br>";
} 

if (count($rules) != 0)
{
 $single_property .= "<table width='98%'>";
 $single_property .= "<thead><tr><th align=left style='width:250px;'><b>Mindestaufenthalt</b></th><th>Mindestaufenthalt</th></tr></thead>";
 
 foreach($rules as $rule)
 {
  if ($rule->from_date == NULL) 
    $period = "Alle Zeiten";
  else
    $period = $this->format_date($rule->from_date) . " to " . $this->format_date($rule->to_date);
 
  $single_property .= "<tr><td>" . $period  . "</td><td align=center>" . $rule->min_nights . "</td></tr>";
 }
 $single_property .= "</table><br><br>";
}

$policies_table = $wpdb->prefix . "lodgix_policies"; 
$policies = $wpdb->get_results("SELECT * FROM " . $policies_table . " WHERE language_code='de'"); 
$taxes = $wpdb->get_results("SELECT * FROM " . $taxes_table . " WHERE property_id=" . $property->id);
$fees = $wpdb->get_results("SELECT * FROM " . $fees_table . " WHERE property_id=" . $property->id);
$deposits = $wpdb->get_results("SELECT * FROM " . $deposits_table . " WHERE property_id=" . $property->id);
 
if ($policies || $taxes || $fees || $deposits)
{
 $single_property .= "<table width='98%'>";
 $single_property .= "<thead><tr><th align=left>Policies</th></tr></thead>";
 

 if ($taxes)
 {
  $single_property .= "<tr><td class='lodgix_policies'><span class='lodgix_policies_span'><b>Steuern</b><br><br>";  
  foreach($taxes as $tax)
  {
   $single_property .= $tax->title . ' - ';
   if ($tax->is_flat == 1)
   {
    $single_property .= $property->currency_code . number_format($tax->value,2);   
    if ($tax->frequency == 'ONETIME')
    {
     $single_property .= ' - One Time';
    }
    else
    {
     $single_property .= ' - Daily';
    }
   }
   else
   {
    $single_property .= number_format($tax->value,2) . "%"; 
   }
   $single_property .= "<br>";
  }   
  $single_property .="</span></td></tr>";
  
 }
 
 if ($fees)
 {
  $single_property .= "<tr><td class='lodgix_policies'><span class='lodgix_policies_span'><b>Geb&uuml;hren</b><br><br>";  
  foreach($fees as $fee)
  {
   $single_property .= $fee->title . ' - ';
   if ($fee->is_flat == 1)
   {
    $single_property .= $property->currency_code . number_format($fee->value,2);   
   }
   else
   {
    $single_property .= number_format($fee->value,2) . "%"; 
   }
   if ($fee->tax_exempt == 1)
   {
    $single_property .= ' - Tax Exempt';   
   }
   $single_property .= "<br>";
  }   
  $single_property .="</span></td></tr>";
 }
 

 if ($deposits)
 {
  $single_property .= "<tr><td class='lodgix_policies'><span class='lodgix_policies_span'><b>Kaution</b><br><br>";  
  foreach($deposits as $deposit)
  {
   $single_property .= $deposit->title . ' - ';
   $single_property .= $property->currency_code . number_format($deposit->value,2);   
   $single_property .= "<br>";
  }   
  $single_property .="</span></td></tr>";
 } 
 
 if ($policies)
 {
   foreach($policies as $policy)
   {
    if ($policy->cancellation_policy)
    {
      $single_property .= "<tr><td class='lodgix_policies'><b>Stornierungsbedingungen</b><br><br>" . str_replace('\n', '<br>', $policy->cancellation_policy) . "</td></td></tr>";
    }
    if ($policy->deposit_policy)
    {
      $single_property .= "<tr><td class='lodgix_policies'><b>Kautionsbedingungen</b><br><br>" . str_replace('\n', '<br>',$policy->deposit_policy)  . "</td></td></tr>";
    }  
    if ($policy->single_unit_helptext)
    {
      $single_unit_helptext = $policy->single_unit_helptext;
    }   
    else
    {
      $single_unit_helptext = '';
    }            
   }
 }

 $single_property .= "<tr><td class='lodgix_policies_bottom'>&nbsp;</td></td></tr>";  

 $single_property .= "</table>";  
}
else
{
  $single_property .= "<br/>";
}

$static = '';
if ($property->allow_booking == 0)
{
   $static = '_static';
}   

$single_property .= "</div>&nbsp;";
$single_property .= '<br><br><div align="center"><h2>Verf&uuml;gbarkeit und Buchungskalender</h2><br><object height="760" width="615" id="flashcontrol" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,5,0,0"><param name="flashvars" value="propertyOwnerID=' . $property->owner_id . '&amp;propertyID=' . $property->id . '&amp;root_width=615&amp;root_height=760&amp;show_header=1&amp;cell_color_serv=ff0000&amp;cell_color="><param name="src" value="http://www.lodgix.com/static/calendar12_widget'. $static .'.swf"><param name="wmode" value="transparent"><param name="allowscriptaccess" value="always"><param name="allownetworking" value="external"><embed height="760" width="615" allowscriptaccess="always" allownetworking="external" id="flashcontrolemb" name="flashcontrol" pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://www.lodgix.com/static/calendar12_widget'. $static .'.swf" flashvars="propertyOwnerID=' . $property->owner_id  . '&amp;propertyID=' . $property->id . '&amp;root_width=615&amp;root_height=760&amp;show_header=1&amp;cell_color_serv=ff0000&amp;cell_color=" wmode="transparent"></object>';
if (($single_unit_helptext != '') && ($property->allow_booking == 1) && ($this->options['p_lodgix_display_single_instructions'] == 1))
{
  $single_property .= '<div style="width:615px"><div style="padding:5px 20px 0px;text-align:center;"><div style="text-align:left;padding:5px 0px 0px 0px;"><h2 style="margin:0px;padding:0px;color:#0299FF;font-family:Arial,sans-serif;font-size:17px;">Online Buchungs Instruktionen</h2><p style="font-family:Arial,sans-serif;font-size:12px;margin:0px;padding:0px;">' . $single_unit_helptext . '</p></div></div></div></div>';
}
else
{
  $single_property .= '</div>';
}
$single_property .= '<script type="text/javascript">tb_pathToImage = "/wp-includes/js/thickbox/loadingAnimation.gif";tb_closeImage = "/wp-includes/js/thickbox/tb-close.png";</script>';

$single_property .= '<p>&nbsp;</p><div id="map_canvas" style="width: 100%; height: 300px"></div>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=' . $this->options['p_google_maps_api'] . '"type="text/javascript"></script>
    <script type="text/javascript">    
    function lodgix_gmap_initialize() {
    //<![CDATA[
      if (GBrowserIsCompatible()) {
        var map = new GMap(document.getElementById("map_canvas"));
    		map.addControl(new GSmallMapControl()); 
		    map.addControl(new GMapTypeControl());
        var point = new GPoint(' . $property->longitude . ', ' . $property->latitude . ');
		    map.centerAndZoom(point, 4);        
		    var marker = new GMarker(point);
		    map.addOverlay(marker)      
		   }
    }
    lodgix_gmap_initialize();
    //]]>
    </script>
  </head>
';
?>