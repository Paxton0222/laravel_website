<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $post->title }}</p>
</div>

<!-- Post Data Field -->
<div class="col-sm-12">
    {!! Form::label('post_data', 'Post Data:') !!}
    <p>{{ $post->post_data }}</p>
</div>

<!-- Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $post->category_id }}</p>
</div>

<!-- Tag Id Field -->
<div class="col-sm-12">
    {!! Form::label('tag_id', 'Tag Id:') !!}
    <p>{{ $post->tag_id }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $post->remember_token }}</p>
</div>

