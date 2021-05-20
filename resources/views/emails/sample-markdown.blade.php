@component('mail::message')
# Introduction

The body of your message.
<h2>{{ $details["title"] }}</h2>
<p>{{ $details["body"] }}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
