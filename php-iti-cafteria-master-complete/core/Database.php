<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author egypt
 */
class Database {

    //put your code here
//    private $db = array();
    private $connection;
    private $last_query;
    private $result_array = array();

    //__construct() and __clone() private so that no one can call new Db()
    public function __construct() {
//        $this->db['server'] = $args['server'];
//        $this->db['username'] = $args['username'];
//        $this->db['password'] = $args['password'];
//        $this->db['database'] = $args['database'];
        $this->open_connection();
    }

    public function __destruct() {
        $this->close_connection();
    }

    public function open_connection() {
       // $this->connection = mysqli_connect("localhost", "root", "") or die("Connection failed: " . mysqli_connect_error())or die("Connection failed: " . mysqli_connect_error());

        $this->connection = mysqli_connect("localhost", "root", "") or die("Connection failed: " . mysqli_connect_error());
       
//                $this->connection = mysqli_connect(Config::DB_HOST, Config::DB_USERNAME, Config::DB_PASSWORD) or die("Connection failed: " . mysqli_connect_error());
//        var_dump($this->connection);
        //die :print message 
        //mysqli_connect_error():returns the error description from the last connection error if there is no error return null
//            or die('Could not connect: ' . mysqli_error($this->connection));
        $this->select_database();
    }

    public function close_connection() {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    public function select_database() {
//        echo 'hhh';
        //mysqli_select_db:selects database name
      
         mysqli_select_db($this->connection, "cafteria") or die("database selection failed :" . mysqli_error($this->connection));
//        mysqli_select_db($this->connection, Config::DB_NAME) or die("database selection failed :" . mysqli_error($this->connection));
        //specifies the default character set to be used when sending data from and to the database server.
        mysqli_set_charset($this->connection, "utf8") or die("characters can not be set");

//        mysqli_query($this->connection, "SET NAMES utf8");
//	mysqli_query($this->connection, "set characer set utf8");
    }

    /////////////////////////////////////////////
    //Asking for a query
    public function query($query) {
        if (!$this->connection) {
            return false;
        }
        $this->last_query = $query; // comment this after debugging
        $result = mysqli_query($this->connection, $query);
        $this->confirm_query($result);
        return $result;
    }

    // Confirming a query results
    public function confirm_query($result) {
        if (!$result) {
            $output = "Database query Failed: " . mysqli_error($this->connection) . "<br /><br />";
            $output .= "Last query: " . $this->last_query;
            die($output);
        }
    }

    ////////////////////////////////////////////////////////////////////
    //Function to delete table or row(s) from database
    function delete($table, $where = null) {

//    $connection = mysqli_connect("localhost", "root", "", "community2016");
// query preparation 
        if ($where == null) {
//                $delete = 'DELETE '.$table; 
            $query = 'DELETE FROM ' . $table;
        } else {

            $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
        }
//    $query = 'DELETE FROM '.$table.' WHERE '.$where;
//query execuation
//    $result = mysqli_query($connection, $query);
        $result = $this->query($query);
//        var_dump($result);

        if ($result) {
            $this->result_array['result'] = true;

            $this->result_array['number_of_rows'] = mysqli_affected_rows($this->connection);
//                    or die("there is no row effected in databse");
        } else {
            $this->result_array['result'] = false;
            $this->result_array['error_no'] = mysqli_errno($this->connection);
            $this->result_array['error_message'] = mysqli_error($this->connection);
        }

//    mysqli_close($connection);
//        $this->close_connection();
        return $this->result_array;
//        var_dump($this->fetching_result($result));
//fetching results   
    }

///seleccccccccccccccccccccccccccct /////////
    public function select($table, $rows = '*', $where = null, $order = null, $limit = null, $join = null) {
        // Create query from the variables passed to the function
        $query = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($join != null) {
            $query .= ' JOIN ' . $join;
        }
        if ($where != null) {
            $query .= ' WHERE ' . $where;
        }
        if ($order != null) {
            $query .= ' ORDER BY ' . $order;
        }
        if ($limit != null) {
            $query .= ' LIMIT ' . $limit;
        }
        $result = $this->query($query);
        // Check to see if the table exists
        if ($result) {
            $this->result_array['result'] = true;
            $this->result_array['number_of_rows'] = mysqli_num_rows($result);
            if ($this->result_array['number_of_rows'] > 0) {
                $records = array();
                while ($record = mysqli_fetch_array($result)) {
                    $records[] = $record;
                }
                $this->result_array['resultset'] = $records;
            }
//            elseif ($this->result_array['number_of_rows'] == 1) {
////                $record = mysqli_fetch_array($result);
//                $record[]=mysqli_fetch_array($result);
//                $this->result_array['resultset'] = $record;
//            } 
            else {
                $empty = "this table is empty";
                $this->result_array['resultset'] = $empty;
            }
        } else {
            $this->result_array['result'] = false;
            $this->result_array['error_no'] = mysqli_errno($this->connection);
            $this->result_array['error_message'] = mysqli_error($this->connection);
        }

//        $this->close_connection();
        return $this->result_array;
    }

/////////////////////////////////// insert  ////////////////////////////////////////////////////////////////////
    public function insert($table, $params = array()) {
        // Check to see if the table exists
        //" ashan ytl3ly string  'Name 5","767868767' bdal 'Name 5,767868767'
        //var_dump(implode('","', $params));
//        var_dump('"'.  implode('","', $params).'"');
        $query = 'INSERT INTO ' . $table . '(' . implode(',', array_keys($params)) . ')VALUES("' . implode('","', $params) . '")';

        // Make the query to insert to the database
        $result = $this->query($query);
        if ($result) {

            $this->result_array['result'] = true;

            $this->result_array['number_of_rows'] = mysqli_affected_rows($this->connection);

            $this->result_array['inserted_id'] = mysqli_insert_id($this->connection);
        } else {
            $this->result_array['result'] = false;
            $this->result_array['error_no'] = mysqli_errno($this->connection);
            $this->result_array['error_message'] = mysqli_error($this->connection);
        }

//        $this->close_connection();
        return $this->result_array;
    }

////////////////////////////////// update  ///////////////////////////////////////////////

    public function update($table, $params, $where) {

        $updates = array();
        foreach ($params as $field => $value) {
            $updates [] = $field . '="' . $value . '"';
            var_dump($updates);
        }

        $query = 'UPDATE  ' . $table . ' SET  ' . implode(',', $updates) . 'WHERE  ' . $where;
        // Make query to database
        $result = $this->query($query);
        if ($result) {

            $this->result_array['result'] = true;

            $this->result_array['number_of_rows'] = mysqli_affected_rows($this->connection);

            $this->result_array['inserted_id'] = mysqli_insert_id($this->connection);
        } else {
            $this->result_array['result'] = false;
            $this->result_array['error_no'] = mysqli_errno($this->connection);
            $this->result_array['error_message'] = mysqli_error($this->connection);
        }
//        $this->close_connection();
        return $this->result_array;
    }

    //escape function to prevent sql injection
    public function escape($string) {
        return mysqli_escape_string($this->connection, $string);
    }

    public function selectById($table, $rows = '*', $where = null, $order = null, $limit = null, $join = null) {
        // Create query from the variables passed to the function
        $query = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($join != null) {
            $query .= ' JOIN ' . $join;
        }
        if ($where != null) {
            $query .= ' WHERE ' . $where;
        }
        if ($order != null) {
            $query .= ' ORDER BY ' . $order;
        }
        if ($limit != null) {
            $query .= ' LIMIT ' . $limit;
        }
        $result = $this->query($query);
        // Check to see if the table exists
        if ($result) {
            $this->result_array['result'] = true;
            $this->result_array['number_of_rows'] = mysqli_num_rows($result);
            if ($this->result_array['number_of_rows'] == 1) {
                $record = mysqli_fetch_array($result);
//                $record[]=mysqli_fetch_array($result);
                $this->result_array['resultset'] = $record;
            } else {
                $empty = "this table is empty";
                $this->result_array['resultset'] = $empty;
            }
        } else {
            $this->result_array['result'] = false;
            $this->result_array['error_no'] = mysqli_errno($this->connection);
            $this->result_array['error_message'] = mysqli_error($this->connection);
        }

//        $this->close_connection();
        return $this->result_array;
    }
    // amal 
    public function selectPaginate($table)
    {
        $query = "select * from $table";
        // Make query to database
        $result = $this->query($query);
        if ($result) {

            $this->result_array['result'] = true;

            $this->result_array['number_of_rows'] = mysqli_affected_rows($this->connection);

            $this->result_array['inserted_id'] = mysqli_insert_id($this->connection);
        } else {
            $this->result_array['result'] = false;
            $this->result_array['error_no'] = mysqli_errno($this->connection);
            $this->result_array['error_message'] = mysqli_error($this->connection);
        }
//        $this->close_connection();
        return $this->result_array;
    }

}
