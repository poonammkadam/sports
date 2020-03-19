@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="shadow-lg p-5 resulte-section-main">
                    <div class="text-center">
                        <h2>Hello {{auth()->user()->name}}</h2>
                        <p>Here User results......</p>
                    </div>
                    @foreach($arrObjParticipant as $objParticipant)
                        @if($objParticipant->result_status)
                            <div class="resulte-section shadow-lg m-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Event : {{$objParticipant->events->name}}</h4>
                                        <h4>
                                            Category: {{$objParticipant->category->category_type}}  {{$objParticipant->category->category_subtype}}</h4>
                                        <h4> Your Rank : {{$objParticipant->rank_status}}</h4>
                                        <h4> Race Time : {{$objParticipant->race_time}}</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="certificate">
                                            <img src="{{ URL::to('/') }}/public/{{ $objParticipant->file }}"
                                                 class="card-img-top certificate-img" alt=""/>
                                            <a href="#">Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
@endsection

