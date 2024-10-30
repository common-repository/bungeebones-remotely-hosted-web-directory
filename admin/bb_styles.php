<?
$bb_linkdisplay_color = '';
$bb_linkdisplay_background_color = '';
$bb_linkdesc_color = '';
$bb_linkdesc_background_color = '';
$bb_cats_color = '';
$bb_cats_visited = '';
$bb_cats_hover = '';
$bb_cats_active = '';
$bb_cats_background_color = '';
$bb_linkdisplay_font_size = '';
$bb_linkdesc_font_size = '';
$bb_cats_font_size = '';

if(isset($_POST['Submit'])){
   




$bb_linkdisplay_color = $_POST['bb_linkdisplay_color'];
$bb_linkdisplay_background_color = $_POST['bb_linkdisplay_background_color'];
$bb_linkdesc_color = $_POST['bb_linkdesc_color'];
$bb_linkdesc_background_color = $_POST['bb_linkdesc_background_color'];
$bb_cats_color = $_POST['bb_cats_color'];
$bb_cats_visited = $_POST['bb_cats_visited'];
$bb_cats_hover = $_POST['bb_cats_hover'];
$bb_cats_active = $_POST['bb_cats_active'];
$bb_cats_background_color = $_POST['bb_cats_background_color'];
$bb_linkdisplay_font_size = $_POST['bb_linkdisplay_font_size'];
$bb_linkdesc_font_size = $_POST['bb_linkdesc_font_size'];
$bb_cats_font_size = $_POST['bb_cats_font_size'];
////////////////////////////////////////
global $wpdb;
$prefix = $wpdb->prefix;
$table_name =  $prefix.'bungeebones';
$wpdb->query("UPDATE $table_name SET 
`bb_linkdisplay_color` = '$bb_linkdisplay_color',
`bb_linkdisplay_background_color` = '$bb_linkdisplay_background_color',
`bb_linkdesc_color` = '$bb_linkdesc_color',
`bb_linkdesc_background_color` = '$bb_linkdesc_background_color',
`bb_cats_color` = '$bb_cats_color',
`bb_cats_visited` = '$bb_cats_visited',
`bb_cats_hover` = '$bb_cats_hover',
`bb_cats_active` = '$bb_cats_active',
`bb_cats_background_color` = '$bb_cats_background_color',
`bb_linkdisplay_font_size` = '$bb_linkdisplay_font_size',
`bb_linkdesc_font_size` = '$bb_linkdesc_font_size',
`bb_cats_font_size` = '$bb_cats_font_size'

 WHERE id = 1 ");
//var_dump($wpdb->last_query);
echo '<h1>Success!</h1><h3>Your settings have been saved</h3>';
}
else
{
global $wpdb;
$myvar = $wpdb->get_results("SELECT * FROM wp_bungeebones WHERE id=1", ARRAY_A );
//print_r($myvar);

  echo'<form method="POST" action="'. $_SERVER['REQUEST_URI'].'">';
 echo '<tr><td colspan="3"><h1>Styling</h1></td></tr>';
 echo '<tr><td colspan="3"><br><hr><br></td></tr>';
 echo '<tr><td colspan="3"><p>Customise the look of the BungeeBones web directory on your site. Add style information for the categories and link display.</td></tr>';
echo '<tr><td colspan="3"><h3>Link Display</h3>
<select name="bb_linkdisplay_font_size">
<option value="0"';
if($myvar[0]["bb_linkdisplay_font_size"] =="0" ){echo ' selected="selected"';}
echo '>None</option>
<option value="xx-small"';
if($myvar[0]["bb_linkdisplay_font_size"] =="xx-small"){ echo ' selected="selected"';}
echo '>xx-small</option>
<option value="x-small"';
if($myvar[0]["bb_linkdisplay_font_size"] =="x-small"){ echo ' selected="selected"';}
echo '>x-small</option>
<option value="small"';
if($myvar[0]["bb_linkdisplay_font_size"] =="small"){ echo ' selected="selected"';}
echo '>small</option>
<option value="medium"';
if($myvar[0]["bb_linkdisplay_font_size"] =="medium"){ echo ' selected="selected"';}
echo '>medium</option>
<option value="large"';
if($myvar[0]["bb_linkdisplay_font_size"] =="large"){ echo ' selected="selected"';}
echo '>large</option>
<option value="x-large"';
if($myvar[0]["bb_linkdisplay_font_size"] =="x-large"){ echo ' selected="selected"';}
echo '>x-large</option>	
<option value="xx-large"';
if($myvar[0]["bb_linkdisplay_font_size"] =="xx-large"){ echo ' selected="selected"';}
echo '>xx-large</option>
</select> Font Size</td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_linkdisplay_color" value="'.$myvar[0]["bb_linkdisplay_color"].'" size="10"> 	Font Color  </td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_linkdisplay_background_color" value="'.$myvar[0]["bb_linkdisplay_background_color"].'" size="10"> 	Background Color</td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><h3>Link Description</h3>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>
<select name="bb_linkdesc_font_size">
<option value="0"';
if($myvar[0]["bb_linkdesc_font_size"] =="0"){ echo ' selected="selected"';}
echo '>None</option>
<option value="xx-small" ';
if($myvar[0]["bb_linkdesc_font_size"] =="xx-small"){ echo ' selected="selected"';}
echo '>xx-small</option>
<option value="x-small" ';
if($myvar[0]["bb_linkdesc_font_size"] =="x-small"){ echo ' selected="selected"';}
echo '>x-small</option>
<option value="small" ';
if($myvar[0]["bb_linkdesc_font_size"] =="small"){ echo ' selected="selected"';}
echo '>small</option>
<option value="medium" ';
if($myvar[0]["bb_linkdesc_font_size"] =="medium"){ echo ' selected="selected"';}
echo '>medium</option>
<option value="large" ';
if($myvar[0]["bb_linkdesc_font_size"] =="large"){ echo ' selected="selected"';}
echo '>large</option>
<option value="x-large" ';
if($myvar[0]["bb_linkdesc_font_size"] =="x-large"){ echo ' selected="selected"';}
echo '>x-large</option>	
<option value="xx-large" ';
if($myvar[0]["bb_linkdesc_font_size"] =="xx-large"){ echo ' selected="selected"';}
echo '>xx-large</option>
</select>Font Size</td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_linkdesc_color" value="'.$myvar[0]["bb_linkdesc_color"].'" size="10"> 	Font Color</td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_linkdesc_background_color" value="'.$myvar[0]["bb_linkdesc_background_color"].'" size="10"> 	Background Color </td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><h3>Category Name</h3>
<select name="bb_cats_font_size">
<option value="0" ';
if($myvar[0]["bb_cats_font_size"] =="0"){ echo ' selected="selected"';}
echo '>None</option>
<option value="xx-small" ';
if($myvar[0]["bb_cats_font_size"] =="xx-small"){ echo ' selected="selected"';}
echo '>xx-small</option>
<option value="x-small" ';
if($myvar[0]["bb_cats_font_size"] =="x-small"){ echo ' selected="selected"';}
echo '>x-small</option>
<option value="small" ';
if($myvar[0]["bb_cats_font_size"] =="small"){ echo ' selected="selected"';}
echo '>small</option>
<option value="medium" ';
if($myvar[0]["bb_cats_font_size"] =="medium"){ echo ' selected="selected"';}
echo '>medium</option>
<option value="large" ';
if($myvar[0]["bb_cats_font_size"] =="large"){ echo ' selected="selected"';}
echo '>large</option>
<option value="x-large" ';
if($myvar[0]["bb_cats_font_size"] =="x-large"){ echo ' selected="selected"';}
echo '>x-large</option>	
<option value="xx-large" ';
if($myvar[0]["bb_cats_font_size"] =="xx-large"){ echo ' selected="selected"';}
echo '>xx-large</option>
</select> Font Size</td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3">
<Input type="text" name="bb_cats_color" value="'.$myvar[0]["bb_cats_color"] .'"size="10"> 	Font Color<br>
<Input type="text" name="bb_cats_visited" value="'.$myvar[0]["bb_cats_visited"] .'"size="10">  Visited Link <br>
<Input type="text" name="bb_cats_hover" value="'.$myvar[0]["bb_cats_hover"] .'"size="10">  Hovered Link <br>
<Input type="text" name="bb_cats_active" value="'.$myvar[0]["bb_cats_active"] .'"size="10">  Active Link <br> </td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_cats_background_color" value="'.$myvar[0]["bb_cats_background_color"] .'" size="10">  Background Color</td></tr>';
 echo '<tr><td colspan="3"><br><hr><br></td></tr>';
	echo '<tr><td colspan="3" style="font-size: larger"><input type="submit" name="Submit" class="button-primary" value="Save Style"/>';
	echo '</form></td></tr>	</table>';
  
        }//close else submit
?>