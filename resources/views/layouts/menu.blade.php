<li class="nav-item">
    <a href="{{ route('movies.index') }}"
       class="nav-link {{ Request::is('movies*') ? 'active' : '' }}">
        <p>Movies</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>


