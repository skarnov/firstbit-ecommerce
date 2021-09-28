<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Checkout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) 
        {
            redirect('customer', 'refresh');
        }
        $grand_total = $this->session->userdata('grand_total');
        if ($grand_total == NULL) 
        {
            redirect('cart/show_cart', 'refresh');
        }
    }
    
    public function index() 
    {                        
        $customer_id = $this->session->userdata('customer_id');
        $data = array();
        $data['title'] = 'Checkout';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['shipping_info'] = $this->store_model->select_customer_shipping_info($customer_id);
        $data['special_product'] = $this->store_model->select_all_special_product();
        $data['home'] = $this->load->view('shipping_form', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_shipping_form()
    { 
        $customer_id = $this->session->userdata('customer_id');
        $shipping_data=array();
        $shipping_data['customer_id'] = $customer_id;
        $shipping_data['shipping_name'] = $this->input->post('shipping_name', true);
        $shipping_data['shipping_email'] = $this->input->post('shipping_email', true);
        $shipping_data['shipping_mobile'] = $this->input->post('shipping_mobile', true);
        $shipping_data['shipping_mobile_2'] = $this->input->post('shipping_mobile_2', true);
        $shipping_data['shipping_location'] = $this->input->post('shipping_charge', true);
        $shipping_data['shipping_charge'] = substr($shipping_data['shipping_location'], 15);
        $shipping_data['shipping_address'] = $this->input->post('shipping_address', true);   
        $shipping_data['shipping_landmark'] = $this->input->post('shipping_landmark', true);   
        $shipping_data['shipping_note'] = $this->input->post('shipping_note', true);
        $this->session->set_userdata($shipping_data);
        redirect('checkout/payment_form');
    }
    
    public function payment_form() 
    {
        $shipping_data=$this->session->userdata('shipping_name');
        if($shipping_data !=NULL)
        {
            $data = array();
            $data['title'] = 'Payment';
            $data['terms_and_conditions'] = $this->ecommerce_model->select_terms_and_conditions();
            $data['call_us'] = $this->ecommerce_model->select_call_us_info();
            $data['all_news'] = $this->store_model->select_all_ecommerce_news();
            $data['all_category'] = $this->ecommerce_model->select_all_category();
            $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
            $data['all_item'] = $this->store_model->select_all_published_item();
            $data['home'] = $this->load->view('payment_form', $data, true);
            $this->load->view('master', $data);
        }
        else
        {
            redirect('checkout');
        }
    }
    
    public function save_payment_form()
    {
        $payment_data=array();
        $payment_data['payment_method'] = $this->input->post('payment_method', true);  
        $this->session->set_userdata($payment_data);
        if($payment_data['payment_method']=='Bkash')
        {
            redirect('bkash');
        }
        if($payment_data['payment_method']=='Bank')
        {
            redirect('bank');
        }
        else
        {
            redirect('checkout/confirm_order');
        }
    }
    
    public function confirm_order() 
    {
        $payment_data=$this->session->userdata('payment_method');
        if($payment_data !=NULL)
        {
            $shipping_info=array();
            $shipping_info['customer_id'] = $this->session->userdata('customer_id');
            $shipping_info['shipping_name'] = $this->session->userdata('shipping_name', true);
            $shipping_info['shipping_email'] = $this->session->userdata('shipping_email', true);
            $shipping_info['shipping_mobile'] = $this->session->userdata('shipping_mobile', true);
            $shipping_info['shipping_mobile_2'] = $this->session->userdata('shipping_mobile_2', true);
            $shipping_info['shipping_location'] = $this->session->userdata('shipping_location', true);
            $shipping_info['shipping_charge'] = $this->session->userdata('shipping_charge', true);
            $shipping_info['shipping_address'] = $this->session->userdata('shipping_address', true);   
            $shipping_info['shipping_landmark'] = $this->session->userdata('shipping_landmark', true);   
            $shipping_info['shipping_note'] = $this->session->userdata('shipping_note', true); 
            $shipping_info['shipping_type'] = 1; 
            $this->store_model->save_order_info($shipping_info);
            $order_id=$this->session->userdata('order_id');
            $mdata = array(); 
            $mdata['customer_info'] = $this->store_model->select_customer_by_id($shipping_info['customer_id']);
            $mdata['order_info'] = $this->store_model->select_order_info($order_id);
            $mdata['shipping_info'] = $shipping_info;
            $mdata['payment_info'] = $payment_data;
            $mdata['from_address'] = 'sales@1stbitbd.com';
            $mdata['admin_full_name'] = '1stbitbd';
            $mdata['to_address'] = $mdata['customer_info']->customer_email;
            $mdata['subject'] = 'Order Invoice';
            $this->load->view('invoice', $mdata);
            $html = $this->output->get_output();
            $this->load->library('dompdf_gen');
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $CI = & get_instance();
            $CI->load->helper('file');
            file_put_contents('invoices/invoice.pdf', $this->dompdf->output());
            $this->mailer_model->sendEmail($mdata, 'invoice');
            redirect('checkout/order_complete');
        }
        else
        {
            redirect('checkout/payment_form');
        }
    }

    public function order_complete() 
    {
        $customer_id = $this->session->userdata('customer_id');
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
        $data['select_invoice'] = $this->store_model->select_invoice_info($customer_id);
        $data['home'] = $this->load->view('order_complete', $data, true);
        $this->load->view('master', $data);
    }
}