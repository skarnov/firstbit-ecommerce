<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Login extends CI_Controller {
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Login';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['special_product'] = $this->store_model->select_all_special_product();
        $data['home'] = $this->load->view('customer_login', $data, true);
        $this->load->view('master', $data);
    }
    
    public function customer_login_check()
    { 
        $data = array();
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $result = $this->store_model->user_login_check($data);    
        $sdata = array();
        if ($result != NULL)
        {
            $sdata['customer_id'] = $result->customer_id;
            $sdata['customer_name'] = $result->customer_name;
            $this->session->set_userdata($sdata);
            redirect('customer');
        } 
        if ($result == NULL)
        {
            $sdata['exception'] = 'Your Email addresses or password do not match';
            $this->session->set_userdata($sdata);
            redirect('login');
        }
    }
    
    public function checkout_type()
    {
        $type = $this->input->post('type', true);          
        if ($type == 'order')
        {
            redirect("login/place_order");
        }
        if ($type == 'account')
        {
            redirect("store/register");
        }
    }
    
    public function place_order() 
    {                        
        $data = array();
        $data['title'] = 'Place Order';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['terms_and_conditions'] = $this->ecommerce_model->select_terms_and_conditions();
        $data['home'] = $this->load->view('place_order', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_place_order()
    {
        $place_order=array();
        $place_order['customer_name'] = $this->input->post('customer_name', true);
        $place_order['customer_mobile'] = $this->input->post('customer_mobile', true);
        $place_order['shipping_name'] = $this->input->post('shipping_name', true);
        $place_order['shipping_email'] = $this->input->post('shipping_email', true);
        $place_order['shipping_mobile'] = $this->input->post('shipping_mobile', true);
        $place_order['shipping_mobile_2'] = $this->input->post('shipping_mobile_2', true);
        $place_order['shipping_location'] = $this->input->post('shipping_charge', true);
        $place_order['shipping_charge'] = substr($place_order['shipping_location'], 15);
        $place_order['shipping_address'] = $this->input->post('shipping_address', true);   
        $place_order['shipping_landmark'] = $this->input->post('shipping_landmark', true);   
        $place_order['shipping_note'] = $this->input->post('shipping_note', true);   
        $place_order['payment_method'] = $this->input->post('payment_method', true);   
        $this->session->set_userdata($place_order);
        if($place_order['payment_method']=='Bkash')
        {
            redirect('bkash/place_order');
        }
        if($place_order['payment_method']=='Bank')
        {
            redirect('bank/place_order');
        }
        else
        {
            redirect('login/confirm_order');
        }
        redirect('login/place_order');
    }

    public function confirm_order() 
    {
        $this->store_model->save_place_order();
        redirect('login/order_complete');
    }

    public function order_complete() 
    {
        $this->cart->destroy();
        $this->session->unset_userdata('coupon_amount');
        $this->session->unset_userdata('inside_dhaka');
        $this->session->unset_userdata('outside_dhaka');
        $data = array();
        $data['title'] = 'Checkout';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['select_invoice'] = $this->store_model->select_place_order_info();
        $data['home'] = $this->load->view('order_complete', $data, true);
        $this->load->view('master', $data);
    }
}