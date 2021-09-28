<?php

class Ecommerce_Model extends CI_Model {
    
    public function select_admin_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_admin_info()
    {
        $data=array();
        $data['admin_name'] = $this->input->post('admin_name', true);
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $data['admin_level'] = $this->input->post('admin_level', true);
        $data['admin_status'] = $this->input->post('admin_status', true);
        $data['admin_type'] = $this->input->post('admin_type', true);
        $admin_id=$this->input->post('admin_id',true);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin',$data);
    }
    
    public function select_all_news()
    {
        $sql = "SELECT * FROM tbl_news";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_news_by_id($news_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_news');
        $this->db->where('news_id',$news_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_news_info()
    {
        $data=array();
        $data['news_title'] = $this->input->post('news_title', true);
        $news_id = $this->input->post('news_id', true);
        $this->db->where('news_id',$news_id);
        $this->db->update('tbl_news',$data);
    }
   
    public function save_slide_info($data)
    {
        $this->db->insert('tbl_slide',$data);
    }
    
    public function select_slide_by_id($slide_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_slide');
        $this->db->where('slide_id',$slide_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_slide_info($data)
    {
        $slide_id=$this->input->post('slide_id',true);
        $this->db->where('slide_id',$slide_id);
        $this->db->update('tbl_slide',$data);
    }
    
    public function select_all_slide()
    {
        $this->db->select('*');
        $this->db->from('tbl_slide');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function delete_slide_by_id($slide_id)
    {
        $this->db->where('slide_id',$slide_id);
        $this->db->delete('tbl_slide');
    }
    
    public function save_banner_info($data)
    {
        $this->db->insert('tbl_banner',$data);
    }
    
    public function select_banner_by_id($banner_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('banner_id',$banner_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_banner_info($data)
    {
        $slide_id=$this->input->post('banner_id',true);
        $this->db->where('banner_id',$slide_id);
        $this->db->update('tbl_banner',$data);
    }
    
    public function select_all_banner()
    {
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('banner_type',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function delete_banner_by_id($banner_id)
    {
        $this->db->where('banner_id',$banner_id);
        $this->db->delete('tbl_banner');
    }
    
    public function save_coupon_info()
    {
        $data=array();
        $data['coupon_code'] = $this->input->post('coupon_code', true);
        $data['coupon_amount'] = $this->input->post('coupon_amount', true);
        $data['coupon_validity'] = $this->input->post('coupon_validity', true);
        $data['coupon_status'] = $this->input->post('coupon_status', true);
        $data['coupon_type'] = 1;
        $this->db->insert('tbl_coupon',$data);
    }
    
    public function select_all_coupon()
    {
        $this->db->select('*');
        $this->db->from('tbl_coupon');
        $this->db->where('coupon_type',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_coupon_by_id($coupon_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_coupon');
        $this->db->where('coupon_id',$coupon_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_coupon_info()
    {
        $data=array();
        $data['coupon_code'] = $this->input->post('coupon_code', true);
        $data['coupon_amount'] = $this->input->post('coupon_amount', true);
        $data['coupon_validity'] = $this->input->post('coupon_validity', true);
        $data['coupon_status'] = $this->input->post('coupon_status', true);
        $data['coupon_type'] = 1;
        $coupon_id = $this->input->post('coupon_id', true);
        $this->db->where('coupon_id',$coupon_id);
        $this->db->update('tbl_coupon',$data);
    }
    
    public function delete_coupon_by_id($coupon_id)
    {
        $this->db->where('coupon_id',$coupon_id);
        $this->db->delete('tbl_coupon');
    }
    
    public function save_category_info()
    {
        $data=array();
        $data['category_name'] = $this->input->post('category_name', true);
        $this->db->insert('tbl_category',$data);
    }
    
    public function select_all_category()
    {
        $sql = "SELECT * FROM tbl_category ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_category_by_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_category_info()
    {
        $data=array();
        $data['category_name'] = $this->input->post('category_name', true);
        $category_id = $this->input->post('category_id', true);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category',$data);
    }
    
    public function delete_category_by_id($category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
    }
        
    public function save_subcategory_info()
    {
        $data=array();
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_name'] = $this->input->post('subcategory_name', true);
        $this->db->insert('tbl_subcategory',$data);
    }
    
    public function select_all_subcategory($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_category AS c, tbl_subcategory AS s WHERE c.category_id=s.category_id ORDER BY s.subcategory_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_subcategory_by_id($subcategory_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('subcategory_id',$subcategory_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_subcategory_info()
    {
        $data=array();
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_name'] = $this->input->post('subcategory_name', true);
        $subcategory_id = $this->input->post('subcategory_id', true);
        $this->db->where('subcategory_id',$subcategory_id);
        $this->db->update('tbl_subcategory',$data);
    }
    
    public function delete_subcategory_by_id($subcategory_id)
    {
        $this->db->where('subcategory_id',$subcategory_id);
        $this->db->delete('tbl_subcategory');
    }
    
    public function select_all_published_subcategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->order_by('subcategory_id','ASC');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_item_info()
    {
        $data=array();
        $data['subcategory_id'] = $this->input->post('subcategory_id', true);
        $data['item_name'] = $this->input->post('item_name', true);
        $this->db->insert('tbl_item',$data);
    }
    
    public function select_all_item($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_item AS i, tbl_subcategory AS s WHERE i.subcategory_id=s.subcategory_id ORDER BY item_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_item_by_id($item_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->where('item_id',$item_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_item_info()
    {
        $data=array();
        $data['subcategory_id'] = $this->input->post('subcategory_id', true);
        $data['item_name'] = $this->input->post('item_name', true);
        $item_id = $this->input->post('item_id', true);
        $this->db->where('item_id',$item_id);
        $this->db->update('tbl_item',$data);
    }
    
    public function delete_item_by_id($item_id)
    {
        $this->db->where('item_id',$item_id);
        $this->db->delete('tbl_item');
    }
    
    public function select_all_published_item()
    {
        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->order_by('item_id','ASC');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function save_brand_info()
    {
        $data=array();
        $data['item_id'] = $this->input->post('item_id', true);
        $data['brand_name'] = $this->input->post('brand_name', true);
        $data['brand_type'] = 1;
        $this->db->insert('tbl_brand',$data);
    }
    
    public function select_all_brand($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_brand AS b, tbl_item AS i WHERE b.brand_type=1 AND b.item_id=i.item_id ORDER BY b.brand_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_brand_by_id($brand_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('brand_id',$brand_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_brand_info()
    {
        $data=array();
        $data['item_id'] = $this->input->post('item_id', true);
        $data['brand_name'] = $this->input->post('brand_name', true);
        $data['brand_type'] = 1;
        $brand_id = $this->input->post('brand_id', true);
        $this->db->where('brand_id',$brand_id);
        $this->db->update('tbl_brand',$data);
    }
    
    public function delete_brand_by_id($brand_id)
    {
        $this->db->where('brand_id',$brand_id);
        $this->db->delete('tbl_brand');
    }

    public function save_color_info()
    {
        $data=array();
        $data['color_name'] = $this->input->post('color_name', true);
        $this->db->insert('tbl_color',$data);
    }
    
    public function select_all_color()
    {
        $sql = "SELECT * FROM tbl_color";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_color_by_id($color_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_color');
        $this->db->where('color_id',$color_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_color_info()
    {
        $data=array();
        $data['color_name'] = $this->input->post('color_name', true);
        $color_id = $this->input->post('color_id', true);
        $this->db->where('color_id',$color_id);
        $this->db->update('tbl_color',$data);
    }
    
    public function delete_color_by_id($color_id)
    {
        $this->db->where('color_id',$color_id);
        $this->db->delete('tbl_color');
    }
    
    public function save_size_info()
    {
        $data=array();
        $data['size_name'] = $this->input->post('size_name', true);
        $this->db->insert('tbl_size',$data);
    }
    
    public function select_all_size()
    {
        $sql = "SELECT * FROM tbl_size";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_size_by_id($size_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_size');
        $this->db->where('size_id',$size_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_size_info()
    {
        $data=array();
        $data['size_name'] = $this->input->post('size_name', true);
        $size_id = $this->input->post('size_id', true);
        $this->db->where('size_id',$size_id);
        $this->db->update('tbl_size',$data);
    }
    
    public function delete_size_by_id($size_id)
    {
        $this->db->where('size_id',$size_id);
        $this->db->delete('tbl_size');
    }
    
    public function select_all_published_brand()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('brand_type',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_subcategory_by_category_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_product_info($data)
    {
        $this->db->insert('tbl_product',$data);
    }
    
    public function select_all_product($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_product_by_id($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id',$product_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_product_info()
    {
        $size_name = $this->input->post('size_name', true);
        $size = implode(",",$size_name);  
        $color_name = $this->input->post('color_name', true);
        $color = implode(",",$color_name);
        $data=array();
        $data['category_id'] = $this->input->post('category_id', true);
        $data['subcategory_id'] = $this->input->post('subcategory_id', true);
        $data['item_id'] = $this->input->post('item_id', true);
        $data['brand_id'] = $this->input->post('brand_id', true);
        if($size !=NULL)
        {
            $data['size'] = $size;
        }
        if($color !=NULL)
        {
            $data['color'] = $color;
        }
        $data['product_name'] = $this->input->post('product_name', true);
        $data['product_code'] = $this->input->post('product_code', true);
        $data['special_product'] = $this->input->post('special_product', true);
        $data['delivery_time'] = $this->input->post('delivery_time', true);
        $data['delivery_area'] = $this->input->post('delivery_area', true);
        $data['delivery_charge_inside'] = $this->input->post('delivery_charge_inside', true);
        $data['delivery_charge_outside'] = $this->input->post('delivery_charge_outside', true);
        $data['product_quantity'] = $this->input->post('product_quantity', true);
        $data['product_old_price'] = $this->input->post('product_old_price', true);
        $data['product_price'] = $this->input->post('product_price', true);
        $data['extra_information'] = $this->input->post('extra_information', true);
        $data['product_description'] = $this->input->post('product_description', true);
        $product_id = $this->input->post('product_id', true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function delete_product_by_id($product_id)
    {
        $this->db->where('product_id',$product_id);
        $this->db->delete('tbl_product');
    }
    
    public function edit_image_one($data)
    {
        $product_id=$this->input->post('product_id',true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function edit_image_two($data)
    {
        $product_id=$this->input->post('product_id',true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function edit_image_three($data)
    {
        $product_id=$this->input->post('product_id',true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function edit_image_four($data)
    {
        $product_id=$this->input->post('product_id',true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function edit_image_five($data)
    {
        $product_id=$this->input->post('product_id',true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function select_all_customer($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_customer WHERE customer_type='0' ORDER BY customer_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_customer_order_by_id($customer_id)
    {
        $sql = "SELECT * FROM tbl_order WHERE customer_id='$customer_id' AND order_type=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function inactive_customer_by_id($customer_id)
    {
        $this->db->set('customer_status',0);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer');
    }
    
    public function active_customer_by_id($customer_id)
    {
        $this->db->set('customer_status',1);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer');
    }
    
    public function delete_customer_by_id($customer_id)
    {
        $this->db->where('customer_id',$customer_id);
        $this->db->delete('tbl_customer');
    }
    
    public function select_all_review($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_review AS r, tbl_product AS p, tbl_customer AS c WHERE r.product_id=p.product_id AND r.customer_id=c.customer_id ORDER BY r.review_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function delete_review_by_id($review_id)
    {
        $this->db->where('review_id',$review_id);
        $this->db->delete('tbl_review');
    }
    
    public function select_sales_report_info($start,$end)
    {
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c WHERE o.customer_id=c.customer_id AND order_status=1 AND order_type=1 AND invoice_date BETWEEN '$start' AND '$end' ";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_amount($start,$end)
    {
        $sql = "SELECT SUM(order_total) AS total FROM tbl_order WHERE order_status=1 AND order_type=1 AND (invoice_date BETWEEN '$start' AND '$end')";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
    
    public function select_all_sale($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c, tbl_payment AS p WHERE o.customer_id=c.customer_id AND o.payment_id=p.payment_id AND order_status='1' AND order_type=1 ORDER BY o.order_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_sale_by_id($sale_id)
    {
        $this->db->where('order_id',$sale_id);
        $this->db->delete('tbl_order');
    }
    
    public function select_all_order($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c, tbl_payment AS p WHERE o.customer_id=c.customer_id AND o.payment_id=p.payment_id AND order_type=1 ORDER BY o.order_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_order_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order_details');
        $this->db->where('order_id',$order_id);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_total_order_by_id($order_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('order_id',$order_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_shipping_info_by_id($shipping_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_shipping');
        $this->db->where('shipping_id',$shipping_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_payment_info_by_id($payment_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_payment');
        $this->db->where('payment_id',$payment_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function paid($order_id)
    {
        $this->db->set('order_status',1);
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_order');
    }
    
    public function delete_order_by_id($order_id)
    {
        $this->db->where('order_id',$order_id);
        $this->db->delete('tbl_order');
    }
    
    public function select_subscribe_list()
    {
        $sql = "SELECT * FROM tbl_newsletter_subscription WHERE subscription_status='1'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_subscribe($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_newsletter_subscription ORDER BY subscription_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function deactive_subscription_by_id($subscription_id)
    {
        $this->db->set('subscription_status',0);
        $this->db->where('subscription_id',$subscription_id);
        $this->db->update('tbl_newsletter_subscription');
    }
    
    public function active_subscription_by_id($subscription_id)
    {
        $this->db->set('subscription_status',1);
        $this->db->where('subscription_id',$subscription_id);
        $this->db->update('tbl_newsletter_subscription');
    }
    
    public function delete_subscription_by_id($subscription_id)
    {
        $this->db->where('subscription_id',$subscription_id);
        $this->db->delete('tbl_newsletter_subscription');
    }
    
    public function select_all_home_product()
    {
        $sql = "SELECT * FROM tbl_home_product AS h, tbl_subcategory AS s WHERE h.subcategory_id=s.subcategory_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_call_us_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $this->db->where('setting_type',1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_terms_and_conditions()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $this->db->where('setting_type',2);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function save_home_product_info()
    {
        $data=array();
        $data['subcategory_id'] = $this->input->post('subcategory_id', true);
        $this->db->insert('tbl_home_product',$data);
    }
    
    public function delete_home_product_by_id($home_product_id)
    {
        $this->db->where('home_product_id',$home_product_id);
        $this->db->delete('tbl_home_product');
    }

    public function update_settings_info()
    {
        $data=array();
        $data['setting'] = $this->input->post('setting', true);
        $setting_id = $this->input->post('setting_id', true);
        $this->db->where('setting_id',$setting_id);
        $this->db->update('tbl_setting',$data);
    }
}