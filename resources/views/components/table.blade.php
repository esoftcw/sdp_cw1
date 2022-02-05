<div class="card">
    <div class="card-header">
        <a href="{{route("$route.create")}}" class="btn btn-outline-primary">{{ __('Add New') }}</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                {{$headings}}
            </tr>
            </thead>
            <tbody>
                {{$slot}}
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        {{$links ? $links->links() : ''}}
    </div>
</div>
