<?php
class Users {
    private static $instance;
    private $dbh;
    private function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=crudphppdo', 'root', 'Muse1234/');
            $this->dbh->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
    public static function singleton() {
        if (!isset(self::$instance)) {
            $myclass = __CLASS__;
            self::$instance = new $myclass;
        }
        return self::$instance;
    }
    public function get_users() {
        try {
            $query = $this->dbh->prepare('select * from users');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function get_users_id($id) {
        try {
            $query = $this->dbh->prepare('select * from users where id = ?');
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function delete_users($id) {
        try {
            $query = $this->dbh->prepare('delete from users where id = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function add_users($name,$email,$date) {
        try {
            $query = $this->dbh->prepare('insert into users values(null,?,?,?)');
            $query->bindParam(1, $name);
            $query->bindParam(2, $email);
            $query->bindParam(3, $date);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function update_users($id,$name,$email,$date) {
        try {
            $query = $this->dbh->prepare('update users SET name = ?, email = ?, date = ? WHERE id = ?');
            $query->bindParam(1, $name);
            $query->bindParam(2, $email);
            $query->bindParam(3, $date);
            $query->bindParam(4, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function __clone() {
        trigger_error('Clone is not allowed!', E_USER_ERROR);
    }
}
?>
