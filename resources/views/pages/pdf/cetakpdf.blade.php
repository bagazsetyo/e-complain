<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan PDF </h4>
    </center>
    <center>download pada : {{now('Asia/Jakarta')}}</center>
    <center>{{$user->name}} : {{$user->email}}</center>
    <center>phone : {{$user->number}}</center>
    <br>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>id</th>
                <th>sub</th>
                <th>tanggal</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $items)
            <tr>
                <td>{{$items->id}}</td>
                <td>{{$items->sub}}</td>
                <td>{{$items->date}}</td>
                <td>{!!$items->description!!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>