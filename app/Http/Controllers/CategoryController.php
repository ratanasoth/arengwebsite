<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class CategoryController extends Controller
{
    // index
    public function index()
    {
        $data['categories'] = DB::table('categories')
            ->where('active',1)
            ->paginate(18);
        return view('categories.index', $data);
    }
    // load create form
    public function create()
    {
        return view('categories.create');
    }
    // save new category
    public function save(Request $r)
    {
        $data = array(
            'name' => $r->name
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('categories')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/category/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/category/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('categories')->where('id', $id)->update(['active'=>0]);
        return redirect('/category');
    }

    public function edit($id)
    {   
        $data['categories'] = DB::table('categories')
            ->where('id',$id)->first();
        return view('categories.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('categories')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/category/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/category/edit/'.$r->id);
        }
    }
}
