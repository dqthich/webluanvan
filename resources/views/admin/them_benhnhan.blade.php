@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm bệnh nhân mới
                            
                        </header>
                        <?php
                                $mess=Session::get('message');
                                if($mess){
                                    echo $mess;
                                    Session::put('message',null);

                                }
	                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/luu-benhnhan') }}" method="post">
                                    {{csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên bệnh nhân</label>
                                        <input type="text" class="form-control" id="ten_benhnhan" name="ten_benhnhan" placeholder="Tên bệnh nhân">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" class="form-control" id="dc_benhnhan" name="dc_benhnhan" placeholder="Địa chỉ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                        <input type="text" class="form-control" id="sdt_benhnhan" name="sdt_benhnhan" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Năm sinh</label>
                                        <input type="text" class="form-control" id="ns_benhnhan" name="ns_benhnhan" placeholder="Năm sinh">
                                    </div>
                                                
                                          
                                    <button type="submit" onclick ="return alert('Thêm bệnh nhân thành công!!')"  class="btn btn-info" name ="add_category_product">Thêm bệnh nhân</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
            
@endsection