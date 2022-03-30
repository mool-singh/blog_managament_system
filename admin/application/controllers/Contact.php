<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		check_premissions($this->router->fetch_class(), $this->router->fetch_method());
		check_user_premissions($this->session->userdata('admin_id'), $this->router->fetch_class(), $this->router->fetch_method());
		$this->load->model('inquiry_model', 'inquiry_model');
		$this->load->model('contact_model', 'contact_model');
		$this->load->model('product_model', 'product_model');
		$this->load->model('service_model', 'service_model');
		$this->load->model('subadmin_model', 'subadmin_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
		$this->load->library('mailer');
	}

	public function index(){
		
		$data['title'] = 'Contact Request List';

		$this->load->view('includes/_header', $data);
		$this->load->view('contact/contact_list');
		$this->load->view('includes/_footer');
	}



	
	public function datatable_json(){				   					   
		$records = $this->contact_model->get_all_contact_requests();
		
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$name = "";
			
			
			$data[]= array(
				++$i,
				$row['contact_request_name'],  
				$row['contact_request_email'],
				$row['contact_request_phone'],
				$row['contact_request_message'],
				date_time($row['contact_request_date']),
				'<a title="View Request" class="delete btn btn-sm btn-warning" href="'.base_url('contact/view_request/'.$row['contact_request_id']).'"> <i class="fa fa-eye"></i></a><a title="Delete Request" class="delete btn btn-sm btn-danger"onclick="return confirm(\'Do you want to delete ?\')" href="'.base_url('contact/delete/'.$row['contact_request_id']).'"> <i class="fa fa-trash"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}

	


	//-----------------------------------------------------------
	public function delete($id = 0)
	{		
		
		$this->db->delete('ci_contact_requests', array('contact_request_id' => $id));
		$this->session->set_flashdata('success', 'Data has been deleted successfully!');
		redirect(base_url('contact'));

		
	}
 
	
	//---------------------------------------------------------------
	//  Export Categories PDF 
	public function create_contact_pdf(){
		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_request'] = $this->contact_model->get_requests_for_export();		 
		$this->load->view('contact/contact_pdf', $data);
	}

	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_csv(){ 

	   // file name 
		$filename = 'inquirys_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

	   // get data 
		$all_inquirys = $this->inquiry_model->get_inquirys_for_export();		 

	   // file creation 
		$file = fopen('php://output', 'w');

		$header = array("ID", "Name", "Email" ,"Mobile", "Inquiry Type", "subject", "message", "ip_address", "Created Date"); 

		fputcsv($file, $header);
		foreach ($all_inquirys as $key=>$line){ 

			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	} 

	public function send_replymail($id=NULL){
		if($this->session->userdata('admin_id')!=1){
			$check_authentic = $this->inquiry_model->assign_inquirys(array('inquiry_id'=>$id,'user_id'=>$this->session->userdata('admin_id')));
			if($id==NULL or empty($check_authentic) ){
				$this->session->set_flashdata('error', 'Unauthenticated Access');
				redirect(base_url('inquiry'));
				
			}
		}
		
		$data['inquiry_data']=$this->inquiry_model->get_inquiry_by_id($id);
		$data['creatby']=$this->inquiry_model->get_created_by_id($data['inquiry_data']['created_by']);
		

		if($this->input->post('submit')){
			$this->form_validation->set_rules('subject', 'subject', 'trim|required');
			$this->form_validation->set_rules('message', 'Message', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$error = array(
					'errors' => validation_errors()
				);
				$data['user'] = array( 
					
					'subject' => $this->input->post('subject'),
					'message' => $this->input->post('message'),
					
				);
				$this->session->set_flashdata('errors', $error['errors']);
				$this->load->view('includes/_header');
				$this->load->view('inquiry/add_mail', $data);
				$this->load->view('includes/_footer');
			}
			else{

				$attachment= "";
				$path="assets/img/mail_doc/"; 				
				if(!empty($_FILES['attachment']['name']))
				{
					$type = "image";
					if ($_FILES['attachment']['type'] == 'application/pdf') {
						$type = "pdf";
					}

					$result = $this->functions->file_insert($path, 'attachment', $type, '9097152');
					if($result['status'] == 1){
						$attachment= $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('inquiry/send_replymail'), 'refresh');
					}
				}
				$data = array(
					'subject' => $this->input->post('subject'),
					'message' => $this->input->post('message'),
					'attachment' => $attachment,
					'type' => 1,
					'inquiry_id' => $id,
					'followup_date'=>date('Y-m-d,h:m:s'),
					'created_by' => $this->session->userdata('admin_id'),
					'created_at' => date('Y-m-d,h:m:s'),
					'updated_at' => date('Y-m-d,h:m:s'),
					
				);

				$data = $this->security->xss_clean($data);
				$result = $this->inquiry_model->add_inquiry_followup($data);

				if($result){

					$this->load->helper('email_helper');

					$to = $data['inquiry_data']['email'];
					$subject = $this->input->post('subject');
					$msg = $this->input->post('message');
					$body = $this->mailer->global_template($msg);
					$message = $body;
					$senddata = send_email($to, $subject, $message, $attachment , $cc = '');
					if($senddata){
						$this->session->set_flashdata('success', 'Mail has been Send successfully!');
						redirect(base_url('inquiry'));
					}else{

						$this->session->set_flashdata('error', 'Somthing Want to wrong send mail');
					  		redirect(base_url('inquiry/send_replymail'), 'refresh');
					}

				}else{
					$this->session->set_flashdata('error', 'Somthing Want to wrong ');
					  		redirect(base_url('inquiry/send_replymail'), 'refresh');
					}
			}
		}
		else{

			$data['title'] = 'Add Mail';

			$this->load->view('includes/_header', $data);
			$this->load->view('inquiry/add_mail', $data);
			$this->load->view('includes/_footer');
		}
		
	}


	




	public function get_inqirytype_data(){
		
		$type = $this->input->post('type');
		$result = "";
		if($type == 1){
			$res = array('status' => FALSE, 'data' => '');
		}
		if($type == 2){
			$data = $this->product_model->get_products();
			$result .= '<label for="inquiry_type" class="col-sm-6 control-label">Selcet Product <span class="red">*</span></label>';
			$result.='<select name="item_id"  class="form-control">
            <option value="">Select Product</option>';
            foreach ($data as  $value) {
				$result .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
			}
            $result .= '</select>';
			$res = array('status' => TRUE, 'data' => $result);  
                  
		}
		if($type == 3){

			$data = $this->service_model->get_service();
			$result .= '<label for="inquiry_type" class="col-sm-6 control-label">Selcet Service <span class="red">*</span></label>';
			$result .= '<select value=""  class="form-control" name="item_id">';
			$result .= '<option> Selcet Service </option>';
			foreach ($data as  $value) {
				$result .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
			}
			$result .= '</select>';
			$res = array('status' => TRUE, 'data' => $result);
		}	
			echo json_encode($res); exit;
	}


	public function view_request($id=NULL){
		

		$data['request_data']=$this->contact_model->get_contact_request_by_id($id);

		
		if($id == Null || empty($data['request_data'])){
			redirect(base_url('contact'));
		}

			$data['title'] = 'View Contact Request';
			$this->load->view('includes/_header', $data);
			$this->load->view('contact/view_request', $data);
			$this->load->view('includes/_footer');
		
	}
	

}

?>