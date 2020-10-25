 @extends('layout')
 @section('content')
 
  
                
                
                <div class="col-sm-9 padding-right">
                   <div class="features_items"><!--features_items-->
                     @foreach($category_name as $key =>$pro)
                    <h2 class="title text-center">Danh mục <p style="color:red;" media="screen">
                        
                     {{$pro->tenloaisanpham}}</p>
                        </h2>
                        @endforeach
                        
                         @foreach($product as $key =>$pro)

                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                
                                <div class="single-products">
                                     
                                        <div class="productinfo text-center">
                                           
                                            <img src="{{$pro->hinhanh}}" style=" height: 150px" alt="" />
                                            <h2>{{$pro->giasanpham}}</h2>
                                            <p>{{$pro->tensanpham}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>   
                                        </div>
                                       
                                        
                                </div>
                                 
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        @endforeach
                       
                       
                       
                       
                        
                    </div><!--features_items-->


                     <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                               
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{('public/frontend/images/gallery1.jpg')}}" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div><!--/category-tab-->

                 
                    
                    
                    
                    
                    
                </div>
          
@endsection