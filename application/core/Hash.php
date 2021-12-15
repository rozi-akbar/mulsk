<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hash
{
    //convert string to md5 and sha256 hashing
    public function sha256_md5($String)
    {
        return hash('sha256', md5($String));
    }

    //encrypt string message or text with key
    public function safeEncrypt($message, $key)
    {
        return openssl_encrypt($message,"AES-128-ECB",$key);
    }

    //decrypt string message or text with key
    public function safeDecrypt($encrypted, $key)
    {
        return openssl_decrypt($encrypted,"AES-128-ECB",$key);
    }
}