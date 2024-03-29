<?php
/*
| -------------------------------------------------------------------
| CONFIG APPLICATION
| -------------------------------------------------------------------

| -------------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');
$config['DEMO'] = TRUE;
$fcmserver = 'AAAAsnGEPBs:APA91bH1oC7pDeYFj8pmAD76iv1RPPOxJ5FtJYeVjmQM6FbYJAV2Hlq_Sy1v2_4_7idWd3sjQ6VFGyclJnMZRV9veYQX_qe29S65xS5EgYBXFj-maCrIHxVNXOq3JV1ADzwtx6Ndoaz0';
$googleapi = 'AIzaSyBLrW7IzWzbII0Sex8zrRmCyAZRT7iWqUs';
$config['app_name'] = 'Gojasa New';

//$config['base_url'] = 'http://localhost/';
$config['base_url'] = 'https://'.$_SERVER['HTTP_HOST'].'/';
$config['app_api'] =    'AIzaSyBLrW7IzWzbII0Sex8zrRmCyAZRT7iWqUs';
$config['fcm_server'] = 'AAAAsnGEPBs:APA91bH1oC7pDeYFj8pmAD76iv1RPPOxJ5FtJYeVjmQM6FbYJAV2Hlq_Sy1v2_4_7idWd3sjQ6VFGyclJnMZRV9veYQX_qe29S65xS5EgYBXFj-maCrIHxVNXOq3JV1ADzwtx6Ndoaz0';

//mobilepulsa
$config['mp_server'] = 'https://prepaid.iak.dev/v1/legacy/index';
$config['mp_user'] = '';
$config['mp_apikey'] = '2526030b3e046f49';

define('firebaseDb', 'https://transme-versi2-default-rtdb.asia-southeast1.firebasedatabase.app/');
define('keyfcm', $fcmserver);

define('google_maps_api', $googleapi);

$config['index_page'] = '';

$config['uri_protocol']    = 'REQUEST_URI';

$config['url_suffix'] = '';

$config['language']    = 'english';


$config['charset'] = 'UTF-8';

$config['enable_hooks'] = FALSE;

$config['subclass_prefix'] = 'api_';

$config['composer_autoload'] = FALSE;

$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';

$config['allow_get_array'] = TRUE;

$config['log_threshold'] = 1;

$config['log_path'] = '';

$config['log_file_extension'] = '';

$config['log_file_permissions'] = 0644;


$config['log_date_format'] = 'Y-m-d H:i:s';


$config['error_views_path'] = '';

$config['cache_path'] = '';

$config['cache_query_string'] = FALSE;


$config['encryption_key'] = '';


$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = NULL;
//$config['sess_save_path'] = sys_get_temp_dir();
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;

$config['cookie_prefix']    = '';
$config['cookie_domain']    = '';
$config['cookie_path']        = '/';
$config['cookie_secure']    = TRUE;
$config['cookie_httponly']     = TRUE;
define('c9283746321av', '25862136');

$config['standardize_newlines'] = FALSE;
define('xcxc09ddlkfdf98xck0rt89dff', 'qn7nqAY7Zb02pogRzmJo84OJnycUkSwG');

$config['global_xss_filtering'] = FALSE;

$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

$config['compress_output'] = TRUE;


$config['time_reference'] = 'local';
define('c9283746321a', c9283746321av);
define('xcxc09ddlkfdf98xck0rt89df', xcxc09ddlkfdf98xck0rt89dff);

$config['rewrite_short_tags'] = FALSE;

$config['proxy_ips'] = '';
$config['LICENSE_KEY'] = 'PML-5L17-1Z55-XJ51-4638';

