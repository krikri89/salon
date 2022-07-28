@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add new master</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('masters-store')}}" method="post" enctype="multipart/form-data">
                        {{-- <div class="form-group"> --}}
                        {{-- <label>New</label> --}}
                        {{-- <select class="form-control" name="master_id"> --}}
                        {{-- @foreach($masters as $master)
                                <option value="{{$master->id}}">{{$master->master}} ____
                        <div>{{$master->rating}} </div> --}}

                        {{-- </option> --}}
                        {{-- @endforeach --}}
                        {{-- </select> --}}

                        {{-- </div> --}}

                        <div class="form-group">
                            <label>Choose master</label>
                            <select class="form-control" name="master">
                                <option>Marco</option>
                                <option>Johny</option>
                                <option>Josh</option>
                                <option>Kenny</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Rating</label>
                            <input name="rating" value="****">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" name="photo">

                        </div>

                        @csrf
                        @method('post')
                        <button class="btn btn-outline-success mt-4" type="submit">Add new</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
