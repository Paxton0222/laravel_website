<div class="table-responsive">
    <table class="table" id="tags-table">
        <thead>
        <tr>
            <th>Tag</th>
        <th>Remember Token</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tags)
            <tr>
                <td>{{ $tags->tag }}</td>
            <td>{{ $tags->remember_token }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tags.destroy', $tags->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tags.show', [$tags->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tags.edit', [$tags->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
