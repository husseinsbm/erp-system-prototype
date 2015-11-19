<div class="row">

   <div class="col-xs-6">
    <div class="form-group">
      <label for="Number" class="col-md-2 control-label">
       QTN No.
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="number" id="number" autofocus
        id="title" value="{{$qtn->id+1}}/QTN/{{date('m/Y')}}">
      </div>
    </div>
  

    <div class="form-group">
      <label for="Selling" class="col-md-2 control-label">
       Date
      </label>

      <div class="col-md-8">
        <div class='input-group date datepicker' id='datetimepicker5'>
          <input type='text' class="form-control" name="date" id="date" />
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
      </div>

    </div>
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
    </div>
           <div class="col-xs-6">
             <div class="form-group">
      <label for="Number" class="col-md-3 control-label">
      Delivery cost
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="delivery_cost" id="delivery_cost" autofocus
        value="">
      </div>
    </div>
       <div class="form-group">
      <label for="Number" class="col-md-3 control-label">
      Delivery Time
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="delivery_time" id="delivery_time" autofocus
        value="">
      </div>
    </div>

      
       <div class="form-group">
      <label for="Number" class="col-md-3 control-label">
       Delivery Point
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="delivery_point" id="delivery_point" autofocus
         value="">
      </div>
    </div>

     
       <div class="form-group">
      <label for="Number" class="col-md-3 control-label">
      Tax
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="tax" id="tax" autofocus
        value="">
      </div>
    </div>
 
      <div class="form-group">
      <label for="Number" class="col-md-3 control-label">
      Validity
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="validity" id="validity" autofocus
        value="">
      </div>
    </div>

    
       <div class="form-group">
      <label for="Number" class="col-md-3 control-label">
      Note
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="note" id="note" autofocus
        value="{{$rfq->note}}">
      </div>
    </div>
    </div>
   
  

</div>

    
</div>

<div class="alert alert-warning" ng-if="message!=''">
  @{{message}}
</div>




<table id="posts-table" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="col-md-2">Item Code</th>
      <th class="col-md-3">Name</th>
      <th class="col-md-1">Quantity</th>
      <th class="col-md-2">Unit</th>
<th class="col-md-1">Price</th>
<th class="col-md-1">Total</th>
   
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
        <span id="quantity-{{$itemlist->item_code}}">{{$itemlist->quantity}}</span>

      </td>
       <td>
        <span >{{$itemlist->unit}}</span>

      </td>
      <td>
        <span >   <input type="text" class="form-control priceitem" name="{{$itemlist->item_code}}" id="{{$itemlist->item_code}}" autofocus
        value="{{$itemlist->price_sell}}"></span>

      </td>
  <td>
        <span id="totalprice-{{$itemlist->item_code}}">{{$itemlist->price_sell*$itemlist->quantity}}</span>

      </td>
    </tr>
<?php
$total+=$itemlist->price_sell*$itemlist->quantity;
?>

    @endforeach






</td>
</tr>

</tbody>
     <input type="hidden" value="@{{total}}" name="total" id="total">
 <input type="hidden" ng-if="appkeys.length != 0" value="@{{appkeys | json}}" name="item_list" id="item_list">



</table>
 <div class="form-group col-md-10 pull-right">
      <label for="Invoice" class="col-md-12 control-label">
       <h3><b>Total Transaction</b> <span id="totalprice">{{$total}}</span> </h3>
      </label>
    
    </div>


