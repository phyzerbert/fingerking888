<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Main;
use App\SubPage;

use Auth;

class IndexController extends Controller
{
    public function sub_page($id) {
        $item = SubPage::find($id);
        if(!$item) {
            return back()->withErrors(['error' => 'Can not find sub page.']);
        }
        return view('sub_page', compact('item'));
    }
}
