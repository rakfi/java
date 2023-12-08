<?php

    include("connection.php");

    class DataOperation extends Database{
        
        public function insert_record($table, $values) {
            
            //INSERT INTO user (name. email, password) VALUES ("name", "email", "password")
            $sql = "";
            $sql .= "INSERT INTO ".$table;
            $sql .= " (".implode(",", array_keys($values)).") VALUES ";
            $sql .= "('".implode("','",array_values($values))."')";

            $query = $this->conn->query($sql);

            if($query) {
                return true;
            } else {
                return false;
            }
        }

        public function fetch_record($table) {
            //"SELECT * FROM user";
            $sql = "SELECT * FROM ".$table;
            // return $sql;
            $array = array();

            $query = $this->conn->query($sql);

            while($row = $query->fetch_assoc()){
                $array[] = $row;
            }
            return $array;
        }

        public function select_record($table, $where) {
            $sql ="";
            $condition = "";

            foreach($where as $key => $value) {
                $condition .= $key . " ='" . $value ."' AND ";

            }

            $condition = substr($condition, 0, -5);

            $sql = "SELECT * FROM ".$table." WHERE ".$condition;
            $query = mysqli_query($this->conn, $sql);
            $row = $query->fetch_assoc();
            return $row;
        }

        public function update_record($table, $where, $fields) {
            $sql ="";
            $condition = "";

            foreach($where as $key => $value) {
                $condition .= $key . " ='" . $value ."' AND ";

            }

            $condition = substr($condition, 0, -5);

            foreach ($fields as $key => $value) {
                $sql .= $key . "='" .$value."', ";
            }
            $sql = substr($sql, 0, -2);
            $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
            if(mysqli_query($this->conn, $sql)) {
                return true;
            }
        }

        public function delete_record($table, $where) {
            $sql ="";
            $condition = "";

            foreach($where as $key => $value) {
                $condition .= $key . " ='" . $value ."' AND ";

            }

            $condition = substr($condition, 0, -5);

            $sql = "DELETE FROM ".$table." WHERE ".$condition;
            if(mysqli_query($this->conn, $sql)) {
                return true;
            }
        }

    }

?>