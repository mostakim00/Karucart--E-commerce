@extends('frontend.master_template.template')
@section('body')
@section('title')
    Register || Karukart
@endsection

<!-- breadcrumb_section - start
            ================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>Register</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
            ================================================== -->
<section class="register_section section_space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <ul class="nav register_tabnav ul_li_center" role="tablist">
                    <li role="presentation">
                        <button><a href="{{ route('login') }}">Sign In</a></button>
                    </li>
                    <li role="presentation">
                        <button class="active">Register</button>
                    </li>
                </ul>
                <div class="register_wrap tab-content">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form_item_wrap">
                            <h3 class="input_title">User Name*</h3>
                            <div class="form_item">
                                <label for="username_input2"><i class="fas fa-user"></i></label>
                                <input name="name" type="text" value="{{ old('name') }}"
                                    class="@error('name') is-invalid @enderror" placeholder="Enter Your Name">
                            </div>
                            @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="form_item_wrap">
                            <h3 class="input_title">Email*</h3>
                            <div class="form_item">
                                <label for="email_input"><i class="fas fa-envelope"></i></label>
                                <input name="email" type="email" value="{{ old('email') }}"
                                    class="@error('email') is-invalid @enderror" placeholder="Enter Your Email">
                            </div>
                            @if ($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form_item_wrap">
                            <h3 class="input_title">Phone*</h3>
                            <div class="form_item">
                                <label for="email_input"><i class="fas fa-envelope"></i></label>
                                <input name="phone" type="text" value="{{ old('phone') }}"
                                    class="@error('phone') is-invalid @enderror" placeholder="Enter Your Phone">
                            </div>
                            @if ($errors->has('phone'))
                                <div class="text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>

                        <div class="form_item_wrap">
                            <h3 class="input_title">User Role* </h3>
                            <div class="select_option clearfix">
                                <select id="role_id" name="role_id" style="display: none; border: 1px solid #dddfe1;">
                                    <option value="">Select Role</option>
                                    <option value="4">User</option>
                                    <option value="3">Vendor</option>
                                </select>
                            </div>
                            @if ($errors->has('role_id'))
                                <div class="text-danger">{{ $errors->first('role_id') }}</div>
                            @endif
                        </div>

                        <div class="form_item_wrap">
                            <h3 class="input_title">Password*</h3>
                            <div class="form_item">
                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                <input name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter Your Password">
                            </div>
                            @if ($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>


                        <div class="form_item_wrap">
                            <h3 class="input_title">Confirm Password*</h3>
                            <div class="form_item">
                                <label for="password_input2"><i class="fas fa-lock"></i></label>
                                <input name="password_confirmation" id="password_confirmation" type="password"
                                    class="form-control" placeholder="Enter Your Confirm Password">
                            </div>
                        </div>

                        <div class="form_item_wrap">
                            <button type="submit" class="btn btn_secondary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>












@endsection
