@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">daftar sampah</h4>
                </div>
                <div class="card-body--" >
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>sub</th>
                                    <th>date</th>
                                    <th style="text-align: center;">status</th>
                                    <th style="text-align: right;">action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->sub}}</td>
                                    <td >{{$item->date}}</td>
                                    <td style="text-align: center;">
                                        @if($item->status == 'pending')
                                            <div class="btn btn-info" role="alert">
                                        @elseif($item->status == 'success')
                                            <div class="btn btn-success" role="alert">
                                        @elseif($item->status == 'failed')
                                            <div class="btn btn-failed" role="alert">
                                        @else
                                            <div class="btn btn-light" role="alert">
                                        @endif
                                            {{$item->status}}
                                            </div>
                                    </td>

                                    <td style="text-align: right;">
                                        <!-- product.edit ini di ganti product.gallery -->
                                        <a href="{{route('complainundo',$item->id)}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                        <a href="{{route('complainforce',$item->id)}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                               @empty 
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            data tidak tersedia
                                        </td>
                                    </tr>
                               @endforelse 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@include('includes.chart')