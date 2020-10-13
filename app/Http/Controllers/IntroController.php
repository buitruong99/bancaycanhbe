<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntroAddRequest;
use App\Intro;
use Illuminate\Http\Request;

class IntroController extends Controller
{

    private $intro;
    public function __construct(Intro $intro) {
        $this->intro=$intro;
    }
    public function index() {
        $intros = $this->intro->latest()->paginate(5);
        return view('admin.intro.index',compact('intros'));
    }
    public function create() {
        return view('admin.intro.add');
    }
    public function store(IntroAddRequest $request) {
        $this->intro->create([
            'contents' => $request->contents
        ]);
        return redirect()->route('intros.index');
    }
    public function edit($id) {
        $intro = $this->intro->find($id);
        return view('admin.intro.edit',compact('intro'));
    }
    public function update(Request $request,$id) {
        $this->intro->find($id)->update([
            'contents' => $request->contents
        ]);
        return redirect()->route('intros.index');
    }
    public function delete($id) {
        try {
            $this->intro->find($id)->delete();
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
