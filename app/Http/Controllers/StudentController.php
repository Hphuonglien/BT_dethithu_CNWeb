<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function get_all_student(){
        $data=DB::table('students')->get();
        return view('student_manage',compact('data'));

    }


    public function get_student_by_id($id)
    {
        $data=DB::table('students')->where('id',$id)->get();
        return view('student_edit', compact('data'));
    }
    public function edit(Request $request, $id)
    {
        $input=$request->all();
        $name=$input['tbxname'];
        $birthday=$input['tbxbirthday'];
        $address=$input['tbxaddress'];
        DB::table('students')->where('id',$id)->update([
            'fullname'=>$name,
            'birthday'=>$birthday,
            'address'=>$address,
        ]);
        return redirect()->route('student');




    }
}
