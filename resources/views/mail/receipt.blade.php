@component('mail::message')
    Hi Admin,
{{dd($objData)}}
    User
    @component('mail::button', ['url' => 'http://127.0.0.1:8000/upload/receipt/'.$objData['eventparticipant']->id])
        Upload
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent

