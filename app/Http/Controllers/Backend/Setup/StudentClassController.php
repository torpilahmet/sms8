<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function ViewStudentClass()
    {
        $data['allData'] = StudentClass::all();
        return view('admin.setup.student_class.view_class', $data);
    }

    public function AddStudentClass()
    {
        return view('admin.setup.student_class.add_class');
    }

    public function StoreStudentClass(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();
        $data->name  =$request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.class.view')->with($notification);
    }

    public function EditStudentClass($id)
    {
        $studentClass = StudentClass::findOrFail($id);

        return view('admin.setup.student_class.edit_class', compact('studentClass'));
    }

    public function UpdateStudentClass(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$request->id,
        ]);

        $data = StudentClass::find($id);
        $data->name  = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.class.edit', $data->id)->with($notification);
    }

    public function DestroyStudentClass($id)
    {
        $studentClass = StudentClass::findOrFail($id);

        $studentClass->delete();

        $notification = array(
            'message' => 'Student Class Removed Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.class.view')->with($notification);
    }
}
