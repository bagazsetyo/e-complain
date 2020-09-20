<table class="table table-bordered">
        <tr>
            <th>sub</th>
            <td>{{ $data->sub}}</td>
        </tr>
        <tr>
            <th>date</th>
            <td>{{$data->date}}</td>
        </tr>
        <tr>
            <th>description</th>
            <td>{!!$data->description!!}</td>
        </tr>
        <tr>
            <th>galleries</th>
            <td>
                 <table class="tabble table-bordered w-100">
                    <tr>
                        <th>foto</th>
                    </tr>
                    @foreach($items as $items)
                    <td><img src="{{url($items->photo)}}" style="height: 100px;"></td>
                    @endforeach
                </table> 
            </td>
        </tr>
</table>
<br>
 <div class="row">
    <div class="col-4">
        <a href="{{route('setstatus', $data->id)}}?status=success" class="btn btn-success btn-block">
            <i class="fa fa-check"></i>set success
        </a>
    </div>
    <div class="col-4">
        <a href="{{route('setstatus', $data->id)}}?status=pending" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i>set pending
        </a>
    </div>
    <div class="col-4">
        <a href="{{route('setstatus', $data->id)}}?status=failed" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i>set failde
        </a>
    </div>
    @if(auth::user()->level == 'admin')
    <div class="col-12" style="margin-top: 10px;">
        <a href="{{route('pdf',$data->id)}}" class="btn btn-primary btn-block">
            <i class="fa fa-info-circle"></i> info
        </a>
    </div>
    @endif
</div>