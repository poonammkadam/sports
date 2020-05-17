@component('mail::message')
    Dear {{$user->name}},
    Thanks for being part of our community. A new event update for you
    @component('mail::button', ['url' => "{{ URL::to('/event/'.$objEvent->id) }}"])
        {{$objEvent->name}}
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent

