<?php
 
global $wpdb;

global $wpdb;
 $myvar = $wpdb->get_results("SELECT * FROM `wp_bungeebones` WHERE id = '1'", ARRAY_A);
$result = count($myvar);
 
function permalink_setting(){
  global $wpdb;
   $myvar = $wpdb->get_results("SELECT * FROM wp_options WHERE `option_name` like '%permalink_structure%'", ARRAY_N );
     $result = count($myvar);
  
   if($result > 0){
   $permalink_setting = $myvar[0][3];
     }
   else
   {
   $permalink_setting = "";
   }
    return $permalink_setting;
}
 
function siteurl_setting(){
  global $wpdb;
   $myvar2 = $wpdb->get_results("SELECT * FROM wp_options WHERE `option_name` like '%siteurl%'", ARRAY_N );
    $result = count($myvar2);
    if($result > 0){//THERE SHOULD ALWAYS BE A RESULT
   $site_url = $myvar2[0][3];
    }
   else
   {
   $site_url = "";
   }
    return $site_url;
} 
  

if(!isset($incl_index_php)){$incl_index_php = "";}
if(!isset($link_cnt)){$link_cnt = "";}
if(!isset($offset)){$offset = "";}
if(!isset($offset_calc)){$offset_calc = "";}
if(!isset($debug)){$debug = "";}
if(!isset($offset_form)){$offset_form = "";}
if(!isset($offset_calc)){$offset_calc = "";}
if(!isset($debug_form)){$debug_form = "";}
if(!isset($folder_name_calc)){$folder_name_calc = "";}
if(!isset($num_rows)){$num_rows = "";}
if(!isset($pieces_folder_name)){$pieces_folder_name = "";}
if(!isset($pieces_file_name)){$pieces_file_name = "";}
If(!isset($new_affiliate_num)){$new_affiliate_num="";}
if(!isset($affiliate_num)){$affiliate_num= "";}
if(!isset($is_permalink)){$is_permalink= "";}
if(!isset($file_name_calc)){$file_name_calc= "";}   
if(!isset($bb_linkdisplay_color)){$bb_linkdisplay_color="";}
if(!isset($bb_linkdisplay_background_color)){$bb_linkdisplay_background_color="";}
if(!isset($bb_linkdisplay_font_size)){$bb_linkdisplay_font_size="";}
if(!isset($bb_linkdesc_color)){$bb_linkdesc_color="";}
if(!isset($bb_linkdesc_background_color)){$bb_linkdesc_background_color="";}
if(!isset($bb_linkdesc_font_size)){$bb_linkdesc_font_size="";}
if(!isset($bb_cats_color)){$bb_cats_color="";}
if(!isset($bb_cats_background_color)){$bb_cats_background_color="";}
if(!isset($bb_cats_visited)){$bb_cats_visited="";}
if(!isset($bb_cats_hover)){$bb_cats_hover="";}
if(!isset($bb_cats_active)){$bb_cats_active="";}
if(!isset($bb_cats_font_size)){$bb_cats_font_size="";}
if(!isset($registered_list)){$registered_list="";}
 $myvar = $wpdb->get_results("SELECT * FROM wp_posts WHERE (`post_status` = 'publish' OR `post_status` = 'private') AND `post_content` LIKE '%bungeebones%'", ARRAY_N );

$result = count($myvar);
 if($result > 0){
     $page_title = $myvar[0][5];
     $status_bungeebones = $myvar[0][7];
     $guid_bungeebones = $myvar[0][18];
     $pieces = explode("/", $guid_bungeebones);

    if($status_bungeebones == 'private')
     {
     echo '<h3>We have detected the page where you inserted the Bungeebones short tag and will use that location as the configuration at Bungeebones.com. It\'s status is currently set to private and the public will not be able to view the page so remember to change that after the installation is complete. </h3> ';
     }
  }      
