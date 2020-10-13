<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    private $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index() {
        $contacts = $this->contact->latest()->paginate(5);
        return view('admin.contact.index',compact('contacts'));
    }
    public function create() {
        return view('admin.contact.add');
    }
    public function store(Request $request) {
        $this->contact->create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'contents' => $request->contents,
        ]);
        return redirect() -> route('contacts.index');
    }
    public function edit($id) {
        $contact = $this->contact->find($id);
        return view('admin.contact.edit', compact('contact'));
    }
    public function update(Request $request, $id) {
        $this->contact->find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'contents' => $request->contents,
        ]);
        return redirect() -> route('contacts.index');
    }
    public function delete($id) {
        try {
            $this->contact->find($id)->delete();
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
