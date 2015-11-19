


{{-- Create Customer Modal --}}
<div class="modal fade" id="modal-customer-create">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{url('/erp_system/customer')}}"
      class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Create New Customer</h4>
      </div>
      <div class="modal-body">
 
          
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
        Address
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="address"
       id="create_address" value="">

     </div>
        </div>
           <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        City
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="city"
       id="create_city" value="">

     </div>
        </div>
           <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Province
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="province"
       id="create_province" value="">

     </div>
        </div>
          <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Phone
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="phone"
       id="create_phone" value="">

     </div>
        </div>
        <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Email
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="email"
       id="create_email" value="">

     </div>
        </div>   
        <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Attn
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="attn"
       id="create_attn" value="">

     </div>
        </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">
    Cancel
  </button>
  <button type="submit" class="btn btn-primary">
    Create Customer
  </button>
</div>
</form>
</div>
</div>
</div>

{{-- Update Customer Modal --}}
<div class="modal fade" id="modal-customer-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST"  action="{{url('/erp_system/customer/update')}}"
      class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="_method" value="PUT">
       <input type="hidden" name="id" id="update_id" value="">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Update Customer</h4>
      </div>
      <div class="modal-body">
    
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
        Address
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="address"
       id="update_address" value="">

     </div>
        </div>
       <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        City
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="city"
       id="update_city" value="">

     </div>
        </div>
          <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Province
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="province"
       id="update_province" value="">

     </div>
        </div>
          <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Phone
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="phone"
       id="update_phone" value="">

     </div>
        </div>
          <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        email
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="email"
       id="update_email" value="">

     </div>
        </div>
          <div class="form-group">
       <label for="file" class="col-sm-3 control-label">
        Attn
      </label>
      <div class="col-sm-8">
       <input type="text" class="form-control" name="attn"
       id="update_attn" value="">

     </div>
        </div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">
    Cancel
  </button>
  <button type="submit" class="btn btn-primary">
    Update Customer
  </button>
</div>
</form>
</div>
</div>
</div>


{{-- Delete Customer Modal --}}
<div class="modal fade" id="modal-customer-delete">
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
          <kbd><span id="delete_customer_name"></span></kbd>
          customer?
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{url('/erp_system/customer/delete')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
          <input type="hidden" name="id" id="delete_id" value="">
     
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            Delete Customer
          </button>
        </form>
      </div>
    </div>
  </div>
</div>