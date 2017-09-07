<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management extends CI_Controller {
    
    public function index(){
        $data['content'] = 'user_admin';
        $this->load->view('container', $data);
    }
    
	public function add_user()
	{
        $data = array(
            'privilege' => $this->Model_um->get_privilege(),
            'error' => ' ',
            'content' => 'add_user'
        );
        $this->load->view('container', $data);
	}
    
    public function add_process(){
                $config['upload_path']          = './img/user/';
                $config['allowed_types']        = 'jpg|png';
                $config['image_width']          = 700;
                $config['image_height']         = 700;
                $config['file_name']            = 'user_'.time();

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ( ! $this->upload->do_upload('foto'))
                {
                    $data = array(
                        'error' => $this->upload->display_errors(),
                        'content' => 'add_user'
                    );
                        $this->load->view('container', $data);
                } else{
                    $image = $this->upload->data('file_name');
                    $data = array(
                        'fullname' => $this->input->post('fullname'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'password' => md5($this->input->post('password')),
                        'id_privilege' => $this->input->post('privilege'),
                        'foto' => $image,
                        'created_date' => date('Y-m-d H:i:s')
                    );
                    
                    $this->Model_um->add_user($data);
                    redirect('user_management');
                }
    }
    
    public function edit_user($id_admin = NULL){
        $data = array(
            'user' => $this->Model_um->get_user_by_id($id_admin),
            'privilege' => $this->Model_um->get_privilege(),
            'error' => ' ',
            'content' => 'edit_user'
        );
        
        $this->load->view('container', $data);
    }
    
    public function edit_process($id_admin = NULL){
        $gambar = $this->input->post('gambar');
        $gambar_db = $this->input->post('gambar_db');
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $privilege = $this->input->post('privilege');
            
        if($gambar != $gambar_db){
                $config['upload_path']          = './img/user/';
                $config['allowed_types']        = 'jpg|png';
                $config['image_width']          = 700;
                $config['image_height']         = 700;
                $config['file_name']            = 'user_'.time();

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if ( ! $this->upload->do_upload('foto'))
                {
                    $data = array(
                        'user' => $this->Model_um->get_user_by_id($id_admin),
                        'privilege' => $this->Model_um->get_privilege(),
                        'error' => $this->upload->display_errors(),
                        'content' => 'edit_user'
                    );

                    $this->load->view('container', $data);
                    
                } else{
                    $poto = $gambar_db;
                    unlink(FCPATH.'img/user/'.$poto);
                    
                    $foto = $this->upload->data('file_name');
                    $update = array(
                        'fullname' => $fullname,
                        'email' => $email,
                        'phone' => $phone,
                        'id_privilege' => $privilege,
                        'foto' => $foto
                    );
                    
                    $this->Model_um->update($id_admin, $update);
                    redirect('user_management');
                }
        }else{
            $data = array(
                'fullname' => $fullname,
                'email' => $email,
                'phone' => $phone,
                'id_privilege' => $privilege
            );
            
            $this->Model_um->update($id_admin, $data);
            redirect('user_management');
        }
    }
    
    public function delete_user($id_admin = NULL){
        $gambar = $this->uri->segment(4);
        unlink(FCPATH.'img/user/'.$gambar);
        $this->Model_um->delete($id_admin);
        redirect('user_management');
    }
    
    public function user_admin(){
        $data['content'] = 'user_admin';
        $this->load->view('container', $data);
    }
    
   public function ajax_list()
    {
        $list = $this->Model_um->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $record) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $record->fullname;
            $row[] = $record->email;
            $row[] = $record->phone;
            $row[] = $record->status;
            $row[] = $record->foto;
            $row[] = $record->id_privilege;
            $row[] = $record->created_by;
            $row[] = $record->created_date;  
            $row[] = $record->created_date; 
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Model_um->count_all(),
                        "recordsFiltered" => $this->Model_um->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}
