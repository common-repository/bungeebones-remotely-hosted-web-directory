 <?
  function get_link_id(){//detect if the url is listed in main BB database at Bungeebones.com
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
curl_close($ch);
//$data4 will be an array containing echo "$link_cnt1  $widget_cnt1  $link_id | $aftype | $folder_name | $install_location | $approved_message | $BB_user_ID";
return $data4;
}  





//error handler function

function customError($errno, $errstr)
  {
  echo "<b>Error:</b> [$errno] $errstr";
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

function permalink_setting($wp_post_ID){
  global $wpdb;
  $permalink = get_permalink($wp_post_ID);
    return $permalink;
}

/*function bung_table_install_data() {
   global $wpdb;
		$table_name = $wpdb->prefix . "bungeebones";
    $sql = "INSERT into ".$table_name." ( `debug`, `dyn_hdr`, `incl_index_php`) values ( '1', '-1', '1')";
 		$wpdb->query($sql);
} */

function my_admin_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>'; 
       // add_action('admin_menu', 'bungeebones_directory_admin_actions'); 
       } 
       
       
// We need some CSS to position the paragraph




  function bung_table_install() {
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
//2/5//2012var_dump($wpdb->last_query);
//2/5//2012echo 'dump query';
  //deactivated upgrade because it always caused the "headers" error at install
 //	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	//	dbDelta($sql);
	//}

}


function switch_query_syntax($data_pairs){
 //send $data_pairs in syntax `affiliate_num`='$link_id' for single or var_name=value,var_name=value,var_name=value
  global $wpdb;
  $count_words = str_word_count($data_pairs, 0);
  if($count_words > 0){
$data_array = explode(",", $data_pairs);//this will split pairs of pairs 
}
$count = count($data_array);
If($count > 1){
$query_statement_fr = "";
$query_statement_bk = "";
for ($a=0; $a<=$count; $a++){
$pair = explode("=", $data_pairs);
	if($count > $a){
	$query_statement_fr .= "$pair[0],";
	$query_statement_bk .= "$pair[1],";
	}
	else//build the last one
	{
	$query_statement_fr .= "$pair[0])values(";
	$query_statement_bk .= "$pair[1])";
	}
	$query_statement = "(".$query_statement_fr.$query_statement_bk;
  }
}
else//is just one single pair
{
$pair = explode("=", $data_pairs);
$query_statement = "($pair[0])values($pair[1])";
}

return $query_statement;					
}	

	function bb_install_data($data_pairs){	
		 global $wpdb;
     $prefix = $wpdb->prefix;
   $table_name =  $prefix.'bungeebones';//
		$check_q = $wpdb->get_row("SELECT * FROM $table_name WHERE id='1' LIMIT 1");
					$this_id = $check_q->id;
						if($check_q != NULL){
						$wpdb->query("
							UPDATE $table_name SET $data_pairs WHERE id='1'");
          //2/5//2012   var_dump($wpdb->last_query);
				} else {
					$query_statement = switch_query_syntax($data_pairs);
						$wpdb->query("INSERT INTO $table_name $query_statement");
//2/5//2012var_dump($wpdb->last_query);
			}
			}	
    
  


function bungeebones_install(){
bung_table_install();
get_link_id();
}
?>