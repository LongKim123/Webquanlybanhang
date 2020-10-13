@extends('admin_layout')
@section('admin_content')

	<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách tài khoản khách hàng
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
            
            <th>Username</th>
            <th>Password</th>
            <th >Email</th>
            <th >Address</th>
           
            <th >Phone</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_account as $key=>$acc)

          <tr data-expanded="true">
            <td>{{$acc->username}}</td>
            <td>{{$acc->password}}</td>
            
            <td>{{$acc->email}}</td>
            <td>{{$acc->address}}</td>
            
            <td>{{$acc->phone}}</td>
          </tr>
          @endforeach
          
          
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection