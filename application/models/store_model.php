<?php 

class Store_Model extends CI_Model {
    
    public function user_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_email',$data['customer_email']);
        $this->db->where('customer_password', $data['customer_password']);
	$this->db->where('customer_status',1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_all_ecommerce_news()
    {
        $this->db->select('*');
        $this->db->from('tbl_news');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

    public function select_all_published_item()
    {
        $sql = "SELECT * FROM tbl_subcategory AS s, tbl_item AS i WHERE s.subcategory_id=i.subcategory_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_home_product($subcategory_id)
    {
        $sql = "SELECT * FROM tbl_product WHERE subcategory_id='$subcategory_id' AND special_product='1'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_home_item($subcategory_id)
    {
        $sql = "SELECT * FROM tbl_item WHERE subcategory_id='$subcategory_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_special_product()
    {
        $sql = "SELECT * FROM tbl_product WHERE special_product='1' LIMIT 2";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_product_by_category($category_id = null, $start=null, $limit=null)
    {
        $sql = "SELECT * ". "FROM tbl_product p, tbl_category as c WHERE c.category_id = $category_id AND p.category_id = c.category_id ";
        if ($category_id) 
        {
            $sql .= "AND p.category_id = $category_id ";
        }
        if ($limit != '' && $start >= 0) 
        {
            $sql .= " LIMIT $start, $limit ";
        }
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_category_by_name($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id', $category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_product_by_subcategory($subcategory_id = null, $start=null, $limit=null)
    {
        $sql = "SELECT * ". "FROM tbl_product p, tbl_subcategory as s WHERE s.subcategory_id = $subcategory_id AND p.subcategory_id = s.subcategory_id ";
        if ($subcategory_id) 
        {
            $sql .= "AND p.subcategory_id = $subcategory_id ";
        }
        if ($limit != '' && $start >= 0) 
        {
            $sql .= " LIMIT $start, $limit ";
        }
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_subcategory_by_name($subcategory_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('subcategory_id', $subcategory_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_product_by_item($item_id = null, $start=null, $limit=null)
    {
        $sql = "SELECT * ". "FROM tbl_product p, tbl_item as i WHERE i.item_id = $item_id AND p.item_id = i.item_id ";
        if ($item_id) 
        {
            $sql .= "AND p.item_id = $item_id ";
        }
        if ($limit != '' && $start >= 0) 
        {
            $sql .= " LIMIT $start, $limit ";
        }
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_item_by_name($item_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->where('item_id', $item_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_subcategory($category_id)
    {
        $sql = "SELECT * FROM tbl_subcategory WHERE category_id='$category_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_product_review($product_id)
    {
        $sql = "SELECT * FROM tbl_review AS r, tbl_customer AS c WHERE r.customer_id=c.customer_id AND r.product_id='$product_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_product_details_by_id($product_id)
    {
        $sql = "SELECT * FROM tbl_product AS p, tbl_category AS c, tbl_subcategory AS s, tbl_item AS i WHERE p.category_id=c.category_id AND p.subcategory_id=s.subcategory_id AND p.item_id=i.item_id AND p.product_id='$product_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function save_review_info($customer_id)
    {
        $data=array();
        $data['product_id'] = $this->input->post('product_id', true);
        $data['customer_id'] = $customer_id;
        $data['review_title'] = $this->input->post('review_title', true);
        $data['review'] = $this->input->post('review', true);
        $data['review_rating'] = $this->input->post('review_rating', true);
        $data['review_type'] = 1;
        $this->db->insert('tbl_review',$data);
    }
    
    public function search_the_product($product_search)
    {
        $sql = "SELECT product_id, product_name, product_image_0, product_price, product_old_price FROM tbl_product WHERE product_name LIKE '%$product_search%'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function search_the_category_product($product_search, $product_category)
    {
        $sql = "SELECT product_id, product_name, product_image_0, product_price, product_old_price FROM tbl_product WHERE category_id='$product_category' AND product_name LIKE '%$product_search%'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function save_newsletter_info()
    {
        $data=array();
        $data['subscription_email'] = $this->input->post('subscription_email', true);
        $this->db->insert('tbl_newsletter_subscription',$data);
    }
    
    public function user_coupon_check($coupon_code) 
    {
        $today=date("d-m-Y");
        $sql = "SELECT * FROM tbl_coupon WHERE coupon_code = '$coupon_code' AND coupon_validity >= '$today' AND coupon_status='1' ";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function select_customer_by_id($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

    public function select_my_order($customer_id)
    {
        $sql = "SELECT * FROM tbl_order AS o WHERE customer_id='$customer_id' AND order_status=0";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_order_history($customer_id)
    {
        $sql = "SELECT * FROM tbl_order AS o WHERE customer_id='$customer_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_product_brand_by_id($brand_id)
    {
        $sql = "SELECT brand_name FROM tbl_product AS p, tbl_brand AS b WHERE p.brand_id='$brand_id' AND p.brand_id=b.brand_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
       
    public function save_customer_info()
    {
        $data=array();
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $this->db->insert('tbl_customer',$data);
    }
    
    public function select_customer_shipping_info($customer_id)
    {
        $sql = "SELECT * FROM tbl_customer WHERE customer_id='$customer_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function save_order_info($shipping_info)
    {
        $this->db->insert('tbl_shipping',$shipping_info);
        $shipping_id=$this->db->insert_id();
        $payment_data=array();
        $payment_data['payment_method'] = $this->session->userdata('payment_method', true);
        $payment_data['customer_id'] = $this->session->userdata('customer_id', true);
        $payment_data['shipping_id'] = $shipping_id;
        $payment_data['payment_type'] = 1;
        $this->db->insert('tbl_payment',$payment_data);
        $payment_id=$this->db->insert_id();  
        $data=array();
        $data['customer_id']=$this->session->userdata('customer_id', true);
        $data['shipping_id']=$shipping_id;
        $data['payment_id']=$payment_id;
        $data['shipping_charge']=$this->session->userdata('shipping_charge');
        $data['order_total']=$this->session->userdata('grand_total');
        $data['invoice_date']= date('Y-m-d');
        $data['order_type']= 1;
        $this->db->insert('tbl_order',$data);
        $order_id=$this->db->insert_id();
        $contents=$this->cart->contents();
        $oddata=array();
        foreach($contents as $values)
        {
           $oddata['order_id']=$order_id;
           $oddata['product_id']=$values['id'];
           $oddata['product_price']=$values['price'];
           $oddata['product_name']=$values['name'].' (Colour:- '.$values['options']['colour'].') (Size:- '.$values['options']['size'].')';
           $oddata['product_sales_quantity']=$values['qty'];
           $this->db->insert('tbl_order_details',$oddata);
        }
        $sql = "update tbl_product, tbl_order_details
            set tbl_product.product_quantity = tbl_product.product_quantity - tbl_order_details.product_sales_quantity 
            where tbl_product.product_id = tbl_order_details.product_id
            and tbl_order_details.order_id = '$order_id' ";
        $this->db->query($sql);
        $order_info=array();
        $order_info['order_id'] = $order_id;
        $this->session->set_userdata($order_info);
    }
    
    public function select_order_info($order_id)
    {
        $sql = "SELECT * FROM tbl_order WHERE order_id='$order_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function save_place_order()
    {
        $customer=array();
        $customer['customer_name']=$this->session->userdata('customer_name');
        $customer['customer_mobile']=$this->session->userdata('customer_mobile');
        $customer['customer_type']=1;
        $this->db->insert('tbl_customer',$customer);
        $customer_id=$this->db->insert_id();
        $shipping['customer_id']=$customer_id;
        $shipping['shipping_name']=$this->session->userdata('shipping_name');
        $shipping['shipping_email']=$this->session->userdata('shipping_email');
        $shipping['shipping_mobile']=$this->session->userdata('shipping_mobile');
        $shipping['shipping_mobile_2']=$this->session->userdata('shipping_mobile_2');
        $shipping['shipping_location']=$this->session->userdata('shipping_location');
        $shipping['shipping_charge']=$this->session->userdata('shipping_charge');
        $shipping['shipping_address']=$this->session->userdata('shipping_address');
        $shipping['shipping_landmark']=$this->session->userdata('shipping_landmark');
        $shipping['shipping_note']=$this->session->userdata('shipping_note');
        $shipping['shipping_type']=1;
        $this->db->insert('tbl_shipping',$shipping);
        $shipping_id=$this->db->insert_id();
        $payment['customer_id']=$customer_id;
        $payment['shipping_id']=$shipping_id;
        $payment['payment_type']=1;
        $payment['payment_method']=$this->session->userdata('payment_method');
        $this->db->insert('tbl_payment',$payment);
        $payment_id=$this->db->insert_id();
        $order['customer_id']=$customer_id;
        $order['shipping_id']=$shipping_id;
        $order['payment_id']=$payment_id;
        $order['order_total']=$this->session->userdata('grand_total');
        $order['invoice_date']= date('Y-m-d');
        $order['order_type']= 1;
        $this->db->insert('tbl_order',$order);
        $order_id=$this->db->insert_id();
        $contents=$this->cart->contents();
        $oddata=array();
        foreach($contents as $values)
        {
           $oddata['order_id']=$order_id;
           $oddata['product_id']=$values['id'];
           $oddata['product_price']=$values['price'];
           $oddata['product_name']=$values['name'].' (Colour:- '.$values['options']['colour'].') (Size:- '.$values['options']['size'].')';
           $oddata['product_sales_quantity']=$values['qty'];
           $this->db->insert('tbl_order_details',$oddata);
        }
        $sql = "update tbl_product, tbl_order_details
            set tbl_product.product_quantity = tbl_product.product_quantity - tbl_order_details.product_sales_quantity 
            where tbl_product.product_id = tbl_order_details.product_id
            and tbl_order_details.order_id = '$order_id' ";
        $this->db->query($sql);
    }

    public function select_invoice_info($customer_id) 
    {
        $sql = "SELECT * FROM tbl_customer AS c, tbl_order AS o WHERE c.customer_id = '$customer_id' AND c.customer_id = o.customer_id ORDER BY o.order_id DESC LIMIT 1";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function select_place_order_info() 
    {
        $sql = "SELECT * FROM tbl_order ORDER BY order_id DESC LIMIT 1";
        $result = $this->db->query($sql)->row();
        return $result;
    }
        
    public function save_wishlist_info($data)
    {        
        $customer_id= $data['customer_id'];
        $product_id= $data['product_id'];
        
        $sql = "SELECT customer_id, product_id FROM tbl_wishlist WHERE customer_id = '$customer_id' AND product_id = product_id";
        $result = $this->db->query($sql)->row();
        if($result ==NULL)
        {
            $sql = "INSERT IGNORE INTO tbl_wishlist (customer_id, product_id) VALUES ('$customer_id','$product_id'); ";
            $this->db->query($sql);
        }
    }

    public function select_user_wishlist($customer_id)
    {
        $sql = "SELECT * FROM tbl_product AS p, tbl_wishlist AS w, tbl_customer AS c WHERE p.product_id=w.product_id AND c.customer_id='$customer_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_wishlist_by_id($customer_id,$product_id)
    {
        $this->db->where('customer_id',$customer_id);
        $this->db->where('product_id',$product_id);
        $this->db->delete('tbl_wishlist');
    }
}