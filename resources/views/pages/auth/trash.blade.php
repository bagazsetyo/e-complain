@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">daftar user</h4>
                </div>
                <div class="card-body--" >
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>level</th>
                                    <th style="text-align: right;">action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->email}}</td>
                                    <td >{{$item->level}}</td>
                                    <td style="text-align: right;">
                                        <!-- product.edit ini di ganti product.gallery -->
                                        
                                        <a href="{{route('authundo',$item->id)}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                        <a href="{{route('authforcedelete',$item->id)}}" class="btn btn-danger btn-sm">
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