<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(): View
    {
        return view('image');
    }

    public function store(Request $request)
    {
        
        $employee = new Employee();
        $employee->name = $request->input('name');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/employees/', $filename);
            $employee->image = $filename;
        }

        $employee->save();
        return redirect(route('imageshow'));
    }


    public function display(){
          $employee = Employee::all();
          return view('imageView', ['employees' => $employee]);
    }

    public function edit($request){
       $employee = Employee::find($request);
       // dd($employee->image);
        return view('imageupdate',['employee'=>$employee]);
    }

    public function update(Employee $employee, Request $request){
        
         
       
        $employee->name = $request->input('name');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/employees/', $filename);
            $employee->image = $filename;
        }
       
        

      //  dd($employee->image);
      
        $employee->save();
        return redirect(route('imageshow'));
    }

    public function delete(Employee $employee){
       // dd($employee->id);
        $employee->delete();
        return redirect(route('imageshow'))->with('success', 'Product Deleted Succesffully');

   }

    
}