// echo 'beyond if';
$url= $_SERVER['SERVER_NAME'];
$postfields = array();
$postfields['url'] = $_SERVER['SERVER_NAME'];
$file="http://Bungeebones.com/link_exchange/wordpress/check_url.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $file);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data4 = curl_exec($ch);
//echo $data4;
curl_close($ch);
 
      	$pieces2 = explode("|", $data4);
        $link_cnt = $pieces2[0]; // $link_cnt | 
        $widget_cnt = $pieces2[1]; // $widget_cnt 
        $link_id = $pieces2[2]; // $link_id 
        $aftype = $pieces2[3]; // $aftype
        $folder_name_exploded = $pieces2[4];//this folder name should be labeled 'folder_name_exploded' to differentiate it from folder name form
        $current_location = $pieces2[5]; // $file name actually
        $approved_message = $pieces2[6]; // tells us if parked , unregistered ie not advertisied or not
        $BBuser_ID = $pieces2[7];
	
  //$link_cnt | $widget_cnt | $link_id | $aftype | $folder_name | $install_location | $approved_message | $BB_user_ID
  
 
if(!isset($_POST['Submit']) && $link_cnt == 0){
echo '<h2>BungeeBones has searched its database for this domain and reports it does not have a record for this domain.</h2><p style="font-size: larger;"> You have use of your web directory either as an affiliate of BungeeBones (which includes income earning potential) or as a non-affiliate (no income earning potential).</p><p> They recommend that you first register and add your link information at <a target="_blank" href="http://www.BungeeBones.com">www.BungeeBones.com</a>. By registering at BungeeBones your web site will be added to the web directory and distributed to all the other installations (i.e. it gets advertising). In addition to the advertising you also get to participate in the BungeeBones affiliate program and can earn commissions on paid link sales originating from your installation. After you have registered and added your link return here and refresh the form. It will detect your BungeeBones registration and configure the component accordingly.</p>
<p>But participation in the Bungeebones affiliate program is totally optional. If you would rather not participate in the affiliate program just continue to submit this form. You will forfeit commissions as a result and your link won\'t be advertised in the BungeeBones system but it will not affect the operation of your web directory in even the slightest way. For example, you will still receive the free web directory management service provided by BungeeBones that reviews websites and removes dead links for you free! You can always convert to an affiliate in the future and begin earning commissions on new sales from that point on.
';
 }
 elseif(!isset($_POST['Submit']) && $link_cnt > 0)
 {
 //Add widget_ID to array so that if widget_cnt > 0 and link_cnt > 1 then we don't edit settin
 //We need to add error handling for when the user has multiple entries for same link
 // If ($link_cnt > 1){echo 'BungeeBones reports you have multiple entries for this domain name and they were not able to detect any directory installations
if($BBuser_ID >1){
 echo '<h2>BungeeBones reports you are a registered user with them.</h2>';
 echo '<H3>As a registered user, you are receiving the following benefits:</h3>
 <ul><li>This domain is advertised in the web directory at all its installed locations</li> 
 <li>You are in the Bungeebones affiliate program where commissions accrue for sales of paid link advertising from your web directory</li>
 <li>You can earn over-ride commissions on sales by "downline" websites that added the web directory as a result of registering at yours.</ul>
 </ul>'; 
 }
 else
 {
 echo '<h2>BungeeBones reports the listing for this domain is not as a registered user.</h2>';
 echo '<H3>BungeeBones offers this web directory and all its accompanying services to both non-affiliated and registered users and as a result, this domain will NOT receive the following benefits:</h3>
 <ul><li>Advertising in the web directory at all its installed locations</li> 
 <li>Participation in the Bungeebones affiliate program where commissions are earned for sales of paid link advertising from your web directory</li>
 <li>The opportunity to earn over-ride commissions on sales by "downline" websites that added the web directory as a result of registering at yours</ul>
 </ul> 
 <h3>. Registration at BungeeBones.com is free and totally optional.</h3>
 ';
  } }
 if(isset($_POST['Submit']))
      {
      $var = explode("/", $_SERVER['REQUEST_URI']);
      $postfields = array();
      $postfields['url'] = $_SERVER['SERVER_NAME'];
      $postfields['incl_index_php'] = $_POST['incl_index_php_form'];//newest val from form will calc file name
      $postfields['file_name'] = $file_name_calc;
      $postfields['folder_name'] = $folder_name_calc;
      $debug_form = $_POST['debug_form'];
      if($debug_form=="on" or $debug_form=="1"){$debug_form = 1;}
      else
      {
      $debug_form = 0;
      }
      $offset_form = $_POST['offset_form'];
      if($offset_form == ""){
      $offset_form = 0;
      }
      $incl_index_php_form = $_POST['incl_index_php_form'];
      $registered_link_list_selected = $_POST['registered_list'];
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
      //question - does a different link id number get processed here or sent to processing page update_registered.php to be dealt with there
     /* if($incl_index_php_form=="on"){$incl_index_php_form = 1;}
      else
      {
      $incl_index_php_form = 0;
      }*/
 $permalink_setting = permalink_setting();
  //permalink_setting   Array ( [0] => [1] => http: [2] => advertisite.org [3] => blog [4] => ($the title  )
  
  $pieces_permalink = explode("/", $permalink_setting);
$site_url2 =  siteurl_setting();
   if($permalink_setting == "" && isset($page_title)){//the "default" Wp setting of no permalinks leaves this field in db empty
 //If it is not empty it is a permalink - add it to the link build
  $folder_name_calc = $pieces[3];
  $file_name_calc = $pieces[4];// should be like ?page_id=4
        echo '<H2>Now please inspect <a target="_blank" href="http://'.$url.'/'.$folder_name_calc.'/'.$file_name_calc. '">the web directory page</a>. You may have to refresh it and possibly may need to refresh this page.</h2>';

 }
elseif( isset($page_title))
{
 $site_url2 = explode("/", $site_url2);
  $folder_name_calc = $site_url2[3];
  $file_name_calc = $page_title;// should be like page title
        echo '<H2>Now please inspect <a target="_blank" href="http://'.$url.'/'.$folder_name_calc.'/'.$file_name_calc. '">the web directory page</a>. You may have to refresh it and possibly may need to refresh this page.</h2>';

 }
else
{
echo '<table><tr><td><img width="100" src="/blog/wp-content/plugins/bungeebones-remotely-hosted-web-directory1/images/logo3ang.gif"></td><td><h2>Step 1: Created a page and add the shorttag [bungeebones_directory] to it.</h2></td></tr>
<tr><td colspan="2"> Without a webpage to connect with it is impossible to configure this plugin. Please create a page and add the short tag to it.</td></tr>';
echo '<tr><td colspan="2"><p style="color: red;">Go to "Pages" (in the left nav of this page) and select  "Add New". Adding the shorttag [bungeebones_directory] to a page will cause the web directory categories and links to populate the page automatically.</p></td></tr>
		<tr><td colspan="2"><h2>After you have added the page then refresh this BungeeBones manager page to remove this alert message and continue to the next step.</td></tr></table>';   
}
   

        echo' <a href="javascript:history.go(-1)">    <h1><u>Go Back to form</u></h1> </a>';
      //$postfields['affiliate_num'] = $link_id ;//newest val from form
      $postfields['file_name'] = $file_name_calc ;//newest val from db search - 
      $postfields['folder_name'] = $folder_name_calc ;//newest val from db search - 
      $postfields['registered_link_list_selected'] = $registered_link_list_selected;//not sure whether necessary to send - may have already been processed
              $postfields['linkdisplay_color'] = $linkdisplay_color;
$postfields['linkdisplay_background_color'] = $linkdisplay_background_color;
$postfields['linkdesc_color'] = $linkdesc_color;
$postfields['linkdesc_background_color'] = $linkdesc_background_color;
$postfields['bb_cats_color'] = $bb_cats_color;

$postfields['bb_cats_background_color'] = $bb_cats_background_color;
    
    
    
  //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx  
    
      $result = $wpdb->get_var("update `wp_bungeebones` set `debug` = $debug_form, `offset`=$offset_form,  `incl_index_php` = $incl_index_php_form, `is_permalink` = '".$is_permalink."' 
          ,`bb_linkdisplay_color` = '$bb_linkdisplay_color',
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
  where `id` ='1'");
  // var_dump($wpdb->last_query);
   
   //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  
      If($link_cnt == 0)
      		{
        	$file="http://Bungeebones.com/link_exchange/wordpress/activate_non_affiliate.php";
         	}
      elseIf ($BBuser_ID != 1 OR isset($registered_link_list_selected)){
          $file="http://Bungeebones.com/link_exchange/wordpress/update_registered.php";
       	 }
      else//must be a non affiliate with a link and a widget
         {
      	$file="http://Bungeebones.com/link_exchange/wordpress/update_non_affiliate.php";
      	 }
   
     
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $file);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
      $data3 = curl_exec($ch);
      curl_close($ch);
     
     
       echo $data3;
     
      
     $pieces =  explode("|", $data3);
     $wp_bungeebones = "";   
     $link_id = $pieces[2];
     $link_id = trim($link_id);
 

global $wpdb;
$prefix = $wpdb->prefix;
$table_name =  $prefix.'bungeebones';
  
$wpdb->query("UPDATE $table_name SET affiliate_num = $link_id,debug = $debug_form,offset = $offset_form, incl_index_php = $incl_index_php_form WHERE id = 1 ");
//var_dump($wpdb->last_query);
 }
