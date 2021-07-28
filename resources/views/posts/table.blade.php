<div class="table-responsive">
    <table class="table" id="posts-table">
        <thead>
        <tr>
            <th>Title</th>
        <th>Post Data</th>
        <th>Category Id</th>
        <th>Tag Id</th>
        <th>Remember Token</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
            <td>{{ $post->post_data }}</td>
            <td>{{ $post->category_id }}</td>
            <td>{{ $post->tag_id }}</td>
            <td>{{ $post->remember_token }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('posts.show', [$post->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('posts.edit', [$post->id]) }}"
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
