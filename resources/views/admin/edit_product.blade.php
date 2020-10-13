@extends('admin_layout')
@section('admin_content')
   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập Nhật Sản Phẩm
                        </header>
                        
                        <div class="panel-body">
                        	
                            <div class="position-center">
                                @foreach($edit_product as $key =>$pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->id_sp)}}" method="post">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm </label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh mục" value="{{$pro->tensanpham}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm </label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá" value="{{$pro->giasanpham}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ hình ảnh </label>
                                    <input type="text" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh mục" value="{{$pro->hinhanh}}">
                                   
                                    <img  src="{{$pro->hinhanh}}" height="100" wight="100" alt="">
                                </div>
                               


                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Mô Tả Sản Phẩm </label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="product_desc" placeholder="Mô tả danh mục" >{{$pro->motasanpham}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục sản phẩm </label>
                                   <select name="product_id" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key =>$cate)
                                        @if($cate->id==$pro->idsanpham)
                                            <option selected value="{{$cate->id}}">{{$cate->tenloaisanpham}}</option>
                                        @else
                                            <option value="{{$cate->id}}">{{$cate->tenloaisanpham}}</option>
                                        @endif

                                    @endforeach
                                        
                                       
                                   </select>
                                </div>
                               
                                
                                <button type="submit" name="update_product" class="btn btn-info">Cập Nhật Sản Phẩm</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
         
        </div>
@endsection