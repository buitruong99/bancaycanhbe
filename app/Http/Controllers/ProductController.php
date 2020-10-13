<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\MenuRecusive;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Product;
use App\Tag;
use App\ProductImage;
use App\ProductTag;
use App\Traits\StoragelmageTrait;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Log;
use DB;
use function GuzzleHttp\Psr7\str;

class ProductController extends Controller
{
    use StoragelmageTrait;

    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Category $category, Product $product, ProductImage $productImage,
                                Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;

    }

    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content2' => $request->content2s,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,


            ];
            $dataUploatFeatureImage = $this->storagelTraitUploat($request, 'feature_image_path', 'product');
            if (!empty($dataUploatFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploatFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploatFeatureImage['file_path'];

            }
            $product = $this->product->create($dataProductCreate);
            //insert data to product_image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storagelTraitUploatMutiple($fileItem, 'product');
                    $product->images()->create([

                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);

                }
            }
            // insert tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    //insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }

            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('sanpham.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            log::error('message' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }

    }

    public function edit(MenuRecusive $request,$id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content2' => $request->content2s,
                'content' => $request->contents,

                'user_id' => auth()->id(),
                'category_id' => $request->category_id,


            ];
            $dataUploatFeatureImage = $this->storagelTraitUploat($request, 'feature_image_path', 'product');
            if (!empty($dataUploatFeatureImage)) {

                $dataProductCreate['feature_image_name'] = $dataUploatFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploatFeatureImage['file_path'];

            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            //insert data to product_image
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storagelTraitUploatMutiple($fileItem, 'product');
                    $product->images()->create([

                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);

                }
            }
            // insert tags for product
            if (!empty($request->tags)) {
                $delete = ProductTag::where('product_id',$id)->delete();
                foreach ($request->tags as $tagItem) {
                    //insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }

            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('sanpham.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            log::error('message' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }

    }


    public function delete($id)
    {
        try {
            $this->product->find($id)->delete();
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


