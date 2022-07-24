@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>List of saloons</h1>
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
                                <h2>{{$saloon->saloon}}</h2>
                            </div>
                            <div>{{$saloon->street}} g. {{$saloon->number}}</div>
                            <div>{{$saloon->city}} {{$saloon->zip}}</div>

                            <div class="controls">
                                <a class="btn btn-outline-secondary m-2" href="{{route('saloons-show', $saloon->id)}}">SHOW</a>

                                {{-- @if(Auth::user()->role > 9) --}}
                                <a class="btn btn-outline-primary m-2" href="{{route('saloons-edit', $saloon)}}">EDIT</a>
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
                    <li class="list-group-item">No saloons, no life.</li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
