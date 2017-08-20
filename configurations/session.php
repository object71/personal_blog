<?php
    class Session {
        public function __construct() {
            session_start();
        }

        public function register($time = 60) {
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_time'] = intval($time);
            $_SESSION['session_start'] = $this->newTime();
        }

        public function isRegistered()
        {
            if (!isset($_SESSION['session_id'])) {
                return true;
            } else {
                return false;
            }
        }

        public function set($key, $value)
        {
            $_SESSION[$key] = $value;
        }

        public function get($key)
        {
            return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
        }

        public function has($key) {
            return isset($_SESSION[$key]);
        }

        public function getSession()
        {
            return $_SESSION;
        }

        public function getSessionId()
        {
            return $_SESSION['session_id'];
        }

        public function isExpired()
        {
            if ($_SESSION['session_start'] < $this->timeNow()) {
                return true;
            } else {
                return false;
            }
        }

        public function renew()
        {
            $_SESSION['session_start'] = $this->newTime();
        }

        private function timeNow()
        {
            $currentHour = date('H');
            $currentMin = date('i');
            $currentSec = date('s');
            $currentMon = date('m');
            $currentDay = date('d');
            $currentYear = date('y');
            return mktime($currentHour, $currentMin, $currentSec, $currentMon, $currentDay, $currentYear);
        }

        private function newTime()
        {
            $currentHour = date('H');
            $currentMin = date('i');
            $currentSec = date('s');
            $currentMon = date('m');
            $currentDay = date('d');
            $currentYear = date('y');
            return mktime($currentHour, ($currentMin + $_SESSION['session_time']), $currentSec, $currentMon, $currentDay, $currentYear);
        }

        public function end()
        {
            session_destroy();
            $_SESSION = array();
        }
    }

    global $session;
    $session = new Session();
?>