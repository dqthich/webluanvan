<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use DB;

class AnhController extends Controller
{
    public function AuthLogin()
    {
        $admin_id =  Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    public function them_anh()
    {
        $this->AuthLogin();
        $idbenhnhan = DB::table('benhnhan')->orderby('benhnhan_ma', 'desc')->get();
       
        return view('admin.them_anh')->with('idbenhnhan', $idbenhnhan);
    }

    public function all_anh()
    {
        $this->AuthLogin();
        $all_anh =  DB::table('anh')->join('benhnhan', 'benhnhan.benhnhan_ma', '=', 'anh.benhnhan_ma')
            ->orderby('anh.anh_ma', 'desc')->get();
        $manager_product = view('admin.all_anh')->with('all_anh', $all_anh);

        return view('admin_layout')->with('admin.all_anh', $manager_product);
    }
    public function luu_anh(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['benhnhan_ma'] = $request->product_cate;
        $data['anh_ngaychup'] = $request->ngaychup;
        $get_image = $request->file('anh');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['anh_duongdan'] = $new_image;
            DB::table('anh')->insert($data);
            Session::put('message', 'Thêm ảnh bệnh nhân thành công');
            return Redirect::to('all-anh');
        }
        $data['anh_duongdan'] = '';
        DB::table('anh')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('all-anh');
    }

   

    public function edit_anh($anh_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('benhnhan')->orderby('benhnhan_ma', 'desc')->get();
      

        $edit_anh =  DB::table('anh')->where('anh_ma', $anh_id)->get();
        $manager_product = view('admin.edit_anh')->with('edit_anh', $edit_anh)->with('cate_product', $cate_product);

        return view('admin_layout')->with('admin.edit_anh', $manager_product);
    }

    public function update_anh(Request $request, $anh_id)
    {
        $this->AuthLogin();
        $data = array();
        $data = array();
        $data['benhnhan_ma'] = $request->product_cate;
        $data['anh_ngaychup'] = $request->ngaychup;

        $get_image = $request->file('anh');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['anh_duongdan'] = $new_image;
            DB::table('anh')->where('anh_ma', $anh_id)->update($data);
            Session::put('message', 'Cập nhât ảnh thành công');
            return Redirect::to('all-anh');
        }

        DB::table('anh')->where('anh_ma', $anh_id)->update($data);
        Session::put('message', 'Cập nhật ảnh thành công');
        return Redirect::to('all-anh');
    }
    public function delete_anh($anh_id)
    {
        $this->AuthLogin();
        DB::table('anh')->where('anh_ma', $anh_id)->delete();
        Session::put('message', 'Xóa ảnh thành công');
        return Redirect::to('all-anh');
    }

    //End admin pages

    
}
