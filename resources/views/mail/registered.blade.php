@component('mail::message')
    <html>
    Hi {{($objData['user'])->name}}


    To complete your registration for event Please Upload your payment receipt on following link.
    @component('mail::button', ['url' => 'http://127.0.0.1:8000/upload/receipt/'.$objData['eventparticipant']->id])
        Upload
    @endcomponent

    Thanks,
    {{ config('app.name') }}
    </html>
@endcomponent
