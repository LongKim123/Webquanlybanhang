@extends('admin_layout')
@section('admin_content')
   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Danh Mục Sản Phẩm
                        </header>
                        <div class="panel-body">
                        	
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Danh Mục </label>
                                    <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Địa chỉ hình ảnh </label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="category_product_desc" placeholder="Mô tả danh mục"></textarea> 
                                </div>
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm Danh Mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
         
        </div>
@endsection