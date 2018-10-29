<?php

/**
 * Created by PhpStorm.
 * User: whhh5108
 * Date: 2017. 5. 10.
 * Time: PM 3:05
 */
class LifeBook extends CI_controller
{

    function __construct(){
        parent::__construct();
        // $this->load->library('encrypt');
        $this->load->model('index_m');
        $this->load->helper('alert');
    }

    public function index(){
        $this -> load -> view('LifeBook/index');
    }

    public function login(){

        $auth_data = array(
            'uid' => $this->input->post('uid',TRUE),
            'pwd' => $this->input->post('pwd',TRUE)
        );

        $result = $this->index_m->auth($auth_data);

        if($result){
            $new_data = array(
                'uid' => $result->uid,
                'name' => $result->name,
                'logged_in' => TRUE,
                'access' => $result->access
            );

            $this->session->set_userdata($new_data);
            
            if($result->access == 1) {
                alert("킹 상욱님 안녕하세욘!","king");
            } else{
                alert($result->name."님 안녕하세요", "student/".$result->number);
            }
        }
        else{
            alert("ㅡㅡ 아이디 비번 다시 확인해 주세요".$result,'index');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('lifebook/index');
    }

    public function king(){

        $data = $this->session->all_userdata();
        
        if($data['logged_in'] && $data['access']==1){
        $this->load->view('LifeBook/king_v',$data);
        } else{
            alert("정상적인 방법으로 접근해 주세요!",'index');
        }
    }

    public function king_student($id){
        if($id==0 || $id == 38) {
            $data['board'] = $this->index_m->board();
            $data['type'] = FALSE;
            $data['isTE'] = ($id==38)? TRUE:FALSE;
            $this->load->view('LifeBook/king_student', $data);
        } else{
            $data['board'] = $this->index_m->select_board($id);
            $data['type'] = TRUE;
            $this->load->view('LifeBook/king_student', $data);
        }
    }

    public function check($id){
        $this->index_m->hide($id,TRUE);
        redirect('lifebook/king_student/0');
    }

    public function student($number){
        $data = $this->session->all_userdata();

        if($_POST) {
            $user = array(
                "user" => $data['name'],
                "book_content" => $this->input->post('book_content', TRUE),
                "book_date" => $this->input->post('book_date', TRUE),
                "number" => $number
            );
            $user['book_content'] = preg_replace('/\r\n|\r|\n/',' ',$user['book_content']);
            if($user) {
                $this->index_m->student_life($user);
                unset($user);
            }
        }



        $data['board'] = $this->index_m->select_board($number);
        $data['number'] = $number;
        $this->load->view('lifebook/student', $data);

        // if($data['logged_in'] && $data['access'] != 'king') {
        // } else{
        //     alert("정상적인 방법으로 접근해 주세요!",'../index');
        // }
    }

    public function modify(){
        $original = $this->input->get('original',TRUE);
        $original_date = substr($original,1,11);
        $original = substr($original,12);

        $mod = $this->input->get('mod',TRUE);
        $mod_date = substr($mod,1,11);
        $mod = substr($mod,12);
        if(preg_match('/([0-9]){4}\.([0-9]){2}\.([0-9]){2}/',$mod_date)){
            $this->index_m->modify($original,$mod,$original_date,$mod_date);
        } else{
            alert("날짜 형식에 맞춰 멍청아!",'./');
        }


    }

}