<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactUs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ContactUsController extends Controller
{
    public function index(){
       $contact=ContactUs::get();
        //return $contact;
        return view('contact.index',[
          'contacts'=>$contact,  //DBالمفتاح هوا اسم المتغير في ملف الفيو والقيمه هي القيمه الحقيقيه في 
           'title'=>'contact Us'
        ]);
    }
   
    public function store (Request $request){
        $rules = [
            'name'=>['Unique:contact_us,name','Required','String','Min:3'],
            'email'=>['Unique:contact_us,email','Required','Email','String'],
            'subject'=>['Nullable','String'],
            'message'=>['Nullable','String'],
        ];
        //$clean=$request->validate($rules);
        // $clean=$this->validate($request, $rules );
        $validator=Validator::make($request->all(),$rules);
        $clean=$validator->validate();
        
        //return $request->all();
        // $request->('name');
        // $request->input('name');
        // $request->post('name');
        // $request->get('name');
        // $request->query('name');
    
        $contacts= new ContactUs();
        $contacts->name=$request->input('name');
        $contacts->email=$request->input('email');
        $contacts->subject=$request->input('subject');
        $contacts->message=$request->input('message');
        $contacts->save();
        return response()->json([
            'name'=>$contacts->name,
            'email'=>$contacts->email,
            'subject'=>$contacts->subject,
            'message'=>$contacts->message,
        ],200) ;}
        
}
