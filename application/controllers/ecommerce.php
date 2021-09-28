<?php defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Ecommerce extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('admin_login', 'refresh');
        }
    }
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['dashboard'] = $this->load->view('admin/dashboard', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_date_time');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('admin_login');
    }
    
    public function edit_admin($admin_id) 
    {
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['admin_info'] = $this->ecommerce_model->select_admin_by_id($admin_id);
        $data['dashboard'] = $this->load->view('admin/edit_admin', $data, true);
        $sdata = array();
        $sdata['edit_admin'] = 'Update Admin Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }
    
    public function update_admin() 
    {
        $this->ecommerce_model->update_admin_info();
        redirect('ecommerce');
    }
    
    public function manage_news()
    {
        $data = array();
        $data['title'] = 'Manage News';
        $data['all_news'] = $this->ecommerce_model->select_all_news();
        $data['dashboard'] = $this->load->view('admin/manage_news', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_news($news_id) 
    {
        $data = array();
        $data['title'] = 'Edit News';
        $data['news_info'] = $this->ecommerce_model->select_news_by_id($news_id);
        $data['dashboard'] = $this->load->view('admin/edit_news', $data, true);
        $sdata = array();
        $sdata['edit_news'] = 'Update News Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_news() 
    {
        $this->ecommerce_model->update_news_info();
        redirect('ecommerce/manage_news');
    }
    
    public function add_slide()
    {
        $data = array();
        $data['title'] = 'Add Slide';
        $data['dashboard'] = $this->load->view('admin/add_slide', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_slide()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/slide_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('slide_image'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'slide_image';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/slide_image/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '786';
                $config['height'] = '521';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'slide_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
            }
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['slide_url'] = $this->input->post('slide_url', true);
        $this->ecommerce_model->save_slide_info($data);
        $sdata = array();
        $sdata['save_slide'] = 'Slide Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_slide');
    }
    
    public function edit_slide($slide_id) 
    {
        $data = array();
        $data['title'] = 'Edit Slide';
        $data['slide_info'] = $this->ecommerce_model->select_slide_by_id($slide_id);
        $data['dashboard'] = $this->load->view('admin/edit_slide', $data, true);
        $sdata = array();
        $sdata['edit_slide'] = 'Update Slide Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }
    
    public function update_slide()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/slide_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('slide_image'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'slide_image';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/slide_image/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '786';
                $config['height'] = '521';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'slide_image';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['slide_url'] = $this->input->post('slide_url', true);
        $this->ecommerce_model->update_slide_info($data);
        $sdata = array();
        $sdata['save_slide'] = 'Slide Edited';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_slider');
    }
    
    public function manage_slider()
    {
        $data = array();
        $data['title'] = 'Manage Slider';
        $data['all_slide'] = $this->ecommerce_model->select_all_slide();
        $data['dashboard'] = $this->load->view('admin/manage_slider', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function delete_slide($slide_id) 
    {        
        $this->ecommerce_model->delete_slide_by_id($slide_id);
        redirect('ecommerce/manage_slider');
    }
    
    public function add_banner()
    {
        $data = array();
        $data['title'] = 'Add Banner';
        $data['dashboard'] = $this->load->view('admin/add_banner', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_banner()
    {
        $data=array();
        $cnt = 0;
        foreach ($_FILES as $eachFile) {
            if ($eachFile['size'] > 0) {
                $config['upload_path'] = 'upload_image/banner_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '1920';
                $config['max_height'] = '1080';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('banner_image')) {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } else {
                    $fdata = $this->upload->data();
                    $index = 'banner_image';
                    $data[$index] = $config['upload_path'] . $fdata['file_name'];
                }
            }
        }
        $data['banner_link'] = $this->input->post('banner_link', true);
        $data['banner_position'] = $this->input->post('banner_position', true);
        $data['banner_type'] = 1;
        $this->ecommerce_model->save_banner_info($data);
        $sdata = array();
        $sdata['save_banner'] = 'Banner Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_banner');
    }
    
    public function edit_banner($banner_id) 
    {
        $data = array();
        $data['title'] = 'Edit Banner';
        $data['banner_info'] = $this->ecommerce_model->select_banner_by_id($banner_id);
        $data['dashboard'] = $this->load->view('admin/edit_banner', $data, true);
        $sdata = array();
        $sdata['edit_banner'] = 'Update Banner Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }
    
    public function update_banner()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	$cnt = 0;
        foreach ($_FILES as $eachFile) {
            if ($eachFile['size'] > 0) {
                $config['upload_path'] = 'upload_image/banner_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '1920';
                $config['max_height'] = '1080';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('banner_image')) {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } else {
                    $fdata = $this->upload->data();
                    $index = 'banner_image';
                    $data[$index] = $config['upload_path'] . $fdata['file_name'];
                }
            }
        }
        $data['banner_link'] = $this->input->post('banner_link', true);
        $data['banner_position'] = $this->input->post('banner_position', true);
        $data['banner_type'] = 1;
        $this->ecommerce_model->update_banner_info($data);
        $sdata = array();
        $sdata['save_banner'] = 'Banner Edited';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_banner');
    }
    
    public function manage_banner()
    {
        $data = array();
        $data['title'] = 'Manage Banner';
        $data['all_banner'] = $this->ecommerce_model->select_all_banner();
        $data['dashboard'] = $this->load->view('admin/manage_banner', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function delete_banner($banner_id) 
    {        
        $this->ecommerce_model->delete_banner_by_id($banner_id);
        redirect('ecommerce/manage_banner');
    }
    
    public function add_coupon()
    {
        $data = array();
        $data['title'] = 'New Coupon';
        $data['dashboard'] = $this->load->view('admin/add_coupon', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_coupon()
    {
        $this->ecommerce_model->save_coupon_info();
        $sdata = array();
        $sdata['save_coupon'] = 'Coupon Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_coupon');
    }
    
    public function manage_coupon()
    {
        $data = array();
        $data['title'] = 'Manage Coupon';
        $data['all_coupon'] = $this->ecommerce_model->select_all_coupon();
        $data['dashboard'] = $this->load->view('admin/manage_coupon', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_coupon($coupon_id) 
    {
        $data = array();
        $data['title'] = 'Edit Coupon';
        $data['coupon_info'] = $this->ecommerce_model->select_coupon_by_id($coupon_id);
        $data['dashboard'] = $this->load->view('admin/edit_coupon', $data, true);
        $sdata = array();
        $sdata['edit_coupon'] = 'Update Coupon Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_coupon() 
    {
        $this->ecommerce_model->update_coupon_info();
        redirect('ecommerce/manage_coupon');
    }
    
    public function delete_coupon($coupon_id) 
    {
        $this->ecommerce_model->delete_coupon_by_id($coupon_id);
        redirect('ecommerce/manage_coupon');
    }
        
    public function add_category()
    {
        $data = array();
        $data['title'] = 'New Category';
        $data['dashboard'] = $this->load->view('admin/add_category', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_category()
    {
        $this->ecommerce_model->save_category_info();
        $sdata = array();
        $sdata['save_category'] = 'Category Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_category');
    }
    
    public function manage_category()
    {
        $data = array();
        $data['title'] = 'Manage Category';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['dashboard'] = $this->load->view('admin/manage_category', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_category($category_id) 
    {
        $data = array();
        $data['title'] = 'Edit Category';
        $data['category_info'] = $this->ecommerce_model->select_category_by_id($category_id);
        $data['dashboard'] = $this->load->view('admin/edit_category', $data, true);
        $sdata = array();
        $sdata['edit_category'] = 'Update Category Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_category() 
    {
        $this->ecommerce_model->update_category_info();
        redirect('ecommerce/manage_category');
    }
    
    public function delete_category($category_id) 
    {
        $this->ecommerce_model->delete_category_by_id($category_id);
        redirect('ecommerce/manage_category');
    }
    
    public function add_subcategory()
    {
        $data = array();
        $data['title'] = 'New Subcategory';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['dashboard'] = $this->load->view('admin/add_subcategory', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_subcategory()
    {
        $this->ecommerce_model->save_subcategory_info();
        $sdata = array();
        $sdata['save_subcategory'] = 'Subcategory Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_subcategory');
    }
    
    public function manage_subcategory()
    {
        $data = array();
        $data['title'] = 'Manage Subcategory';
        $config['base_url'] = base_url() . 'ecommerce/manage_subcategory/';
        $config['total_rows'] = $this->db->count_all('tbl_subcategory');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_subcategory'] = $this->ecommerce_model->select_all_subcategory($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_subcategory', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_subcategory($subcategory_id) 
    {
        $data = array();
        $data['title'] = 'Edit Subcategory';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['subcategory_info'] = $this->ecommerce_model->select_subcategory_by_id($subcategory_id);
        $data['dashboard'] = $this->load->view('admin/edit_subcategory', $data, true);
        $sdata = array();
        $sdata['edit_subcategory'] = 'Update Subcategory Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_subcategory() 
    {
        $this->ecommerce_model->update_subcategory_info();
        redirect('ecommerce/manage_subcategory');
    }
    
    public function delete_subcategory($subcategory_id) 
    {
        $this->ecommerce_model->delete_subcategory_by_id($subcategory_id);
        redirect('ecommerce/manage_subcategory');
    }
    
    public function add_item()
    {
        $data = array();
        $data['title'] = 'New Item';
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['dashboard'] = $this->load->view('admin/add_item', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_item()
    {
        $this->ecommerce_model->save_item_info();
        $sdata = array();
        $sdata['save_item'] = 'Item Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_item');
    }
    
    public function manage_item()
    {
        $data = array();
        $data['title'] = 'Manage Item';
        $config['base_url'] = base_url() . 'ecommerce/manage_item/';
        $config['total_rows'] = $this->db->count_all('tbl_item');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_item'] = $this->ecommerce_model->select_all_item($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_item', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_item($item_id) 
    {
        $data = array();
        $data['title'] = 'Edit Item';
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['item_info'] = $this->ecommerce_model->select_item_by_id($item_id);
        $data['dashboard'] = $this->load->view('admin/edit_item', $data, true);
        $sdata = array();
        $sdata['edit_item'] = 'Update Item Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_item() 
    {
        $this->ecommerce_model->update_item_info();
        redirect('ecommerce/manage_item');
    }
    
    public function delete_item($item_id) 
    {
        $this->ecommerce_model->delete_item_by_id($item_id);
        redirect('ecommerce/manage_item');
    }
    
    public function add_brand()
    {
        $data = array();
        $data['title'] = 'New Brand';
        $data['all_item'] = $this->ecommerce_model->select_all_published_item();
        $data['dashboard'] = $this->load->view('admin/add_brand', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_brand()
    {
        $this->ecommerce_model->save_brand_info();
        $sdata = array();
        $sdata['save_brand'] = 'Brand Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_brand');
    }
    
    public function manage_brand()
    {
        $data = array();
        $data['title'] = 'Manage Brand';
        $config['base_url'] = base_url() . 'ecommerce/manage_brand/';
        $config['total_rows'] = $this->db->count_all('tbl_brand');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_brand'] = $this->ecommerce_model->select_all_brand($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_brand', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_brand($brand_id) 
    {
        $data = array();
        $data['title'] = 'Edit Brand';
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['brand_info'] = $this->ecommerce_model->select_brand_by_id($brand_id);
        $data['dashboard'] = $this->load->view('admin/edit_brand', $data, true);
        $sdata = array();
        $sdata['edit_brand'] = 'Update Brand Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_brand() 
    {
        $this->ecommerce_model->update_brand_info();
        redirect('ecommerce/manage_brand');
    }
    
    public function delete_brand($brand_id) 
    {
        $this->ecommerce_model->delete_brand_by_id($brand_id);
        redirect('ecommerce/manage_brand');
    }
    
    public function add_color()
    {
        $data = array();
        $data['title'] = 'New Color';
        $data['dashboard'] = $this->load->view('admin/add_color', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_color()
    {
        $this->ecommerce_model->save_color_info();
        $sdata = array();
        $sdata['save_color'] = 'Color Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_color');
    }
    
    public function manage_color()
    {
        $data = array();
        $data['title'] = 'Manage Color';
        $data['all_color'] = $this->ecommerce_model->select_all_color();
        $data['dashboard'] = $this->load->view('admin/manage_color', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_color($color_id) 
    {
        $data = array();
        $data['title'] = 'Edit Color';
        $data['color_info'] = $this->ecommerce_model->select_color_by_id($color_id);
        $data['dashboard'] = $this->load->view('admin/edit_color', $data, true);
        $sdata = array();
        $sdata['edit_color'] = 'Update Color Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_color() 
    {
        $this->ecommerce_model->update_color_info();
        redirect('ecommerce/manage_color');
    }
    
    public function delete_color($color_id) 
    {
        $this->ecommerce_model->delete_color_by_id($color_id);
        redirect('ecommerce/manage_color');
    }
    
    public function add_size()
    {
        $data = array();
        $data['title'] = 'New Size';
        $data['dashboard'] = $this->load->view('admin/add_size', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_size()
    {
        $this->ecommerce_model->save_size_info();
        $sdata = array();
        $sdata['save_size'] = 'Size Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/add_size');
    }
    
    public function manage_size()
    {
        $data = array();
        $data['title'] = 'Manage Size';
        $data['all_size'] = $this->ecommerce_model->select_all_size();
        $data['dashboard'] = $this->load->view('admin/manage_size', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_size($size_id) 
    {
        $data = array();
        $data['title'] = 'Edit Size';
        $data['size_info'] = $this->ecommerce_model->select_size_by_id($size_id);
        $data['dashboard'] = $this->load->view('admin/edit_size', $data, true);
        $sdata = array();
        $sdata['edit_size'] = 'Update Size Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_size() 
    {
        $this->ecommerce_model->update_size_info();
        redirect('ecommerce/manage_size');
    }
    
    public function delete_size($size_id) 
    {
        $this->ecommerce_model->delete_size_by_id($size_id);
        redirect('ecommerce/manage_size');
    }

    public function add_product()
    {
        $data = array();
        $data['title'] = 'New Product';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_item'] = $this->ecommerce_model->select_all_published_item();
        $data['all_brand'] = $this->ecommerce_model->select_all_published_brand();
        $data['all_size'] = $this->ecommerce_model->select_all_size();
        $data['all_color'] = $this->ecommerce_model->select_all_color();
        $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function show_subcategory($category_id)
    {
        $data = array();
        $data['select_subcategory'] = $this->ecommerce_model->select_subcategory_by_category_id($category_id);        
        $this->load->view('admin/subcategories', $data);
    }
    
    public function save_product()
    {
        $this->form_validation->set_rules('category_id', 'Category', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Category');
        $this->form_validation->set_rules('subcategory_id', 'Subcategory', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Subcategory');
        $this->form_validation->set_rules('item_id', 'Item', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Item');
        if ($this->form_validation->run() == False) {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['all_category'] = $this->ecommerce_model->select_all_category();
            $data['all_item'] = $this->ecommerce_model->select_all_published_item();
            $data['all_brand'] = $this->ecommerce_model->select_all_published_brand();
            $data['all_size'] = $this->ecommerce_model->select_all_size();
            $data['all_color'] = $this->ecommerce_model->select_all_color();
            $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
            $this->load->view('admin/master', $data);
        }
        else
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
            /** IF THEY DO NOT SELECT A IMAGE **/
            $cnt = 0;
            foreach ($_FILES as $eachFile)
            {
                if ($eachFile['size'] > 0)
                {

                    $config['upload_path'] = 'upload_image/product_image_' . $cnt . '/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '10240';
                    $config['max_width'] = '5000';
                    $config['max_height'] = '5000';
                    $error = '';
                    $fdata = array();
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('product_image_' . $cnt))
                    {
                        $error = $this->upload->display_errors();
                        echo $error;
                        exit();
                    } 
                    else 
                    {
                        $fdata = $this->upload->data();
                        $index = 'product_image_' . $cnt;
                        $up['main'] = $config['upload_path'] . $fdata['file_name'];
                    }        
                    /** START IMAGE RESIZE **/
                    $config['image_library'] = 'gd2';
                    $config['new_image'] = 'upload_image/product_image_' . $cnt . '/';
                    $config['source_image'] = $up['main'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = '300';
                    $config['height'] = '300';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    if (!$this->image_lib->resize()) {
                        $error = $this->image_lib->display_errors();
                        echo $error;
                        exit();
                    } else {
                        $index = 'product_image_' . $cnt;
                        $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                        unlink($fdata['full_path']);
                        }
                    /** END IMAGE RESIZE **/
                    }
                    $cnt++;
            }
            /** END OF IF THEY DO NOT SELECT A IMAGE **/
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
            $this->ecommerce_model->save_product_info($data);
            $sdata = array();
            $sdata['save_product'] = 'Product Saved';
            $this->session->set_userdata($sdata);
            redirect('ecommerce/add_product');
        }
    }
    
    public function manage_product()
    {
        $data = array();
        $data['title'] = 'Manage Product';
        $config['base_url'] = base_url() . 'ecommerce/manage_product/';
        $config['total_rows'] = $this->db->count_all('tbl_product');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_product'] = $this->ecommerce_model->select_all_product($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_product', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function edit_product($product_id) 
    {
        $data = array();
        $data['title'] = 'Edit Product';
        $data['all_category'] = $this->ecommerce_model->select_all_category();
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_item'] = $this->ecommerce_model->select_all_published_item();
        $data['all_brand'] = $this->ecommerce_model->select_all_published_brand();
        $data['all_size'] = $this->ecommerce_model->select_all_size();
        $data['all_color'] = $this->ecommerce_model->select_all_color();
        $data['product_info'] = $this->ecommerce_model->select_product_by_id($product_id);
        $data['dashboard'] = $this->load->view('admin/edit_product', $data, true);
        $sdata = array();
        $sdata['edit_product'] = 'Update Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/master', $data);
    }

    public function update_product() 
    {
        $this->ecommerce_model->update_product_info();
        redirect('ecommerce/manage_product');
    }
    
    public function delete_product($product_id) 
    {        
        $this->ecommerce_model->delete_product_by_id($product_id);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_one()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_0/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_0'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_0';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_0/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_0';
                    $evis_inventorydata[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_two()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_1/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_1'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_1';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_1/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_1';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_three()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_2/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_2'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_2';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_2/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_2';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_four()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_3/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_3'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_3';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_3/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_3';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
    
    public function edit_image_five()
    {
        $data=array();
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                $config['upload_path'] = 'upload_image/product_image_4/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_image_4'))
                {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } 
                else 
                {
                    $fdata = $this->upload->data();
                    $index = 'product_image_4';
                    $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }        
                /** START IMAGE RESIZE **/
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'upload_image/product_image_4/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    $error = $this->image_lib->display_errors();
                    echo $error;
                    exit();
                } else {
                    $index = 'product_image_4';
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                    unlink($fdata['full_path']);
                    }
                /** END IMAGE RESIZE **/
		}
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['product_id'] = $this->input->post('product_id', true);
        $this->ecommerce_model->edit_image_one($data);
        $sdata = array();
        $sdata['edit_product'] = 'Updated';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/manage_product');
    }
    
    public function manage_customer()
    {
        $data = array();
        $data['title'] = 'Manage Customer';
        $config['base_url'] = base_url() . 'ecommerce/manage_customer/';
        $config['total_rows'] = $this->db->count_all('tbl_customer');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_customer'] = $this->ecommerce_model->select_all_customer($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_customer', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function view_customer_order($customer_id) 
    {
        $data = array();
        $data['title'] = 'Customer Order';
        $data['customer_order_info'] = $this->ecommerce_model->select_customer_order_by_id($customer_id);
        $data['dashboard'] = $this->load->view('admin/view_customer_order', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function inactive_customer($customer_id) 
    {
        $this->ecommerce_model->inactive_customer_by_id($customer_id);
        redirect('ecommerce/manage_customer');
    }
    
    public function active_customer($customer_id) 
    {
        $this->ecommerce_model->active_customer_by_id($customer_id);
        redirect('ecommerce/manage_customer');
    }
  
    public function delete_customer($customer_id) 
    {
        $this->ecommerce_model->delete_customer_by_id($customer_id);
        redirect('ecommerce/manage_customer');
    }
    
    public function manage_review()
    {
        $data = array();
        $data['title'] = 'Manage Review';
        $config['base_url'] = base_url() . 'ecommerce/manage_review/';
        $config['total_rows'] = $this->db->count_all('tbl_review');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_review'] = $this->ecommerce_model->select_all_review($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_review', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function delete_review($review_id) 
    {
        $this->ecommerce_model->delete_review_by_id($review_id);
        redirect('ecommerce/manage_review');
    }
     
    public function sales_report()
    {
        $data = array();
        $data['title'] = 'Sales Report';
        $data['dashboard'] = $this->load->view('admin/sales_report', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function show_sales_report()
    {
        $data = array();
        $data['title'] = 'Sales Report';
        $start = $this->input->post('start', true);
        $end = $this->input->post('end', true);
        $data['start'] = $start;
        $data['end'] = $end;
        $data['sales_report'] = $this->ecommerce_model->select_sales_report_info($start,$end,$data);
        $data['total_amount'] = $this->ecommerce_model->select_total_amount($start,$end,$data);
        $data['dashboard'] = $this->load->view('admin/show_sales_report', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function download_sales_report($start,$end)
    {
        $data = array();
        $data['start'] = $start;
        $data['end'] = $end;
        $data['sales_report'] = $this->ecommerce_model->select_sales_report_info($start,$end,$data);
        $data['total_amount'] = $this->ecommerce_model->select_total_amount($start,$end,$data);
        $this->load->view('admin/download_sales_report', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("download_sales_report.pdf");
    }
    
    public function manage_sale()
    {
        $data = array();
        $data['title'] = 'Manage Sale';
        $config['base_url'] = base_url() . 'ecommerce/manage_sale/';
        $this->db->where('order_type',1);
        $this->db->from("tbl_order");
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_sale'] = $this->ecommerce_model->select_all_sale($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_sale', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function delete_sale($sale_id) 
    {
        $this->ecommerce_model->delete_sale_by_id($sale_id);
        redirect('ecommerce/manage_sale');
    }
    
    public function manage_order()
    {
        $data = array();
        $data['title'] = 'Manage Order';
        $config['base_url'] = base_url() . 'ecommerce/manage_order/';
        $this->db->where('order_type',1);
        $this->db->from("tbl_order");
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_order'] = $this->ecommerce_model->select_all_order($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_order', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function invoice($order_id,$customer_id,$shipping_id,$payment_id) 
    {
        $data = array();
        $data['title'] = 'Invoice';
        $data['order_info'] = $this->ecommerce_model->select_order_by_id($order_id);
        $data['total_order'] = $this->ecommerce_model->select_total_order_by_id($order_id);
        $data['shipping_info'] = $this->ecommerce_model->select_shipping_info_by_id($shipping_id);
        $data['payment_info'] = $this->ecommerce_model->select_payment_info_by_id($payment_id);
        $data['customer'] = $this->store_model->select_customer_by_id($customer_id);
        $data['dashboard'] = $this->load->view('admin/invoice', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function paid_order($order_id) 
    {
        $this->ecommerce_model->paid($order_id);
        redirect('ecommerce/manage_order');
    }
    
    public function delete_order($order_id) 
    {
        $this->ecommerce_model->delete_order_by_id($order_id);
        redirect('ecommerce/manage_order');
    }
         
    public function send_newsletter()
    {
        $data = array();
        $data['title'] = 'Send Newsletter';
        $data['dashboard'] = $this->load->view('admin/send_newsletter', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function send_newsletter_mail()
    {
        $all_subscribe = $this->ecommerce_model->select_subscribe_list();
        $subject = $this->input->post('subject', true);
        $message = $this->input->post('message', true);
        foreach($all_subscribe as $value){
            $mdata = array();
            $mdata['from_address'] = 'sales@1stbitbd.com';
            $mdata['to_address'] = $value->subscription_email;
            $mdata['admin_full_name'] = 'Evis Technology';
            $mdata['subject'] = $subject;
            $mdata['message'] = $message;
            $this->mailer_model->send_newsletter($mdata, 'newsletter');
        }
        $data = array();
        $data['title'] = 'Success';
        $data['dashboard'] = $this->load->view('admin/success', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function manage_subscription()
    {
        $data = array();
        $data['title'] = 'Subscribe Email';
        $config['base_url'] = base_url() . 'ecommerce/manage_subscription/';
        $config['total_rows'] = $this->db->count_all('tbl_newsletter_subscription');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_subscribe'] = $this->ecommerce_model->select_all_subscribe($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('admin/manage_subscription', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function deactive_subscription($subscription_id) 
    {
        $this->ecommerce_model->deactive_subscription_by_id($subscription_id);
        redirect('ecommerce/manage_subscription');
    }

    public function active_subscription($subscription_id)
    {
        $this->ecommerce_model->active_subscription_by_id($subscription_id);
        redirect('ecommerce/manage_subscription');
    }
    
    public function delete_subscription($subscription_id) 
    {
        $this->ecommerce_model->delete_subscription_by_id($subscription_id);
        redirect('ecommerce/manage_subscription');
    }
    
    public function settings()
    {
        $data = array();
        $data['title'] = 'Settings';
        $data['all_subcategory'] = $this->ecommerce_model->select_all_published_subcategory();
        $data['all_home_product'] = $this->ecommerce_model->select_all_home_product();
        $data['call_us'] = $this->ecommerce_model->select_call_us_info();
        $data['terms_and_conditions'] = $this->ecommerce_model->select_terms_and_conditions();
        $data['dashboard'] = $this->load->view('admin/settings', $data, true);
        $this->load->view('admin/master', $data);
    }
    
    public function save_home_product()
    {
        $this->ecommerce_model->save_home_product_info();
        $sdata = array();
        $sdata['settings'] = 'Home Product Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/settings');
    }
    
    public function delete_home_product($home_product_id) 
    {
        $this->ecommerce_model->delete_home_product_by_id($home_product_id);
        redirect('ecommerce/settings');
    }
    
    public function update_settings()
    {
        $this->ecommerce_model->update_settings_info();
        $sdata = array();
        $sdata['settings'] = 'Call Us Saved';
        $this->session->set_userdata($sdata);
        redirect('ecommerce/settings');
    }
           
    public function about()
    {
        $data = array();
        $data['title'] = 'LabTrio';
        $data['dashboard'] = $this->load->view('admin/about', $data, true);
        $this->load->view('admin/master', $data);
    }
}