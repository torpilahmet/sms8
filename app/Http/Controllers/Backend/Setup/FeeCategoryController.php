<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function ViewFeeCategory()
    {
        $data['allData'] = FeeCategory::all();
        return view('admin.setup.fee_category.view_class', $data);
    }

    public function AddFeeCategory()
    {
        return view('admin.setup.fee_category.add_class');
    }

    public function StoreFeeCategory(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = new FeeCategory();
        $data->name  =$request->name;
        $data->save();

        $notification = array(
            'message' => 'FeeCategory Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.fee.categories.view')->with($notification);
    }

    public function EditFeeCategory($id)
    {
        $feeCategory = FeeCategory::findOrFail($id);

        return view('admin.setup.fee_category.edit_class', compact('feeCategory'));
    }

    public function UpdateFeeCategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$request->id,
        ]);

        $data = FeeCategory::find($id);
        $data->name  = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Fee Category Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.fee.categories.edit', $data->id)->with($notification);
    }

    public function DestroyFeeCategory($id)
    {
        $feeCategory = FeeCategory::findOrFail($id);

        $feeCategory->delete();

        $notification = array(
            'message' => 'Fee Category Removed Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.fee.categories.view')->with($notification);
    }
}
