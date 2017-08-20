<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/session.php";

    class Auth {

        private $session;

        public function __construct() {
            global $session;
            $this->session = $session;
        }

        public function getUserId() {
            return null !== $this->session->get("userId") ? $this->session->get("userId") : false;
        }
        public function getUsername() {
            return null !== $this->session->get("user") ? $this->session->get("user") : false;
        }

        public function authorize($id, $username) {
            $this->session->set("userId", $id);
            $this->session->set("user", $username);
        }

        public function isAuthorized() {
            return $this->session->has("userId");
        }

        public function revoke() {
            $this->session->set("userId", null);
            $this->session->set("user", null);
        }   
    }

    global $auth;
    $auth = new Auth();

    // if(!($auth->isAuthorized())) {
    //     redirect("/login.php");
    // }
?>