<div class="uk-overflow-auto">
    <table class="uk-table uk-table-striped">
        <groups-search></groups-search>
        <thead>
        <tr>
            <th>#</th>
            <th>Group Name</th>
            <th>Total Members</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach ($groups as $group)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $group->organisation }}</td>
                <td>{{ count($group->userGroups) }}</td>
                <td>
                    <a class="uk-button uk-button-secondary">
                        <span data-uk-icon="icon: settings"></span>
                        Members</a>
                    <a class="uk-button uk-button-primary">
                        <span data-uk-icon="icon: settings"></span> Courses
                    </a>
                    <a class="uk-button uk-button-danger">
                        <span data-uk-icon="icon: trash"></span> Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $groups->links('vendor.pagination.uikit') }}
</div>