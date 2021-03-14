<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount()
    {
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('admin.setup.fee_amount.view_class', $data);
    }

    public function AddFeeAmount()
    {
        $data['feeCategories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('admin.setup.fee_amount.add_class', $data);
    }

    public function StoreFeeAmount(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass !=null){
            for ($i=0 ; $i < $countClass; $i++){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->student_class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }

        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.fee.amounts.view')->with($notification);
    }

    public function EditFeeAmount($id)
    {
        $data['id'] = $id;
        $data['feeCategories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        $data['editData'] = FeeCategoryAmount::where('fee_category_id',$id)->orderBy('student_class_id', 'ASC')->get();
//return $data;
        return view('admin.setup.fee_amount.edit_class', $data);
    }

    public function UpdateFeeAmount(Request $request, $id)
    {
//        return $request;

        if ($request->class_id == null){
            $notification = array(
                'message' => 'Sorry..! You do\'nt select any class item',
                'alert-type' => 'error',
            );
            return redirect()->route('admin.fee.amounts.edit', $id)->with($notification);
        } else {
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $id)->delete();
            if ($countClass !=null){
                for ($i=0 ; $i < $countClass; $i++){
                    $fee_amount = new FeeCategoryAmount();
                    $fee_amount->fee_category_id = $request->fee_category_id;
                    $fee_amount->student_class_id = $request->class_id[$i];
                    $fee_amount->amount = $request->amount[$i];
                    $fee_amount->save();
                }
            }
        }

        $notification = array(
            'message' => 'Fee Amount Edited Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.fee.amounts.edit', $id)->with($notification);
    }

    public function DetailsFeeAmount($id)
    {
        $data['feeAmount'] = FeeCategoryAmount::where('fee_category_id', $id)->get();
        $data['category'] = FeeCategory::select('id', 'name')->firstWhere('id', $id);

//        return $feeAmount;

        return view('admin.setup.fee_amount.details_class', $data);
    }
}
