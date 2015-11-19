@extends('erp_system.admin_template')






@section('content')

<div ng-app="myApp">
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>View RFQ</small></h3>
      </div>
    </div>

    <div class="row" ng-controller="ArrayController">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">RFQ Form</h3>
          </div>
          <div class="panel-body">

            @include('erp_system.partials.errors')

            <form class="form-horizontal" role="form" method="POST"
            >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_method" value="PUT">
            @include('erp_system.rfq._formupdate')



            <div class="col-md-8">
              <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                <!--   <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fa fa-disk-o"></i>
                    Update Sellings
                  </button> -->
                </div>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script >



  $('.datepicker').datepicker({
    clearBtn: true,
    todayHighlight: true,
    autoclose: true,
    format: "yyyy-m-d",
  });




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
<script src="{{ asset("/bower_components/angular/angular.min.js")}}"></script>
<script src="{{ asset("/bower_components/angular-xeditable/dist/js/xeditable.min.js")}}" ></script>
<script src="{{ asset("/js/selling_angular.js")}}" ></script>
<script src="{{ asset('/bower_components/booststrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/bower_components/bootstrap-touchspin-master/dist/jquery.bootstrap-touchspin.min.js') }}"></script>


@stop

@section('styles')
<link href="{{ asset("/bower_components/angular-xeditable/dist/css/xeditable.css")}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/bower_components/booststrap-datepicker/css/bootstrap-datepicker.min.css') }}" media="screen" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="{{ asset('/bower_components/bootstrap-touchspin-master/dist/jquery.bootstrap-touchspin.min.css') }}" media="screen" type="text/css" />
@stop
