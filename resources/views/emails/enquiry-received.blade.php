@php($b = config('business'))
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"></head>
<body style="font-family: Arial, sans-serif; color: #24283D; line-height: 1.5;">
    <h2 style="margin:0 0 4px;">New enquiry — {{ $enquiry->serviceLabel() }}</h2>
    <p style="margin:0 0 16px; color:#555;">Received via the {{ $b['name'] }} website.</p>

    <table cellpadding="6" style="border-collapse: collapse;">
        <tr><td><strong>Service</strong></td><td>{{ $enquiry->serviceLabel() }}</td></tr>
        <tr><td><strong>Name</strong></td><td>{{ $enquiry->name }}</td></tr>
        <tr><td><strong>Contact</strong></td><td>{{ $enquiry->contact }}</td></tr>
        @if($enquiry->trip_date)
            <tr><td><strong>Preferred date</strong></td><td>{{ $enquiry->trip_date->format('D, d M Y') }}</td></tr>
        @endif
        @if($enquiry->group_size)
            <tr><td><strong>Group size</strong></td><td>{{ $enquiry->group_size }}</td></tr>
        @endif
        @if($enquiry->pickup)
            <tr><td><strong>Pickup</strong></td><td>{{ $enquiry->pickup }}</td></tr>
        @endif
        @if($enquiry->destination)
            <tr><td><strong>Destination</strong></td><td>{{ $enquiry->destination }}</td></tr>
        @endif
        @if($enquiry->notes)
            <tr><td valign="top"><strong>Notes</strong></td><td>{{ $enquiry->notes }}</td></tr>
        @endif
    </table>

    <p style="margin:16px 0 0; color:#555;">Reply directly to the traveller using the contact detail above.</p>
</body>
</html>
