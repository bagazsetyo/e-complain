<style type="text/css">
    .table-atas{
        text-transform: capitalize;
        width: 1000px;
    }
    .table-atas .sub{
        text-transform: capitalize;
        width: 100px;
        text-align: justify;
    }
    td img
    {
        height: 150px;
    }
    .d-block .w-100
    {
        height: 10px;
    }
</style>
@extends('layouts.default')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">daftar user</h4>
                </div>
                <div class="card-body">
                    <a href="{{route('cetakpdf',$items->user_id)}}" class="btn btn-primary">cetak data</a> 
                    //mencetak semua data dari user yang membuat lporan ini
                </div>
                <div class="card-body">
                <table class="table-atas">
                    <tr>
                        <td class="sub">subjek </td>
                        <td>:</td>
                        <td>{{$items->sub}}</td>
                    </tr>
                    <tr>
                        <td class="sub">tanggal </td>
                        <td>:</td>
                        <td>{{$items->date}}</td>
                    </tr>
                    <tr>
                        <td class="sub">deskripsi </td>
                        <td>:</td>
                        <td><table>
                            <td>{!!$items->description!!}</td>
                        </table></td>
                    </tr>
                    <tr>
                        <td class="sub">Photo </td>
                        <td>:</td>
                        @foreach($default2 as $default2)
                        <td><img src="{{url($default2->photo)}}"></td>
                        @endforeach
                    </tr>
                </table>
                </div>
                 <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Galleries</h5>
                            <div class="card-body">
                                <div id="carouselExampleControls" class="carousel slide col-sm-12" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                         @foreach($default as $default)
                                            <img class="d-block w-100" src="{{url($default->photo)}}" alt="First Second">
                                            @endforeach
                                        </div>
                                        @foreach($data as $data)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{url($data->photo)}}" alt="Second slide">
                                        </div>
                                        @endforeach 
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                         <span class="sr-only">Previous</span>   </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                   <span class="sr-only">Next</span>  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection