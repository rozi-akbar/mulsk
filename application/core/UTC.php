<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UTC
{
    public function TimeStamp()//vicky
    {
        $Data = date("H:i:s");
        return $Data;
    }

    public function DateStamp()//vicky
    {
        $Data = date("Y-m-d");
        return $Data;
    }

    public function DateTimeStamp()//vicky
    {
        $Data = date("Y-m-d h:i:s");
        return $Data;
    }

    public function DateStamp_card()//vicky
    {
        /*untuk setting tanggal valid thru pada idcard seller */
        $tanggal = date("Y-m-d");
        $Data = date('m / y', strtotime('+1 year', strtotime($tanggal)));
        return $Data;
    }
}
