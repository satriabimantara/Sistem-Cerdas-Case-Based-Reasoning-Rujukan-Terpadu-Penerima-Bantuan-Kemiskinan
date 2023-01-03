<?php
class Session
{

    public static function unsetSession($nama_session)
    {
        unset($_SESSION[$nama_session]);
    }
    public static function unsetAllSession()
    {
        session_unset();
    }
    public static function checkSessionLogin($nama_session)
    {
        if (isset($_SESSION[$nama_session])) {
            return 1;
        } else {
            return 0;
        }
    }
    public static function setSession($nama_session, $value)
    {
        $_SESSION[$nama_session] = $value;
    }
    public static function getSession($nama_session)
    {
        if (!isset($_SESSION[$nama_session])) {
            return null;
        } else {
            return $_SESSION[$nama_session];
        }
    }
}
