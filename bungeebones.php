<?php
/*
Plugin Name: BungeeBones Remotely Hosted Web Directory
Plugin URI: http://BungeeBones.com
Description: The BungeeBones Remotely Hosted Web Directory plugin for Wordpress provides a "Collaborative" web directory for your Wordpress site. It is designed so that installers share the links submitted so the number of links in it becomes larger and more comprehensive to the end user. Collaborating is an easy way to operate and maintain a directory page for your users because all the category and link maintenance is provided by BungeeBones (free). Your "webmaster" users still get to submit a listing through your web directory but because of the collaboration their link shows up on your blog and also on all the other blogs and websites (BungeeBones is available for multiple platforms besides WordPress) that have installed the directory too. The amount of web traffic viewing the links is, as a result, increased with each new install and that is a great advantage to the lister. In addition, their link will continue to be added to all newly installed directories as they join so the amount of advertising it receives keeps growing. To get started: 1) Click the "Activate" link to the left of this description, 2) Add your link to BungeeBones (get your link/affiliate ID), and 3) Go to your bunbones-config.php page, and save your API key (click the "Edit" link below the BungeeBones plugin)..


For more install instructions visit the "Installation" page from the link under "BungeeBones" in your WordPress Dashboard.
This is a major revision that eliminates the need to register as a user at BungeeBones and also configures itself automatically.
Version: 2.1
Author: Robert Lefebure
Author URI: http://BungeeBones.com
*/

remove_filter('template_redirect', 'redirect_canonical');
add_shortcode("bungeebones_directory","bungeebones_directory_shortcode"); 

function var_string_post($url_cat,$cat_page_num,$link_page_num,$pagem_url_cat,$link_page_id,$link_page_total,$link_record_num,$regional_number){

if ($regional_number !== "") {
  $i = 'regional_number';
} elseif ($link_record_num !== "") {
 $i = 'link_record_num';
} elseif ($link_page_total !== "") {
  $i = 'link_record_total';
} elseif ($link_page_id !== "") {
  $i = 'link_page_id';
} elseif ($pagem_url_cat !== "") {
   $i = 'pagem_url_cat';
}elseif ($link_page_num !== "") {
  $i = 'link_page_num';
} elseif ($cat_page_num !== "") {
   $i = 'cat_page_num';
} elseif ($url_cat !== "") {
 $i = 'url_cat';
} 


switch ($i) {
 case "regional_number":
        $var_string_post = $url_cat.','.$cat_page_num.','.$link_page_num.','.$pagem_url_cat.','.$link_page_id.','.$link_page_total.','.$link_record_num.','.$regional_number;
        break;
 case "link_record_num":
        $var_string_post = $url_cat.','.$cat_page_num.','.$link_page_num.','.$pagem_url_cat.','.$link_page_id.','.$link_page_total.','.$link_record_num;
        break;
 case "link_page_total":
        $var_string_post = $url_cat.','.$cat_page_num.','.$link_page_num.','.$pagem_url_cat.','.$link_page_id.','.$link_page_total;
      break;
 case "link_page_id":
        $var_string_post = $url_cat.','.$cat_page_num.','.$link_page_num.','.$pagem_url_cat.','.$link_page_id;
        break;
 case "pagem_url_cat":
       $var_string_post = $url_cat.','.$cat_page_num.','.$link_page_num.','.$pagem_url_cat;
        break;
 case "link_page_num":
        $var_string_post = $url_cat.','.$cat_page_num.','.$link_page_num;
 case "cat_page_num":
        $var_string_post = $url_cat.','.$cat_page_num;
  break;
 case "cat_page_num":
        $var_string_post = $url_cat.','.$cat_page_num;
  break;
}
return $var_string_post;
}

//function bungeebones_admin() {  
 //   include('bungeebones_admin.php');  
//}  
 global $wpdb;

function bb_menu() {
add_menu_page( 'bungeebones', 'Bungeebones', 'edit_pages', 'bungeebones', array(&$this, 'mainAdmin'), null, 10, 'admin/bb_home');
add_submenu_page('bungeebones', 'Bungeebones Instructions', 'Instructions', 'edit_pages', 'bungeebones-instructions', 'bb_instructions');
add_submenu_page('bungeebones', 'Bungeebones Registered', 'Registered', 'edit_pages', 'bungeebones-registered',  'bb_registered');
add_submenu_page('bungeebones', 'Bungeebones Non_Registered', 'Non_Registered', 'edit_pages', 'bungeebones-non_registered',  'bb_non_registered');
add_submenu_page('bungeebones', 'Bungeebones Styles', 'Styles', 'edit_pages', 'bungeebones-styles', 'bb_styles');
}



function bb_instructions() {
	include("admin/bb_instructions.php");
}
function bb_registered() {
	include("admin/bb_registered.php");
}
function bb_non_registered() {
	include("admin/bb_non_registered.php");
}
function bb_styles() {
	include("admin/bb_styles.php");
}



