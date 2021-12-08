<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    //


    public function categoriesList(Request $request){
        $count= Category::withTrashed()->count();
        $keyword = $request->keyword;
        if($count== 0){
            $shows=  Category::where('category_name','like', "%{$keyword}%")->withTrashed()->paginate(10);
            return view('admin.categories.index',['shows'=>$shows]);
        }else{
             $shows=  Category::where('category_name','like', "%{$keyword}%")->withTrashed()->paginate(10);
        if($shows->total()>0){
             $trackuser= Category::onlyTrashed()->count();
             $activeruser = Category::where('deleted_at',null)->count();
        return view('admin.categories.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
        }else{
             return redirect()->route('categoriesList')->with('erros','khong tim thay ban ghi');
             }
    }
}
    public function addCategory(){
         return view('admin.categories.add');
     }
    public function postCategory(Request $request){
        Category::create($request->only('category_name','description'));
        return redirect()->route('categoriesList')->with('success', 'bạn da them danh muc thanh cong');
    }
    public function updateCategory(Request $request, $id){
        $image= $request->file('img')->store('images');
        Category::where('id',$id)->update(array_merge($request->only('category_name','description'),['img'=>$image]));
        return redirect()->route('categoriesList')->with('success', 'bạn xóa danh mục thanh cong');
    }
    public function updatetemplateCategory( $id){
        $shows = Category::find($id);
        return view('admin.categories.update',['show'=>$shows]);
    }
    public function deleteCategory($id){
        Category::find($id)->delete();
        return redirect()->route('categoriesList')->with('success', 'bạn xóa danh mục thanh cong');
    }
    public function trackCategory(){
        $shows = Category::onlyTrashed()->paginate(4);
        $count= Category::withTrashed()->count();
        $trackuser= Category::onlyTrashed()->count();
        $activeruser = Category::where('deleted_at',null)->count();
        return view('admin.categories.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
     }
    public function activerCategory(){
        $shows = Category::where('deleted_at',null)->paginate(4);
        $count= Category::withTrashed()->count();
        $trackuser= Category::onlyTrashed()->count();
        $activeruser = Category::where('deleted_at',null)->count();
        return view('admin.categories.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
    }
    public function restoreCategory($id){
        Category::withTrashed()->find($id)->restore();
        return redirect()->route('categoriesList')->with('success','ban da khoi phuc thanh cong');
    }
    public function action(Request $request){
        $checklis= $request->checkbox;
        $action= $request->action;
        if($checklis){
            if($action){
                if($action=='disabled'){
                    Category::destroy($checklis);
                    return redirect()->route('categoriesList')->with('success','ban da xoa thanh cong');
                }
                elseif($action=='restore'){
                    Category::withTrashed()->whereIn('id',$checklis)->restore();
                    return redirect()->route('categoriesList')->with('success','ban da khoi phuc thanh cong');
                }elseif($action=='delete'){
                    Category::withTrashed()->whereIn('id',$checklis)->forceDelete();
                    return redirect()->route('categoriesList')->with('success','ban da xoa vinh vien');
                }else{
                    return redirect()->route('categoriesList')->with('erros','ban chua chon tac vu ');
                }

            }
        }

        }

}
