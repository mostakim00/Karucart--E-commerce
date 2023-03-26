@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 User | Manage | KaruKart 
@endsection
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>@yield('title')</h4>
            <p class="mg-b-0">Hey! Hello There Welcome To Our MultiVenDor Ecommerce Dashboard !</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="card">
            <div class="card-header">
                <h4>Total {{ count($users) }} User
                    <a class="btn btn-info btn-sm" href="" style="float: right;" data-toggle="modal"
                        data-target="#userInsertModal"> <i class="icon ion-plus-round"></i> Add User</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table id="datatable" class="table">
                        <thead>
                            <tr>
                                <th class="wd-20p">Name</th>
                                <th class="wd-20p">Email</th>
                                <th class="wd-20p">Phone</th>
                                <th class="wd-10p">Role</th>
                                <th class="wd-20p">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td><span class="badge badge-primary">{{ $user->role['role_name'] }}</span></td>
                                    @if (Auth::user()->id === $user->id)
                                        <td>
                                            <a class="tx-gray-800 d-inline-block">
                                                <div
                                                    class="ht-45 pd-x-20 bd d-flex align-items-center justify-content-center">
                                                    <span class="mg-r-10 tx-13 tx-medium text-success">Current User</span>
                                                </div>
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <div class="dropdown">
                                                <a href="" class="tx-gray-800 d-inline-block" data-toggle="dropdown">
                                                    <div
                                                        class="ht-45 pd-x-20 bd d-flex align-items-center justify-content-center">
                                                        <span class="mg-r-10 tx-13 tx-medium">Manage</span>
                                                        <i class="fa fa-angle-down mg-l-10"></i>
                                                    </div>
                                                </a>
                                                @if (Auth::user()->role_id == $user->role_id)
                                                    <div class="dropdown-menu pd-10 wd-200">
                                                        <nav class="nav nav-style-1 flex-column">
                                                            <a class="nav-link">
                                                                Same Permition
                                                            </a>
                                                        </nav>
                                                    </div><!-- dropdown-menu -->
                                                @else
                                                    <div class="dropdown-menu pd-10 wd-200">
                                                        <nav class="nav nav-style-1 flex-column">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#passwordModal{{ $user->id }}"
                                                                class="nav-link"><i class="icon ion-unlocked"></i>
                                                                Change Password
                                                            </a>

                                                            <a href="#" data-toggle="modal"
                                                                data-target="#userUpdateModal{{ $user->id }}"
                                                                class="nav-link"><i class="icon ion-edit"></i>
                                                                Edit</a>
                                                            @if (Auth::user()->role_id === 1)
                                                                <a id="delete" href="#" class="nav-link">
                                                                    <i class="icon ion-ios-trash"></i>
                                                                    Delete
                                                                </a>
                                                            @endif
                                                        </nav>
                                                    </div><!-- dropdown-menu -->
                                                @endif
                                            </div><!-- dropdown -->
                                        </td>
                                    @endif
                                </tr>
                                <!-- Password Change Modal -->
                                <div class="modal fade" id="passwordModal{{ $user->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content bd-0">
                                            <div class="modal-header pd-y-20 pd-x-25">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <strong>{{ $user->name }}</strong> Password Changes
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.user.password.change') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <div class="modal-body pd-25">
                                                    <div class="form-layout form-layout-1">
                                                        <div class="row mg-b-25">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">New Password: <span
                                                                            class="tx-danger">*</span></label>
                                                                    <input class="form-control" type="password"
                                                                        name="newpassword" placeholder="New Password">
                                                                    @error('newpassword')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div><!-- col-4 -->
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Confirm Password:
                                                                        <span class="tx-danger">*</span></label>
                                                                    <input class="form-control" type="password"
                                                                        name="newpassword_confirmation"
                                                                        placeholder="Confirm Password">
                                                                </div>
                                                            </div><!-- col-4 -->
                                                        </div><!-- row -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info">Password Changes</button>
                                                    <button type="button"
                                                        class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- User Update Modal -->
                                <div class="modal fade" id="userUpdateModal{{ $user->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content bd-0">
                                            <div class="modal-header pd-y-20 pd-x-25">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $user->name }}
                                                    Information Update</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body pd-25">
                                                    <div class="form-layout form-layout-1">
                                                        <div class="row mg-b-25">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">User Name: <span
                                                                            class="tx-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="name" value="{{ $user->name }}"
                                                                        placeholder="Name">
                                                                </div>
                                                            </div><!-- col-4 -->
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">User Email: <span
                                                                            class="tx-danger">*</span></label>
                                                                    <input class="form-control" type="email"
                                                                        name="email" value="{{ $user->email }}"
                                                                        placeholder="Email">
                                                                </div>
                                                            </div><!-- col-4 -->
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">User Phone: <span
                                                                            class="tx-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="phone" value="{{ $user->phone }}"
                                                                        placeholder="Phone">
                                                                </div>
                                                            </div><!-- col-4 -->
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-control-label">User NID:(10
                                                                        Digit) <span class="tx-danger">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="nid" value="{{ $user->nid }}"
                                                                        placeholder="NID">
                                                                </div>
                                                            </div><!-- col-4 -->
                                                        </div><!-- row -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info">Update User</button>
                                                    <button type="button"
                                                        class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div>
        </div>
    </div><!-- br-pagebody -->

    <!-- User Insert Modal -->
    <div class="modal fade" id="userInsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content bd-0">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    <div class="modal-body pd-25">
                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">User Name: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ old('name') }}" placeholder="Name">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">User Email: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">User Phone: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone"
                                            value="{{ old('phone') }}" placeholder="Phone">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Password: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="password" name="password"
                                            value="{{ old('password') }}" placeholder="Password">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                                        <select name="role_id" class="form-control">
                                            <option value="2">Admin</option>
                                            <option value="3">Vendor</option>
                                        </select>
                                    </div>
                                </div><!-- col-4 -->
                            </div><!-- row -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Add User</button>
                        <button type="button"
                            class="btn btn-secondary tx-mont tx-medium tx-11 tx-uppercase pd-y-12 pd-x-25 tx-spacing-1"
                            data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            'use strict';
            $('#datatable').DataTable();
        });
    </script>
@endsection
