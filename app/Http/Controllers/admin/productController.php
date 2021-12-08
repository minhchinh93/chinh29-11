<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;

class productController extends Controller
{
    //


    public function ProductList(Request $request){
        $keyword = $request->keyword;
        $shows=  Product::where('product_name','like', "%{$keyword}%")->withTrashed()->paginate(4);
        $count= Product::withTrashed()->count();
    if($count==0){
        return view('admin.products.index',['shows'=>$shows]);
    }else{
        if($shows->total()>0){
        $count= Product::withTrashed()->count();
        $trackuser= Product::onlyTrashed()->count();
        $activeruser = Product::where('deleted_at',null)->count();
        return view('admin.products.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
    }else{
        return redirect()->route('ProductList')->with('erros','khong tim thay ban ghi');
         }
    }
 }
    public function addProduct(){
        $shows = Product::withTrashed()->get();
        $category= category::all();
         return view('admin.products.add',['shows'=>$shows,'categories'=>$category]);
     }
    public function postProduct(Request $request){
       $image= $request->file('img')->store('images');
        Product::create(array_merge($request->only('product_name','category_id','title','description','unit_price','sale_price'),['img'=> $image]));
        return redirect()->route('ProductList')->with('success', 'bạn da them danh muc thanh cong');
    }
    public function updateProduct(Request $request, $id){
        $image= $request->file('img')->store('images');
        // dd($image);
        Product::where('id',$id)->update(array_merge($request->only('product_name','category_id','title','description','unit_price','sale_price'),['img'=> $image]));
        return redirect()->route('ProductList')->with('success', 'bạn xóa danh mục thanh cong');
    }
    public function updatetemplateProduct( $id){
        $shows = Product::find($id);
        return view('admin.products.update',['shows'=>$shows]);
    }
    public function deleteProduct($id){
        Product::find($id)->delete();
        return redirect()->route('ProductList')->with('success', 'bạn xóa danh mục thanh cong');
    }
    public function trackProduct(){
        $shows = Product::onlyTrashed()->paginate(4);
        $count= Product::withTrashed()->count();
        $trackuser= Product::onlyTrashed()->count();
        $activeruser = Product::where('deleted_at',null)->count();
        return view('admin.products.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
     }
    public function activerProduct(){
        $shows = Product::where('deleted_at',null)->paginate(4);
        $count= Product::withTrashed()->count();
        $trackuser= Product::onlyTrashed()->count();
        $activeruser = Product::where('deleted_at',null)->count();
        return view('admin.products.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
    }
    public function restoreProduct($id){
        Product::withTrashed()->find($id)->restore();
        return redirect()->route('ProductList')->with('success','ban da khoi phuc thanh cong');
    }
    public function action(Request $request){
        $checklis= $request->checkbox;
        $action= $request->action;
        if($checklis){
            if($action){
                if($action=='disabled'){
                    Product::destroy($checklis);
                    return redirect()->route('ProductList')->with('success','ban da xoa thanh cong');
                }
                elseif($action=='restore'){
                    Product::withTrashed()->whereIn('id',$checklis)->restore();
                    return redirect()->route('ProductList')->with('success','ban da khoi phuc thanh cong');
                }elseif($action=='delete'){
                    Product::withTrashed()->whereIn('id',$checklis)->forceDelete();
                    return redirect()->route('ProductList')->with('success','ban da xoa vinh vien');
                }else{
                    return redirect()->route('ProductList')->with('erros','ban chua chon tac vu ');
                }
            }
        } else{
            return redirect()->route('ProductList')->with('erros','ban chua chon mục tieu ');
        }

        }

}
