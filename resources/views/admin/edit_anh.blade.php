@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật ảnh

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
                    @foreach($edit_anh as $key =>$pro)
                    <form role="form" action="{{URL::to('/update-anh/'.$pro->anh_ma) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh update</label>
                            <input type="file" class="form-control" id="anh" name="anh" placeholder="Tên danh mục">
                            <img src="{{URL::to('public/upload/product/'.$pro->anh_duongdan)}}" height="100px" width="100px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày chụp ảnh</label>
                            <input type="text" class="form-control" id="ngaychup" name="ngaychup"  value="{{$pro->anh_ngaychup}}" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên bệnh nhân</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key =>$ma)
                                @if($ma->benhnhan_ma==$pro->benhnhan_ma)
                                <option selected value="{{$ma->benhnhan_ma}}">{{$ma->benhnhan_ten}}</option>
                                @else
                                <option  value="{{$ma->benhnhan_ma}}">{{$ma->benhnhan_ten}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        
                       
                        <button type="submit" onclick ="return alert('Cập nhật ảnh thành công!!')" class="btn btn-info" name="add_product">Cập nhật ảnh </button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>

    @endsection