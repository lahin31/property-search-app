<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image; 
use App\User;
use App\House;
use Session;

class ProfileController extends Controller
{
    public function getProfile()
    {
        return view('profile', array('user' => Auth::user()));
    }
    public function yourContents($id)
    {
        $houses=User::find($id)->houses;
        return view('your-contents', compact('houses'));
    }
    public function editProfile(Request $request) 
    {
        $user = Auth::user();
        if($request->has('name')) {
        $user -> name = $request->name;
        }
        if($request->has('email')) {
            $user -> email = $request->email;
        }
        if($request->hasFile('profile_pic')) {
            $userProfilePic = $request->file('profile_pic');
            $filename = time().'.'.$userProfilePic->getClientOriginalExtension();
            Image::make($userProfilePic)->resize(300, 300)->save(public_path('/uploads/avatars/'.$filename));
            $user -> userProPic = $filename;
        }
        if($request->has('address')) {
            $user -> address = $request->address;
        }
        if($request->has('password')) {
            $user -> password = $request->password;
        }
        if($request->has('phone')) {
            $user -> phone = $request->phone;
        }
        $user->save();
        return view('profile', array(
            'user' => Auth::user()
        ));
    }
    public function destroy($user_id, $id) 
    {
        $houses = House::find($id);
        $houses->delete();
        // redirect
        Session::flash('delete-message', 'Successfully deleted the category!');
        $houses=User::find($user_id)->houses;
        return view('your-contents', compact('houses'));
    }
    public function editYourContent($id) 
    {
        $house = House::find($id);
        return view('edit-your-house', compact('house'));
    }
    public function updateYourContent(Request $request, $id) 
    {
        if($request->has('housename') && $request->has('address') && $request->has('price')  && $request->has('bedrooms') && $request->has('bathrooms') && $request->has('area')) {
        $house = House::find($id);
        $house->houseName=$request->housename;
        $house->houseFor=$request->for;
        $house->housePrice=$request->price;
        $house->houseAddress=$request->address;
        $house->houseDescription=$request->description;
        $house->houseBedrooms=$request->bedrooms;
        $house->houseBathrooms=$request->bathrooms;
        $house->houseArea=$request->area;
        if($request->hasFile('houseImage')) {
            $houseImage=$request->file('houseImage');
            $filename=time().'.'.$houseImage->getClientOriginalExtension();
            Image::make($houseImage)->resize(300, 300)->save(public_path('/uploads/images/'.$filename));
            $house->houseImage=$filename;
        }
        $house->save();
        Session::flash('success-update', 'Successfully updated your houese!');
        return redirect('/home');
    }
    }
}

