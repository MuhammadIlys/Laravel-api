<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyApi extends Controller
{
    public function getData(){
        return [
            'name'=>'Elyas',
            'email'=>'elyas@gmail.com',
            'address'=>'islamabad'
        
        ];
    }
}  
