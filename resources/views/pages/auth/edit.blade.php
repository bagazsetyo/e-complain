@extends('layouts.default')
@section('content')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">update data</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{route('auth.update',$items->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">user id</label>
                                <input name="" type="text" class="form-control" id="validationCustom01" placeholder="" value="{{Auth::user()->id}}" required readonly>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>  
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">email</label>
                                <input type="" name="" value="{{$items->email}}" class="form-control" id="validationCustom02" placeholder="Last name" required readonly>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">name</label>
                                <input type="text" name="name" value="{{$items->name}}" class="form-control" id="validationCustom02" placeholder="subjek" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">phone</label>
                                <input type="text" name="number" value="{{$items->number}}" class="form-control" id="validationCustom02" placeholder="subjek" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        <input type="hidden" name="status" value="pending">
                        <div class="form-row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <button class="btn btn-primary" type="submit">Submit </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection