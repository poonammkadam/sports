@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <div class="container">
        <h2 class="text-center m-2">Results List</h2>
        <div class="row">
            @foreach($objEvent as $item)
                <div class="col-2">
                </div>
                <div class="col-4">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            Event : {{$item->name}}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            Click : <a href="{{$item->result_url}}" target="_blank"
                                       class=""><i class="fas fa-clipboard"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                </div>
            @endforeach
        </div>
        <div class="row text-center">
            <div class="col-2">
            </div>
            <div class="col-8 m-5">
                <div class="pagination text-center">
                    {{ $objEvent->render() }}
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>

@endsection
