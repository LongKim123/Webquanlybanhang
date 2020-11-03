@extends('admin_layout')
@section('admin_content')

   <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Danh Sách Sản Phẩm
    </div>
 
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        
          <form action="{{URL::to('/search-product')}}"  method="POST">
            {{csrf_field()}}
             <input type="text" name="key" class="input-sm form-control" placeholder="tìm kiếm sản phẩm">
            
              <input name="search_item"  class="btn btn-success btn-primary" value="Tìm kiếm" type="submit">
            
            
          </form>
         
        
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>hình ảnh sản phẩm</th>
            <th>Loại sản phẩm</th>


           
            <th style="width:30px;">Hiển thị</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key =>$pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$pro->tensanpham}}</td>
            <td>{{$pro->giasanpham}}</td>
            <td><img src="{{$pro->hinhanh}}"height="100" width="100" alt=""></td>
            <td>{{$pro->tenloaisanpham}}</td>

            <td>
              <a href="{{URL::to('/edit-product/'.$pro->id_sp)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a  onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không ?')" href="{{URL::to('/delete-product/'.$pro->id_sp)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
          
          
        </tbody>
      </table>
    </div>

    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           {!! $all_product->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection