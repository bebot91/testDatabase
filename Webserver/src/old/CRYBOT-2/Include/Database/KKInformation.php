


<?php
    class KKInformation
        {
            private $port = 0;
            private $rootpath = '';
            private $contenttype = '';
            private $client = '';
            private $realm = '';


        function __construct(){
            $this->port = 8080;                             // Docker = 8180 / Real = 8181
            $this->rootpath = 'keycloak:';                  // Docker = 'keycloak:' / Real = 'http://localhost:'
            $this->contenttype = 'Content-Type: application/x-www-form-urlencoded';
            $this->client = 'target';                      // Docker = 'account' / Real = 'restclient'
            $this->realm = 'CRYBOT'; 
            }


        public function getPort(){
            return $this->port;
                }
        
        public function getRootpath(){
            return $this->rootpath;
                }

        public function getContenttype(){
            return $this->contenttype;
                }

        public function getClient(){
            return $this->client;
                }

        public function getRealm(){
            return $this->realm;
                }


            }
?><br>