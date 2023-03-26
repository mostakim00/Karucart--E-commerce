@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Coupon | Edit | KaruKart 
@endsection
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
    <h4>@yield('title')</h4>
        <p class="mg-b-0">Hey! From here you can Edit Coupon !</p>
    </div>
</div>

<div class="br-pagebody">
    <div class="row row-sm">
       <div class="col-md-12">
            <div class="card p-3 shadow-base">
            	<form action="{{ Route('admin.coupon.update',$coupon->id) }}" method="post">
                @csrf
          		<div class="row">
          			<div class="col-md-6">
          				<div class="form-group">
          					<label for="coupon_code">Coupon_Code</label>
          					<input type="text" class="form-control"  name="coupon_code" id="coupon_code" value="{{ $coupon->coupon_code}}"  readonly>
          				</div>
                        <div class="form-group">
          					<label for="discount_amount">Discount Amount</label>
          					<input type="text" class="form-control" placeholder="Enter Discount Amount" name="discount_amount" id="discount_amount" value="{{ $coupon->discount_amount}}">
          					<span class="text-danger">
                                @error('discount_amount')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                          <div class="form-group">
          					<label for="vendor_id">User Id</label>
          					<input type="text" class="form-control" name="vendor_id" id="vendor_id" value="{{ $coupon->vendor_id}}" readonly>
                        </div>
                   </div>
                   <div class="col-md-6">
          				<div class="form-group">
          					<label for="start_at">Start date</label>
          					<input type="text" class="form-control" placeholder="Enter Start date" name="start_at" id="start_at" value="{{ $coupon->start_at}}">
          					<span class="text-danger">
                                @error('start_at')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                          <div class="form-group">
          					<label for="end_at">End date</label>
          					<input type="text" class="form-control" placeholder="Enter End date" name="end_at" id="end_at" value="{{ $coupon->end_at}}">
          					<span class="text-danger">
                                @error('end_at')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                          <div class="form-group">
          					<label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
          					    <option value="">select status</option>
          						<option value="1" @if ($coupon->status==1) selected  @endif>Active</option>
          						<option value="2" @if ($coupon->status==2) selected  @endif>Inactive</option>
          					</select>
          					<span class="text-danger">
                                @error('status')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                   </div>
                   <div class="col-md-6 offset-md-3">
                        <div class="form-group">
          				    <button class="form-control btn btn-info">Update Coupon</button>
          			    </div>
          		    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- br-pagebody -->
<script>
   $(function(){
    $("#start_at").datepicker();
   }) 
   $(function(){
    $("#end_at").datepicker();
   }) 
</script>   
@endsection