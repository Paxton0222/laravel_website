<!-- Category Field -->
<div class="col-sm-12">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $category->category }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $category->remember_token }}</p>
</div>

