@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Coupon | Added | KaruKart 
@endsection
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>



<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
    <h4>@yield('title')</h4>
        <p class="mg-b-0">Hey! This is Coupon Add Page !</p>
    </div>
</div>

<div class="br-pagebody">
    <div class="row row-sm">
       <div class="col-md-12">
            <div class="card p-3 shadow-base">
            	<form action="{{ Route('admin.coupon.add') }}" method="post">
                @csrf
          		<div class="row">
          			<div class="col-md-6">
          				<div class="form-group">
          					<label for="coupon_code">Coupon_Code</label>
          					<input type="text" class="form-control" placeholder="Enter Coupon Code" name="coupon_code" id="coupon_code" value="{{ old('coupon_code')}}">
                            <span class="text-danger">
                            @error('coupon_code')
                            {{$message}}
                            @enderror
                            </span>
          				</div>
                        <div class="form-group">
          					<label for="discount_amount">Discount Amount</label>
          					<input type="text" class="form-control" placeholder="Enter Discount Amount" name="discount_amount" id="discount_amount" value="{{ old('discount_amount')}}">
                            <span class="text-danger">
                            @error('discount_amount')
                            {{$message}}
                            @enderror
                            </span>
          				</div>
                          <div class="form-group" hidden>
          					<label for="vendor_id">Vendor Id</label>
          					<input type="text" class="form-control"  name="vendor_id" id="vendor_id" value="{{ Auth::user()->id }}">
          				</div>
          				<div class="form-group">
          					<label for="status">Status</label>
                            <select class="form-control" name="status" id="status" value="{{ old('status')}}">
          					    <option value="">select status</option>
          						<option value="1">Active</option>
          						<option value="2">Inactive</option>
          					</select>
                            <span class="text-danger">
                            @error('status')
                            {{$message}}
                            @enderror
                            </span>
          				</div>
                   </div>
                   <div class="col-md-6">
          				<div class="form-group">
          					<label for="start_at">Start date</label>
          					<input type="date" class="form-control" placeholder="Enter Start date" name="start_at" id="datepicker" value="{{ old('start_at')}}">
                            <span class="text-danger">
                            @error('start_at')
                            {{$message}}
                            @enderror
                            </span>
          				</div>
                          <div class="form-group">
          					<label for="end_at">End date</label>
          					<input type="date" class="form-control" placeholder="Enter End date" name="end_at" id="datepicker2" value="{{ old('end_at')}}">
                            <span class="text-danger">
                            @error('end_at')
                            {{$message}}
                            @enderror
                            </span>
          				</div>
          				<br>
          				<div class="form-group">
          				    <button class="form-control btn btn-info">Add Coupon</button>
          			    </div>
                          
                   </div>
                        
                </div>
            </div>
        </div>
    </div>
</div><!-- br-pagebody -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- <script>
    
    $(function(){
        'use strict';

   $(function(){
    $("#start_at").datepicker();
   }) 
   $(function(){
    $("#end_at").datepicker();
   }) 
   // Datepicker
   $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
    });
</script>    -->
<script>  
    $(function() {
        $( "#datepicker" ).datepicker();
    }); 

    $(function() {
        $( "#datepicker2" ).datepicker();
    });      
</script>
@endsection