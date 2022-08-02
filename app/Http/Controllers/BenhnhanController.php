<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use DB;

class BenhnhanController extends Controller
{
    public function AuthLogin(){
        $admin_id =  Session::get('admin_id');
        if($admin_id){
            return Redirect::to ('/dashboard');
        }else{
            return Redirect::to ('/admin')->send();
        }
    }

    public function them_benhnhan(){
        $this->AuthLogin();
        return view('admin.them_benhnhan');
    }

    public function all_benhnhan(){
        $this->AuthLogin();
        $all_benhnhan =  DB::table('benhnhan')->get();
        $manager_benhnhan = view('admin.all_benhnhan')->with('all_benhnhan',$all_benhnhan);

        return view('admin_layout')->with('admin.all_benhnhan',$manager_benhnhan);
    }

    public function luu_benhnhan(Request $request){
        $this->AuthLogin();
        $data=array();
        $data['benhnhan_ten'] = $request ->ten_benhnhan;
        $data['benhnhan_dc'] = $request ->dc_benhnhan;
        $data['benhnhan_sdt'] = $request ->sdt_benhnhan;
        $data['benhnhan_ns'] = $request ->ns_benhnhan;

       DB::table('benhnhan')->insert($data);
       Session::put('message','Thêm thông tin bệnh nhân thành công');
       return Redirect::to('them-benhnhan');
    }

    public function edit_benhnhan($benhnhan_id){
        $this->AuthLogin();
        $edit_bn =  DB::table('benhnhan')->where('benhnhan_ma',$benhnhan_id)->get();
        $manager_dsbenhnhan = view('admin.edit_benhnhan')->with('edit_bn',$edit_bn);

        return view('admin_layout')->with('admin.edit_benhnhan',$manager_dsbenhnhan);
    }

    public function update_benhnhan(Request $request,$benhnhan_id){
        $this->AuthLogin();
        $data=array();
        $data['benhnhan_ten'] = $request ->ten_benhnhan;
        $data['benhnhan_dc'] = $request ->dc_benhnhan;
        $data['benhnhan_sdt'] = $request ->sdt_benhnhan;
        $data['benhnhan_ns'] = $request ->ns_benhnhan;
        DB::table('benhnhan')->where('benhnhan_ma',$benhnhan_id)->update($data);
        Session::put('message','Cập nhật thông tin bệnh nhân thành công');
        return Redirect::to('all-benhnhan');
    }

    public function delete_benhnhan($benhnhan_id){
        $this->AuthLogin();
        
        DB::table('benhnhan')->where('benhnhan_ma',$benhnhan_id)->delete();
        Session::put('message','Xóa thông tin bệnh nhân thành công');
        return Redirect::to('all-benhnhan');
    }
}
