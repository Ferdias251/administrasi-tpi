<?php

use App\Models\section;
use App\Models\setting;
use App\Models\StockIkan;

function get_setting_value($key)
{
    $data = setting::where('key',$key)->first();
    if(isset($data->value)){
        return $data->value;
    }else{
        return 'empty';
    }
}

function get_section_data($key)
{
    $data = section::where('post_as',$key)->first();
    if(isset($data)){
        return $data;
    }
}


function get_stock_ikan_data($id)
{
    $data = StockIkan::find($id);
    if (isset($data)) {
        return $data;
    } else {
        return 'Data tidak ditemukan';
    }
}