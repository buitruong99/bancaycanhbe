<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Components\Recusive;


class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category=$category;
    }


    public function create(){

        $htmlOption = $this->getCategory($parentId ='');
        return view('admin.category.add',compact('htmlOption'));

    }


     public function index(){
        $data = Category::paginate(5);
       return view('admin.category.index',[
           'data' => $data,
       ]);
    }

    public function store(Request $request){
        $this->category->create ([
            'name'=> $request->name,
            'parent_id'=> $request->parent_id,
            'slug'=>Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive( $data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;

    }

    public function edit ($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit',compact('category','htmlOption'));

    }
    public function update($id,Request $request){
        $this->category->find($id)->update([
            'name'=> $request->name,
            'parent_id'=> $request->parent_id,
            'slug'=>Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');

    }

        public function delete($id){
       Category::find($id)->delete();
       return redirect()->route('categories.index');

    }

    public function getsearch(Request $request){
        $products = Product::Where('name','like','%'.$request->key.'%')
            ->orWhere('price',$request->key)
            ->get();
        return view('admin.search',compact('products'));
    }

}

