


{{-- Create Item Modal --}}
<div class="modal fade" id="modal-item-create">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{url('/erp_system/item')}}"
      class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Create New Item</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="file" class="col-sm-3 control-label">
            Item Code
          </label>
          <div class="col-sm-8">
           <input type="text" class="form-control" name="code"
           id="create_code" value="">

         </div>
         </div>
         <div class="form-group">
         <label for="file" class="col-sm-3 control-label">
         Name
        </label>
        <div class="col-sm-8">
         <input type="text" class="form-control" name="name"
         id="create_name" value="">

       </div>
       </div>
       <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Description 1
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="description_1"
       id="create_description_1" value="">

     </div>
        </div>
         <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Description 2
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="description_2"
       id="create_description_2" value="">

     </div>
        </div>
         <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Description 3
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="description_3"
       id="create_description_3" value="">

     </div>
        </div>
       <div class="form-group">
     <label for="file" class="col-sm-3 control-label">
     Buy Price
    </label>
    <div class="col-sm-8">
     <input type="text" class="form-control" name="price_buy"
     id="create_price_buy" value="">

   </div>
      </div>
       <div class="form-group">
   <label for="file" class="col-sm-3 control-label">
    Sell Price
  </label>
  <div class="col-sm-8">
   <input type="text" class="form-control" name="price_sell"
   id="create_price_sell" value="">


</div>
</div>
 <div class="form-group">
   <label for="file" class="col-sm-3 control-label">
   Stock
  </label>
  <div class="col-sm-8">
   <input type="text" class="form-control" name="stock"
   id="create_stock" value="">


</div>
</div>
       <div class="form-group">
   <label for="file" class="col-sm-3 control-label">
   Unit
  </label>
  <div class="col-sm-8">
   <input type="text" class="form-control" name="unit"
   id="create_unit" value="">


</div>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">
    Cancel
  </button>
  <button type="submit" class="btn btn-primary">
    Create Item
  </button>
</div>
</form>
</div>
</div>
</div>

{{-- Update Item Modal --}}
<div class="modal fade" id="modal-item-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST"  action="{{url('/erp_system/item/update')}}"
      class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="PUT">
       <input type="hidden" name="id" id="update_id" value="">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Update Item</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="file" class="col-sm-3 control-label">
            Item Code
          </label>
          <div class="col-sm-8">
           <input type="text" class="form-control" name="code"
           id="update_code" value="">

         </div>
         </div>
         <div class="form-group">
         <label for="file" class="col-sm-3 control-label">
         Name
        </label>
        <div class="col-sm-8">
         <input type="text" class="form-control" name="name"
         id="update_name" value="">

       </div>
       </div>
       <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Description 1
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="description_1"
       id="update_description_1" value="">

     </div>
        </div>
           <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Description 2
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="description_2"
       id="update_description_2" value="">

     </div>
        </div>
           <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Description 3
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="description_3"
       id="update_description_3" value="">

     </div>
        </div>
       <div class="form-group">
     <label for="file" class="col-sm-3 control-label">
     Buy Price
    </label>
    <div class="col-sm-8">
     <input type="text" class="form-control" name="price_buy"
     id="update_price_buy" value="">

   </div>
      </div>
       <div class="form-group">
   <label for="file" class="col-sm-3 control-label">
    Sell Price
  </label>
  <div class="col-sm-8">
   <input type="text" class="form-control" name="price_sell"
   id="update_price_sell" value="">


</div>
</div>
       <div class="form-group">
   <label for="file" class="col-sm-3 control-label">
   Stock
  </label>
  <div class="col-sm-8">
   <input type="text" class="form-control" name="stock"
   id="update_stock" value="">


</div>
</div>
       <div class="form-group">
   <label for="file" class="col-sm-3 control-label">
   Unit
  </label>
  <div class="col-sm-8">
   <input type="text" class="form-control" name="unit"
   id="update_unit" value="">


</div>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">
    Cancel
  </button>
  <button type="submit" class="btn btn-primary">
    Update Item
  </button>
</div>
</form>
</div>
</div>
</div>


{{-- Delete Item Modal --}}
<div class="modal fade" id="modal-item-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Please Confirm</h4>
      </div>
      <div class="modal-body">
        <p class="lead">
          <i class="fa fa-question-circle fa-lg"></i>  
          Are you sure you want to delete the
          <kbd><span id="delete_item_name"></span></kbd>
          file?
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{url('/erp_system/item/delete')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
          <input type="hidden" name="id" id="delete_id" value="">
     
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            Delete File
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
