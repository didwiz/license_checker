@extends('layout.main')

@section('content')
    <div class="row" style="margin-top: 5%; margin-left: 2%">
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title">Add New Admin</h4>
                </div>
                <div class="content">
                    <form method="post" name="add_license" action="/user/admin/add">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>UserName</label>
                                    <input type="text" required class="form-control border-input" name="name"
                                           placeholder="username"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" required class="form-control border-input" name="email" placeholder="Enter Email Address"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" required class="form-control border-input" name="password"
                                           placeholder="Enter password"
                                    >
                                </div>
                            </div>
                        </div>

                        {{--<div class="row">--}}
                            {{--<div class="col-md-4">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label>Password Confirm</label>--}}
                                    {{--<input type="password" required class="form-control border-input" name="password_confirm"--}}
                                           {{--placeholder="Confirm password"--}}
                                    {{-->--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="text-left">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">
                                Create Admin
                            </button>
                            {{--<input type="submit" class="btn btn-info btn-fill btn-wd" value="Update License">--}}
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection