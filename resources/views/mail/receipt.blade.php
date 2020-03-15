@component('mail::message')
    Hi Admin,

    User {{$objData->profile->name}} has uploaded payment receipt for event {{$objData->event->name}} in category
    {{$objData->category->category_type}}  {{$objData->category->category_subtype}}
    @component('mail::button', ['url' => 'http://127.0.0.1:8000/upload/receipt/'.$objData['eventparticipant']->id])
        view
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent

