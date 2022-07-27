@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="nice">{{$master->master}}</h1>
                </div>
                <div class="card-body">
                    <div>{{$master->street}} g. {{$master->number}}</div>
                    <div>{{$master->city}} {{$master->zip}}</div>

                    <div class="service-bin">
                        <div class="controls">
                            @if(Auth::user()->role > 9)

                            <a class="btn btn-outline-success m-2" href="{{route('masters-edit', $master)}}">Edit</a>
                            <form class="delete" action="{{route('masters-delete', $master)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger m-2">Destroy</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
