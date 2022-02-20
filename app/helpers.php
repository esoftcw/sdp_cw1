<?php

function riders(){
    return \App\Models\User::where('role', 'rider')->where('center_id', auth()->user()->center_id)->get();
}

function statusName($status){
    return ucwords(str_replace('_', ' ', $status));
}
