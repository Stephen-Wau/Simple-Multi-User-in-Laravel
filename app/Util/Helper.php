<?php


namespace App\Util;


class Helper
{

    public static function dateConverter($date){
        return date('d-m-Y',strtotime($date));
    }

    public static function timeConverter($time){
//        return date('G:i:s A',strtotime($time));
//        return date('H:i:s', strtotime($time));
        return date('Y-m-d H:i:s',strtotime($time));
    }

    public static function Rupiah($number){
        return "Rp ". number_format($number, 2,',','.');
    }


    public static function active($status){
        return ($status == 1) ? "Aktif" : "Tidak Aktif";
    }

    public static function encrypt($string): string
    {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = '45345345345435345';
        $secret_iv = 'dfg546yjdfj6rturt7';

        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        return base64_encode($output);
    }

    public static function decrypt($string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = '45345345345435345';
        $secret_iv = 'dfg546yjdfj6rturt7';

        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        return openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

}
