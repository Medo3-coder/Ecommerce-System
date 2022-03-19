<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function userLogout()
    {
         Auth::logout();
         return redirect()->route('login');
    }


    public function userProfile()
    {
         $id = Auth::user()->id;
         $user = User::find($id);
         return view('frontend.profile.user_profile' , compact('user'));
    }

    public function userProfileStore(Request $request)
    {


        $Data = User::find(Auth::user()->id);
        $Data->name = $request->name;
        $Data->email = $request->email;
        $Data->phone = $request->phone;



        if ($request->file('profile_photo_path')) {
            $image = $request->file('profile_photo_path');
            $destinationPath  = public_path('upload/user_images/');
            //to replace new Image  of old image
            $repalceOldImg =  unlink($destinationPath . $Data->profile_photo_path);
            $imageName = date('YmdHi') . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            // $imagePath = $destinationPath . $imageName;
            $Data['profile_photo_path'] = $imageName;
        }
        $Data->save();



        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('User_dashboard')->with($notification);
    }
}
