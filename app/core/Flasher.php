<?php

class Flasher
{
    public static function setFlash($msg, $action, $type)
    {
        $_SESSION['flash'] = [
            'message' => $msg,
            'action' => $action,
            'type' => $type
        ];
    }

    // ini ketrigger kalo setFlash udah diinvoke
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
            <div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
                Data Mahasiswa <strong>' . $_SESSION['flash']['message'] . '</strong> ' . $_SESSION['flash']['action'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
            ';

            unset($_SESSION['flash']);
        }
    }
}
