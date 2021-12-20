<?php

class GlobalFunction {

    function get_url () {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/moc-batch-1/pertemuan_8-contoh";
        return $actual_link;
    }
}