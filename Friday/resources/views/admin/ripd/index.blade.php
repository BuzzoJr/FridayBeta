@extends("admin.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Relatório de Impacto</li>
@endsection
@section('pageTitle')
<h1>Relatório de Impacto de Proteção de Dados</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("admin.home")}}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card">

    <div class="card-body">
    <p class="text-chart">Riscos Extremos: {{$countextremos}}</p>
    <p class="text-chart">Riscos Altos: {{$countaltos}}</p>
    <p class="text-chart">Gerar RIPD:</p>
    <a class="btn btn-primary" href="{{route('admin.downloadpdf.index')}}">
    <i class="fas fa-download"></i> Baixar</a>
    <a class="btn btn-primary" href="#" id="myButton">
    <i class="far fa-eye"></i> Visualizar</a>
    <br>

    <div id="myDiv" style="display:none;" >
    <embed
    src="https://friday.app.br/mk4/public/admin/pdf"
    type="application/pdf"
    frameBorder="0"
    scrolling="auto"
    height="800px"
    width="100%"
    ></embed>
   </div>
    </div>

    <script>
        $('#myButton').click(function() {
  $('#myDiv').toggle('slow', function() {
    // Animation complete.
  });
});
</script>

   
@endsection