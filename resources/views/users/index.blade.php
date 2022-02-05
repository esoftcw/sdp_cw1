<x-layouts.app header="Users">
    <div class="row">
        <div class="col-lg-12">
            <x-table route="users" links="{{$users}}">
                <x-slot name="headings">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </x-slot>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <x-action route="users" :id="$user"/>
                        </td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
    <!-- /.row -->
</x-layouts.app>
