<x-layouts.guest>
    <div class="float-right">
        <a href="/login">Login</a>
    </div>
    <form action="{{ route('search') }}" method="POST">
        @csrf
        <x-input field="name" label="Search">
            <input
                type="number"
                name="search"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="{{ __('Waybill ID') }}"
                value="{{ old('email') }}"
                required
            >
        </x-input>
    </form>
    @if($delivery)
        <table class="table">
            <tr>
                <td class="bg-secondary">Waybill ID</td>
                <td>{{$delivery->id}}</td>
                <td class="bg-secondary">Sender Name</td>
                <td>{{$delivery->pickup->customer->name}}</td>
                <td class="bg-secondary">Sender Contact</td>
                <td>{{$delivery->pickup->customer->mobile}}</td>
            </tr>
            <tr>
                <td class="bg-secondary">Pickup Branch</td>
                <td>{{$delivery->pickup->center->name}}</td>
                <td class="bg-secondary">Pickup Rider</td>
                <td>{{$delivery->pickup->rider->name}}</td>
            </tr>
            <tr>
                <td class="bg-secondary">Weigh</td>
                <td>{{$delivery->packages[0]->weight}}(g)</td>
                <td class="bg-secondary">Volume</td>
                <td>{{$delivery->packages[0]->width}} x {{$delivery->packages[0]->height}} x {{$delivery->packages[0]->length}}(cm)</td>
                <td class="bg-secondary">Volume Weight</td>
                <td>{{$delivery->packages[0]->volumeWeight()}}(g)</td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td class="bg-secondary">Receiver Name</td>
                <td>{{$delivery->name}}</td>
                <td class="bg-secondary">Receiver City</td>
                <td>{{$delivery->address->city->name}}</td>
            </tr>
            <tr>
                <td class="bg-secondary">Delivery Branch</td>
                <td>{{$delivery->center->address->city->name}}</td>
                <td class="bg-secondary">Distance</td>
                <td>{{$delivery->distance()}}(km)</td>
                <td class="bg-secondary">Price</td>
                <td>{{$delivery->packages[0]->price}}(Rs)</td>
            </tr>
        </table>
        <table class="table">
            @foreach($delivery->statuses as $status)
                <tr>
                    <td>{{$status->created_at}}</td>
                    <td>{{$status->statusValue()}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</x-layouts.guest>
