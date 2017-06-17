<div class="uk-overflow-auto">
    <table class="uk-table uk-table-striped">
        <members-search></members-search>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Groups</th>
            <th>Email Address</th>
            <th>Contact No.</th>
            <th class="uk-table-shrink">Type</th>
            <th>Date Joined</th>
            <th class="uk-table-shrink">Actions</th>
        </tr>
        </thead>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name() }}</td>
                <td>
                    @if (count($user->userGroups) > 0)
                        @foreach ($user->userGroups as $userGroup)
                            <ul class="uk-list uk-list-divider">
                                <li><a href="#">{{ $userGroup->organisation }}</a></li>
                            </ul>
                        @endforeach
                    @else
                        <strong>There are no group(s).</strong>
                    @endif
                </td>
                <td>
                    <a href="mailto:{{ $user->email }}">
                        <span data-uk-icon="icon: mail"></span> {{ $user->email }}
                    </a>
                </td>
                <td class="uk-text-nowrap">
                    <a href="tel:{{ $user->contact }}">
                        <span data-uk-icon="icon: phone"></span> {{ $user->contact }}
                    </a>
                </td>
                <td>{{ ucwords($user->type) }}</td>
                <td class="uk-text-nowrap">{{ $user->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ url('manage_usercourse/' . $user->id) }}" title="Manage Courses"
                       class="uk-button uk-button-secondary" data-uk-tooltip>
                        <span data-uk-icon="icon: pencil"></span>
                    </a>
                    <a href="{{ url('manage_usergroup/' . $user->id) }}" title="Manage Groups"
                       class="uk-button uk-button-primary" data-uk-tooltip>
                        <span data-uk-icon="icon: users"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links('vendor.pagination.uikit') }}
</div>
