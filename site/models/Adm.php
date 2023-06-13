<?php  
    require_once("Message.php");

    class Adm {
        private $url;
        private $message; 
        private $admins = [
            "henriqueclash724@gmail.com"
        ];

        public function __construct($url) {
            $this->url = $url;
            $this->message = new Message($url);
        }

        public function isAdm($userDao, $restrict = false) {
            $admins = $this->admins;
            $userData = $userDao->verifyToken(false);
            $email = $userData->getEmail();
            if ($email) {
                foreach($admins as $admin) {
                    if ($email === $admin) {
                        return true;
                    }
                }
                if ($restrict === true) {
                    if ($email !== $admin) {
                        $this->message->setMessage("Você não tem permissão para acessar esta página.", "error");
                    }
                }
            }
        }
    }