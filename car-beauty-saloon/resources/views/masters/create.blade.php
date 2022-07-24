@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add new service</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('services-store')}}" method="post">
                        <div class="form-group">
                            <label>Where?</label>
                            <select class="form-control" name="saloon_id">
                                @foreach($saloons as $saloon)
                                <option value="{{$saloon->id}}">{{$saloon->saloon}} ____
                                    <div>{{$saloon->street}} g. {{$saloon->number}}</div>
                                    <div>{{$saloon->city}} {{$saloon->zip}}</div>

                                </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Choose service</label>
                            <select class="form-control" name="service">
                                <option>Rinseless Wash</option>
                                <option>Brushless Wash</option>
                                <option>Undercarriage Wash</option>
                                <option>Tire and Wheel Cleaner</option>
                                <option>Windows Clean</option>
                                <option>Interior Vacuum</option>
                                <option>Dash & Door Jambs Wipe</option>
                                <option>Ceramic FastWax</option>
                                <option>Extreme Shine Wax</option>
                                <option>Splash Hot Wax</option>
                                <option>Soft Cloth Bath & Turbo Dry</option>
                            </select>
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
