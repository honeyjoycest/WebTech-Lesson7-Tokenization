<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Date Release Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_release', 'Date Release:') !!}
    {!! Form::text('date_release', null, ['class' => 'form-control','id'=>'date_release']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_release').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Director Field -->
<div class="form-group col-sm-6">
    {!! Form::label('director', 'Director:') !!}
    {!! Form::text('director', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>