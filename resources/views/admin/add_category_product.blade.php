@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
                            
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
                                <form role="form" action="{{URL::to('/save-category-product') }}" method="post">
                                    {{csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                                        <input type="text" class="form-control" id="category_product_name" name="category_product_name" placeholder="Tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                                        <textarea style="resize:none" rows="5" class="form-control" id="category_product_desc" name="category_product_desc" placeholder="Mô tả danh mục"></textarea>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="category_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>  
                                    </select>
                                    </div>                                  
                                    <button type="submit"  class="btn btn-info" name ="add_category_product">Thêm danh mục</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
            
@endsection