<nav class="nav navbar navbar-expand-lg navbar-dark bg-dark navbar-transparente">
  <a class="navbar-brand" href="/">Projeto Heróis</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item @if($current == 'inicio') active @endif">
        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item @if($current == 'classes') active @endif">
        <a class="nav-link" href="/classes">Classes</a>
      </li>
      <li class="nav-item @if($current == 'especialidades') active @endif">
        <a class="nav-link" href="/especialidades">Especialidades</a>
      </li>
      <li class="nav-item @if($current == 'herois') active @endif">
        <a class="nav-link" href="/herois">Heróis</a>
      </li>
      <li class="nav-item @if($current == 'manual') active @endif">
        <a class="nav-link" href="/manual">Manual do Sistema</a>
      </li>
    </ul>
  </div>
</nav>