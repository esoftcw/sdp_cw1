<x-layouts.app header="Routes">
    <div class="row">
        <div class="col-lg-12">
            <x-table route="routes" :links="$routes">
                <x-slot name="headings">
                    <th>Name</th>
                    <th>Vehicle</th>
                    <th>Driver</th>
                </x-slot>
                @foreach($routes as $route)
                    <tr>
                        <td>{{ $route->name }}</td>
                        <td>{{ $route->vehicle->number }}</td>
                        <td>{{ $route->vehicle->user->name }}</td>
                        <td>
                            <x-action route="routes" :id="$route"/>
                        </td>
                    </tr>
                @endforeach
            </x-table>

        </div>
    </div>
    <!-- /.row -->
</x-layouts.app>
