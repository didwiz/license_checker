<div class="col-lg-1 col-md-2">
</div>

<div class="col-lg-4 col-md-6">
    <div class="card">
        <div class="header">
            <h4 class="title">Add Email</h4>
        </div>
        <div class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" name="add-email" action={{ URL::to("/settings/add-email") }}>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Email Owner</label>
                            <input type="text"  class="form-control border-input" name="name"
                                   placeholder="Enter email owner's name"   required
                            >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control border-input" name="email"
                                   placeholder="Enter email address"  required
                            >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">
                            Add Email
                        </button>
                        {{--<input type="submit" class="btn btn-info btn-fill btn-wd" value="Update License">--}}
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
