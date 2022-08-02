@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thông tin bệnh nhân
                            
                        </header>
                        <?php
                                $mess=Session::get('message');
                                if($mess){
                                    echo $mess;
                                    Session::put('message',null);

                                }
	                        ?>
                        <div class="panel-body">
                        @foreach($edit_bn as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-benhnhan/'.$edit_value->benhnhan_ma) }}" method="post">
                                    {{csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên bệnh nhân</label>
                                        <input type="text" class="form-control" value="{{$edit_value->benhnhan_ten}}" id="ten_benhnhan" name="ten_benhnhan" placeholder="Tên bệnh nhân">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" class="form-control" value="{{$edit_value->benhnhan_dc}}" id="dc_benhnhan" name="dc_benhnhan" placeholder="Địa chỉ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                        <input type="text" class="form-control" value="{{$edit_value->benhnhan_sdt}}" id="sdt_benhnhan" name="sdt_benhnhan" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Năm sinh</label>
                                        <input type="text" class="form-control" value="{{$edit_value->benhnhan_ns}}" id="ns_benhnhan" name="ns_benhnhan" placeholder="Năm sinh">
                                    </div>
                                                                   
                                    <button type="submit" onclick ="return alert('Cập nhật thông tin bệnh nhân thành công!!')" class="btn btn-info" name ="update_benhnhan">Cập nhật thông tin bệnh nhân</button>
                                </form>
                            </div>
                        @endforeach
                        </div>

                        
                    </section>

            </div>
            
@endsection