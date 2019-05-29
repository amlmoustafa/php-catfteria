<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileUploader
 *
 * @author media
 */
class FileUploader {

    const UPLOAD_ERR_APP_MAX_SIZE = 10;
    const UPLOAD_ERR_TYPE_NOT_SUPPORTED = 11;
    const UPLOAD_ERR_FILE_EXISTED = 12;
    const UPLOAD_ERR_FILE_NOT_MOVED = 13;
    const MAX_FILE_SIZE = 52428800; //(25 * 1024 * 1024)

    public static $default_types = array('image/jpeg','image/gif', 'image/png', 'application/pdf' ,'application/html');

    public static function upload($file, $new_path, $validation = array()) {

        if ($file['error'] > 0) {

//            throw new \Exception("Error in Uploading File", $file['error']);
            Session::set("error", 'Error in Uploading File '.$file['error'].' , it  may because you have not uploaded any files yet');
            return FALSE;
        }

        if (!isset($validation['size'])) {
            $validation['size'] = self::MAX_FILE_SIZE;
        }
        if ($file['size'] > $validation['size']) {

//            throw new \Exception("File Exceeds Maximum Size", self::UPLOAD_ERR_APP_MAX_SIZE);
            Session::set("error", 'File Exceeds Maximum Size '.self::UPLOAD_ERR_APP_MAX_SIZE.'');
            return FALSE;
        }

        if (!isset($validation['types'])) {
            $validation['types'] = self::$default_types;
        }
        //bt3ml check if type of file bt3 el malf mogoud fe el array el feha types el motha
        if (!in_array($file['type'], $validation['types'])) {

            Session::set("error", 'File Type Not Allowed '.self::UPLOAD_ERR_TYPE_NOT_SUPPORTED.'');
            return FALSE;
//            throw new \Exception("File Type Not Allowed", self::UPLOAD_ERR_TYPE_NOT_SUPPORTED);
        }
        if (file_exists($new_path)) {

//            throw new \Exception("File With Same Name Existed", self::UPLOAD_ERR_FILE_EXISTED);
            Session::set("error", 'File With Same Name Existed '.self::UPLOAD_ERR_FILE_EXISTED.'');
            return FALSE;
        }
        if (!move_uploaded_file($file['tmp_name'], $new_path)) {
//            throw new \Exception("File With Same Name Existed", self::UPLOAD_ERR_FILE_NOT_MOVED);
            Session::set("error", 'File With Same Name Existed '.self::UPLOAD_ERR_FILE_NOT_MOVED.'');
            return FALSE;
        }
        return true;

    }

}
