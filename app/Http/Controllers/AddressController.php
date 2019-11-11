<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Hash;
use App\User,  App\Address;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
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

    public function view($userId)
    {
        $user = User::where('id', $userId)->get()->first();

        return view('view')->with('user' , $user);

    }

    // This will show the add form
    public function add(Request $request, $userId)
    {
        $address = $request->old();

        $actionUrl = 'storeAddress/'. $userId;

        return view('editAddress')->with('address' , $address)
            ->with('userId', $userId)
            ->with('action', $actionUrl);

    }

    // This will show the edit form
    public function edit(Request $request, $userId, $addressId)
    {
        $address = Address::where('id', $addressId)->get()->first();

        return view('editAddress')->with('address', $address)
            ->with('userId', $userId)
            ->with('action', 'updateAddress/'.$userId.'/'. $addressId);

    }

    // Save user
    public function update(Request $request, $userId, $addressId)
    {

        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'city'  => 'required',
            'province'      => 'required',
            'street_address'      => 'required',
        ]);


        if ($validator->fails()) {
            return redirect('edit')
                ->withErrors($validator)
                ->withInput();
        }

        $address = Address::where('id', $addressId)->get()->first();

        $requestData = $request->all();

        $address->update($requestData);

        return redirect('/view/' . $userId);

    }

    // Save user
    public function store(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'province' => 'required',
            'city'  => 'required',
            'country'      => 'required',
        ]);


        if ($validator->fails()) {
            return redirect('addAddress/'.$userId)
                ->withErrors($validator)
                ->withInput();
        }

        $requestData = $request->all();
        $requestData['user_id'] = $userId;

        $address = Address::create($requestData);

        return redirect('/view/' . $userId);

    }
}
