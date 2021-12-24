<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Designations;
use Illuminate\Support\Str;
use File;
use Mail;
class EmpolyeeController extends Controller
{
    protected $primaryKey = 'id';
    public function index()
    {
        $data=Employees::latest()->get();
        return view('employees-list',compact('data'));
    }
    public function create()
    {
        $data=Designations::orderBy('designation', 'ASC')->get();
        return view('create',compact('data'));
    }
    public function save(Request $req)
    {
        $validatedData  = $req->validate([
        'name' => 'required|max:255',
        'email' => ['required','unique:employees,email'],
        'photo'=>'max:5120',
        'designation'=>'required',

        ]);
        $password = Str::random(10);
        $user=new Employees;
        $user->name= $req->name;
        $user->email= $req->email;
        $user->password= $password;
        if($req->hasfile('photo'))
        {
            $file=$req->photo;
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads',$filename);
            $user->photo=$filename;
        }
        else
        {
            $user->photo='no_image.jpg';
        }
        $user->designation= $req->designation;
        if($user->save())
        {
            $datas=['name'=>$req->name];
            $users['to']=$req->email;
            Mail::send('mailview',$datas,function($messages) use ($users){
                $messages->to($users['to']);
                $messages->subject('Account created successfully');
            });
        }
        return redirect('');
    }
    public function edit(\App\Models\Employees $id)
    {
        $data=Employees::find($id);
        $designation=Designations::orderBy('designation', 'ASC')->get();
        return view('edit',compact('data','designation'));
    }
    public function update(Request $req)
    {
        $validatedData  = $req->validate([
        'name' => 'required|max:255',
        'email' => ['required'],
        'photo'=>'max:5120',
        'designation'=>'required',

        ]);
        
        $user=Employees::find($req->uid);
        $user->name= $req->name;
        $user->email= $req->email;
        if($req->hasfile('photo'))
        {
            $file=$req->photo;
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads',$filename);
            $user->photo=$filename;
        }
        else
        {
            $user->photo=$req->imgname;
        }
        $user->designation= $req->designation;
        $user->save();
        return redirect('');
    }
    public function delete($id)
    {
        $data=Employees::find($id);
        if($data->photo!="no_image.jpg")
        {
            $filename='uploads/'.$data->photo;
            $files=File::delete($filename);
        }
        $data->delete();
        return redirect('');
    }

}
