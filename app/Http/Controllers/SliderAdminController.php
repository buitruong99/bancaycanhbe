<?php

namespace App\Http\Controllers;
use App\Http\Requests\SliderAddRequest;
use App\Slider;
use App\Traits\StoragelmageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderAdminController extends Controller
{
    use StoragelmageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index(){
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }
    public function create(){
        return view('admin.slider.add');
    }

    public  function store(SliderAddRequest $request){
        try {
            $dataInsert= [
                'name'=> $request->name,
                'description' => $request->description,
            ];
            $dataInsertSlider = $this->storagelTraitUploat($request,'image_path','slider_back');
            if (!empty($dataInsertSlider)){
                $dataInsert['image_name']= $dataInsertSlider['file_name'];
                $dataInsert['image_path']= $dataInsertSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            log::error('lỗi' . $exception->getMessage() . '----Line:' . $exception->getLine());
        }

    }
    public function edit($id){
        $slider = $this->slider->find($id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(Request $request,$id){
        try {
            $dataUpdate= [
                'name'=> $request->name,
                'description' => $request->description,
            ];
            $dataInsertSlider = $this->storagelTraitUploat($request,'image_path','slider_back');
            if (!empty($dataInsertSlider)){
                $dataUpdate['image_name']= $dataInsertSlider['file_name'];
                $dataUpdate['image_path']= $dataInsertSlider['file_path'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider_back.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            log::error('lỗi' . $exception->getMessage() . '----Line:' . $exception->getLine());
        }
    }

    public function delete($id){
        try {
            $this->slider->find($id)->delete();
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
