<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function ViewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('admin.setup.designation.view_class', $data);
    }

    public function AddDesignation()
    {
        return view('admin.setup.designation.add_class');
    }

    public function StoreDesignation(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new Designation();
        $data->name  =$request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.designations.view')->with($notification);
    }

    public function EditDesignation($id)
    {
        $designation = Designation::findOrFail($id);

        return view('admin.setup.designation.edit_class', compact('designation'));
    }

    public function UpdateDesignation(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name,'.$request->id,
        ]);

        $data = Designation::find($id);
        $data->name  = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.designations.edit', $data->id)->with($notification);
    }

    public function DestroyDesignation($id)
    {
        $designation = Designation::findOrFail($id);

        $designation->delete();

        $notification = array(
            'message' => 'Designation Removed Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.designations.view')->with($notification);
    }
}
