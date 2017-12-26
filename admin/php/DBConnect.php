<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnect
 *
 * @author Vaibhav
 */
class DBConnect {
    private $db = NULL;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "donor";

    public function __construct() {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_SERVER;
        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' .
            $e->getMessage());
        }
        return $this->db;
    }
    
    public function auth(){
        session_start();
        if(! isset($_SESSION['username'])){
            header("Location: http://localhost/BDManagement/admin");
        }
    }
    
    public function checkAuth(){
        session_start();
        if(isset($_SESSION['username'])){
            header("Location: http://localhost/BDManagement/admin/home.php");
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: http://localhost/BDManagement/admin");
    }

    public function addEmployee($username,$password,$firstName,$middleName,$lastName,$pcrNumber,$designation,$landline,$mobile,$birthDay){
        $stmt = $this->db->prepare("INSERT INTO employees (f_name,m_name,l_name,username,password,b_day,designation,landline,mobile_nr, prc_nr)"
                . "VALUES (?,?,?,?,?,?,?,?,?,?)");
        if($stmt->execute([$firstName,$middleName,$lastName,$username,$password,$birthDay,$designation,$landline,$mobile,$pcrNumber]))
            return true;
        else
            return $this->db->errorInfo();
    }
    
    public function getEmployees(){
        $stmt = $this->db->prepare("SELECT * FROM employees");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getEmployeeById($id){
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    
    public function updateEmployee($id,$username,$password,$firstName,$middleName,$lastName,$designation,$landline,$mobile,$birthDay){
        $query = "UPDATE employees SET username=?, password=?,f_name=?,m_name=?,l_name=?,designation=?,landline=?,mobile_nr=?,b_day=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        $flag = $stmt->execute([$username,$password,$firstName,$middleName,$lastName,$designation,$landline,$mobile,$birthDay, $id]);
        if($flag){
            return true;
        }else{
            return false;
        }
    }
    
    public function remove($id){
        $stmt = $this->db->prepare("DELETE FROM employees WHERE id=?");
        $flag = $stmt->execute([$id]);
        if($flag){
            return true;
        }else{
            return false;
        }
    }
    
}
