<?php
function base_url($url = "") {
    global $config;
    return $config['base_url'].$url;
}
function direct_to($path){
    header("location:{$path}",true,301);
    exit();
}
