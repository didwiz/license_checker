@extends('layout.main')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($licenses_stat as $key=>$val)
                    @if($key == "No License Found" || $key == "License Expiring Soon" || $key == "License Valid")
                        @continue
                    @endif
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        @switch($key)
                                        @case($key == "License Expired")
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-stats-down"></i>
                                        </div>
                                        @break
                                        @case($key == "License Revoked")
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-na"></i>
                                        </div>
                                        @break
                                        @case($key == "License Invalid")
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-trash"></i>
                                        </div>
                                        @break
                                        @case($key == "License Active")
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-check-box"></i>
                                        </div>
                                        @break
                                            @endswitch
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>{{ $key }}</p>
                                            {{ $val }}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">All Licenses</h4>
                            <p class="category">States & Licenses</p>
                        </div>
                        <div style="padding: 20px;">
                            <form method="post" action="/license/sendreport">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-input" name="email" placeholder="Enter Email Address" value="testmail@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-fill btn-wd">Send Report</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>State</th>
                                <th>License Number</th>
                                <th>Expiration Date</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($licenses as $license)
                                    <tr>
                                        <td>{{ $license->id }}</td>
                                        <td>{{ $license->state->name }}</td>
                                        <td>{{ $license->number }}</td>
                                        <td>{{ $license->expiry_date }}</td>
                                        @if( $license->status == "License Active")
                                            <td style="color:green"><i class="fas fa-check-circle"></i>&ensp;&ensp;{{ $license->status }}</td>
                                        @elseif( $license->status == "License Expiring Soon" )
                                            <td style="color:saddlebrown"><i class="fas fa-check-circle"></i>&ensp;&ensp;{{ $license->status }}</td>
                                        @else
                                            <td style="color:red"><i class="fas fa-times-circle"></i>&ensp;&ensp;{{ $license->status }}</td>
                                        @endif
                                        <td><a class="btn btn-default btn-sm" href="/license/edit/{{ $license->id }}">Edit</a></td>
                                        <td><a class="btn btn-danger btn-sm" href="/license/revoke/{{ $license->id }}">Revoke License</a></td>
                                    </tr>
                                @endforeach
                                <tr><td align="right">{{ $licenses->links() }}</td></tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection