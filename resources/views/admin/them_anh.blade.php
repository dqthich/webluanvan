@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm ảnh

            </header>
            <?php
            $mess = Session::get('message');
            if ($mess) {
                echo $mess;
                Session::put('message', null);
            }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/luu-anh') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field() }}
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh cần thêm</label>
                            <input type="file" class="form-control" id="anh" name="anh" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày chụp ảnh</label>
                            <input type="text" class="form-control" id="ngaychup" name="ngaychup" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên bệnh nhân</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($idbenhnhan as $key =>$ma)
                                <option value="{{$ma->benhnhan_ma}}">{{$ma->benhnhan_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                       
                        <button type="submit"  onclick ="return alert('Thêm ảnh thành công!!')" class="btn btn-info" name="add_product">Thêm ảnh</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

    @endsection