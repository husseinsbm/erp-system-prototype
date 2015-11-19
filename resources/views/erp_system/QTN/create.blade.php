@extends('erp_system.admin_template')






@section('content')

<div ng-app="myApp">
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Process QTN</small></h3>
      </div>
    </div>

    <div class="row" ng-controller="ArrayController">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">QTN Form</h3>
          </div>
          <div class="panel-body">

            @include('erp_system.partials.errors')

            <form class="form-horizontal" role="form" method="POST"
            action="{{ route('erp_system.qtn.store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('erp_system.qtn._formcreate')

<div class="form-group col-md-12">
    <input type="hidden" name="rfq_id" value="{{ $rfq->id }}">
     <button type="submit" class="btn btn-success btn-lg pull-right">
                    <i class="fa  fa-check-circle-o"></i>
                    Save New RFQ
                  </button>
    </div>


        </form>

      </div>
    </div>
  </div>
</div>
</div>
</div>
<script >
$('.priceitem').keyup(function(){
  id=$(this).attr('id');
oldtotal=$('#totalprice-'+id).text();
newtotal=$(this).val()*$("#quantity-"+id).text();
 $('#totalprice-'+id).text(newtotal);

  $('#totalprice').text($('#totalprice').text()-oldtotal+newtotal)
});
$('#delivery_cost').keyup(function(){

  })
  $('#customer').on('change', function() {
    $("#customer option:selected").each(function () {
      $("#email").val($(this).attr('email'));
      $("#phone").val($(this).attr('phone'));
      $("#attn").val($(this).attr('attn'));

    })
  });
  $('.datepicker').datepicker({
    clearBtn: true,
    todayHighlight: true,
    autoclose: true,
    format: "yyyy-m-d",

  });

  $('.datepicker').datepicker('setDate', new Date());
  $('.datepicker').datepicker('update');

  $('.spinner').TouchSpin({
    verticalbuttons: true,
    max:10000,
  });

  $('#input_q').on('touchspin.on.startspin',function(){

    $("#input_total").val( Number($("#input_price").val()) * Number($("#input_q").val()) )
  })

  $('#input_q').keyup(function() {
    if (this.value.match(/[^0-9]/g)) {
      this.value = this.value.replace(/[^0-9]/g, '');

    }
    else{
     $("#input_total").val( Number($("#input_price").val()) * Number($("#input_q").val()) )
   }

 });
</script>


@stop

@section('scripts')
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" ></script>
<script src="{{ asset("/bower_components/selectize.js-master/dist/js/standalone/selectize.js")}}"></script>
<script src="{{ asset("/bower_components/selectize.js-master/examples/js/index.js")}}"></script>
<script src="{{ asset("/bower_components/angular/angular.min.js")}}"></script>
<script src="{{ asset("/bower_components/angular-xeditable/dist/js/xeditable.min.js")}}" ></script>

<script src="{{ asset("/bower_components/angucomplete-alt/dist/angucomplete-alt.min.js")}}" ></script>
<script src="{{ asset("/js/rfq_angular.js")}}" ></script>
<script src="{{ asset('/bower_components/booststrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/bower_components/bootstrap-touchspin-master/dist/jquery.bootstrap-touchspin.min.js') }}"></script>


@stop

@section('styles')
<link  href="{{ asset("/bower_components/selectize.js-master/dist/css/selectize.bootstrap3.css")}}" rel="stylesheet"/>


<link rel="stylesheet"  href="{{ asset("/bower_components/angucomplete-alt/dist/angucomplete-alt.css")}}" />

<link href="{{ asset("/bower_components/angular-xeditable/dist/css/xeditable.css")}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('/bower_components/booststrap-datepicker/css/bootstrap-datepicker.min.css') }}" media="screen" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="{{ asset('/bower_components/bootstrap-touchspin-master/dist/jquery.bootstrap-touchspin.min.css') }}" media="screen" type="text/css" />
@stop
