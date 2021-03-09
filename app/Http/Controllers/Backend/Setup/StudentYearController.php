<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function ViewStudentYear()
    {
        $data['allData'] = StudentYear::all();
        return view('admin.setup.student_year.view_class', $data);
    }

    public function AddStudentYear()
    {
        return view('admin.setup.student_year.add_class');
    }

    public function StoreStudentYear(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name  =$request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.years.view')->with($notification);
    }

    public function EditStudentYear($id)
    {
        $studentYear = StudentYear::findOrFail($id);

        return view('admin.setup.student_year.edit_class', compact('studentYear'));
    }

    public function UpdateStudentYear(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$request->id,
        ]);

        $data = StudentYear::find($id);
        $data->name  = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.years.edit', $data->id)->with($notification);
    }

    public function DestroyStudentYear($id)
    {
        $StudentYear = StudentYear::findOrFail($id);

        $StudentYear->delete();

        $notification = array(
            'message' => 'Student Year Removed Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.years.view')->with($notification);
    }
}
