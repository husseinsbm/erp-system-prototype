@extends('erp_system.admin_template')

@section('content')
<div class="container-fluid">
  <div class="row page-title-row">
    <div class="col-md-6">
      <h3>Posts <small>» Listing</small></h3>
    </div>
    <div class="col-md-6 text-right">
      <button type="button" class="btn btn-success btn-md"
      data-toggle="modal" data-target="#modal-customer-create">
      <i class="fa fa-plus-circle"></i> New Customer
    </button>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">

    @include('erp_system.partials.errors')
    @include('erp_system.partials.success')

    <table id="posts-table" class="table table-striped table-bordered">
      <thead>
        <tr>

          <th>Name</th>
          <th>Address</th>
          <th>City</th>
          <th>Province</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Attn</th>
          <th data-sortable="false">Actions</th>
        </tr>
        <h5>Page {{ $customer->currentPage() }} of {{ $customer->lastPage() }}</h5>
      </thead>
      <tbody>
    
       @foreach ($customer as $customerlist)

       <tr>
   
        <td>{{ $customerlist->name }}</td>
        <td>{{ $customerlist->address }}</td>
        <td>{{ $customerlist->city }}</td>
         <td>{{ $customerlist->province }}</td>
          <td>{{ $customerlist->phone }}</td>
           <td>{{ $customerlist->email }}</td>
            <td>{{ $customerlist->attn }}</td>
        <td>
          <a 
          class="btn btn-xs btn-info"  onclick="edit_customer('{{ $customerlist->id }}')">
          <i class="fa fa-edit"></i> Edit
        </a>

        <a
        class="btn btn-xs btn-danger" onclick="delete_customer('{{ $customerlist->name}}','{{$customerlist->id}}' )">
        <i class="fa fa-remove"></i> Delete
      </a>
    </td>
  </tr>
  @endforeach
</tbody>
</table>

{!! $customer->render() !!}
</div>
</div>
@include('erp_system.customer._modals')
</div>

@stop


<script>

    // Confirm file delete
    function edit_customer(key) {
      $.ajax({
        url: "customer/getcustomer",
        type: 'GET',
        data: {id: key},
        dataType: 'JSON',
        success: function (data) {
          $("#update_id").val(data.id);
          $("#update_name").val(data.name);
          $("#update_address").val(data.address);
          $("#update_city").val(data.city);
           $("#update_province").val(data.province);
            $("#update_phone").val(data.phone);
             $("#update_email").val(data.email);
              $("#update_attn").val(data.attn);
          $("#modal-customer-update").modal("show");
        }
      });
    /*  alert(key.name)
      $("#update_item_code").val(name);
      $("#delete-file-name2").val(name);
      $("#modal-item-update").modal("show");*/
    }
    function delete_customer(name,key) {
      $("#delete_customer_name").html(name);
      $("#delete_id").val(key);
      $("#modal-customer-delete").modal("show");

    }



  </script>
