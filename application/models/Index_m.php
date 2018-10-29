<?php

/**
 * Created by PhpStorm.
 * User: whhh5108
 * Date: 2017. 5. 12.
 * Time: PM 10:06
 */
class Index_m extends CI_Model
{
    function __construct(){
        parent::__construct();
    }


    public function auth($auth_data){

        $sql = "SELECT * FROM lifebook WHERE uid = ".$this->db->escape($auth_data['uid'])." and pwd = ".$this->db->escape($auth_data['pwd']);

        $result = $this->db->query($sql);

        if($result->num_rows() > 0){
            return $result->row();
        } else{
            return FALSE;
        }
    }

    public function hide($id,$tf){
        if($tf){
            $sql = "UPDATE lifes SET type = FALSE WHERE id ='$id'";

            $query = $this->db->query($sql);
        } else{
            $sql = "UPDATE lifes SET type = TRUE WHERE id = '$id'";

            $query = $this->db->query($sql);
        }
    }

    public function board(){

        $sql = "SELECT * FROM lifes";

        $result = $this->db->query($sql);

        return $result->result();

    }

    public function select_board($id){
        $sql = "SELECT * FROM lifes WHERE number = '$id'";

        $query = $this->db->query($sql);

        return $query->result();
    }

    public function student_life($user){
        $sql = "INSERT INTO lifes(user,book_content,book_date,number) VALUES('".$user['user']."',".$this->db->escape($user['book_content']).",'".$user['book_date']."','".$user['number']."')";

        $query = $this->db->query($sql);

    }

    public function modify($original,$mod,$original_date,$mod_date){
        $sql = "UPDATE lifes SET book_content= '".$mod."', mod_type = TRUE, type = TRUE WHERE book_content = '".$original."'";

        $query = $this->db->query($sql);

        $sql2 = "UPDATE lifes SET book_date = '".$mod_date."'Where book_date = '".$original_date."'";

        $query2 = $this->db->query($sql2);
    }
}