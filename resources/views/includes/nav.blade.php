<div class="col-md-2 full-height nav-wrapper">
    <!-- Branding Image -->
    <div>
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <nav id="main-nav" class="navbar-collapse collapse in">
        <ul class="nav nav-sidebar">
            <li><a href="/"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
            <li><a href="{{ url('/medicos/listar') }}"><span class="glyphicon glyphicon-plus"></span> Médicos</a></li>
            <li><a href="{{ url('/pacientes/listar') }}"><span class="glyphicon glyphicon-user"></span> Pacientes</a></li>
            <li><a href="{{ url('/agenda/listar') }}"><span class="glyphicon glyphicon-calendar"></span> Agenda</a></li>
        </ul>
    </nav>
</div>