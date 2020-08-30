<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\King;
use App\Setting;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('index');
    }

    public function king_save(Request $request) {
        $item =new King();
        $item->title = $request->get('title');
        $item->description1 = $request->get('description1');
        $item->description2 = $request->get('description2');
        if($request->hasFile("image1") && $request->file('image1') != null){
            $picture = request()->file('image1');
            $imageName = time().'1.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/uploaded/'), $imageName);
            $image_url = 'images/uploaded/'.$imageName;
            $item->image1 = $image_url;
        }
        if($request->hasFile("image2") && $request->file('image2') != null){
            $picture = request()->file('image2');
            $imageName = time().'2.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/uploaded/'), $imageName);
            $image_url = 'images/uploaded/'.$imageName;
            $item->image2 = $image_url;
        }
        if($request->hasFile("image3") && $request->file('image3') != null){
            $picture = request()->file('image3');
            $imageName = time().'3.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/uploaded/'), $imageName);
            $image_url = 'images/uploaded/'.$imageName;
            $item->image3 = $image_url;
        }
        if($request->hasFile("image4") && $request->file('image4') != null){
            $picture = request()->file('image4');
            $imageName = time().'4.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/uploaded/'), $imageName);
            $image_url = 'images/uploaded/'.$imageName;
            $item->image4 = $image_url;
        }
        $item->save();
        return back()->with('success', 'Uploaded Successfully');
    }

    public function king_update(Request $request) {
        $item = King::find($request->get('id'));
        $item->title = $request->get('title');
        $item->description1 = $request->get('description1');
        $item->description2 = $request->get('description2');
        if($request->hasFile("image1") && $request->file('image1') != null){
            $picture = request()->file('image1');
            $imageName = time().'1.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/uploaded/'), $imageName);
            $image_url = 'images/uploaded/'.$imageName;
            $item->image1 = $image_url;
        }
        if($request->hasFile("image2") && $request->file('image2') != null){
            $picture = request()->file('image2');
            $imageName = time().'2.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/uploaded/'), $imageName);
            $image_url = 'images/uploaded/'.$imageName;
            $item->image2 = $image_url;
        }
        if($request->hasFile("image3") && $request->file('image3') != null){
            $picture = request()->file('image3');
            $imageName = time().'3.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/uploaded/'), $imageName);
            $image_url = 'images/uploaded/'.$imageName;
            $item->image3 = $image_url;
        }
        if($request->hasFile("image4") && $request->file('image4') != null){
            $picture = request()->file('image4');
            $imageName = time().'4.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('images/uploaded/'), $imageName);
            $image_url = 'images/uploaded/'.$imageName;
            $item->image4 = $image_url;
        }
        $item->save();
        return back()->with('success', 'Updated Successfully');
    }

    public function king_delete($id) {
        King::destroy($id);
        return back()->with('success', 'Deleted Successfully');
    }

    public function setting_update(Request $request) {
        $setting = Setting::find(1);
        $setting->update([
            'whatsapp' => $request->get('whatsapp'),
            'telegram' => $request->get('telegram'),
        ]);

        return back()->with('success'. 'Updated Successfully');
    }
}
