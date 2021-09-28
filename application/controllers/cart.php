<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Cart extends CI_Controller {
        
    public function add_to_cart($product_id)
    {
        $product_info = $this->ecommerce_model->select_product_by_id($product_id);     
        $data = array(
            'id' => $product_info->product_id,
            'image' => $product_info->product_image_0,
            'name' => $product_info->product_name,
            'qty' => 1,
            'price' =>$product_info->product_price,
            'options' => array('colour' => 'Default', 'size' => 'Default',)
        );
        $this->cart->insert($data);
        $this->load->view('cart');
        $dhaka = $product_info->delivery_charge_inside;   
        $inside_dhaka = $this->session->userdata('inside_dhaka');
        if($inside_dhaka < $dhaka)
        {
            $sdata = array();
            $sdata['inside_dhaka'] = $dhaka;
            $this->session->set_userdata($sdata);
        }
        $non_dhaka = $product_info->delivery_charge_outside;
        $outside_dhaka = $this->session->userdata('outside_dhaka');
        if($outside_dhaka < $non_dhaka)
        {
            $sdata = array();
            $sdata['outside_dhaka'] = $non_dhaka;
            $this->session->set_userdata($sdata);
        }
    }
    
    public function add_cart($product_id,$qty,$color,$size)
    {
        $product_info = $this->ecommerce_model->select_product_by_id($product_id);           
        $data = array(
            'id' => $product_info->product_id,
            'image' => $product_info->product_image_0,
            'name' => $product_info->product_name,
            'qty' => $qty,
            'price' =>$product_info->product_price,  
            'options' => array('colour' => $color, 'size' => $size)
        );
        $this->cart->insert($data);
        echo $this->load->view('cart');
    }
    
    public function show_cart()
    {
        $data = array();
        $data['title'] = 'Shoping Cart';
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['all_news'] = $this->store_model->select_all_ecommerce_news();
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->store_model->select_all_published_item();
        $data['home'] = $this->load->view('cart_view', $data, true);
        $this->load->view('master', $data);
    }

    public function update_cart()
    {
        $qty = $this->input->post('product_quantity', true);
        $rowid = $this->input->post('rowid', true);
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }
    
    public function remove($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => '0'
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }
}