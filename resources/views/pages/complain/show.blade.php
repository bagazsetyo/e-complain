<style type="text/css">
    .btn-status .btn{
        pointer-events: none;
        width: 100px;
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
                <div class="card-body--" >
                    <div class="table-stats order-table ov-h">
                        <table class="table" style="">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">sub</th>
                                    <th class="border-0">date</th>
                                    <th class="border-0" style="text-align: center; ">status</th>
                                    <th class="border-0" style="text-align: right;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->sub}}</td>
                                    <td>{{$item->date}}</td>
                                    <td style="text-align: center;">
                                        <div class="btn-status">
                                        @if($item->status == 'pending')
                                            <div class="btn btn-info" role="alert">
                                        @elseif($item->status == 'success')
                                            <div class="btn btn-success" role="alert">
                                        @elseif($item->status == 'failed')
                                            <div class="btn btn-danger" role="alert">
                                        @else
                                            <div class="btn btn-light" role="alert">
                                        @endif
                                            {{$item->status}}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="text-align: right;">
                                        <!-- product.edit ini di ganti product.gallery -->
                                        <a href="{{route('picture',$item->id)}}" class="btn btn-light ">
                                            <i class="far fa-plus-square"></i>
                                        </a>
                                        <a href="{{route('galleries.show',$item->id)}}" class="btn btn-primary ">
                                            <i class="fas fa-image"></i>
                                        </a>
                                        <a href="{{route('complain.edit',$item->id)}}" class="btn btn-warning ">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('complain.destroy',$item->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <!-- mengunakan delet dari bawan laravel -->
                                            <button class="btn btn-danger ">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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