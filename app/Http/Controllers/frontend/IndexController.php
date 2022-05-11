<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->limit(8)->get();
        $sliders =  Slider::where('status' , 1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status' , 1)->orderBy('id', 'DESC')->limit(6)->get();

        return view('frontend.index' , compact('categories' , 'sliders' , 'products'));
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
            if(!empty($Data->profile_photo_path))
            {
                $repalceOldImg =  unlink($destinationPath . $Data->profile_photo_path);
            }

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

    public function userChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password' , compact('user'));
    }


    public function userPasswordUpdate(Request $request)
    {

        $validate = $request->validate([
            'oldpassword' => 'required',
            'password'    => 'required|confirmed|min:4|max:20',
            'password_confirmation' => 'required| min:4|max:20'
        ]);

           // if($validator->fails()) {
                    //     return response()->json(['error'=>$validator->errors()->all()]);
                    // }

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword , $hashedPassword))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('user.logout');
        }
        else
        {
            $notification = array(
                'message' => 'password is not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }
}
