@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Role | Manage | KaruKart 
@endsection
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
        <h4>@yield('title')</h4>
            <p class="mg-b-0">Hey! Hello There Welcome To Our MultiVenDor Ecommerce Dashboard !</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Total {{ count($roles) }} Roles</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-wrapper">
                            <table id="datatable" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ $role->role_name }}</td>
                                            <td>{{ $role->role_comments }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- br-pagebody -->

    <script>
        $(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
