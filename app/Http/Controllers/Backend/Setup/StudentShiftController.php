<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function ViewStudentShift()
    {
        $data['allData'] = StudentShift::all();
        return view('admin.setup.student_shift.view_class', $data);
    }

    public function AddStudentShift()
    {
        return view('admin.setup.student_shift.add_class');
    }

    public function StoreStudentShift(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name  =$request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.shifts.view')->with($notification);
    }

    public function EditStudentShift($id)
    {
        $studentShift = StudentShift::findOrFail($id);

        return view('admin.setup.student_shift.edit_class', compact('studentShift'));
    }

    public function UpdateStudentShift(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$request->id,
        ]);

        $data = StudentShift::find($id);
        $data->name  = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.shifts.edit', $data->id)->with($notification);
    }

    public function DestroyStudentShift($id)
    {
        $studentShift = StudentShift::findOrFail($id);

        $studentShift->delete();

        $notification = array(
            'message' => 'Student Year Removed Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.shifts.view')->with($notification);
    }
}
