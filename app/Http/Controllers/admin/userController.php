<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Closure;

class userController extends Controller
{

    //
    public function index(Request $request ){
        $keyword = $request->keyword;
        $shows=  User::where('name','like', "%{$keyword}%")->withTrashed()->paginate(5);

        if($shows->total()>0){
            $count= User::withTrashed()->count();
            $trackuser= User::onlyTrashed()->count();
            $activeruser = User::where('deleted_at',null)->count();
            return view('admin.users.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
        }else{
            return redirect()->route('showList')->with('erros','khong tim thay ban ghi');
        }
        }
    // show du lieu len index
    public function delete($id){
        User::find($id)->delete();
        return redirect()->route('showList')->with('success','ban da xoa thanh cong');
    }
    //show form update
    public function updateshow ($id){
        $show = User::find($id);
        if($show != null){
            return view('admin.users.update',['show'=>$show]);
        }else{
            return redirect()->route('showList')->with('erros','user nay da bi xoa, khong the up date');
        }
    }
    public function updatesuser(Request $request, $id){
        $show = User::where('id',$id)->update($request->only('name','email','phone'));
       return redirect()->route('showList')->with('success','ban da up date thanh cong');
    }
    public function trackuser(){
        $shows = User::onlyTrashed()->paginate(5);
        $count= User::withTrashed()->count();
        $trackuser= User::onlyTrashed()->count();
        $activeruser = User::where('deleted_at',null)->count();
        return view('admin.users.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);
    }
    public function activeruser(){
        $shows = User::where('deleted_at',null)->get();
        $count= User::withTrashed()->count();
        $trackuser= User::onlyTrashed()->count();
        $activeruser = User::where('deleted_at',null)->count();
        return view('admin.users.index',['shows'=>$shows,'index'=>$count,'trackuser'=>$trackuser,'activeruser'=>$activeruser]);

    }
    public function restore($id){
        User::withTrashed()->find($id)->restore();
        return redirect()->route('showList')->with('success','ban da khoi phuc thanh cong');
    }
    public function action(Request $request){
        $checklis= $request->checkbox;
        $action= $request->action;
        if($checklis){
            foreach($checklis as $id){
                if($id==1){
                    return redirect()->route('showList')->with('erros','ban khong the xoa chinh minh');
                }
            }
            if($action){
                if($action=='disabled'){
                    User::destroy($checklis);
                    return redirect()->route('showList')->with('success','ban da xoa thanh cong');
                }
                elseif($action=='restore'){
                    User::withTrashed()->whereIn('id',$checklis)->restore();
                    return redirect()->route('showList')->with('success','ban da khoi phuc thanh cong');
                }elseif($action=='delete'){
                    User::withTrashed()->whereIn('id',$checklis)->forceDelete();
                    return redirect()->route('showList')->with('success','ban da xoa vinh vien');
                }else{
                    return redirect()->route('showList')->with('erros','ban chua chon tac vu ');
                }

            }
        }

        }
}
