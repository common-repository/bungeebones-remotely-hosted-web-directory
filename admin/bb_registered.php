<?php



if(isset($_POST['Submit'])){
  global $wpdb;
   global $bung_table_db_version;
       $prefix = $wpdb->prefix;
   $table_name =  $prefix.'bungeebones';//
   //  if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) 
	//{
   $sql = "CREATE TABLE IF NOT EXISTS ".$table_name." ( id mediumint(9) NOT NULL default '1', greeting tinytext NOT NULL,  affiliate_num 	int(20) default '1',  dyn_hdr 	int(1),  debug	 int(1),  is_registered int(1),	incl_index_php int(1),  is_permalink int(1), 
  bb_pre_title VARCHAR(50) NULL,
 bb_post_title VARCHAR(50) NULL,
 bb_descrip VARCHAR(255) NULL,
 bb_keywords VARCHAR(255) NULL,
 bb_robots VARCHAR(55) NOT NULL,
   bb_linkdisplay_color VARCHAR(15) NOT NULL,
  bb_linkdisplay_background_color VARCHAR(15) NOT NULL, 
  bb_linkdisplay_font_size varchar (8) NULL,
   bb_linkdesc_color VARCHAR(15) NOT NULL,  
   bb_linkdesc_background_color VARCHAR(15) NOT NULL,
   bb_linkdesc_font_size varchar (8) NULL,
   bb_cats_color  VARCHAR(15) NOT NULL,
   bb_cats_visited VARCHAR(15) NOT NULL,
bb_cats_hover VARCHAR(15) NOT NULL,
bb_cats_active VARCHAR(15) NOT NULL,
   bb_cats_background_color VARCHAR(15) NOT NULL, 
   bb_cats_font_size varchar (8) NULL,
   UNIQUE KEY affiliate_num (affiliate_num) )";
   $wpdb->query($sql);


global $wpdb;

$myvar = $wpdb->get_results("SELECT * FROM wp_bungeebones WHERE `id` = '1'", ARRAY_A );
 $result = count($myvar);
  if($result < 1){
 global $wpdb;
		$table_name = $wpdb->prefix . "bungeebones";
    $sql = "INSERT into ".$table_name." ( `debug`, `dyn_hdr`, `incl_index_php`) values ( '1', '-1', '1')";
 		$wpdb->query($sql);
}
require_once('functions.php');

 register_activation_hook(__FILE__,'bungeebones_install');

$pieces2 = explode("|",get_link_id());

global $link_cnt; // $link_cnt | 

global $widget_cnt; // $widget_cnt 

global $link_id; // $link_id 

global $aftype; // $aftype

global $folder_name_exploded;//this folder name should be labeled 'folder_name_exploded' to differentiate it from folder name form

global $current_location; // $file name actually

global $approved_message; // tells us if parked , unregistered ie not advertisied or not

global $BBuser_ID; 



$link_cnt = $pieces2[0]; // $link_cnt | 

$widget_cnt = $pieces2[1]; // $widget_cnt 

$link_id = $pieces2[2]; // $link_id 

$aftype = $pieces2[3]; // $aftype

$folder_name_exploded = $pieces2[4];//this folder name should be labeled 'folder_name_exploded' to differentiate it from folder name form

$current_location = $pieces2[5]; // $file name actually

$approved_message = $pieces2[6]; // tells us if parked , unregistered ie not advertisied or not

$BBuser_ID = $pieces2[7];


add_action(  'check_shortcode_page', 'get_link_id',  'bung_table_install', 'bb_install_data' );

?>

<div class="wrap">

	<h2>Checking Your Link's and Domain's Status at BungeeBones.com</h2>

<?php

global $wpdb;



