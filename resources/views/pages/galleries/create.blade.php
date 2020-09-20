@extends('layouts.default')
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">complain</h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate action="{{route('galleries.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">user id</label>
                                                <input name="complaints_id" type="text" class="form-control" id="validationCustom01" placeholder="" value="{{$items->id}}" required readonly>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>  
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">date</label>
                                                <input type="" name="" value="{{$items->date}}" class="form-control" id="validationCustom02" placeholder="Last name" required readonly>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">sub</label>
                                                <input type="text" name="" class="form-control" id="validationCustom02" placeholder="subjek" value="{{$items->sub}}" required readonly>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>  
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">foto</label>
                                                <input type="file" required name="photo" accept="image/*" value="{{ old('photo') }}" class="form-control  @error('photo') is-invalid @enderror">
                                                 @error('photo')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                            <br>  
                                        <h5>Default Photo</h5>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="is_default" value="0" checked="" class="custom-control-input">        @error('is_default')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                <span class="custom-control-label">no</span>
                                            </label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="is_default" value="1" class="custom-control-input">
                                                        @error('is_default')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                <span class="custom-control-label">yes</span>
                                            </label>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button class="btn btn-primary" type="submit">Submit form</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endsection