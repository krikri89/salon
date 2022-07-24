@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add new Saloon</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('saloons-store')}}" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="saloon_name" value="" />
                        </div>
                        <div class="form-group">
                            <label>Steet</label>
                            <input class="form-control" type="text" name="saloon_street" value="" />
                            Number <input class="form-control" type="number" name="street_number" value="" />
                        </div>
                        <div class="form-group">
                            <label class="mt-2">City</label>
                            <input class="form-control" type="text" name="city" value="" />
                            ZIP code <input class="form-control" type="number" name="zip_code" value="" />
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
