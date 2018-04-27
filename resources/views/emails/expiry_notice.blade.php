Dear customer,
{{"\n"}} You have some licenses about to expire!
{{"\n"}}Please reactive them soon before they are expired.

<p><b>Licenses About To Expire:</b></p>

<div>
    <table class="table" border="1">
        <thead>
        <th>ID</th>
        <th>State</th>
        <th>License Number</th>
        <th>Expiration Date</th>
        <th>Current Status</th>
        </thead>
        <tbody>
        @foreach($data as $license)
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
<br/>
Thank You,

<br/>
<br/>
<i>-License Tracker</i>