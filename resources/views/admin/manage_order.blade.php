@extends('admin_layout')
@section('admin_content')

	<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách đơn đặt hàng
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">Mã đơn hàng</th>
            <th data-breakpoints="xs">Tên khách hàng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th data-breakpoints="xs sm md" data-title="DOB">Ngày đặt</th>
            <th>Hiển thị</th>
          </tr>
        </thead>
        <tbody>
           
         
           @foreach($all_order as $key =>$order_all )
          <tr data-expanded="true">
            <td> {{$order_all->id}}</td>
            
            <td>{{$order_all->username}}</td>
            <td>{{$order_all->total_price}}</td>
            <td>{{$order_all->status}}</td>
            <td>{{$order_all->NgayDH}}</td>
            <td>
              <a href="{{URL::to('/view-order/'.$order_all->id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a  onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không ?')" href="{{URL::to('/delete-product/')}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          
          </tr>
          
          @endforeach
          
          
          
        </tbody>
       
      </table>
    </div>
  </div>
</div>

@endsection