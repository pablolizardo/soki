<div id="admin" class="">
    @if(Auth::check())
        <a href="{{ url('/') }}" class="mr-4"><i class="fa fa-home"></i> Inicio </a>
        <a href="{{ url('/admin') }}"  class="mr-4"><i class="fa fa-cog"></i> Admin </a>
        <a href="{{ url('/admin/create') }}" class="mr-4"><i class="fa fa-plus"></i> Agregar contenido</a>
       
        <a href="{{ url('/logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Salir</a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
    @else 
        <a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> Ingresar</a>
    @endif
</div>