<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class HotNewsController extends Controller
{
    // index
    public function index()
    {
        $data['hotnews'] = DB::table('hot_news')
            ->where('active',1)
            ->paginate(18);
        return view('hot_news.index', $data);
    }
    // load create form
    public function create()
    {
        return view('hot_news.create');
    }
    // save new social
    public function save(Request $r)
    {
    	$file_name = '';
        if($r->image) {
            $file = $r->file('image');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/';
            $file->move($destinationPath, $file_name);
        }
        $data = array(
            'short_description' => $r->short_description,
            'date' => $r->date,
            'photo' => $file_name,
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('hot_news')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/hotnews/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/hotnews/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('hot_news')->where('id', $id)->update(['active'=>0]);
        return redirect('/hotnews');
    }

    public function edit($id)
    {   
        $data['hotnews'] = DB::table('hot_news')
            ->where('id',$id)->first();
        return view('hot_news.edit', $data);
    }
    
    public function update(Request $r)
    {
        if ($r->image) {
            $file = $r->file('image');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/';
            $file->move($destinationPath, $file_name);
            $data = array(
	            'photo' => $file_name
            );
        } 
        $data = array(
            'short_description' => $r->short_description,
            'date' => $r->date
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('hot_news')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/hotnews/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/hotnews/edit/'.$r->id);
        }
    }
}
