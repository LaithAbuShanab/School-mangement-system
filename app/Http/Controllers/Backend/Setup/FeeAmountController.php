<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function viewFeeAmount()
    {
        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    public function viewFeeAmountAdd()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    public function viewFeeAmountStore(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
            $notification = array(
                'message' => 'Data Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('fee.amount.view')->with($notification);
        }
    }

    public function viewFeeAmountEdit($fee_category_id)
    {
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount', $data);
    }

    public function viewFeeAmountUpdate(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'Sorry You Do Not Select Any Class Amount',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
            $notification = array(
                'message' => 'Data Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('fee.amount.view')->with($notification);
        }
    }

    public function viewFeeAmountDetails($fee_category_id)
    {
        $data['detailData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fee_amount.detail_fee_amount', $data);
    }

    public function viewFeeAmountDelete($fee_category_id)
    {
        FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
        $notification = array(
            'message' => 'Fee Category Amount Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
