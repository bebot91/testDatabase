

<?php
    class DBInformation
        {
            private $servername = "";
            private $username = "";
            private $password = "";
            private $dbname = "";

        function __construct(){
            $this->servername = "db:3306"; // DOcker: Servicename oder sonst localhost ...
            $this->username = "root";
            $this->password = "root";
            $this->dbname = "User";
            }
    
        public function getServername(){
            return $this->servername;
                }

        public function getUsername(){
            return $this->username;
                }

        public function getPassword(){
            return $this->password;
                }

        public function getDbName(){
            return $this->dbname;
                }
            }
?><br>