else
{

  echo'<form method="POST" action="'. $_SERVER['REQUEST_URI'].'">';
	if($link_cnt > 1){
  
	   $postfields = array();
$postfields['url'] = $_SERVER['SERVER_NAME'];

     			 $file="http://Bungeebones.com/link_exchange/wordpress/get_registered_list.php";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $file);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
      $link_list = curl_exec($ch);
      curl_close($ch);
   echo '<tr><td colspan="3"><br><hr><br></td></tr>';
   echo'<tr><td colspan="3"><h1>Select Link Account</h1>BungeeBones reports you have multiple locations where this link is being displayed. All non-registered/ non-affiliated links are listed in the "parked" category. Registered locations display their category location.  </td></tr>';
   echo $link_list;
 	}
  echo '<input type = "hidden" name="incl_index_php_form" value="1">';//used to be a radio button
	echo '<tr><td colspan="3"><br><hr><br></td></tr>';
 	echo '<tr><td colspan="3"><h1>Turn De-Bugging On </h1></td></tr>
  <tr><td><input type="radio" name="debug_form" ';

	  if($debug_form == 0  && $link_cnt > 0){
	  echo ' checked';
	    }
	echo ' value=0></td><td colspan="2">Debugging OFF</td><td> &nbsp;</td></tr>
 
  	<tr><td><input type="radio" name="debug_form" ';
	  if($debug_form == 1  or $link_cnt == 0){
	  echo ' checked';
	   }
	echo ' value=1></td><td  colspan="2">Debugging ON</td><td>';
   if($link_cnt == 0){
   echo ' - De-bugging turned "On" for initial configuration';
   }
   else
   echo '  &nbsp;';
   echo '</td> </tr>';
  echo '<tr><td colspan="3"><br><hr><br></td></tr>';
  echo '<tr><td colspan="3"><h1>Set Offset</h1></td></tr>';
  echo '<tr><td>&nbsp;</td><td colspan="2"><p>BungeeBones exchanges data with your plugin through variables in the urls when a category is selected. The "offset" setting is how to change the pointer. The factors affecting the correct setting are 1) your permalink settings and 2) the directory or sub-directory level that your WordPress is installed.</p>
   <p>Your task is to adjust the offset value (below) until the first number at the end of your directory page\'s url gets its value displayed by the debug report in the field titled "$url_cat = " (on the actual directory page after submitting the form). Submit this form and go view the page that you placed the web directory shortcode on. If it doesn\'t display the proper value, return to this page (refresh it) and adjust the offset up or down. (note: the usual setting is either 0 or -1)</p></td></tr>
