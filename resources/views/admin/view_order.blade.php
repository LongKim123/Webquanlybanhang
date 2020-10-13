@extends('admin_layout')
@section('admin_content')



<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin khách hàng đặt
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
            
            <th>Tên Khách Hàng</th>
            <th>Email</th>
            <th >Địa chỉ</th>
            <th >Số điện thoại</th>
           
            
          </tr>
        </thead>
        <tbody>
        
          @foreach($order_acc as $key =>$acc)
          <tr data-expanded="true">
            <td>{{$acc->username}}</td>
            <td>{{$acc->email}}</td>
            
            <td>{{$acc->address}}</td>
            <td>{{$acc->phone}}</td>
            
            <td></td>
          </tr>
          @endforeach
          
          
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<br></br>
<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Liệt kê chi tiết đơn hàng
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
            
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th >Số lượng mua</th>
            <th >Tổng tiền</th>
           
            
          </tr>
        </thead>
        <tbody>
         @foreach($order_by_id as $key=>$ab)
          <tr data-expanded="true">
             
            <td>{{$ab->tensanpham}}</td>
            <td>{{$ab->dongia}}</td>
            
            <td>{{$ab->soluongsanpham}}</td>
            <td>{{$ab->giasanpham}}</td>
            
            
          </tr>
          @endforeach
      </table>
    </div>
  </div>
</div>
<br></br>

@endsection