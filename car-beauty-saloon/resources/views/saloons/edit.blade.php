@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Change saloon</h1>
                </div>

                <div class="card-body">
                    <ul>
                        <form action="{{route('saloons-update', $saloon)}}" method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" name="saloon_name" value="{{old('saloon', $saloon->saloon)}}" />
                            </div>
                            <div class="form-group">
                                <label class="mt-2">Street</label>
                                <input class="form-control" type="text" name="saloon_street" value="{{old('street'),$saloon->street}}" />
                                Number <input class="form-control" type="number" name="street_number" value="{{old('number'),$saloon->number}}" />



                            </div>
                            <div class="form-group">
                                <label class="mt-2">City</label>
                                <input class="form-control" type="text" name="city" value="{{old('city'), $saloon->city}}" />

                                ZIP code <input class="form-control" type="number" name="zip_code" value="{{old('zip'),$saloon->zip}}" />

                            </div>

                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success m-2" type="submit">Update it</button>


                        </form>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
