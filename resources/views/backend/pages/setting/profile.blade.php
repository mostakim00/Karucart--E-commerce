@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Profile | Setting | KaruKart 
@endsection
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
        <h4>@yield('title')</h4>
            <p class="mg-b-0">Hey! Hello There Welcome To Our MultiVenDor Ecommerce Dashboard !</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row">
            <div class="col-lg-6 py-0">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-dark mb-0">User Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="name" type="text" class="form-control" placeholder="Name"
                                        value="{{ $user->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="email" disabled type="email" class="form-control" placeholder="Email"
                                        value="{{ $user->email }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Phone: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="phone" type="text" class="form-control" placeholder="Phone"
                                        value="{{ $user->phone }}">
                                </div>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">NID: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="nid" type="text" class="form-control" placeholder="NID"
                                        value="{{ $user->nid }}">
                                    @error('nid')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-layout-footer mg-t-30 text-right">
                                <button class="btn btn-info"><i class="icon ion-loop"></i> Update</button>
                            </div>
                            <!-- form-layout-footer -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 py-0">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-dark mb-0">Password Changes</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.password.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Old Password: <span
                                        class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="old_password" type="password" class="form-control"
                                        placeholder="Old Password">
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">New Password: <span
                                        class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="newpassword" type="password" class="form-control"
                                        placeholder="New Password">
                                    @error('newpassword')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Confirm Password: <span
                                        class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input name="newpassword_confirmation" type="password" class="form-control"
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-layout-footer mg-t-30 text-right">
                                <button type="submit" class="btn btn-info"><i class="icon ion-locked"></i> Update</button>
                            </div>
                            <!-- form-layout-footer -->
                        </form>
                    </div>
                </div>
            </div>

            @if (Auth::user()->role_id == 3)
                <div class="col-lg-6 py-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-dark mb-0">Payment Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.profile.payment.update', $user->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <label class="col-sm-4 form-control-label">Bkash: <span
                                            class="tx-danger">*</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input name="bkash" type="number" class="form-control"
                                            placeholder="Bkash Number" value="{{ $user->bkash }}">
                                        @error('bkash')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- row -->
                                <div class="row mg-t-20">
                                    <label class="col-sm-4 form-control-label">Rocket: <span
                                            class="tx-danger">*</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input name="rocket" type="number" class="form-control"
                                            placeholder="Rocket Number" value="{{ $user->rocket }}">
                                        @error('rocket')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mg-t-20">
                                    <label class="col-sm-4 form-control-label">Nagad: <span
                                            class="tx-danger">*</span></label>
                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                        <input name="nagad" type="number" class="form-control"
                                            placeholder="Nagad Number" value="{{ $user->nagad }}">
                                        @error('nagad')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-layout-footer mg-t-30 text-right">
                                    <button class="btn btn-info"><i class="icon ion-loop"></i>
                                        Update</button>
                                </div>
                                <!-- form-layout-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-lg-6 py-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-dark mb-0">Profile Image</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.image.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_photo" value="{{ $user->photo }}">
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Photo: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input id="inputImage" class="form-control" type="file" name="photo">
                                </div>
                            </div><!-- row -->
                            <div class="row mg-t-20 d-flex justify-content-center">
                                @if (File::exists($user->photo))
                                    <img id="showImage" style="width: 150px;" class="img-fluid img-thumbnail"
                                        src="{{ asset($user->photo) }}" alt="Profile Image">
                                @else
                                    <img id="showImage" style="width: 150px;" class="img-fluid img-thumbnail"
                                        src="{{ asset('default/no-image.jpg') }}" alt="Profile Image">
                                @endif
                            </div>
                            <div class="form-layout-footer mg-t-30 text-right">
                                <button class="btn btn-info"><i class="icon ion-loop"></i>
                                    Update Image</button>
                            </div>
                            <!-- form-layout-footer -->
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- br-pagebody -->
@endsection
