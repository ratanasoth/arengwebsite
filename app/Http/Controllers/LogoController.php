<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class LogoController extends Controller
{
    // index
    public function index()
    {
        $data['logo'] = DB::table('logos')
            ->get();
        return view('logo.index', $data);
    }
    // load create form
    public function create()
    {
        return view('logo.create');
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
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('logos')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/logo');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/logo/create')->withInput();
        }
    }

    public function edit($id)
    {   
        $data['logo'] = DB::table('logos')
            ->where('id',$id)->first();
        return view('logo.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
        );
        if ($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/';
            $file->move($destinationPath, $file_name);
            $data = array(
                'photo' => $file_name,
            );
        } 
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('logos')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/logo/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/logo/edit/'.$r->id);
        }
    }
}

