@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Our saloons</h3>
                    {{-- <div>
                        <a href="{{route('saloons-index', ['sort'=>'asc'])}}">A-Z</a>
                    <a href="{{route('saloons-index', ['sort'=>'desc'])}}">Z-A</a>
                    <a href="{{route('saloons-index')}}">Reset</a>
                </div> --}}
            </div>

            <div class="card-body">
                <ul class="list-group">
                    @forelse($saloons as $saloon)

                    <li class="list-group-item">
                        <div class="saloon-bin">
                            <div class="saloon-box">
                                <h5>{{$saloon->saloon}}</h5>
                            </div>
                            <div>{{$saloon->street}} g. {{$saloon->number}}</div>
                            <div>{{$saloon->city}} {{$saloon->zip}}</div>

                            <div class="controls">
                                <a class="btn btn-outline-secondary m-2" href="{{route('saloons-show', $saloon->id)}}">Show</a>

                                {{-- @if(Auth::user()->role > 9) --}}
                                <a class="btn btn-outline-primary m-2" href="{{route('saloons-edit', $saloon)}}">Edit</a>
                                <form class="delete" action="{{route('saloons-delete', $saloon)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger m-2" type="submit">Delete</button>
                                </form>
                                {{-- @endif --}}

                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item">Sorry, we are out of service at the moment</li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
