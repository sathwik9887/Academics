@component('mail::message')
<!-- Logo -->
<div style="text-align: center;">
    <img src="{{ asset('assets/images/logo.jpg') }}" alt="Academics Logo" style="max-width: 150px;">
</div>

# New Contact Form Submission

**Name:** {{ $data['fname'] }} {{ $data['lname'] }}

**Email:** {{ $data['email'] }}

**Phone:** {{ $data['phone'] }}

**Message:**
{{ $data['message'] }}

Thanks,
{{ config('app.name') }}
@endcomponent