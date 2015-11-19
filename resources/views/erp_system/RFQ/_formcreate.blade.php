<div class="row">

   <div class="col-xs-6">
    <div class="form-group">
      <label for="Number" class="col-md-2 control-label">
       RFQ No.
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="number" id="number" autofocus
        id="title" value="{{$rfq->id+1}}/RFQ/{{date('m/Y')}}">
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
      <label for="Number" class="col-md-2 control-label">
      Note
      </label>
     
      <div class="col-md-8">
        <input type="text" class="form-control" name="note" id="note" autofocus
        id="title" value="">
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
  
               <option value="{{$customerlist->id}}" email="{{$customerlist->email}}" phone="{{$customerlist->phone}}" attn="{{$customerlist->attn}}" >{{$customerlist->name}}</option>

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
         value="">
      </div>
    </div>
    <div class="form-group">
      <label for="phone" class="col-md-2 control-label">
      Contact
      </label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="phone" id="phone" autofocus
         value="">
      </div>
    </div>
    <div class="form-group">
      <label for="attn" class="col-md-2 control-label">
      Email
      </label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="email" id="email" autofocus
         value="">
      </div>
    </div>
  

</div>

       <div class="col-xs-6">
  <div class="form-group">

  <label for="Itemlist" class="col-md-2 control-label">
   Input Item
 </label>
  <div class="col-md-8">
  <div angucomplete-alt id="ex1" name="input_name" autofocus id="input_name"  placeholder="Item Name" maxlength="50" pause="100" search-fields="name,item_code" title-field="item_code" description-field="name" selected-object="selectedItem"  remote-url="{{url('erp_system/rfq/getitemrfq')}}"  remote-url-request-formatter="remoteUrlRequestFn" remote-url-data-field="results"   minlength="2" input-class="form-control form-control-small" match-class="highlight">
          </div>
  </div>
</div>
</div>
</div>

<div class="alert alert-warning" ng-if="message!=''">
  @{{message}}
</div>
<table id="new-item-table" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="col-md-2">  
    
         <input type="text" class="form-control" name="input_code" autofocus id="input_code" value="" ng-model="selectedItem.originalObject.item_code"  placeholder="Item Code" disabled="disabled" />
      
      </th>
      <th class="col-md-3">
      <input type="text" class="form-control" name="input_name" autofocus id="input_name" value="" ng-model="selectedItem.originalObject.name"  placeholder="Item Name" disabled="disabled" />
     
     </th>
     <th class="col-md-2">

       <input type="text"  class="form-control spinner" name="quantity" autofocus id="input_q"  value="" ng-model="inputQuantity" >
       </div>

 
          </th>
     <th class="col-md-2">
      <input type="text" class="form-control" name="unit" autofocus id="unit" value="" ng-model="selectedItem.originalObject.unit"  placeholder="Unit" disabled="disabled" />
    </th>

    <th data-sortable="false" class="col-md-2"> 
      <button type="button" class="btn btn-primary" data-ng-click="newField()">
        <i class="fa fa-disk-o"></i>
        Add to List
      </button></th>
    </tr>

  </thead>
</table>



<table id="posts-table" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="col-md-2">Item Code</th>
      <th class="col-md-3">Name</th>
      <th class="col-md-1">Quantity</th>
      <th class="col-md-2">Unit</th>

      <th data-sortable="false" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>

 <tr data-ng-repeat="(key,entry) in appkeys" >
       
        <td>
            <span data-ng-hide="editMode">@{{entry.code}}</span>
            <input type="text"  class="form-control" data-ng-show="editMode" data-ng-model="entry.code" data-ng-required />
        </td>
        <td>
            <span data-ng-hide="editMode">@{{entry.name}}</span>
            <input type="text" class="form-control" data-ng-show="editMode" data-ng-model="entry.name" data-ng-required />
        </td>
        <td>
            <span data-ng-hide="editMode">@{{entry.quantity}}</span>
           <input type="text" class="form-control" data-ng-show="editMode" data-ng-model="entry.quantity"  data-ng-required />
        </td>
        <td>
            <span data-ng-hide="editMode">@{{entry.unit}}</span> 
           <input type="text" class="form-control" data-ng-show="editMode" data-ng-model="entry.unit" data-ng-required />
        </td>
      
       
                  <td>

                  <a
                     class="btn btn-xs btn-danger" data-ng-click="deleteItem(key)">
                    <i class="fa fa-remove"></i> Delete
                  </a>
                </td>
        
</tr>
          </button>
   
       
      </td>
    </tr>
     <input type="hidden" value="@{{total}}" name="total" id="total">
 <input type="hidden" ng-if="appkeys.length != 0" value="@{{appkeys | json}}" name="item_list" id="item_list">

</tbody>

</table>



