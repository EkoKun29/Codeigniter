<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Password_model extends Ci_Model {


    function update($userid,$data) {
        $this->db->where('UserId',$userid);
        $this->db->update('yk_user',$data);
    }

    function cek_pwd($userid,$pwd){
        $this->db->where('UserId',$userid);
        $this->db->where('UserPassword',$pwd);
        $q = $this->db->get('yk_user');
        return $q->num_rows();
    }

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
