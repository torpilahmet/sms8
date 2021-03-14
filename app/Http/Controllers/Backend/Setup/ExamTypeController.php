<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ViewExamType()
    {
        $data['allData'] = ExamType::all();
        return view('admin.setup.exam_type.view_class', $data);
    }

    public function AddExamType()
    {
        return view('admin.setup.exam_type.add_class');
    }

    public function StoreExamType(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);

        $data = new ExamType();
        $data->name  =$request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.exam.types.view')->with($notification);
    }

    public function EditExamType($id)
    {
        $examType = ExamType::findOrFail($id);

        return view('admin.setup.exam_type.edit_class', compact('examType'));
    }

    public function UpdateExamType(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name,'.$request->id,
        ]);

        $data = ExamType::find($id);
        $data->name  = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.exam.types.edit', $data->id)->with($notification);
    }

    public function DestroyExamType($id)
    {
        $examType = ExamType::findOrFail($id);

        $examType->delete();

        $notification = array(
            'message' => 'Exam Type Removed Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.exam.types.view')->with($notification);
    }
}
