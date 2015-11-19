<div class="row">

 <div class="col-xs-6">
  <div class="form-group">
    <label for="Invoice" class="col-md-2 control-label">
      RFQ No
    </label>
    <div class="col-md-8">
      <input type="text" class="form-control" name="number" id="number" value="{{$rfq->number}}" autofocus
      >
    </div>
  </div>


  <div class="form-group">
    <label for="Record" class="col-md-2 control-label">
      Date
    </label>

    <div class="col-md-8">
      <div class='input-group date datepicker' id='datetimepicker5'>
        <input type='text' class="form-control" name="date" id="date" value="{{date('Y-m-d', strtotime($rfq->date))}}"/>
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
      </div>
    </div>
  </div>
   <div class="form-group">
      <label for="Number" class="col-md-2 control-label">
      Note
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="note" id="note" autofocus
        id="title" value="{{$rfq->note}}">
      </div>
    </div>
</div>
<div class="col-xs-6">

 <div class="form-group">
  <label for="Payment" class="col-md-2 control-label">
    Customer
  </label>
  <div class="col-md-8">
    <select class="form-control" id="customer" name="customer" >
      <option value="0"  ></option>
      @foreach ($customer as $customerlist)


      <option value="{{$customerlist->id}}" @if($customerlist->id==$rfq->customer_id) selected @endif >
       {{$customerlist->name}}
     </option>
     @endforeach
     

   </select>

 </div>
</div>
<div class="form-group">
  <label for="attn" class="col-md-2 control-label">
    Attn
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="attn" id="attn" autofocus
    value="{{$rfq->attn}}">
  </div>
</div>
<div class="form-group">
  <label for="phone" class="col-md-2 control-label">
    Contact
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="phone" id="phone" autofocus
    value="{{$rfq->customer_belong_rfq->phone}}">
  </div>
</div>
<div class="form-group">
  <label for="attn" class="col-md-2 control-label">
    Email
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="email" id="email" autofocus
    value="{{$rfq->customer_belong_rfq->email}}">
  </div>
</div>



</div>

<div class="form-group col-md-8">

</div>




<table id="posts-table" class="table table-striped table-bordered">
  <thead>
    <tr>
           <th class="col-md-2">Item Code</th>
      <th class="col-md-3">Name</th>
      <th class="col-md-1">Quantity</th>
      <th class="col-md-2">Unit</th>
      
    </tr>
  </thead>
  <tbody>
    <?php $total=0; ?>

    @foreach ($item as $itemlist)
    <tr >
      <td>
        <span >{{$itemlist->item_code}}</span>

      </td>
      <td>
        <span >{{$itemlist->name}}</span>

      </td>
      <td>
        <span >{{$itemlist->quantity}}</span>

      </td>
      <td>
        <span >{{$itemlist->unit}}</span>

      </td>

    </tr>


    @endforeach



  </button>


</td>
</tr>
<input type="hidden" value="@{{appkeys | json}}" name="item_list" id="item_list">
</tbody>

</table>
<div class="form-group col-md-10">
  <label for="Invoice" class="col-md-12 control-label">
  
 </label>

</div>
