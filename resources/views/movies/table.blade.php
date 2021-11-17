<div class="table-responsive">
    <table class="table" id="movies-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Description</th>
        <th>Date Release</th>
        <th>Director</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
            <td>{{ $movie->description }}</td>
            <td>{{ $movie->date_release }}</td>
            <td>{{ $movie->director }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('movies.show', [$movie->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('movies.edit', [$movie->id]) }}" class='btn btn-default btn-xs'>
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
