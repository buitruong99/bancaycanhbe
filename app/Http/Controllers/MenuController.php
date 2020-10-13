<?php

namespace App\Http\Controllers;
use App\Components\MenuRecusive;
use App\Components\Recusive;
use App\Menu;
use Illuminate\Http\Request;
use Psy\Util\Str;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive,Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index(){
        $menus = $this->menu->paginate(5);
        return view('admin.menus.index',compact('menus'));
    }

    public function create(){
            $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menus.add',compact('optionSelect') );
    }

    public function menuRecusive($parentId){
        $menu = $this->menu->all();
        $menuRecusive = new MenuRecusive($menu);
        $optionSelect = $menuRecusive->menuRecusiveAdd($parentId);
        return $optionSelect;

    }

    public function store(Request $request){
        $this->menu->create([
            'name'=> $request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>str_slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }

    public function edit($id){
        $menu = $this->menu->find($id);
        $optionSelect = $this->menuRecusive($menu->parent_id);
        return view('admin.menus.edit',compact('menu','optionSelect'));
    }
    public function update($id,Request $request){
    $this->menu->find($id)->update([
       'name'=> $request->name,
       'parent_id'=>$request->parent_id,

    ]);

    return redirect()->route('menus.index');
    }

         public function delete($id){
            Menu::find($id)->delete();
       return redirect()->route('menus.index')  ;

    }

}