add_action('admin_menu', 'bb_menu');
function bungeebones_directory_shortcode($atts) {
	extract(shortcode_atts(array('width'=>'100%','name'=>' the BungeeBones Distributed Directory'),$atts));
  global $wpdb;

function customError($errno, $errstr)
  {
  echo "<b>Error:</b> [$errno] $errstr";
  }

//set error handler
//set_error_handler("customError");

global $wpdb;

$myvar = $wpdb->get_results("SELECT * FROM wp_bungeebones WHERE `id` = '1'", ARRAY_A );
 $result = count($myvar);
  if($result > 0){

$pieces = explode("/", $myvar[0]);
 }
//[id] => 1 [greeting] => [affiliate_num] => 4518 [offset] => 0 [debug] => 1 [is_registered] => [incl_index_php] => 0 [is_permalink] => 
$affiliate_num = $myvar[0][affiliate_num];
$offset= $myvar[0][offset];
$debug= $myvar[0][debug];
$is_registered= $myvar[0][is_registered];
$incl_index_php= $myvar[0][incl_index_php];
$is_permalink= $myvar[0][is_permalink];
$bb_linkdisplay_color= $myvar[0][bb_linkdisplay_color];
$bb_linkdisplay_background_color= $myvar[0][bb_linkdisplay_background_color];
$bb_linkdesc_color= $myvar[0][bb_linkdesc_color];
$bb_linkdesc_background_color= $myvar[0][bb_linkdesc_background_color];
$bb_cats_color= $myvar[0][bb_cats_color];
$bb_cats_background_color= $myvar[0][bb_cats_background_color];
$bb_linkdisplay_font_size= $myvar[0][bb_linkdisplay_font_size];
$bb_linkdesc_font_size= $myvar[0][bb_linkdesc_font_size];
$bb_cats_font_size= $myvar[0][bb_cats_font_size];

$var1 = $_GET['var_string'];
$var = explode(',', $var1);
$url_cat = $var[0] ;
$cat_page_num = $var[1] ;
$link_page_num = $var[2] ;
$pagem_url_cat = $var[3] ;
$link_page_id = $var[4] ;
$link_page_total = $var[5] ;
$link_record_num = $var[6] ;
$regional_number = $var[7] ;

if($debug  == 1){


echo '<br>$affiliate_num = ',$affiliate_num;
echo '<br>$url_cat = ',$url_cat;
echo '<br>$offset= ',$offset;
echo '<br>$debug= ',$debug;
echo '<br>$is_registered= ',$is_registered;
echo '<br>$incl_index_php= ',$incl_index_php;
echo '<br>$is_permalink= ',$is_permalink;
}
echo '<style type="text/css">
  .linksdisplay {
    color: '.$bb_linkdisplay_color.';
    background-color: '.$bb_linkdisplay_background_color.'; }
                       
     font-size: '.$bb_linkdisplay_font_size.'; }
     .linksdesc {
     
     font-family: Georgia, "Times New Roman",
          Times, serif;
    color: '.$bb_linkdesc_color.';
    background-color: '.$bb_linkdesc_background_color.'; }
                         
  font-size: '.$bb_linkdesc_font_size.'; }
    a.bb_cats { 
   color: '.$bb_cats_color.';
    font-size: '.$bb_cats_font_size.'; }
 a.bb_cats:link {color:'.$bb_cats_color.';}      /* unvisited link */
a.bb_cats:visited {color:'.$bb_cats_visited.';}  /* visited link */
a.bb_cats:hover {color:'.$bb_cats_hover.';}  /* mouse over link */
a.bb_cats:active {color:'.$bb_cats_active.';}  /* selected link */ 



    .bb_cats {
   text-decoration: none;
    color: '.$bb_cats_color.';
    background-color: '.$bb_cats_background_color.'; }
  </style>';
	


?>
<script type="text/javascript">
/*<![CDATA[*/
function changeText2(){
var arrlength = arguments.length/3;
var arrlengthsc = arrlength+arrlength;
var c = "c";	
var sc = "sc";
for( var i = 0; i < arrlength; i++ ) {
document.getElementById(c+arguments[i]).innerHTML = arguments[arrlength+i];
if(arguments[arrlengthsc+i]){
document.getElementById(sc+arguments[i]).innerHTML = arguments[arrlengthsc+i];
}
}
}
/*]]>*/
</script> 
<?

 $postfields = array();
 $postfields['affiliate_num'] = $affiliate_num;
 $var_string_post = var_string_post($url_cat,$cat_page_num,$link_page_num,$pagem_url_cat,$link_page_id,$link_page_total,$link_record_num,$regional_number);
 $postfields['var_string_post'] = $var_string_post;
 $file="http://Bungeebones.com/link_exchange/index_wp.php/";

if($debug  == 1){
echo '<br>';
print_r($file);
echo '<br>';
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $file);
  curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data3 = curl_exec($ch);
curl_close($ch);
echo($data3);				
}
?>
