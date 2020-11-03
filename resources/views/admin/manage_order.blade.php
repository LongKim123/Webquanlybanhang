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
            <td><span class="text-ellipsis">
              <?php
              if($order_all->status=='Đang xử lý')
                {?>
                  
                  <a href="{{URL::to('/chuaxuly/'.$order_all->id)}}" ><span class="fa-thumb-styling fa fa-thumbs-down"  style="color:red ;font-size: 28px"></span></a>
              <?php 
              }
              else{


                ?>
                <a href="{{URL::to('/dangxuly/'.$order_all->id)}}" ><span class="fa-thumb-styling fa fa-thumbs-up" style="color:green; font-size: 28px"></span></a>
                

              <?php
              } 
                ?>

               </span></td>
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
     <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
           {!! $all_order->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
