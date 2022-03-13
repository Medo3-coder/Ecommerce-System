<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\helpers\uploadImg;

class AdminProfileController extends Controller
{

    public function adminProfile()
    {
        $adminData = Admin::find(1);

        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function adminProfileEdit()
    {
        $editData = Admin::find(1);

        return view('admin.admin_profile_edit', compact('editData'));
    }


    public function adminProfileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:25',
            'email' => 'required|email',
            // 'password'=>'required|password',

        ]);

        $adminData = Admin::find(1);
        $adminData->name = $request->name;
        $adminData->email = $request->email;
        //$adminData->password = $request->password;



        if ($request->file('profile_photo_path')) {
            $image = $request->file('profile_photo_path');
            $destinationPath  = public_path('upload/admin_images/');
            //to replace new Image  of old image
            $rmfOldImg =  unlink($destinationPath . $adminData->profile_photo_path);
            $imageName = date('YmdHi') . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            // $imagePath = $destinationPath . $imageName;
            $adminData['profile_photo_path'] = $imageName;
        }
        $adminData->save();

        $notification = array(
             'message' =>'Admin Updated Successfully',
             'alert-type' =>'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
}
