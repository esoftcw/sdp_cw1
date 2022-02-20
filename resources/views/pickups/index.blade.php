<x-layouts.app header="Pickup">
    <div class="row">
        <div class="col-lg-12">
            <x-table route="pickups" :links="$pickups">
                <x-slot name="headings">
                    <th>Number</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Center Name</th>
                    <th>Center City</th>
                    <th>Action</th>
                </x-slot>
                @foreach($pickups as $pickup)
                    <tr>
                        <td>{{ $pickup->id }}</td>
                        <td>{{ $pickup->customer->name }}</td>
                        <td>{{ $pickup->customer->mobile }}</td>
                        <td>{{ $pickup->address->address }}</td>
                        <td>{{ $pickup->address->city->name }}</td>
                        <td>{{ $pickup->center->name}}</td>
                        <td>{{ $pickup->center->address->city->name }}</td>
                        @if(auth()->user()->role != 'customer')
                        <td>
                            <x-action route="pickups" :id="$pickup"/>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </x-table>

        </div>
    </div>
    <!-- /.row -->
</x-layouts.app>
