<div class="uk-overflow-auto">
    <table class="uk-table uk-table-striped">
        <courses-search></courses-search>
        <thead>
        <tr>
            <th>#</th>
            <th>Course List
            <th>Created</th>
            <th>Updated</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                </td>
                <td>{{ $course->created_at->format('d M Y, H:i') }}</td>
                <td>{{ $course->updated_at->format('d M Y, H:i') }}</td>
                <td>
                    @if($course->active === 1)
                        <div class="uk-button uk-button-default">
                            <input type="checkbox"
                                   id="activeChecked_{{ $course->id }}"
                                   class="courseActive" checked>
                            <label for="activeChecked_{{ $course->id }}"
                                   class="activeLabel">Active</label>
                        </div>
                    @else
                        <div class="uk-button uk-button-default">
                            <input type="checkbox"
                                   id="activeNotChecked_{{ $course->id }}"
                                   class="courseActive">
                            <label for="activeNotChecked_{{ $course->id }}"
                                   class="activeLabel">Active</label>
                        </div>
                    @endif
                </td>

                <td>
                    <a href="{{ route('courses.edit', $course->id) }}" title="Edit"
                       class="uk-button uk-button-secondary" data-uk-tooltip>
                        <span data-uk-icon="icon: pencil"></span>
                    </a>
                    <a href="{{ route('courses.show', $course->id) }}" title="Course Analytics"
                       class="uk-button uk-button-primary" data-uk-tooltip>
                        <span data-uk-icon="icon: search"></span>
                    </a>
                    <a href="{{ route('courses.destroy', $course->id) }}" title="Delete"
                       class="uk-button uk-button-danger"
                       onclick="event.preventDefault(); deleteCourse({{ $course->id }});" data-uk-tooltip>
                        <span data-uk-icon="icon: trash"></span>
                    </a>
                    <form id="delete-course-{{ $course->id }}" method="POST"
                          action="{{ route('courses.destroy', $course->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $courses->links('vendor.pagination.uikit') }}
</div>