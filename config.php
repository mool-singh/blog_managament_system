<?php 
 ini_set('display_errors', 1); ini_set('log_errors', 1); error_reporting(E_ALL);
// API auth credentials 
define("ApiUser", "admin");
define("ApiPass", "12345");
// API key 
define("APIKEY", "12345");
// Site Path
define("SITE_URL", "http://localhost/blog_management/admin/api/");
define("ADMIN_PATH", "http://localhost/blog_management/admin/"); 
define("BASE_PATH", "http://localhost/blog_management/");
define("DOC_PATH", __DIR__."/admin/");
function getData($url,$id = NULL)
{   
	// API URL
	if(empty($id)){
		$url = SITE_URL.$url; 
	}else{
		$url = SITE_URL.$url.'/'.$id; 
	} 
	 
	

	// Create a new cURL resource
	$ch = curl_init($url);
	$apiUser  = ApiUser;
	$apiPass = ApiPass;
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . APIKEY));
	curl_setopt($ch, CURLOPT_USERPWD, "$apiUser:$apiPass");

	$result = curl_exec($ch);
	// prd($result);  
	// Close cURL resource
	curl_close($ch);
	$mydata=json_decode($result, true); 
    return $mydata;
}
	

function postData($url, $data)
{
	// User account login info
	$apiData = $data;
	// API URL
	$url = SITE_URL.$url; 
	
	
	// Create a new cURL resource
	$ch = curl_init($url);
	$apiUser  = ApiUser;
	$apiPass = ApiPass;
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . APIKEY));
	curl_setopt($ch, CURLOPT_USERPWD, "$apiUser:$apiPass");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $apiData);

	$result = curl_exec($ch); 
	
	// Close cURL resource
	curl_close($ch);
	$mydata=json_decode($result, true); 
    return $mydata;
}


function putData($url, $data)
{
	// User account login info
	$apiData = $data;
	// API URL
	$url = SITE_URL.$url; 

	// Create a new cURL resource 
	$ch = curl_init($url);
	$apiUser  = ApiUser;
	$apiPass = ApiPass;
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: '.APIKEY, 'Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch, CURLOPT_USERPWD, "$apiUser:$apiPass");
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($apiData));

	$result = curl_exec($ch);
	// Close cURL resource
	curl_close($ch);
	$mydata=json_decode($result, true); 
    return $mydata;

}

function redirect($url){
	header("Location: ".BASE_PATH.$url."");
	die();
}
 
/*Othere Bacis functions for site*/
function getimage($image,$defaultImg=NULL){
	$defaultImgPath = 'assets/img/'; 
	if(isset($image) && !empty($image) && file_exists(DOC_PATH.$image)){
        $img = ADMIN_PATH.$image;
    }elseif(isset($defaultImg) && !empty($defaultImg) && file_exists(DOC_PATH.$defaultImgPath.$defaultImg)){
        $img = ADMIN_PATH.$defaultImgPath.$defaultImg;
    }else{
        $img = ADMIN_PATH.'assets/img/profileicon.png';
    }
    return $img;
}


function check_data_exist($data)
{

	$response = 1;


	if(empty($data))
	{
		$response = 0;
	}
	elseif(!isset($data['status']) || !$data['status'])
	{
		$response = 0;
	}
	elseif(!isset($data['data']) || empty($data['data']))
	{
		$response = 0;
	}

	



	return $response;
	

}


function key_has_value($data,$key)
{
	$response = 1;

	if(!isset($data['data']) || empty($data))
	{
		
		return 0;
	}

	if($data['data'][$key]=='')
	{
		return 0;
	}



	return $response;
}


function pr($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function prd($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	die;
}

?>