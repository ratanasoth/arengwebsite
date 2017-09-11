<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class PageController extends Controller
{
    // index
    public function index()
    {
        $data['pages'] = DB::table('pages')
            ->where('active', 1)
            ->paginate(18);
        return view('pages.index', $data);
    }
    // load create form
    public function create()
    {
        return view('pages.create');
    }
    // save new page
    public function save(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'description' => $r->description
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('pages')->insertGetId($data);

        if($i > 0) {
            $url = 'page/view/'.$i;
            $data = array(
                'url' => $url
            );
            $i = DB::table('pages')->where('id', $i)->update($data);
        }

        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/page/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/page/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('pages')->where('id', $id)->update(['active'=>0]);
        return redirect('/page');
    }

    public function edit($id)
    {   
        $data['page'] = DB::table('pages')
            ->where('id',$id)->first();
        return view('pages.edit', $data);
    }

    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'short_description' => $r->short_description,
            'description' => $r->description
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('pages')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/page/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/page/edit/'.$r->id);
        }
    }
    // view detail
    public function view($id) 
    {
        $data['page'] = DB::table('pages')
            ->where('id',$id)->first();
        return view('pages.view', $data);
    }
}

