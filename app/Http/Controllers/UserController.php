<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user) {
        $this->user=$user;
    }
    public function index(){
       $users =$this->user->latest()->paginate(5);
    return view('admin.user.index',compact('users'));
    }

public function create() {
    return view('admin.user.add');
}

    public function store(Request $request) {
        $this->user->create([
            'name' => $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.index');
    }
    public function edit($id) {
        $user = $this->user->find($id);
        return view('admin.user.edit',compact('user'));
    }
    public function update(Request $request,$id)
    {
        $this->user->find($id)->update([
            'name' => $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
        ]);
    }
    public function delete($id) {
        try {
            $this->user->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message'=>'success'
            ], 200);
        } catch (\Exception $exception) {
            log::error('message' . $exception->getMessage() . 'Line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message'=>'fail'
            ], 500);
        }
    }
}
