@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="nice">{{$service->service}}</h1>
                </div>
                <div class="card-body">
                    <div>{{$service->street}} g. {{$service->number}}</div>
                    <div>{{$service->city}} {{$service->zip}}</div>

                    <div class="service-bin">
                        <div class="controls">
                            <a class="btn btn-outline-success m-2" href="{{route('services-edit', $service)}}">Edit</a>
                            <form class="delete" action="{{route('services-delete', $service)}}" method="post">
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
