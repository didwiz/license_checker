@extends('layout.main')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">All Licenses</h4>
                            <p class="category">States & Licenses</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>State</th>
                                <th>License Number</th>
                                <th>Expiration Date</th>
                                <th>Status</th>
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
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
