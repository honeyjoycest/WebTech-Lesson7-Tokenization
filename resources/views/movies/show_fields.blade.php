<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $movie->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $movie->description }}</p>
</div>

<!-- Date Release Field -->
<div class="col-sm-12">
    {!! Form::label('date_release', 'Date Release:') !!}
    <p>{{ $movie->date_release }}</p>
</div>

<!-- Director Field -->
<div class="col-sm-12">
    {!! Form::label('director', 'Director:') !!}
    <p>{{ $movie->director }}</p>
</div>

