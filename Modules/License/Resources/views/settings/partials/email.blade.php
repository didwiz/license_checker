    <div class="col-lg-6 col-md-7">

        <div class="card">
            <div class="header">
                <h4 class="title">Manage Admin Mailing List</h4>
            </div>
            <div class="content">
                <ul class="list-unstyled team-members">
                    @foreach($mailing_list as $key=>$value)
                    <li>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="avatar">
                                    <img src="{{ asset("assets/img/faces/face-3.jpg") }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <b>{{ $value->name }} : {{ $value->email }}</b>
                                {{--<br />--}} &nbsp;&nbsp;
                                <span class="ti-email"></span>
                            </div>

                            <div class="col-xs-3 text-right">
                                <a  href="/settings/update/{{$value->id}}" class="btn btn-sm btn-warning btn-icon"><i>Edit</i></a>&nbsp;
                                <a  href="/settings/remove-email/{{$value->id}}" class="btn btn-sm btn-warning btn-icon"><i>Remove</i></a>

                            </div>

                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
