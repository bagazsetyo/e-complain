<style type="text/css">
    .btn-status .btn{
        width: 80px;
        pointer-events: none;
    }
</style>
@extends('layouts.default')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">daftar laporan</h4>
                </div>
                <div class="card-body--" >
                    <div class="table-stats order-table ov-h">
                        <table class="table" style="">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">sub</th>
                                    <th class="border-0">date</th>
                                    <th class="border-0">status</th>
                                    <th class="border-0" style="text-align: right;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->sub}}</td>
                                    <td>{{$item->date}}</td>
                                    <td >
                                        <div class="btn-status">
                                        @if($item->status == 'pending')
                                            <div class="btn btn-info" role="alert">
                                        @elseif($item->status == 'success')
                                            <div class="btn btn-success" role="alert">
                                        @elseif($item->status == 'failed')
                                            <div class="btn btn-danger" role="alert">
                                        @else
                                            <div class="btn btn-danger" role="alert">
                                        @endif
                                            {{$item->status}}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="text-align: right;">
                                        @if($item->status == 'pending')


                                        {{-- ini tanda coment di blade laravel --}}
                                        
                                         <a href="{{route('setstatus',$item->id)}}?status=success" class="btn btn-success ">
                                            <i class="fa fa-check"></i>
                                        </a>

                                        <a href="{{route('setstatus',$item->id)}}?status=failed" class="btn btn-warning ">
                                            <i class="fa fa-times"></i>
                                        </a>

                                        @endif
                                        <!-- product.edit ini di ganti product.gallery -->
                                        <a 
                                            href="#mymodal"
                                            data-remote="{{route('details',$item->id)}}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="laporan {{ $item->sub}}"
                                            class="btn btn-info ">
                                            
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <!-- <a href="#" class="btn btn-info ">
                                            <i class="fa fa-picture-o"></i>
                                        </a> -->
                                        <form action="{{route('destroy',$item->id)}}" method="post" class="d-inline">
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


@push('after-script')

 <script>
        jQuery(document).ready(function($){
            $('#mymodal').on('show.bs.modal', function(e){
                var button = $(e.relatedTarget); //mengambil data yang sudah di lempar di file show
                var modal = $(this);

                modal.find('.modal-body').load(button.data("remote")); //data yang di ambil akan di tampilkan di class modal body
                modal.find('.modal-title').html(button.data("title")); //modal titel untuk menampilkan nama titel yang sudah di berikan di halaman index tadi
            });
        });
    </script>
    <div class="modal" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i> <!-- jika data kosong maka akan menampilkan spinner -->
                </div>
            </div>
        </div>
    </div>
    
@endpush