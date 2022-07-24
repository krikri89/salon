@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>service Edit</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('services-update', $service)}}" method="post">
                        <div class="form-group">
                            <label>Service</label>
                            {{-- <select class="form-control" name="saloon_id">
                                @foreach($services as $service)
                                <option value="{{$service->id}}" @if($saloon->id == $service->saloon_id)selected @endif>{{$service->service}}</option>
                            @endforeach
                            </select> --}}

                            <input class="form-control" type="text" name="service_name" value="{{$service->service}}" />
                        </div>
                        <div class="form-group">
                            <label>What saloon?</label>
                            <select class="form-control" name="saloon_id">
                                @foreach($saloons as $saloon)
                                <option value="{{$saloon->id}}" @if($saloon->id == $service->saloon_id)selected @endif>{{$saloon->saloon}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        @method('put')
                        <button class="btn btn-outline-success mt-4" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