//set_error_handler("customError");
if(!isset($bb_pre_title)){$bb_pre_title = "";}
if(!isset($bb_post_title)){$bb_post_title = "";}
if(!isset($bb_descrip)){$bb_descrip = "";}
if(!isset($bb_keywords)){$bb_keywords = "";}
if(!isset($bb_robots)){$bb_robots = "";}
if(!isset($var_string)){$var_string = "";}
if(!isset($link_cnt)){$link_cnt = "";}
if(!isset($dyn_hdr)){$dyn_hdr = "";}
if(!isset($debug)){$debug = "";}
if(!isset($debug_form)){$debug_form = "";}
if(!isset($dyn_hdr_form)){$dyn_hdr_form = "";}
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
global $wpdb;
 $myvar = $wpdb->get_results("SELECT * FROM wp_posts WHERE (`post_status` = 'publish' OR `post_status` = 'private') AND `post_content` LIKE '%bungeebones_directory%'", ARRAY_N );
 $result = count($myvar);
 if($result > 0){
     $wp_post_ID = $myvar[0][0];
     $page_title = $myvar[0][5];
     $page_name = $myvar[0][12];//page name bcomes part of the permalink name
     $status_bungeebones = $myvar[0][7];
    $guid_bungeebones = $myvar[0][18];
    $pieces = explode("/", $guid_bungeebones);
    if($status_bungeebones == 'private')
    {
   echo '<img src = "/check-mark-13x13-md.png"><h3>We have detected the page where you inserted the Bungeebones short code and will use that location as the configuration at Bungeebones.com. It\'s status is currently set to private and the public will not be able to view the page so remember to change that after the installation is complete. </h3> ';
  }
     else if($status_bungeebones == 'publish')
     {
      echo '<img src = "/check-mark-13x13-md.png"><h3>We have detected the page where you inserted the Bungeebones short code and will use that location as the configuration at Bungeebones.com. It\'s status is currently set to publish and the public be able to view the page. You may wish to change it to "private" during installation but, if you do, remember to change that after the installation is complete. </h3> ';
     }
     else
     {
     echo 'Error: BB_Connect.php - We have not beenable to detect the page where you typed the BungeeBones Short code on any of your pages. The first step to getting the pluggin activated is to type create a new blog page and add the text "[bungeebones_directory]" (without the quotes) to the page. The directory will display where you insert the short that short code.';
     exit();
     
     }
  } 

  $slots = count($pieces);
    
$url= $_SERVER['SERVER_NAME'];
$postfields = array();
$postfields['url'] = $_SERVER['SERVER_NAME'];
$postfields['folder_name'] = $pieces[$slots-2];
$postfields['file_name'] = $pieces[$slots-1];
//pieces gotten from exploding quid 


$file="http://Bungeebones.com/link_exchange/wordpress/check_url.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $file);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data4 = curl_exec($ch);
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


