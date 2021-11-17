{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(auth()->user()->role_id == 1)
<li class="nav-item{{ $admiko_data['sideBarActive'] === "processos" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.processos.index')}}"><i class="fas fa-file-signature fa-fw"></i>Processos</a></li>

<li class="nav-item{{ $admiko_data['sideBarActive'] === "terceiros" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.terceiros.index')}}"><i class="fas fa-user-friends fa-fw"></i>Terceiros</a></li>

<li class="nav-item{{ $admiko_data['sideBarActive'] === "ativos" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.ativos.index')}}"><i class="fas fa-file-alt fa-fw"></i>Ativos</a></li>

<li class="nav-item{{ $admiko_data['sideBarActive'] === "matriz_de_riscos" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.matriz_de_riscos.index')}}"><i class="fas fa-exclamation-triangle fa-fw"></i>Matriz de Riscos</a></li>

<li class="nav-item{{ $admiko_data['sideBarActive'] === "mapa_de_calor" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.mapa_de_calor.index')}}"><i class="fas fa-map fa-fw"></i>Mapa de Calor</a></li>

<li class="nav-item{{ $admiko_data['sideBarActive'] === "ripd" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.ripd.index')}}"><i class="fas fa-flag fa-fw"></i>Relatório de Impacto</a></li>
@endif