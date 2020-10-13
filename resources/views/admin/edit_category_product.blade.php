@extends('admin_layout')
@section('admin_content')
   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa Sản Phẩm
                        </header>
                        <div class="panel-body">
                        	@foreach($edit_category_product as $key =>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->id)}}" method="post">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Danh Mục </label>
                                    <input type="text" value ="{{$edit_value->tenloaisanpham}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Địa chỉ hình ảnh </label>
                                    
                                    <textarea style="resize:none" rows="8" class="form-control" name="category_product_desc"  >{{$edit_value->hinhanhloaisanpham}}</textarea> 
                                </div>
                                
                                
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>
                              @endforeach

                        </div>
                    </section>

            </div>
         
        </div>
@endsection