
<table width="100%" cellspacing="2" cellpadding="5" class="form-table lodgix_options_table">
    <tr valign="top"> 
        <th scope="row">
            <?php _e('Single Page Design:', $this->localizationDomain); ?>
        </th> 
        <td>
            <select name="p_lodgix_single_page_design"  id="p_lodgix_single_page_design" >                              
                <option <?php if ($this->options['p_lodgix_single_page_design'] == 0) echo "SELECTED"; ?> value='0'>Regular</option>
                <option <?php if ($this->options['p_lodgix_single_page_design'] == 1) echo "SELECTED"; ?> value='1'>Tabbed</option>
            </select>
        </td>                                                                                                                           
    </tr>
    <tr valign="top"> 
        <th scope="row">
            <?php _e('Vacation Rentals Page Design:', $this->localizationDomain); ?>
        </th> 
        <td>
            <select name="p_lodgix_vacation_rentals_page_design"  id="p_lodgix_vacation_rentals_page_design" >                              
                <option <?php if ($this->options['p_lodgix_vacation_rentals_page_design'] == 0) echo "SELECTED"; ?> value='0'>Classic</option>
                <option <?php if ($this->options['p_lodgix_vacation_rentals_page_design'] == 1) echo "SELECTED"; ?> value='1'>Grid</option>
            </select>
        </td>                                                                                                                           
    </tr>
    <tr valign="top">
        <th width="33%" scope="row">
            <?php _e('Full Size Thumbnails:', $this->localizationDomain); ?>
        </th>
        <td>
            <input name="p_lodgix_full_size_thumbnails" type="checkbox" id="p_lodgix_full_size_thumbnails" <?php if ($this->options['p_lodgix_full_size_thumbnails']) echo "CHECKED"; ?>/>
        </td>
    </tr>				
</table><br>                    

<p><b><?php _e('Theme Options', $this->localizationDomain); ?></b></p>

<table width="100%" cellspacing="2" cellpadding="5" class="form-table lodgix_options_table">
    <tr valign="top">
        <th width="33%" scope="row">
            <?php _e('Thesis 1 Compatibility:', $this->localizationDomain); ?>
        </th>
        <td>
            <input name="p_lodgix_thesis_compatibility" type="checkbox" id="p_lodgix_thesis_compatibility" <?php if ($this->options['p_lodgix_thesis_compatibility']) echo "CHECKED";?> />
        </td>
    </tr>
    <tr valign="top">
        <th width="33%" scope="row">
            <?php _e('Thesis 2 Compatibility:', $this->localizationDomain); ?>
        </th>
        <td>
            <input name="p_lodgix_thesis_2_compatibility" type="checkbox" id="p_lodgix_thesis_2_compatibility" <?php if ($this->options['p_lodgix_thesis_2_compatibility']) echo "CHECKED"; ?> onchange="javascript:set_thesis_2_theme_enabled();"/>


            <select name="p_lodgix_thesis_2_template"  id="p_lodgix_thesis_2_template" style="margin_left:10px;"  <?php if (!$this->options['p_lodgix_thesis_2_compatibility']) echo "DISABLED"; ?>>               
                <?php foreach($thesis_2_template_options as $to) { ?>              
                <option <?php if ($this->options['p_lodgix_thesis_2_template'] == $to['class']) echo "SELECTED"; ?> value='<?php echo $to['class'] ?>'><?php echo $to['title'] ?></option>
                <?php } ?>
    
            </select>
        </td>
    </tr>
                    <tr valign="top">
        <th width="33%" scope="row">
            <?php _e('Page Template:', $this->localizationDomain); ?>
        </th>
        <td>
                                <select name="p_lodgix_page_template"  id="p_lodgix_page_template"  
                                        onchange="javascript:set_lodgix_page_template_enabled();">
                                    <option value="NONE">Lodgix Default</option>
                                    <option value="page.php" <?php if ('page.php' == $this->options["p_lodgix_page_template"]) echo "SELECTED"; ?>>Theme Default</option>
            <?php 
                                        $templates = get_page_templates();
                                        foreach ( $templates as $tn => $tf ) {
                                            echo '<option ';
                                            if ($tf == $this->options["p_lodgix_page_template"]) {
                                                echo "SELECTED";
                                            }
                                            echo ' value="'. $tf . '">' . $tn . '</option>';
                                        }
                                    ?>
                                    <option value="CUSTOM" <?php if ('CUSTOM' == $this->options["p_lodgix_page_template"]) echo "SELECTED"; ?>>Custom</option>
                                </select> <input name="p_lodgix_custom_page_template" id="p_lodgix_custom_page_template"
                                           type="text"
                                            <?php if ($this->options['p_lodgix_page_template'] != 'CUSTOM') echo 'disabled'; ?> 
                                           value="<?php echo $this->options['p_lodgix_custom_page_template']; ?>">
        </td>
    </tr>


                    
                    
</table><br>

