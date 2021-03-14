<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject()
    {
//        $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('admin.setup.assign_subject.view_class', $data);
    }

    public function AddAssignSubject()
    {
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('admin.setup.assign_subject.add_class', $data);
    }

    public function StoreAssignSubject(Request $request)
    {
        $countClass = count($request->subject_id);
        if ($countClass !=null){
            for ($i=0 ; $i < $countClass; $i++){
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }
        }

        $notification = array(
            'message' => 'Assign Subject Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.assign.subjects.view')->with($notification);
    }

    public function EditAssignSubject($id)
    {
        $data['id'] = $id;
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        $data['editData'] = AssignSubject::where('class_id',$id)->orderBy('class_id', 'ASC')->get();
//return $data;
        return view('admin.setup.assign_subject.edit_class', $data);
    }

    public function UpdateAssignSubject(Request $request, $id)
    {
//        return $request;

        if ($request->subject_id == null){
            $notification = array(
                'message' => 'Sorry..! You do\'nt select any subject item',
                'alert-type' => 'error',
            );
            return redirect()->route('admin.assign.subjects.edit', $id)->with($notification);
        } else {
            $countClass = count($request->subject_id);
            AssignSubject::where('class_id', $id)->delete();
            if ($countClass !=null){
                for ($i=0 ; $i < $countClass; $i++){
                    $assign_subject = new AssignSubject();
                    $assign_subject->class_id = $request->class_id;
                    $assign_subject->subject_id = $request->subject_id[$i];
                    $assign_subject->full_mark = $request->full_mark[$i];
                    $assign_subject->pass_mark = $request->pass_mark[$i];
                    $assign_subject->subjective_mark = $request->subjective_mark[$i];
                    $assign_subject->save();
                }
            }
        }

        $notification = array(
            'message' => 'Fee Amount Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.assign.subjects.edit', $id)->with($notification);
    }

    public function DetailsAssignSubject($id)
    {
        $data['subjects'] = AssignSubject::where('class_id', $id)->get();
        $data['class'] = AssignSubject::select('class_id')->firstWhere('class_id', $id);

//        return  $data['subjects'];

        return view('admin.setup.assign_subject.details_class', $data);
    }
}