<tr><td colspan="3">
<select name="offset_form">
<option value="0">None</option>
<option value="-1">-1</option>
<option value="-2">-2</option>
<option value="-2">-3</option>
</select></td></tr>
';
 echo '<tr><td colspan="3"><br><hr><br></td></tr>';
 echo '<tr><td colspan="3"><h1>Styling</h1></td></tr>';
echo '<tr><td colspan="3"><h3>Link Display</h3>
<select name="bb_linkdisplay_font_size">
<option value="0">None</option>
<option value="xx-small">xx-small</option>
<option value="x-small">x-small</option>
<option value="small">small</option>
<option value="medium">medium</option>
<option value="large">large</option>
<option value="x-large">x-large</option>	
<option value="xx-large">xx-large</option>
</select> Font Size</td></tr>
';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_linkdisplay_color" value="'.$bb_linkdisplay_color.'" size="10"> 	Font Color  </td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_linkdisplay_background_color" value="'.$bb_linkdisplay_background_color.'" size="10"> 	Background Color</td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><h3>Link Description</h3>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>
<select name="bb_linkdesc_font_size">
<option value="0">None</option>
<option value="xx-small">xx-small</option>
<option value="x-small">x-small</option>
<option value="small">small</option>
<option value="medium">medium</option>
<option value="large">large</option>
<option value="x-large">x-large</option>	
<option value="xx-large">xx-large</option>
</select>Font Size</td></tr>
';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_linkdesc_color" value="'.$bb_linkdesc_color.'" size="10"> 	Font Color</td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_linkdesc_background_color" value="'.$bb_linkdesc_background_color.'" size="10"> 	Background Color </td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><h3>Category Name</h3>
<select name="bb_cats_font_size">
<option value="0">None</option>
<option value="xx-small">xx-small</option>
<option value="x-small">x-small</option>
<option value="small">small</option>
<option value="medium">medium</option>
<option value="large">large</option>
<option value="x-large">x-large</option>	
<option value="xx-large">xx-large</option>
</select> Font Size</td></tr>
';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';



