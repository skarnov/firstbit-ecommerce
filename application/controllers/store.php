<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {
        
    public function index()
    {
        $data = array();
        $data['title'] = 'Home';
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['all_slide'] = $this->ecommerce_model->select_all_slide();
        $data['all_banner'] = $this->ecommerce_model->select_all_banner();
        $data['all_home_category'] = $this->ecommerce_model->select_all_home_product();
        foreach ($data['all_home_category'] as $product)
        {
            $data['select_home_product'][$product->subcategory_id] = $this->store_model->select_home_product($product->subcategory_id);
            $data['select_home_item'][$product->subcategory_id] = $this->store_model->select_home_item($product->subcategory_id);
        }
        $data['home'] = $this->load->view('home', $data, true);
        $this->load->view('master', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('customer_name');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('store');
    }
    
    public function category_product_listing($category_id = null, $start = null)
    {
	$data = array();
        $data['title'] = 'Product Listing';
        if(!$start)
        {
            $start=0;
        }
        $data['start']= $start;
        $data['limit']= 24;
        $data['total_product'] = count($this->store_model->select_product_by_category($category_id, '', ''));
        $data['product_listing'] = $this->store_model->select_product_by_category($category_id, $start, $data['limit']);
        $data['this_page'] = count($data['product_listing']);
        $data['category_name'] = $this->store_model->select_category_by_name($category_id);    
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['all_home_category'] = $this->ecommerce_model->select_all_home_product();
        $data['select_home_item'] = NULL;
        $data['select_subcategory'] = $this->store_model->select_subcategory($category_id);
        $data['home'] = $this->load->view('product_listing', $data, true);
        $this->load->view('master', $data);
    }
    
    public function subcategory_product_listing($subcategory_id = null, $start = null)
    {
	$data = array();
        $data['title'] = 'Product Listing';
        if(!$start)
        {
            $start=0;
        }
        $data['start']= $start;
        $data['limit']= 24;
        $data['total_product'] = count($this->store_model->select_product_by_subcategory($subcategory_id, '', ''));
        $data['product_listing'] = $this->store_model->select_product_by_subcategory($subcategory_id, $start, $data['limit']);
        $data['this_page'] = count($data['product_listing']);
        $data['subcategory_name'] = $this->store_model->select_subcategory_by_name($subcategory_id);    
        $data['category_name'] = $this->store_model->select_category_by_name($data['subcategory_name']->category_id);
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['select_home_item'] = $this->store_model->select_home_item($subcategory_id);
        $data['home'] = $this->load->view('product_listing', $data, true);
        $this->load->view('master', $data);
    }
    
    public function item_product_listing($category_id, $subcategory_id, $item_id = null, $start = null)
    {
	$data = array();
        $data['title'] = 'Product Listing';
        if(!$start)
        {
            $start=0;
        }
        $data['start']= $start;
        $data['limit']= 24;
        $data['total_product'] = count($this->store_model->select_product_by_item($item_id, '', ''));
        $data['product_listing'] = $this->store_model->select_product_by_item($item_id, $start, $data['limit']);
        $data['this_page'] = count($data['product_listing']);
        $data['category_name'] = $this->store_model->select_category_by_name($category_id);
        $data['subcategory_name'] = $this->store_model->select_subcategory_by_name($subcategory_id);
        $data['item_name'] = $this->store_model->select_item_by_name($item_id);
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['all_home_category'] = $this->ecommerce_model->select_all_home_product();
        $data['select_home_item'] = NULL;
        $data['select_subcategory'] = $this->store_model->select_subcategory($category_id);
        $data['home'] = $this->load->view('product_listing', $data, true);
        $this->load->view('master', $data);
    }
    
    public function product_details($product_id) 
    {
        $data = array();
        $data['title'] = 'Product Details';
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['special_product'] = $this->store_model->select_all_special_product();
        $data['review'] = $this->store_model->select_product_review($product_id);  
        $data['product_info'] = $this->store_model->select_product_details_by_id($product_id);
        if($data['product_info']->brand_id !=0)
        {
            $data['brand_info'] = $this->store_model->select_product_brand_by_id($data['product_info']->brand_id);
            $data['home'] = $this->load->view('product_details', $data, true);
            $this->load->view('master', $data);    
        }
        else
        {
            $data['home'] = $this->load->view('product_details', $data, true);
            $this->load->view('master', $data);
        }
    }
    
    public function save_review()
    {  
        $customer_id = $this->session->userdata('customer_id');
        if($customer_id !=NULL)
        {
            $this->store_model->save_review_info($customer_id);
            redirect("store");
        }
        else
        {
            redirect("login");
        }
    }
    
    public function register() 
    {
        $data = array();
        $data['title'] = 'Register';
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['special_product'] = $this->store_model->select_all_special_product();
        $data['home'] = $this->load->view('register', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_customer()
    {
        $this->form_validation->set_rules('customer_name', 'Name', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('customer_email', 'Email', 'required|valid_email|is_unique[tbl_customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'Password', 'trim|required|min_length[6]|max_length[250]|matches[confirm_password]|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Register';
            $data['all_news'] = $this->store_model->select_all_ecommerce_news();
            $data['call_us'] = $this->ecommerce_model->select_call_us_info();
            $data['all_category'] = $this->ecommerce_model->select_all_category();
            $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
            $data['all_item'] = $this->store_model->select_all_published_item();
            $data['home'] = $this->load->view('register', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->store_model->save_customer_info();
            $sdata = array();
            $sdata['save_customer'] = 'Success!';
            $this->session->set_userdata($sdata);
            redirect('store/register');
        }
    }
    
    public function search_product()
    {
        $data = array();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['special_product'] = $this->store_model->select_all_special_product();
        $product_category = $this->input->post('product_category', true);
        $product_search = $this->input->post('product_search', true);
        if($product_category==NULL)
        {
            $data['search_product'] = $this->store_model->search_the_product($product_search);
        }
        else
        {
            $data['search_product'] = $this->store_model->search_the_category_product($product_search,$product_category);
        }
        $data['home'] = $this->load->view('product_search', $data, true);   
        $this->load->view('master', $data);
    }
      
    public function save_newsletter()
    {
        $this->store_model->save_newsletter_info();
        $sdata = array();
        $sdata['save_newsletter'] = 'Thanks';
        $this->session->set_userdata($sdata);
        redirect('store');
    }
    
    public function coupon_check()
    {
        $coupon_code = $this->input->post('coupon_code', true);
        $result = $this->store_model->user_coupon_check($coupon_code);    
        $sdata = array();
        if ($result != NULL)
        {
            $sdata['coupon_amount'] = $result->coupon_amount;
            $this->session->set_userdata($sdata);
            redirect('cart/show_cart');
        } 
        if ($result == NULL)
        {
            $sdata['coupon_wrong'] = 'Wrong';
            $this->session->set_userdata($sdata);
            redirect('cart/show_cart');
        }
    }
}