global $wpdb;
$prefix = $wpdb->prefix;
$table_name =  $prefix.'bungeebones';
$wpdb->query("UPDATE $table_name SET `affiliate_num` = $link_id WHERE id = '1' ");

 if(isset($_POST['Submit']))
     {
      $var = explode("/", $_SERVER['REQUEST_URI']);
      $postfields = array();
      $postfields['url'] = $_SERVER['SERVER_NAME'];
   $var_string = $_POST['var_string'];
    $postfields['incl_index_php'] = $_POST['incl_index_php_form'];//newest val from form will calc file name
     $postfields['file_name'] = $file_name_calc;
      $postfields['folder_name'] = $folder_name_calc;
      $debug_form = $_POST['debug_form'];
     if($debug_form=="on" or $debug_form=="1"){$debug_form = 1;}
      else
    {
     $debug_form = 0;
      }
     $dyn_hdr_form = $_POST['dyn_hdr_form'];
      if($dyn_hdr_form=="on" or $dyn_hdr_form=="1"){$dyn_hdr_form = 1;}
      else
      {
      $dyn_hdr_form = 0;
      }
      $bb_pre_title= $_POST['bb_pre_title'];
 $bb_post_title= $_POST['bb_post_title'];
$bb_descrip= $_POST['bb_descrip'];
$bb_keywords= $_POST['bb_keywords'];
 $bb_robots= $_POST['bb_robots'];
  $registered_link_list_selected = $_POST['registered_list'];
 $permalink_setting = permalink_setting($wp_post_ID);
   $pieces_permalink = explode("/", $permalink_setting);
  $count_permalink = count($pieces_permalink);//getting the count should tell what level is installed at - root level will have a count of 3, one level down would have count of 4
$site_url2 =  siteurl_setting();

if($count_permalink == 5){
$folder_name_calc = $pieces_permalink[$count_permalink-2];
}
elseif($count_permalink == 6){
$folder_name_calc = $pieces_permalink[$count_permalink-3]."/".$pieces_permalink[$count_permalink-2];
}
elseif($count_permalink == 7){
$folder_name_calc = $pieces_permalink[$count_permalink-4]."/".$pieces_permalink[$count_permalink-3]."/".$pieces_permalink[$count_permalink-2];
}
else
{
$folder_name_calc = "root";
}

  $file_name_calc = $pieces_permalink[$count_permalink-1];// value should be like page title
if( !isset($page_title))
{
echo '<table><tr><td><img width="100" src="/blog/wp-content/plugins/bungeebones-remotely-hosted-web-directory1/images/logo3ang.gif"></td><td><h2>Step 1: Created a page and add the shorttag [bungeebones_directory] to it.</h2></td></tr>
<tr><td colspan="2"> Without a webpage to connect with it is impossible to configure this plugin. Please create a page and add the short tag to it.</td></tr>';
echo '<tr><td colspan="2"><p style="color: red;">Go to "Pages" (in the left nav of this page) and select  "Add New". Adding the shorttag [bungeebones_directory] to a page will cause the web directory categories and links to populate the page automatically.</p></td></tr>
<tr><td colspan="2"><h2>After you have added the page then refresh this BungeeBones manager page to remove this alert message and continue to the next step.</td></tr></table>';   
}
 else
 {
  echo '<H2>Now please inspect <a target="_blank" href="http://'.$url.'/'.$folder_name_calc.'/'.$file_name_calc. '">the web directory page</a>. You may have to refresh it and possibly may need to refresh this page.</h2>';
 }  
        echo' <a href="javascript:history.go(-1)">    <h1><u>Go Back to form</u></h1> </a>';
        $postfields['file_name'] = $file_name_calc ;//newest val from db search - 
      $postfields['folder_name'] = $folder_name_calc ;//newest val from db search - 
      $postfields['registered_link_list_selected'] = $registered_link_list_selected;//not sure whether necessary to send - may have already been processed
              $postfields['linkdisplay_color'] = $linkdisplay_color;
$postfields['linkdisplay_background_color'] = $linkdisplay_background_color;
$postfields['linkdesc_color'] = $linkdesc_color;
$postfields['linkdesc_background_color'] = $linkdesc_background_color;
$postfields['bb_cats_color'] = $bb_cats_color;
$postfields['bb_cats_background_color'] = $bb_cats_background_color;
      $result = $wpdb->get_var("update `wp_bungeebones` set 
      `affiliate_num` = '$link_id',
      `debug` = '$debug_form', 
      `dyn_hdr`='$dyn_hdr_form', 
     `is_permalink` = '$is_permalink' 
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
`bb_cats_font_size` = '$bb_cats_font_size',
`bb_pre_title` = '$bb_pre_title',
 `bb_post_title` = '$bb_post_title',
`bb_descrip` = '$bb_descrip',
`bb_keywords` = '$bb_keywords',
 `bb_robots` = '$bb_robots'
  where `id` ='1'");
  
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
$wpdb->query("UPDATE $table_name SET affiliate_num = $link_id,debug = $debug_form,dyn_hdr = $dyn_hdr_form, incl_index_php = $incl_index_php_form WHERE id = 1 ");
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
  }
?>
</div>
<?

echo '<h1>Success!</h1><h3>Your settings have been saved</h3>';

}
else
{
global $wpdb;
$myvar = $wpdb->get_results("SELECT * FROM wp_bungeebones WHERE id=1", ARRAY_A );


  echo'<form method="POST" action="'. $_SERVER['REQUEST_URI'].'">';
 echo '<tr><td colspan="3"><h1>Registered User Plugin Configuration</h1></td></tr>';
 echo '<tr><td colspan="3"><br><hr><br></td></tr>';
 echo '<tr><td colspan="3"><p>Use this form <b>ONLY</b> if you have already registered at BungeeBones.com and also have added this website as a link at BungeeBones.com (to add it as a link login at BungeeBones.com to get to your BungeeBones User Control Panel and then follow the instructions (if this is your first link) or click "Add A Link" in the upper nav bar..</td></tr>';

echo '<tr><td colspan="3" style="font-size: larger"><input type="submit" name="Submit" class="button-primary" value="Click Here To Connect As registered User"/>';
	echo '</form></td></tr>	</table>';
}
