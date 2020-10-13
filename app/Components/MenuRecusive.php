<?php
namespace App\Components;
use App\Menu;

class MenuRecusive{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }

    public function menuRecusiveAdd($parentId = 0, $subMark =''){
        $menu = Menu::where('parent_id',$parentId)->get();
        foreach ($menu as $menuItem) {
        $this->html .='<option value="'.$menuItem->id.'">' .$subMark .$menuItem->name . '</option>';
        $this->menuRecusiveAdd($menuItem->id,$subMark.'--');
        }
        return $this->html;
    }
}
