@component('mail::message')
    Hi Admin,

    User {{$objData->profile->first_name}} {{$objData->profile->last_name}} has uploaded payment receipt for event {{$objData->events->name}} in category
    {{$objData->category->category_type}}  {{$objData->category->category_subtype}}
    @component('mail::button', ['url' => 'http://127.0.0.1:8000/event/participant/receipt'.$objData->id])
        view
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent

