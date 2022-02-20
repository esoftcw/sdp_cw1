<x-layouts.app header="Centers">
    <div class="row">
        <div class="col-lg-12">
            <x-table route="centers" :links="$centers">
                <x-slot name="headings">
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                </x-slot>
                @foreach($centers as $center)
                    <tr>
                        <td>{{ $center->name }}</td>
                        <td>{{ $center->address->address }}</td>
                        <td>{{ $center->address->city->name }}</td>
                        <td>
                            <x-action route="centers" :id="$center"/>
                        </td>
                    </tr>
                @endforeach
            </x-table>

        </div>
    </div>
    <!-- /.row -->
</x-layouts.app>
