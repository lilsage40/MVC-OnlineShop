<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('account_model');
		$this->load->model('admin_model');
		$this->load->model('product_model');
		$this->load->model('category_model');
	}

	public function index()	{
		$this->gate_model->admin_gate();
		$this->load->view('layout/dashboard/header', array('title' => 'Admin Dashboard'));
		$this->load->view('layout/dashboard/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('layout/dashboard/footer');
	}
	
	public function view_users() {
		$this->gate_model->admin_gate();
		$data["userlist"] = $this->admin_model->get_users();
		$this->load->view('layout/dashboard/header', array('title' => 'View Users'));
		$this->load->view('layout/dashboard/sidebar');
		$this->load->view('admin/userlist', $data);
		$this->load->view('layout/dashboard/footer');
	}
	
	public function view_product() {
		$this->gate_model->admin_gate();
		$data["productlist"] = $this->product_model->getAllProducts();
		$data["categories"] = $this->category_model->getAllCategoriesWithSubCategories();
		$this->load->view('layout/dashboard/header', array("title" => "View Products"));
		$this->load->view('layout/dashboard/sidebar');
		$this->load->view('admin/view_product',$data);
		$this->load->view('layout/dashboard/footer');
	}
	
	public function view_transactions() {
		$this->gate_model->admin_gate();
		$this->load->view("admin/transactions");
	}
	
	public function ban_user() {
		$userId = $_GET['userId'];
		$ban = $this->admin_model->banUser($userId);
		if ($ban) $arr = array('message' => 'Success');
		else $arr = array('message' => 'Fail');
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($arr);
	}
	
	public function unban_user(){
		$userId = $_GET['userId'];
		$unban = $this->admin_model->unbanUser($userId);
		if ($unban) $arr = array('message' => 'Success');
		else  $arr = array('message' => 'Fail');
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		echo json_encode($arr);
	}
	
	public function add_product() {
		$this->gate_model->admin_gate();
		$data["productlist"] = $this->product_model->getAllProducts();
		$data["categories"] = $this->category_model->getAllCategoriesWithSubCategories();
		$this->load->view('layout/dashboard/header', array("title" => "Add Product"));
		$this->load->view('layout/dashboard/sidebar');
		$this->load->view('admin/add_product',$data);
		$this->load->view('layout/dashboard/footer');
	}
	
	public function edit_product($product_id) {
		$this->gate_model->admin_gate();
		$data['product'] = $this->product_model->getProduct($product_id)->row();
		$data["categories"] = $this->category_model->getAllCategoriesWithSubCategories();
		$data["product_id"] = $product_id;
		$this->load->view('layout/dashboard/header', array("title" => "Edit Product"));
		$this->load->view('layout/dashboard/sidebar');
		$this->load->view('admin/edit_product',$data);
		$this->load->view('layout/dashboard/footer');
	}
	
}