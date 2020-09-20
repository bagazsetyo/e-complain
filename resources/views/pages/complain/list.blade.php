<table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $user->id}}</td>
        </tr>
        <tr>
            <th>email</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>phone</th>
            <td>{{$user->number}}</td>
        </tr>
        <tr>
            <th>Complains</th>
            <td>
                 <table class="tabble table-bordered w-100">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>sub</th>
                            <th>date</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $items)
                        <tr>
                            <td>{{$items->id}}</td>
                            <td>{{$items->sub}}</td>
                            <td>{{$items->date}}</td>
                            <td>{{$items->status}}</td>
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
            </td>
        </tr>
</table>