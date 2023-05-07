<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function viewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function viewDesignationAdd()
    {
        return view('backend.setup.designation.add_designation');
    }

    public function viewDesignationStore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:designations,name'
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    public function viewDesignationEdit($id)
    {
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('editData'));
    }

    public function viewDesignationUpdate(Request $request, $id)
    {
        $data = Designation::find($id);

        $request->validate([
            'name' => 'required|unique:designations,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designations Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    public function viewDesignationDelete($id)
    {
        $Designation = Designation::find($id);
        $Designation->delete();
        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
