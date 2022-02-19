<x-layouts.app header="Vehicles">
    <div class="row">
        <div class="col-lg-12">
            <x-table route="vehicles" :links="$vehicles">
                <x-slot name="headings">
                    <th>Number</th>
                    <th>Driver</th>
                </x-slot>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->number }}</td>
                        <td>{{ $vehicle->user->name }}</td>
                        <td>
                            <x-action route="vehicles" :id="$vehicle"/>
                        </td>
                    </tr>
                @endforeach
            </x-table>

        </div>
    </div>
    <!-- /.row -->
</x-layouts.app>