echo '<tr><td colspan="3">
<Input type="text" name="bb_cats_color" value="'.$bb_cats_color.'"size="10"> 	Font Color<br>
<Input type="text" name="bb_cats_visited" value="'.$bb_cats_visited.'"size="10">  Visited Link <br>
<Input type="text" name="bb_cats_hover" value="'.$bb_cats_hover.'"size="10">  Hovered Link <br>
<Input type="text" name="bb_cats_active" value="'.$bb_cats_active.'"size="10">  Active Link <br> </td></tr>';
echo '<tr><td colspan="3"><br><hr><br></td></tr>';
echo '<tr><td colspan="3"><Input type="text" name="bb_cats_background_color" value="'.$bb_cats_background_color.'" size="10">  Background Color</td></tr>';
 echo '<tr><td colspan="3"><br><hr><br></td></tr>';
    



  
  if(!isset($_POST['Submit']) && $link_cnt < 1){
	echo '<tr><td colspan="3" style="font-size: larger"><input type="submit" name="Submit" class="button-primary" value="Install"/>';
	echo '</form></td></tr>	</table>';
   }
	 elseif(!isset($_POST['Submit']) && $link_cnt > 0)
	 {
	echo'	<tr><td style="font-size: larger" colspan="3">  <input type="submit" name="Submit" class="button-primary" value="Save Changes" />';
  echo '</form></td></tr>	</table>';
        }
  }
