<?php

//session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author lenovo
 */
require '../../core/Database.php';

class User {

    //put your code here
    public $db;

    public function __construct() {
        $this->db = new Database();
        //$this->load->Database();
    }

    public function addUser($name, $email, $password, $room, $image, $ext) {

        $user = array();
        $user['name'] = $name;
        $user['password'] = md5($password);
        $user['email'] = $email;
        $user['room_id'] = $room;
        $user['ext'] = $ext;
        $user['image'] = $image;
        var_dump($user);
        //checking if the username or email is available in db
        // $users = $db->select("users", $rows = '*', $where = "email = $user->email");
        $inserted = $this->$db->insert("users", $user);
        // $count_row = $users->number_of_rows;
        // //if the username is not in db then insert to the table
        // if($count_row == 0){
        //     $db->insert("users",$user);
        //     if($check == true)	
        //     {
        //         $_SESSION['login'] = true; 
        //         $_SESSION['uid'] = $user['id'];
        //         return true; 
        //     }	
        // }
        // else{return false;}

        return $inserted;
    }

    public function getUser($id) {
        $user = $this->db->select("users", "*", "id='$id' ;")['resultset'];
        return $user;
    }

    public function login($email, $password) {
//            var_dump("7878");
        $userpassword = md5($password);
        $user = $this->db->selectById("users", "*", "email='$email' and password='$userpassword'");
//            var_dump($user);
        $result = $user['resultset'];
        if (is_array($user['resultset'])) {
            $count_row = $user['number_of_rows'];
            //var_dump($result);
            //var_dump($result['role_id']);
            //var_dump($count_row);
            if ($count_row == 1 && strcmp($result['role_id'], "2") == 0) {
//                    var_dump($result['role_id']);
                $_SESSION['login'] = true;
                $_SESSION['user'] = $result;
                $_SESSION['uid'] = $result['id'];
                //                header("Location: ../../views/home.php");
                header('Location: ./userConfirmOrders.php');
            } else if ($count_row == 1 && strcmp($result['role_id'], "1") == 0) {
                $_SESSION['login'] = true;
                $_SESSION['adminUser'] = $result;
                $_SESSION['aid'] = $result['id'];
                header('Location: ./ConfirmOrders.php');
            }
        } else {
            //            var_dump("you don't have right to access this page");
            header("Location: ./login.php");
        }
    }

    public function logout() {
        $_SESSION['err']="";
        $_SESSION['success']="";
        $_SESSION['login'] = FALSE;
        unset($_SESSION);
        session_destroy();
        header("Location: ./login.php");
    }

}
