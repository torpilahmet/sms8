<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function ViewStudentGroup()
    {
        $data['allData'] = StudentGroup::all();
        return view('admin.setup.student_group.view_class', $data);
    }

    public function AddStudentGroup()
    {
        return view('admin.setup.student_group.add_class');
    }

    public function StoreStudentGroup(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name  =$request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.groups.view')->with($notification);
    }

    public function EditStudentGroup($id)
    {
        $studentGroup = StudentGroup::findOrFail($id);

        return view('admin.setup.student_group.edit_class', compact('studentGroup'));
    }

    public function UpdateStudentGroup(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$request->id,
        ]);

        $data = StudentGroup::find($id);
        $data->name  = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.groups.edit', $data->id)->with($notification);
    }

    public function DestroyStudentGroup($id)
    {
        $StudentGroup = StudentGroup::findOrFail($id);

        $StudentGroup->delete();

        $notification = array(
            'message' => 'Student Group Removed Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.groups.view')->with($notification);
    }
}
