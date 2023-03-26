@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Setting | Manage | KaruKart 
@endsection
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>@yield('title')</h4>
        <p class="mg-b-0">Hey! Hello There Welcome To Our MultiVenDor Ecommerce Dashboard !</p>
    </div>
</div>

<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card p-3 shadow-base">
                <form action="{{Route('settingup')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" placeholder="Enter company name"
                                    name="company_name" id="company_name" value="{{$setting->company_name}}">
                            </div>
                            <div class="form-group">
                                <label for="company_phone">Company Phone</label>
                                <input type="text" class="form-control" placeholder="Enter phone number"
                                    name="company_phone" id="company_phone" value="{{$setting->company_phone}}">
                            </div>

                            <div class="form-group">
                                <label for="file">Company logo </label>
                                <input class="form-control" type="file" id="pic" name="pic">
                                <div class="text-center mt-4">
                                    <img width="150" id="pic" src="{{ asset('backend/logo/'.$setting->pic) }}"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="youtube_link">You Tube Link</label>
                                <input type="text" class="form-control" placeholder="Enter You tube link"
                                    name="youtube_link" id="youtube_link" value="{{$setting->youtube_link}}">
                            </div>
                            <div class="form-group">
                                <label for="instagram_link">Instagram Link</label>
                                <input type="text" class="form-control" placeholder="Enter Instragram Link"
                                    name="instagram_link" id="instagram_link" value="{{$setting->instagram_link}}">
                            </div>
                            <div class="form-group">
                                <label for="twitter_link">Twitter Link</label>
                                <input type="text" class="form-control" placeholder="Enter twitter link"
                                    name="twitter_link" id="twitter_link" value="{{$setting->twitter_link}}">
                            </div>
                            <div class="form-group">
                                <label for="facebook_link">Facebook Link</label>
                                <input type="text" class="form-control" placeholder="Enter facebook Link"
                                    name="facebook_link" id="facebook_link" value="{{$setting->facebook_link}}">
                            </div>
                            <div class="form-group">
                                <label for="linkedin_link">Linkedin Link</label>
                                <input type="text" class="form-control" placeholder="Enter Linkin Link"
                                    name="linkedin_link" id="linkedin_link" value="{{$setting->linkedin_link}}">
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
@endsection