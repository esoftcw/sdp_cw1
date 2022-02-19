<x-layouts.guest>
    <div class="row">
        <div class="col-lg-12">
            <x-table route="pickups" :links="$pickups">
                <x-slot name="headings">
                    <th>Number</th>
                    <th>Name</th>
                </x-slot>
                @foreach($pickups as $pickup)
                    <tr>
                        <td>{{ $pickup->id }}</td>
                        <td>{{ $pickup->customer->name }}</td>
                        <td>{{ $pickup->address->city->name }}</td>
                        <td>{{ $pickup->center->address->city->name }}</td>
                        <td>{{ $pickup->route->name }}</td>
                        <td>
                            <x-action route="pickups" :id="$pickup"/>
                        </td>
                    </tr>
                @endforeach
            </x-table>

        </div>
    </div>
    <!-- /.row -->
</x-layouts.guest>
