@extends('admin_layout')
@section('admin_content')
   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
                        </header>
                        <div class="panel-body">
                        	
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm </label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm </label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ hình ảnh </label>
                                    <input type="text" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh mục">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Mô Tả Sản Phẩm </label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="product_desc" placeholder="Mô tả danh mục"></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục sản phẩm </label>
                                   <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key =>$cate)

                                       <option value="{{$cate->id}}">{{$cate->tenloaisanpham}}</option>

                                    @endforeach
                                        
                                       
                                   </select>
                                </div>
                               
                                
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm Danh Mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
         
        </div>
@endsection