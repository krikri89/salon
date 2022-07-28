@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Our masters</h1>
                    {{-- <div>
                        <a href="{{route('masters-index', ['sort'=>'asc'])}}">A-Z</a>
                    <a href="{{route('masters-index', ['sort'=>'desc'])}}">Z-A</a>
                    <a href="{{route('masters-index')}}">Reset</a>
                </div> --}}
            </div>

            <div class="card-body">
                <ul class="list-group">
                    @forelse($masters as $master)

                    <li class="list-group-item">
                        <div class="service-bin">
                            <div class="service-box">
                                {{-- <input readonly value="{{$master->getmaster->saloon}} - {{$master->getmaster->street}} {{$master->getmaster->number}}"> --}}


                                <h6>- {{$master->master}}
                                </h6>
                                <div class="image-box">
                                    <img src="{{$master->photo}}">
                                </div>
                                <div> Rating {{$master->rating}}
                                </div>

                            </div>

                            <div class="controls">
                                <a class="btn btn-outline-secondary m-2" href="{{route('masters-show', $master->id)}}">Show</a>

                                {{-- @if(Auth::user()->role > 9) --}}
                                <a class="btn btn-outline-primary m-2" href="{{route('masters-edit', $master)}}">Edit</a>
                                <form class="delete" action="{{route('masters-delete', $master)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger m-2" type="submit">Delete</button>
                                </form>
                                {{-- @endif --}}

                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item">No masters available at the moment</li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
