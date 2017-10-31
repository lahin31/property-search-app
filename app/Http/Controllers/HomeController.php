<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\House;
use Image;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::all();
        return view('home', compact('houses'));
    }
    public function addHouse(Request $request) {
    	if($request->has('housename') && $request->has('address') && $request->has('price') && $request->has('for') && $request->has('description') && $request->has('bedrooms') && $request->has('bathrooms') && $request->has('area') && $request->hasFile('houseImage')) {
    		$house = new House;
            $house->user_id=Auth::user()->id;
    		$house->houseName=$request->housename;
    		$house->houseFor=$request->for;
    		$house->housePrice=$request->price;
    		$house->houseAddress=$request->address;
    		$house->houseDescription=$request->description;
    		$house->houseBedrooms=$request->bedrooms;
    		$house->houseBathrooms=$request->bathrooms;
    		$house->houseArea=$request->area;
            $houseImage=$request->file('houseImage');
            $filename=time().'.'.$houseImage->getClientOriginalExtension();
            Image::make($houseImage)->resize(300, 300)->save(public_path('/uploads/images/'.$filename));
            $house->houseImage=$filename;
    		$house->save();
    		$houses = House::all();
            Session::flash('message','Your house is added!');
        	return view('home', compact('houses'));
    	} else {
            $houses = House::all();
            Session::flash('message2','Please fill-up all form!');
            return view('home', compact('houses'));
        }
    }
    public function contact()
    {
        return view('contact');
    }
    public function postContact(Request $request) {
        $this->validate($request,[
                'email'=>'required|email',
                'subject'=>'min:4',
                'bmessage'=>'min:4',
            ]);

    	$data=[
    			'email'=>$request->email,
                'subject'=>$request->subject,
    			'bmessage'=>$request->message
    		];
    	Mail::send('emails.contact', $data, function ($text) use ($data)  {
    	   
    	    
    	    $text->from($data['email']);
            $text->subject($data['subject']);
            $text->to('hrent251@gmail.com');
    	   
    	});
        Session::flash('success','Your Email was sent successfully! ');
    	return redirect('/home');
    }
    public function getHouseDetails($id) {
    	$house = House::findOrFail($id);
    	return view('house-details', compact('house'));
    }
}
