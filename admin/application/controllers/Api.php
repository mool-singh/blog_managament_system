<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

	public function __construct(){
		parent::__construct(); 
		$this->load->model('setting_model', 'setting_model'); 
		$this->load->model('category_model', 'category_model');		
	}
 
	public function setting_get($id = null){
		$data = [];
		if ($this->input->server('REQUEST_METHOD') == 'GET') 
        {
            
			$global_data = [];
			$general_settings = [];	
			$all_general_settings = [];		
			$type = $id;
	        $general_settings_data = $this->setting_model->get_general_settings();
	        foreach ($general_settings_data as $skey => $svalue) {
	           $global_data['general_settings'][$svalue['setting_type']][$svalue['setting_name']]= $svalue['filed_value'];
	           $all_general_settings[$svalue['setting_name']]= $svalue['filed_value'];
	        } 
	        if(!empty($type)){
	        	$general_settings = $global_data['general_settings'][$type];
	        }else{
	        	$general_settings = $all_general_settings;
	        } 
			if($general_settings){
				$data = $general_settings;	
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}
 	
 	public function allcategory_post(){ 
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {        
        	$retdata = [];
            $start = !empty($this->post('start'))?$this->post('start'):'0';
            $limit = !empty($this->post('limit'))?$this->post('limit'):'0';
            $order_field = !empty($this->post('sort'))?$this->post('sort'):'created_at';
            $order_by = !empty($this->post('order'))?$this->post('order'):'ASC';

        	$wh = !empty($this->post('where'))?$this->post('where'):'';
			$SQL ='SELECT *,(select count(*) as total from ci_product_to_category as p2c where p2c.category_id=c.id) as totpro FROM ci_categories as c';
			if(!empty($wh))
			{
				$SQL .= " where " . $wh;
			}
			if (($order_field != '')) { 
				$SQL .= " ORDER BY " . $order_field . " " . $order_by;
			}
        	if (($start!=0) || ($limit!=0)) { 
				$SQL .= " LIMIT " . (int)$start . "," . (int)$limit;
			}  
			$query = $this->db->query($SQL);
			$retdata = $query->result_array();
	        /*switch ($type) {
	            case 'count': $retdata = $query->num_rows();
	            case 'array': $retdata = $query->row_array();
	            default: $retdata = $query->result_array();
	        }*/
	        if($retdata){
				$data = $retdata;	
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
        }else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }  
    }

    public function cms_get($id = null){
		$data = [];
		if ($this->input->server('REQUEST_METHOD') == 'GET') 
        {
			$cms_data = []; 
	        $general_cms_data = $this->cms_model->get_cms_by_id($id);
			if($general_cms_data){
				$data = $general_cms_data;	
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}

	public function listing_post(){  
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {        
        	$retdata = [];
            $start = !empty($this->post('start'))?$this->post('start'):'0';
            $limit = !empty($this->post('limit'))?$this->post('limit'):'0';
            $order_field = !empty($this->post('sort'))?$this->post('sort'):'created_at';
            $order_by = !empty($this->post('order'))?$this->post('order'):'ASC';

        	$wh = !empty($this->post('where'))?$this->post('where'):'';
			$SQL ='SELECT * FROM '.$this->post('table');
			if(!empty($wh))
			{
				$SQL .= " where " . $wh;
			}
			if (($order_field != '')) { 
				$SQL .= " ORDER BY " . $order_field . " " . $order_by;
			}
        	if (($start!=0) || ($limit!=0)) { 
				$SQL .= " LIMIT " . (int)$start . "," . (int)$limit;
			}  
			$query = $this->db->query($SQL);
			$retdata = $query->result_array(); 
	        if($retdata){
				$data = $retdata;	
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => $SQL
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
        }else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }  
    }

    public function productlist_post()
    {  
	    if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {        
        	$retdata = [];
            $start = !empty($this->post('start'))?$this->post('start'):'0';
            $limit = !empty($this->post('limit'))?$this->post('limit'):'0';
            $order_field = !empty($this->post('sort'))?$this->post('sort'):'created_at';
            $order_by = !empty($this->post('order'))?$this->post('order'):'ASC';

        	$wh = !empty($this->post('where'))?$this->post('where'):'';
			$SQL ='SELECT p.*,(select image from ci_product_image pi where pi.product_id=p.id order by sort_order ASC LIMIT 1 ) as image FROM ci_products p';  
			if(!empty($wh))
			{
				$SQL .= " where " . $wh;
			}

			$SQL .= " GROUP by p.id";
			
			if (($order_field != '')) { 
				$SQL .= " ORDER BY " . $order_field . " " . $order_by;
			}
        	if (($start!=0) || ($limit!=0)) { 
				$SQL .= " LIMIT " . (int)$start . "," . (int)$limit;
			}  
			 
			$query = $this->db->query($SQL);
			$retdata = $query->result_array(); 
	        if($retdata){
				$data = $retdata;	
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
        }else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        } 
    }

    public function saveinquery_post(){ 

       

		if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {        
        	$linkID = ($this->input->post('link_id'))?$this->input->post('link_id'):0;
        	$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'subject' => $this->input->post('subject'),
				'message' => $this->input->post('message'),				
				'ip_address' => $_SERVER['REMOTE_ADDR'],
				'inquiry_mode' => 1, 
				'inquiry_type' => $this->input->post('inquiry_type'), 
				'link_id' => $linkID, 
				'created_at' => date('Y-m-d : h:m:s'),
				'updated_at' => date('Y-m-d : h:m:s'),
			);
			$data = $this->security->xss_clean($data);

           

			$result = $this->inquiry_model->addgernalinquery($data);
            
            
            
           

			$general_settings_data = $this->setting_model->get_general_settings(1);

           

			foreach ($general_settings_data as $skey => $svalue) {
	           $global_data['general_settings'][$svalue['setting_type']][$svalue['setting_name']]= $svalue['filed_value'];
	           $all_general_settings[$svalue['setting_name']]= $svalue['filed_value'];
	        }  

           

            if($result){
            	$msg = 'Your inquiry sent successfully to Administrator.';
                
                
                $post_data = $this->input->post();
                // $posted_data = $post_data['data'];
                

				// sending welcome email to user
				$this->load->helper('email_helper');
				$name = $all_general_settings['application_name']; 
				$body = $this->input->post('message');
				$to = $all_general_settings['first_email'];
				$subject = $this->input->post('subject');
				$message =  $body;

               
               
              

				$email = send_email($to, $subject, $message, $file = '' , $cc = '');

               
				if($email){
					$msg = 'Your inquiry sent successfully to Administrator.';	 
				}	
				else{
					$msg = 'Email Error';
				}
			} 
	        if($result){
				$data = 1;	
				$this->response([
                    'status' => TRUE,
                    'message' => $msg,
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
        }else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }  
    }

    public function saveinquerypackage_post(){ 
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {     
            
           
        	
        	$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'subject' => $this->input->post('subject'),
				'message' => $this->input->post('message'),	
                'tour_id' => $this->input->post('tour_id'),	
                'tour_package_id' => $this->input->post('tour_package_id'),	
                'no_of_adult' => $this->input->post('no_of_adult'),	
                'no_of_child' => $this->input->post('no_of_child'),				
				'ip_address' => $_SERVER['REMOTE_ADDR'],
				'inquiry_mode' => 1,  
				'created_at' => date('Y-m-d : h:m:s'),
				'updated_at' => date('Y-m-d : h:m:s'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->inquiry_model->addpackageinquery($data);
			$general_settings_data = $this->setting_model->get_general_settings(1);
			foreach ($general_settings_data as $skey => $svalue) {
	           $global_data['general_settings'][$svalue['setting_type']][$svalue['setting_name']]= $svalue['filed_value'];
	           $all_general_settings[$svalue['setting_name']]= $svalue['filed_value'];
	        }  
           
            	$msg = 'Your inquiry sent successfully.';	 
				
				
			
	        if($result){
				$data = [];	
				$this->response([
                    'status' => TRUE,
                    'message' => $msg,
                    'data' => '1'
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
        }else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }  
    }


	public function category_get($id = null){
		$data = [];
		if ($this->input->server('REQUEST_METHOD') == 'GET') 
        {
			$cms_data = []; 
	        $category_data = $this->category_model->get_category_by_id($id);
			if($category_data){
				$data = $category_data;	
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}

     // get photo category 
     public function catwithphotos_get($id=null)
     {   
 
         if ($this->input->server('REQUEST_METHOD') == 'GET')
         {
            //  $result = $id;
            $result = $this->gallery_model->get_cat_with_data($id);
 
             $this->response([
                 'status' => TRUE,
                 'message' =>'Successfull',
                 'data' => $result
             ], REST_Controller::HTTP_OK);
         }
         else
         {
             $this->response([
                 'status' => TRUE,
                 'message' => "invalid request",
                 'data' =>[]
             ], REST_Controller::HTTP_BAD_REQUEST);
         }
 
        
 
     }

	public function totalproduct_post(){
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {  
        	$start = !empty($this->post('start'))?$this->post('start'):'0';
            $limit = !empty($this->post('limit'))?$this->post('limit'):'0';
            $sort = !empty($this->post('sort'))?$this->post('sort'):'created_at';
            $order = !empty($this->post('order'))?$this->post('order'):'ASC';
 			$category_id = !empty($this->post('category_id'))?$this->post('category_id'):'0';
 			
 			$reqdata = array(
        		'start'=> $start,
        		'limit'=> $limit,
        		'category_id'=> $category_id,
        		'sort'=> $sort,
        		'order'=> $order,
        	);        	
        	$retdata = [];
            $total_product_data = $this->product_model->getTotalProducts($reqdata);
             
			$data = $total_product_data;	
			$this->response([
                'status' => TRUE,
                'message' => 'Successful.',
                'data' => $data
            ], REST_Controller::HTTP_OK);
			 
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}

	public function allproducts_post(){ 
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
			$start = !empty($this->post('start'))?$this->post('start'):'0';
            $limit = !empty($this->post('limit'))?$this->post('limit'):'0';
            $sort = !empty($this->post('sort'))?$this->post('sort'):'created_at';
            $order = !empty($this->post('order'))?$this->post('order'):'ASC';
 			$category_id = !empty($this->post('category_id'))?$this->post('category_id'):'0';
 
        	$reqdata = array(
        		'start'=> $start,
        		'limit'=> $limit,
        		'category_id'=> $category_id,
        		'sort'=> $sort,
        		'order'=> $order,
        	); 
        	$retdata = [];
        	$total_product_data = $this->product_model->getProducts($reqdata);
			 
				$data = $total_product_data;	
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			 
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}


	public function totalservice_post(){
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {  
        	$start = !empty($this->post('start'))?$this->post('start'):'0';
            $limit = !empty($this->post('limit'))?$this->post('limit'):'0';
            $sort = !empty($this->post('sort'))?$this->post('sort'):'created_at';
            $order = !empty($this->post('order'))?$this->post('order'):'ASC'; 
 			
 			$reqdata = array(
        		'start'=> $start,
        		'limit'=> $limit, 
        		'sort'=> $sort,
        		'order'=> $order,
        	);        	
        	$retdata = [];
            $total_service_data = $this->service_model->getTotalService($reqdata);
             
			$data = $total_service_data; 
			$this->response([
                'status' => TRUE,
                'message' => 'Successful.',
                'data' => $data
            ], REST_Controller::HTTP_OK);
			 
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}

	public function allservice_post(){ 
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
			$start = !empty($this->post('start'))?$this->post('start'):'0';
            $limit = !empty($this->post('limit'))?$this->post('limit'):'0';
            $sort = !empty($this->post('sort'))?$this->post('sort'):'created_at';
            $order = !empty($this->post('order'))?$this->post('order'):'ASC'; 
 
        	$reqdata = array(
        		'start'=> $start,
        		'limit'=> $limit, 
        		'sort'=> $sort,
        		'order'=> $order,
        	); 
        	$retdata = [];
        	$total_service_data = $this->service_model->getService($reqdata);
			 
				$data = $total_service_data;	
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			 
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}

    public function totalportfolio_post(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {  
            $start = !empty($this->post('start'))?$this->post('start'):'0';
            $limit = !empty($this->post('limit'))?$this->post('limit'):'0';
            $sort = !empty($this->post('sort'))?$this->post('sort'):'created_at';
            $order = !empty($this->post('order'))?$this->post('order'):'ASC'; 
            
            $reqdata = array(
                'start'=> $start,
                'limit'=> $limit, 
                'sort'=> $sort,
                'order'=> $order,
            );          
            $retdata = [];
            $total_service_data = $this->portfolio_model->getTotalPortfolio($reqdata);
             
            $data = $total_service_data; 
            $this->response([
                'status' => TRUE,
                'message' => 'Successful.',
                'data' => $data
            ], REST_Controller::HTTP_OK);
             
        }else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
    }

    public function allportfolio_post(){ 
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
            $start = !empty($this->post('start'))?$this->post('start'):'0';
            $limit = !empty($this->post('limit'))?$this->post('limit'):'0';
            $sort = !empty($this->post('sort'))?$this->post('sort'):'created_at';
            $order = !empty($this->post('order'))?$this->post('order'):'ASC'; 
 
            $reqdata = array(
                'start'=> $start,
                'limit'=> $limit, 
                'sort'=> $sort,
                'order'=> $order,
            ); 
            $retdata = [];
            $total_service_data = $this->portfolio_model->getPortfolio($reqdata);
             
                $data = $total_service_data;    
                $this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
             
        }else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
    }

	public function product_get($id = null){
		$data = [];
		if ($this->input->server('REQUEST_METHOD') == 'GET') 
        {
			$cms_data = []; 
	        $product_data = $this->product_model->getProductdetail($id); 
	        $product_img  = $this->product_model->getProductimages(@$product_data['id']);
	        $product_category  = $this->product_model->getProductcategory(@$product_data['id']);
			if($product_data){
				$data['product'] = $product_data;
				$data['image'] = $product_img;	
				$data['category'] = $product_category;
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}
	

    public function portfolio_get($id = null){
        $data = [];
        if ($this->input->server('REQUEST_METHOD') == 'GET') 
        {
            $cms_data = []; 
            $product_data = $this->portfolio_model->getPortfoliodetail($id); 
            $product_img  = $this->portfolio_model->getPortfolioimages(@$product_data['id']);
            
            if($product_data){
                $data['product'] = $product_data;
                $data['image'] = $product_img;  
                $this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
    }

	public function productData_get($id = null){
		$data = [];
		if ($this->input->server('REQUEST_METHOD') == 'GET') 
        {
			$cms_data = []; 
	        $product_data = $this->product_model->get_product_by_slug($id);  
			if($product_data){ 
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $product_data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}

	public function serviceData_get($id = null){
		$data = [];
		if ($this->input->server('REQUEST_METHOD') == 'GET') 
        {
			$cms_data = []; 
	        $service_data = $this->service_model->get_service_by_slug($id);  
			if($service_data){ 
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $service_data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}

	public function sideimage_get($id = null){
		$data = [];
		if ($this->input->server('REQUEST_METHOD') == 'GET') 
        {
			$cms_data = []; 
	        $imageData = $this->site_image_model->get_siteimage_by_id($id); 
			if($imageData){ 
				$data['image'] = $imageData['image'];	
				$this->response([
                    'status' => TRUE,
                    'message' => 'Successful.',
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{
				$this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
	}
 
	public function savenewsletter_post(){ 
		if ($this->input->server('REQUEST_METHOD') == 'POST') 
        { 
 			$email = !empty($this->input->post('email'))?$this->input->post('email'):'0'; 
 			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|is_unique[ci_newsletter.email]');
        	if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->response([
                    'status' => FALSE,
                    'message' => "Error",
                    'data' => $data
                ], REST_Controller::HTTP_OK);
			}else{ 
	        	$reqdata = array(
	        		'email'=> $email,
	        		'status' => 1,
	        		'created_at' => date('Y-m-d'),
	        		'updated_at' => date('Y-m-d'),
	        		'deleted' => 0,
	        	); 
	        	$result = $this->newsletter_model->add_newsletter($reqdata);
				$this->response([
	                'status' => TRUE,
	                'message' => 'Successful.',
	                'data' => []
	            ], REST_Controller::HTTP_OK);
			}
		}else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_OK);
        }         
	}

      public function metadata_post(){ 
        if ($this->input->server('REQUEST_METHOD') == 'POST') 
        {
            $table = !empty($this->post('table'))?$this->post('table'):'';
            $slug = !empty($this->post('slug'))?$this->post('slug'):'0';
            $id = !empty($this->post('id'))?$this->post('id'):'0';
            if(!empty($id)){
                $SQL ='SELECT meta_title, meta_keyword, meta_description FROM '.$table.' where id='.$id.'';
            }
            if(!empty($slug)){
                $SQL ='SELECT meta_title, meta_keyword, meta_description FROM '.$table.' where slug="'.$slug.'"';
            }
            $query = $this->db->query($SQL);
            $retdata = $query->row_array(); 
            $data = $retdata;    
            $this->response([
                'status' => TRUE,
                'message' => 'Successful.',
                'data' => $data
            ], REST_Controller::HTTP_OK);
             
        }else{ 
            $this->response([
                    'status' => FALSE,
                    'message' => "invalid request",
                    'data' => []
                ], REST_Controller::HTTP_BAD_REQUEST);
        }         
    }


}
