<?php

namespace App\Http\Controllers;

use App\Traits\StoragelmageTrait;
use DB;
use App\Info;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class InfoController extends Controller
{
    use StoragelmageTrait;
    private $info;
    public function __construct(Info $info)
    {
        $this->info = $info;
    }

    public function index() {
        $infos = $this->info->latest()->paginate(5);
        return view('admin.info.index',compact('infos'));
    }
    public function create() {
        return view('admin.info.add');
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $dataUploadFeatureImage = $this->storagelTraitUploat($request,'images','product');
            if (!empty($dataUploadFeatureImage)) {
                $this->info->create([
                    'titles' => $request->titles,
                    'brief' => $request->brief,
                    'contents' => $request->contents,
                    'images'=>$dataUploadFeatureImage['file_path']
                ]);
            }
            DB::commit();
            return redirect() -> route('infos.index');
        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage(). 'Line: '. $exception->getLine());
        }
    }
    public function edit($id) {
        $info = $this->info->find($id);
        return view('admin.info.edit',compact('info'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataInfoUpdate = [
                'titles' => $request->titles,
                'brief' => $request->brief,
                'contents' => $request->contents,
            ];
            $dataUploadFeatureImage = $this->storagelTraitUploat($request,'images','product');
            if (!empty($dataUploadFeatureImage)) {
                $dataInfoUpdate['images'] = $dataUploadFeatureImage['file_path'];
            }
            $info = $this->info->find($id)->update($dataInfoUpdate);
            $info = $this->info->find($id);

            DB::commit();
            return redirect() -> route('infos.index');
        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage(). 'Line: '. $exception->getLine());
        }
    }
    public function delete($id) {
        try {
            $this->info->find($id)->delete();
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
