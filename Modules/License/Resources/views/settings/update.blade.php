@extends('layout.main')

@section('content')
    <div class="row" style="margin-top: 5%; margin-left: 2%">
        <div class="col-lg-8 col-md-7" >
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Email</h4>
                </div>
                <div class="content">
                    <form method="post" name="add-email" action="/settings/edit/{{$mail->id}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Owner</label>
                                    <input type="text" class="form-control border-input" name="name"
                                           placeholder="Enter email owner's name" value="{{ $mail->name }}"  required
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control border-input" name="email"
                                           placeholder="Enter email address" value="{{ $mail->email }}" required
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-left" style="margin-left: 10%">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">
                                    Update Email
                                </button>
                                {{--<input type="submit" class="btn btn-info btn-fill btn-wd" value="Update License">--}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection