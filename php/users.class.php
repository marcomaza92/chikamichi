<?php
class Users
{
    private static $instancia;
    private $dbh;

    private function __construct()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=crud_pdo', 'root', '');
            $this->dbh->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }

    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function get_usuarios()
    {
        try {
            $query = $this->dbh->prepare('select * from users');
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete_usuario($id)
    {
        try {
            $query = $this->dbh->prepare('delete from users where id = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insert_usuario($nombre,$email,$registro)
    {
        try {
            $query = $this->dbh->prepare('insert into users values(null,?,?,?)');
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $email);
            $query->bindParam(3, $registro);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_usuario($id,$nombre,$email,$fecha)
    {
        try {
            $query = $this->dbh->prepare('update users SET nombre = ?, email = ?, registro = ? WHERE id = ?');
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $email);
            $query->bindParam(3, $fecha);
            $query->bindParam(4, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>
