<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Customer extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL)
        {
            redirect('login', 'refresh');
        }
    }
    
    public function index()
    {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Dashboard';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['customer'] = $this->store_model->select_customer_by_id($customer_id);
        $data['home'] = $this->load->view('dashboard', $data, true);
        $this->load->view('master', $data);
    }
    
    public function my_order()
    {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Dashboard';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['my_order'] = $this->store_model->select_my_order($customer_id);
        $data['home'] = $this->load->view('my_order', $data, true);
        $this->load->view('master', $data);
    }
    
    public function order_history()
    {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Dashboard';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['order_history'] = $this->store_model->select_order_history($customer_id);
        $data['home'] = $this->load->view('order_history', $data, true);
        $this->load->view('master', $data);
    }      
}