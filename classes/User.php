<?php

    


    class Db {

        public function connect(){
            try {
                $conn = new PDO("mysql:host=localhost;dbname=isotechr_taskerapp", "isotechr_user1", "Darklord12345!");
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn = $conn;
                return $conn;
                }
            catch(PDOException $e)
                {
                echo "Connection failed: " . $e->getMessage();
                }
        }
    
    }

    class Users extends Db {
        public function getAllUsers() {
            
            $stmt = $this->connect()->query("SELECT * FROM users");
            while( $row = $stmt->fetch() ){
                $data[] = $row;
            }
            return $data;

        }

        public function checkIfUserExists($email, $pass){
         
            $email = $email;
            $password = $pass;

            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $stmt->execute([$email, $password]);

            if( $stmt->rowCount() ){
                while($row = $stmt->fetch())
                {
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['userpic'] = $row['userpic'];
                    $_SESSION['login_username'] = $row['email'];
			        $_SESSION['login_password'] = $row['password'];
                }
                return true;
            }
            return false;

        }

        public function checkIfUserExistsWithGoogle($email){
         
            $email = $email;

            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);

            if( $stmt->rowCount() ){
                while($row = $stmt->fetch())
                {
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['userpic'] = $row['userpic'];
                }
                return true;
            }
            return false;

        }
    }

    class Tasks extends Db {
        public function getAll() {
            $tasks = array();
            $stmt = $this->connect()->query("SELECT * FROM jobs");
            while( $row = $stmt->fetch() ){
                array_push($tasks, $row['job_title']);
            }

            return $tasks;
            
        }

        public function createTask($taskid, $userid, $username, $tasktitle, $tasktext, $tasktext1, $taskbudget, $cat, $timestamp, $lat, $long, $subkind, $city, $country){

            $stmt = $this->connect()->query("INSERT INTO jobs (job_id, user_id, winner_id, username, job_title, job_text, job_text1, job_budget, job_kind, status, time_posted, latitude, longitude, job_subkind, city, country) VALUES ('$taskid', '$userid', '0', '$username', '$tasktitle', '$tasktext', '$tasktext1', '$taskbudget', '$cat', 'active', '$timestamp', '$lat', '$long', '$subkind', '$city', '$country')");
            

        }
    }

    class Pagination{
        function Paginate($values,$per_page){
            $total_values = count($values);
            
            if(isset($_GET['page']))
            {
                $current_page = $_GET['page'];
            }
            else
            {
                $current_page = 1;
            }
            $counts = ceil($total_values / $per_page);
            $param1 = ($current_page - 1) * $per_page;
            $this->data = array_slice($values,$param1,$per_page);
            
            for($x=1; $x<= $counts; $x++)
            {
                $numbers[] = $x;
            }
            return $numbers;
        }
        function fetchResult()
        {
            $resultsValues = $this->data;
            return $resultsValues;
        }
    }

    

    
    
    
    