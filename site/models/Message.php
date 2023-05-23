<?php
    class Message {
        private $url;
        public function __construct($url) {
            $this->url = $url;
        }
        public function setMessage($msg, $type, $redirect = "index.php") {
            $_SESSION["msg"] = $msg;
            $_SESSION["type"] = $type;

            if ($redirect != "back") {
                header("Location: $this->url/" . $redirect);
            } else {
                header("Location: ". $_SERVER["HTTP_REFERER"]);
            }
        }
	public function getMessage() {
            if (!empty($_SESSION["msg"])) {
                $icon = "fa-sharp fa-solid fa-circle-check";
                if ($_SESSION["type"] == "error") {
                    $icon = "fa-sharp fa-solid fa-circle-exclamation";
                }

                return [
                    "msg" => $_SESSION["msg"],
                    "type" => $_SESSION["type"],
		            "icon" => $icon
                ];
            }
            else {
                return false;
            }
        }
        public function clearMessage() {
            $_SESSION["msg"] = "";
            $_SESSION["type"] = "";
	        $_SESSION["icon"] = "";
        }
    }
