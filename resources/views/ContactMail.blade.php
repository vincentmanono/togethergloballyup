@component('mail::message')
@component('mail::table')
    {{ "From : ". $data['name'] }}
@endcomponent
@component('mail::panel')
    {{ $data['message'] }}
@endcomponent


@component('mail::button', ['url' => "mailto:". $data['email'] ,'color'=>"primary"])
Replay
<a href="mailto:"></a>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
