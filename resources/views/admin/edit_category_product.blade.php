@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục sản phẩm
                            
                        </header>
                        <?php
                                $mess=Session::get('message');
                                if($mess){
                                    echo $mess;
                                    Session::put('message',null);

                                }
	                        ?>
                        <div class="panel-body">
                        @foreach($edit_category_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id) }}" method="post">
                                    {{csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                                        <input type="text" class="form-control" value={{$edit_value->category_name}} id="category_product_name" name="category_product_name" placeholder="Tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                                        <textarea style="resize:none" rows="5" class="form-control" id="category_product_desc" name="category_product_desc">{{$edit_value->category_desc}}</textarea>
                                    </div>
                                                                   
                                    <button type="submit"  class="btn btn-info" name ="update_category_product">Cập nhật danh mục</button>
                                </form>
                            </div>
                        @endforeach
                        </div>
                    </section>

            </div>
            
@endsection