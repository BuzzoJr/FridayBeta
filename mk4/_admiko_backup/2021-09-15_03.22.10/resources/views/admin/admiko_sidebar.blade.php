{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['processos_allow', 'processos_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "processos" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.processos.index')}}"><i class="fas fa-file-signature fa-fw"></i>Processos</a></li>
@endIf
@if(Gate::any(['terceiros_allow', 'terceiros_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "terceiros" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.terceiros.index')}}"><i class="fas fa-user-friends fa-fw"></i>Terceiros</a></li>
@endIf
@if(Gate::any(['ativos_allow', 'ativos_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "ativos" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.ativos.index')}}"><i class="fas fa-file-alt fa-fw"></i>Ativos</a></li>
@endIf
@if(Gate::any(['matriz_de_riscos_allow', 'matriz_de_riscos_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "matriz_de_riscos" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.matriz_de_riscos.index')}}"><i class="fas fa-exclamation-triangle fa-fw"></i>Matriz de Riscos</a></li>
@endIf
