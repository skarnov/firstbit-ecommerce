<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Wishlist extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL)
        {
            redirect('login', 'refresh');
        }
    }
        
    public function add_to_wishlist($product_id)
    {
        $customer_id = $this->session->userdata('customer_id');
        $product_info = $this->ecommerce_model->select_product_by_id($product_id);   
        $data = array(
            'customer_id' => $customer_id,
            'product_id' => $product_info->product_id,
        );
        $this->store_model->save_wishlist_info($data); 
    }

    public function show_wishlist()
    {
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Wishlist';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['select_wishlist'] = $this->store_model->select_user_wishlist($customer_id);
        $data['home'] = $this->load->view('wishlist', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete($product_id) 
    {        
        $customer_id = $this->session->userdata('customer_id');
        $this->store_model->delete_wishlist_by_id($customer_id,$product_id);
        redirect('wishlist/show_wishlist');
    }
}