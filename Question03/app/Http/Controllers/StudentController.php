<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Validator;

class StudentController extends Controller
{
    public function index(){
        $student = Student::all();
        $data = [
            'status'=>200,
            'student'=>$student
        ];
        return response()->json($data,200);
    }
    public function upload(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name'=>'required',
            'email'=>'required|email'
        ]);
        if($validator->fails()){
            $data=[
                "status"=>422,
                "message"=>$validator->messages()
            ];
            return response()->json($data,422);
        }
        else{
            $student = new Student;

            $student->name=$request->name;
            $student->email=$request->email;
            $student->phone=$request->phone;
            $student->save();
            $data=[
                'status'=>200,
                'message'=>'Successfully upload.'
            ];
            return response()->json($data,200);
        }
    }
    public function edit(Request $request ,$id){
        $validator = Validator::make($request->all(),
        [
            'name'=>'required',
            'email'=>'required|email'
        ]);
        if($validator->fails()){
            $data=[
                'status'=>422,
                'message'=>$validator->messages()
            ];
            return response()->json($data,200);
        }
        else{
            $student = Student::find($id);

            $student->name=$request->name;
            $student->email=$request->email;
            $student->phone=$request->phone;
            $student->save();
            $data=[
                'status'=>200,
                'message'=>'Updated Successfully upload.'
            ];
            return response()->json($data,200);
        }
    }
    public function delete($id){
        $student = Student::find($id);
        $student->delete();
        $data=[
            'status'=>200,
            'message'=>'Deleted Successfully upload.'
        ];
        return response()->json($data,200);
    }
}
