@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="nice">{{$saloon->saloon}}</h1>
                </div>
                <div class="card-body">
                    <div>{{$saloon->street}} g. {{$saloon->number}}</div>
                    <div>{{$saloon->city}} {{$saloon->zip}}</div>

                    <div class="saloon-bin">
                        <div class="controls">
                            <a class="btn btn-outline-success m-2" href="{{route('saloons-edit', $saloon)}}">Edit</a>
                            <form class="delete" action="{{route('saloons-delete', $saloon)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger m-2">Destroy</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
