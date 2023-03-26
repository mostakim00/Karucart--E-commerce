@extends('frontend.master_template.template')
@section('body')
    @section('title')
    Login || Karukart
    @endsection

 <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- register_section - start
            ================================================== -->
            <section class="register_section section_space">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <ul class="nav register_tabnav ul_li_center" role="tablist">
                                <li role="presentation">
                                    <button class="active">Sign In</button>
                                </li>
                                <li role="presentation">
                                    <button><a href="{{route('register')}}">Register</a></button>
                                </li>
                            </ul>

                            <div class="register_wrap tab-content">
                                <div class="tab-pane fade show active" id="signin_tab" role="tabpanel">
                                    <form action="{{ route('login') }}" method="post">
                                      @csrf
                                        <div class="form_item_wrap">
                                            <h3 class="input_title">User Email*</h3>
                                            <div class="form_item">
                                                <label for="username_input"><i class="fas fa-user"></i></label>
                                                <input name="email" type="email" value="{{ old('email') }}"  class="@error('email') is-invalid @enderror" placeholder="Enter User Email">
                                                @if ($errors->has('email'))
                                               <div class="text-danger">{{ $errors->first('email') }}</div> @endif
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <h3 class="input_title">Password*</h3>
                                            <div class="form_item">
                                                <label for="password_input"><i class="fas fa-lock"></i></label>
                                                <input name="password" type="password"
                                                    class="form-control fc-outline-dark @error('password') is-invalid @enderror"
                                                    placeholder="Enter Your Password">
                                                @if ($errors->has('password'))
                                                <div class="text-danger">{{ $errors->first('password') }}</div> @endif
                                            </div>
                                            <div class="checkbox_item">
                                                <input id="remember_checkbox" type="checkbox">
                                                <label for="remember_checkbox">Remember Me</label><span></span>
                                                <a href="{{ route('password.request') }}" class="text-danger tx-12 mt-2">Forgot password?</a>
                                            </div>
                                        </div>

                                        <div class="form_item_wrap">
                                            <button type="submit" class="btn btn_primary">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- register_section - end
            ================================================== -->














@endsection