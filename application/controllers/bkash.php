<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bkash extends CI_Controller {
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Bkash';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['home'] = $this->load->view('bkash', $data, true);
        $this->load->view('master', $data);
    }
    
    public function place_order()
    {
        $data = array();
        $data['title'] = 'Bkash';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['home'] = $this->load->view('bkash-place_order', $data, true);
        $this->load->view('master', $data);
    }
}