Dear customer,
{{"\n"}}Find the License Report you requested for below, please note this is just test app and as such this is just to test the mail feature.
{{"\n"}}we are working hard to deploy to production soon!

<p><u>License Report:</u></p>

<div>
    <table class="table" border="1">
        <thead>
        <th>State</th>
        <th>License Number</th>
        <th>Expiration Date</th>
        <th>Status</th>
        </thead>
        <tbody>
        @foreach($licenses as $license)
            <tr>
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
<br/>
Thank You,

<br/>
<br/>
<i>-License Tracker</i>