@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Our services</h1>
                    {{-- <div>
                        <a href="{{route('services-index', ['sort'=>'asc'])}}">A-Z</a>
                    <a href="{{route('services-index', ['sort'=>'desc'])}}">Z-A</a>
                    <a href="{{route('services-index')}}">Reset</a>
                </div> --}}
            </div>
            {{-- {{$prev}}
            <div class="card-body">
                <ul class="list-group"> --}}
                    @forelse($services as $service)
                    {{-- {{$prev = $key}}
                    @if($prev)

                    @endif
                    @if($loop->index != 0)
                    {{$services->[$loop->index-1]}}
                    @endif --}}
                    {{-- {{$loop->index != 0 && $loop->index}} --}}

                    <li class="list-group-item">
                        <div class="service-bin">
                            <div class="service-box">
                                {{-- @if(  {{$services[$loop-> index]->service}} != {{$services[$loop-> index -1]->service}})
                                <h6>- {{$service->service}}
                                </h6>
                                @endif --}}


                                <i>{{$service->getService->saloon}}</i>
                                {{-- <i>{{$service->getService->street}} {{$service->getService->number}}"</i> --}}

                                <h5> - {{$service->service}}
                                </h5>


                            </div>



                            <div class="controls">
                                <a class="btn btn-outline-secondary m-2" href="{{route('services-show', $service->id)}}">Show</a>

                                {{-- @if(Auth::user()->role > 9) --}}
                                <a class="btn btn-outline-primary m-2" href="{{route('services-edit', $service)}}">Edit</a>
                                <form class="delete" action="{{route('services-delete', $service)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger m-2" type="submit">Delete</button>
                                </form>
                                {{-- @endif --}}

                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item">No services available at the moment</li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
