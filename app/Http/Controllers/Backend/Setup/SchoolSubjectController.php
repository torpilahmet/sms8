<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function ViewSchoolSubject()
    {
        $data['allData'] = SchoolSubject::all();
        return view('admin.setup.school_subject.view_class', $data);
    }

    public function AddSchoolSubject()
    {
        return view('admin.setup.school_subject.add_class');
    }

    public function StoreSchoolSubject(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);

        $data = new SchoolSubject();
        $data->name  =$request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.school.subjects.view')->with($notification);
    }

    public function EditSchoolSubject($id)
    {
        $schoolSubject = SchoolSubject::findOrFail($id);

        return view('admin.setup.school_subject.edit_class', compact('schoolSubject'));
    }

    public function UpdateSchoolSubject(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$request->id,
        ]);

        $data = SchoolSubject::find($id);
        $data->name  = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.school.subjects.edit', $data->id)->with($notification);
    }

    public function DestroySchoolSubject($id)
    {
        $schoolSubject = SchoolSubject::findOrFail($id);

        $schoolSubject->delete();

        $notification = array(
            'message' => 'School Subject Removed Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.school.subjects.view')->with($notification);
    }
}
