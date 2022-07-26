@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>master Edit</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('masters-update', $master)}}" method="post">
                        <div class="form-group">
                            <label>master</label>
                            {{-- <select class="form-control" name="saloon_id">
                                @foreach($masters as $master)
                                <option value="{{$master->id}}" @if($saloon->id == $master->saloon_id)selected @endif>{{$master->master}}</option>
                            @endforeach
                            </select> --}}

                            <input class="form-control" type="text" name="master_name" value="{{$master->master}}" />
                        </div>
                        <div class="form-group">
                            <label>What saloon?</label>
                            <select class="form-control" name="saloon_id">
                                @foreach($saloons as $saloon)
                                <option value="{{$saloon->id}}" @if($saloon->id == $master->saloon_id)selected @endif>{{$saloon->saloon}}</option>
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
