<?php

class DB {
    public function connect() {
        try {
            $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $dbh;
    }

    public function insertForm($data) {
        $dbh = $this->connect();
        $sql = "INSERT INTO users (name, last_name, email, comment, avatar) VALUES (:name, :last_name, :email, :comment, :avatar)";
        try {
            $q = $dbh->prepare($sql);
            $q->execute(array(':name'=>  $data['name'],
                            ':last_name'=> $data['last_name'],
                            ':email'=>$data['email'],
                            ':comment'=>$data['comment'],
                            ':avatar'=>$data['avatar']));
            return true;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }
}

?>