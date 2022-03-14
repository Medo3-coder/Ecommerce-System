<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\helpers\uploadImg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'message' => 'Admin Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function adminProfilepassword()
    {
        return view('admin.admin_change_password');
    }

    public function adminUpdateChangePassword(Request $request)
    {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password'    => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {

            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();

            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            $notification = array(
                'message' => 'password not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
