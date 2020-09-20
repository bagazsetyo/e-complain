@extends('layouts.default')
@section('content')

                        <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">complain</h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate action="{{route('complain.store')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">user id</label>
                                                <input name="user_id" type="text" class="form-control" id="validationCustom01" placeholder="" value="{{Auth::user()->id}}" required readonly>
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
                                                <input type="" name="date" value="{{now('Asia/Jakarta')}}" class="form-control" id="validationCustom02" placeholder="Last name" required readonly>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">sub</label>
                                                <input type="text"  
                                                       required  
                                                       name="sub" 
                                                       class="form-control @error('sub') is-invalid @enderror" 
                                                       id="validationCustom02" 
                                                       placeholder="subjek" 
                                                       value="{{ old('sub') }}" >
                                                         @error('sub')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>  
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">description</label>
                                                <textarea name="description" 
                                                          class="form-control ckeditor @error('description') is-invalid @enderror" 
                                                          id="validationCustom02">
                                                 {{ old('description') }}
                                                </textarea>
                                                @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="status" value="pending">
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
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
                    <script>
                        ClassicEditor
                                .create( document.querySelector( '.ckeditor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                     </script>

@endsection