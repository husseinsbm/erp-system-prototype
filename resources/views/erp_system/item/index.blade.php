@extends('erp_system.admin_template')

@section('content')
<div class="container-fluid">
  <div class="row page-title-row">
    <div class="col-md-6">
      <h3>Posts <small>» Listing</small></h3>
    </div>
    <div class="col-md-6 text-right">
      <button type="button" class="btn btn-success btn-md"
      data-toggle="modal" data-target="#modal-item-create">
      <i class="fa fa-plus-circle"></i> New Item
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
          <th>Code</th>
          <th>Name</th>
          <th>Description 1</th>
<th>Description 2</th>
<th>Description 3</th>
          <th>Buy Price</th>
          <th>Sell Price</th>
          <th>Stock</th>
          <th>Unit</th>
          <th data-sortable="false">Actions</th>
        </tr>
        <h5>Page {{ $item->currentPage() }} of {{ $item->lastPage() }}</h5>
      </thead>
      <tbody>
        @foreach ($item as $itemlist)
        <tr>
          <td>
            {{ $itemlist->item_code }}
          </td>
          <td>{{ $itemlist->name }}</td>
          <td>{{ $itemlist->description_1 }}</td>
          <td>{{ $itemlist->description_2 }}</td>
          <td>{{ $itemlist->description_3 }}</td>
          <td>Rp.{{ number_format($itemlist->price_buy , 2) }}</td>
          <td>Rp.{{ number_format($itemlist->price_sell, 2) }}</td>
          <td>{{ $itemlist->stock }}</td>
          <td>{{ $itemlist->unit }}</td>
          <td>
            <a 
            class="btn btn-xs btn-info"  onclick="edit_item('{{ $itemlist->id }}')">
            <i class="fa fa-edit"></i> Edit
          </a>
          <a
          class="btn btn-xs btn-danger" onclick="delete_item('{{ $itemlist->name}}',{{$itemlist->id}} )">
          <i class="fa fa-remove"></i> Delete
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{!! $item->render() !!}
</div>
</div>
@include('erp_system.item._modals')
</div>

@stop


<script>

    // Confirm file delete
    function edit_item(key) {
      $.ajax({
        url: "item/getitem",
        type: 'GET',
        data: {id: key},
        dataType: 'JSON',
        success: function (data) {
          $("#update_id").val(data.id);
          $("#update_code").val(data.item_code);
          $("#update_name").val(data.name);
          $("#update_description_1").val(data.description_1);
          $("#update_description_2").val(data.description_2);
          $("#update_description_3").val(data.description_3);
          $("#update_price_buy").val(data.price_buy);
          $("#update_price_sell").val(data.price_sell);
           $("#update_stock").val(data.stock);
          $("#update_unit").val(data.unit);
          $("#modal-item-update").modal("show");
        }
      });
    /*  alert(key.name)
      $("#update_item_code").val(name);
      $("#delete-file-name2").val(name);
      $("#modal-item-update").modal("show");*/
    }
    function delete_item(name,key) {
      $("#delete_item_name").html(name);
      $("#delete_id").val(key);
      $("#modal-item-delete").modal("show");

    }


  </script>
