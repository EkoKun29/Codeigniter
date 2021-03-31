<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Group_do extends YK_Controller {
    
    var $rules = array(
        array(
            'field' => 'GroupName',
            'label' => 'Nama Group',
            'rules' => 'trim|required|is_unique[yk_group.GroupName]'
        ),
        array(
            'field' => 'GroupDescription',
            'label' => 'Keterangan',
            'rules' => 'trim'
        )
    );
    
    function add() {
        $this->load->library('form_validation');
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');

        if($this->form_validation->run() == FALSE) {
            echo json_encode(array('success'=>FALSE, 'msg'=> validation_errors()));
        } else {
            $this->load->model('group_model');
            $data = array(
                'GroupName' => $_POST['GroupName'],
                'GroupDescription' => $_POST['GroupDescription']
            );
            $result = $this->group_model->add($data);
            if ($result != null){
                $this->session->set_flashdata(array('added' => true, 'message' => 'Group baru berhasil ditambahkan!'));
                echo json_encode(array('success' => TRUE, 'msg'=>'Penambahan data berhasil.'));
            } else {
                echo json_encode(array('success' => FALSE, 'msg'=>'Penambahan data gagal.'));
            }
        }
    }    
    
    function update() {
        $this->load->library('form_validation');
        $config = $this->rules;
        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('', '');

        if($this->form_validation->run() == FALSE) {
            echo json_encode(array('success'=>FALSE, 'msg'=> validation_errors()));
        } else {
            $this->load->model('group_model');
            $data = array(
                'GroupName' => $_POST['GroupName'],
                'GroupDescription' => $_POST['GroupDescription']
            );            
            $result = $this->group_model->update($data, $_POST['GroupId']);
            if ($result){
                $this->session->set_flashdata(array('added' => true, 'message' => 'Group berhasil diupdate!'));
                echo json_encode(array('success'=>TRUE, 'msg' => 'Pengubahan data berhasil.'));
            } else {
                echo json_encode(array('success'=>FALSE, 'msg'=>'Pengubahan data gagal.'));
            }
        }
    }
    
    function delete() {
        $this->load->model('group_model');
        $result = $this->group_model->delete($_POST['id']);        
        if($result == 0) {
            echo '{"success":false, "msg": "Group gagal dihapus!"}';
        } else {
            echo '{"success":true, "msg": "Group berhasil dihapus."}';
        }
    }

}

/* 
 * End of file group_do.php 
 * File location ./application/controllers/system/group_do.php
 */