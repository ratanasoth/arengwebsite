<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class SliderController extends Controller
{
    // index
    public function index()
    {
        $data['sliders'] = DB::table('sliders')
            ->where('active', 1)
            ->get();
        return view('sliders.index', $data);
    }
    // load create form
    public function create()
    {
        return view('sliders.create');
    }
    // save new logo
    public function save(Request $r)
    {
    	$file_name = '';
        if($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/';
            $file->move($destinationPath, $file_name);
        }
        $data = array(
            'name' => $r->name,
            'photo' => $file_name,
            'description' => $r->description,
            'order_number' => $r->order_number
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('sliders')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/slider/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/slider/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('sliders')->where('id', $id)->update(['active'=>0]);
        return redirect('/slider');
    }

    public function edit($id)
    {   
        $data['slider'] = DB::table('sliders')
            ->where('id',$id)->first();
        return view('sliders.edit', $data);
    }
    
    public function update(Request $r)
    {
        if ($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/';
            $file->move($destinationPath, $file_name);
            $data = array(
                'name' => $r->name,
                'photo' => $file_name,
                'description' => $r->description,
                'order_number' => $r->order_number
            );
        } else {
            $data = array(
                'name' => $r->name,
                'description' => $r->description,
                'order_number' => $r->order_number
            );
        } 
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('sliders')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/slider/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/slider/edit/'.$r->id);
        }
    }
}

