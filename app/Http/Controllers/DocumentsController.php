<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function getDocuments(){
        return view('public.documents');
    }
}
