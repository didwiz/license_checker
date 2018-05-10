@extends('layout.main')

@section('content')
    <div class="row" style="margin-top: 5%; margin-left: 2%">
    <div class="col-lg-8 col-md-7" >
    <div class="card">
        <div class="header">
            <h4 class="title">Edit License</h4>
        </div>
        <div class="content">
            <form method="post" name="data" action="/license/update/{{$license->id}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>License Name</label>
                            <input type="text" class="form-control border-input" name="name" disabled placeholder="License Name"
                                   value="{{ $license->name }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>License Number</label>
                            <input type="text" class="form-control border-input" name="number" placeholder="License Number"
                                   value="{{ $license->number }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>State</label>
                            <select class="form-control border-input" name="state_id">
                                @foreach($states as $state)
                                    @if($license->state_id == $state->id)
                                        <option selected value="{{ $state->id }}">{{$state->name}}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{$state->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>License Status</label>
                            <select class="form-control border-input" name="status">

                                @foreach($status as $key=>$value)
                                    @if($value === $license->status)
                                        <option selected value={{$key}}>{{$value}}</option>
                                    @else
                                        <option value={{$key}}>{{$value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>License Expiration Date</label>

                            <input type="date" name="expiry_date" class="form-control border-input" value="{{$license->expiry_date}}">
                        </div>
                    </div>
                </div>
                <div class="text-left">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">
                        Update License
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