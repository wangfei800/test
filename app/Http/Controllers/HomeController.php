<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Hash;
use App\User;
use Illuminate\Support\Facades\Validator;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->orderBy('id')->get();

        return view('home')->with('users' , $users);

    }

    public function view($userId)
    {
        $user = User::where('id', $userId)->get()->first();

        return view('view')->with('user' , $user);

    }

    // This will show the add form
    public function add(Request $request)
    {
        $user = $request->old();

        return view('add')->with('user' , $user)->with('action', 'store');

    }

    // This will show the edit form
    public function edit(Request $request, $id)
    {
        if (!empty($id)) {
            $user = User::where('id', $id)->get()->first();
        }

        return view('add')->with('user', $user)->with('action', 'update');

    }

    // Save user
    public function update(Request $request)
    {
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
        ]);


        if ($validator->fails()) {
            return redirect('edit')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('id', $request->id)->get()->first();

        $requestData = $request->all();

        if (!empty($requestData['password'])) {
            $requestData['password'] = Hash::make($request->password);
        } else {
            unset($requestData['password']);
        }

        if (!isset($requestData['active'])) {
            $requestData['active'] = false;
        }
        $user->update($requestData);

        return redirect('/home');

    }

    // Save user
    public function store(Request $request)
    {
        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'password'   => 'required|min:5',
        ]);


        if ($validator->fails()) {
            return redirect('add')
                ->withErrors($validator)
                ->withInput();
        }

        $requestData = $request->all();
        $requestData['password'] = Hash::make($request->password);

        $user = User::create($requestData);

        return redirect('/home');

    }
}
