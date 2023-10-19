<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function add_doctor_view(){
        return view('admin.add_doctor_view');
    }
    function upload_doctor(Request $req){
        $data=new Doctor();
        $data->name=$req->name;
        $data->phone=$req->phone;
        $data->speciality=$req->speciality;
        $data->room=$req->room;
        $image=$req->image;
         $imageName=time().'.'.$image->getClientOriginalExtension();//to get the image unige name when we store it
         $req->image->move('DoctorImage',$imageName);//to store it with his unique name and product is folder that store image
         $data->image=$imageName;//to store in product object
         $data->save();
         return redirect()->back()->with('message', 'Doctor Added Successfully');
    }
    function show_appointments(){
        $data=appointment::all();
        return view('admin.showappointment',compact('data'));
    }
    function canel_appointment($id){
        $data=appointment::find($id);
        $data->status="canceld";
        $data->save();
        return redirect()->back();
    }
    function approve_appointment($id){
        $data=appointment::find($id);
        $data->status="approved";
        $data->save();
        return redirect()->back();
    }
    function show_doctor(){
        $data=Doctor::all();
        return view('admin.show_doctor',compact('data'));
    }
    function DeleteDoctor($id){
        $data=Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    function UpdateDoctor($id){
        $data=Doctor::find($id);
        return view('admin.updateDoctor',compact('data'));
    }
    function updated_doctor(Request $req,$id){
        $data=Doctor::find($id);
        $data->name=$req->name;
        $data->phone=$req->phone;
        $data->speciality=$req->speciality;
        $data->room=$req->room;
        $image=$req->image;
         $imageName=time().'.'.$image->getClientOriginalExtension();//to get the image unige name when we store it
         $req->image->move('DoctorImage',$imageName);//to store it with his unique name and product is folder that store image
         $data->image=$imageName;//to store in product object
         $data->save();
         return redirect()->back()->with('message', 'Doctor Updated Successfully');
    }
}
