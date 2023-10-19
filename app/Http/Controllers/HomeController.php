<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){ 
        if(Auth::id()){
         return redirect('home');
        }
      else{
        $doctor=Doctor::all();
        return view('user.home',compact('doctor'));
        }
    }
    function redirect(){
        if(Auth::id())
        { 
            if(Auth::user()->user_type=='0'){
                $doctor=Doctor::all();
                return view('user.home',compact('doctor'));
            }
            else{
                return view('admin.home');
            }
        }
    }
    function appointment(Request $req){
        $data=new appointment();
        $data->name=$req->name;
        $data->email=$req->email;
        $data->date=$req->date;
        $data->phone=$req->number;   
        $data->message=$req->message;
        $data->doctor=$req->doctor;
        $data->status="In Progress";
        if(Auth::id()){
        $data->user_id=Auth::user()->id;
         }
         $data->save();
         return redirect()->back()->with('message','Appoientment Key Done successfully');
    }
    function myappointment(){
        if(Auth::id()){
        $user_id=Auth::user()->id;
        $data=appointment::where('user_id',$user_id)->get();
        return view('user.showappointment',compact('data'));
        }
        else{
            return redirect()->back();
        }
    }
    function delete_appointment($id){
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
