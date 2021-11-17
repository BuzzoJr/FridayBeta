@extends("admin.layouts.default")
@section('breadcrumbs')@endsection
@section('pageTitle')
    <h1>{{ trans('admiko.home') }}</h1>
@endsection
@section('pageInfo')@endsection
@section('backBtn')@endsection
@section('content')
<div class="card-body">
<form action="{{ route('admin.home.index') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <input type="file" name="file" id="file" class="inputfile"/>
    <label for="file"><i class="fas fa-upload"></i>
        Selecionar Matriz</label>
        <br>
    <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="fas fa-share"></i> Importar</button>
    <a href="admin/export" class="btn btn-primary"><i class="fas fa-download"></i> Exportar</a>
    </div>
</form>
</div>
<div class="flex-container">
<a class="card flex-child" href="{{route('admin.processos.index')}}">
	<h4 class="text-chart">Processos:</h4>
    <div class="card-body">
       <h1 class="text-chart"> {{$processos_count}}</h1>
    </div>
  </a>
<a class="card flex-child" href="{{route('admin.ativos.index')}}">
	<h4 class="text-chart">Ativos:</h4>
    <div class="card-body">
       <h1 class="text-chart"> {{$ativos_count}}</h1>
    </div>
  </a>
<a class="card flex-child" href="{{route('admin.terceiros.index')}}">
	<h4 class="text-chart">Terceiros:</h4>
    <div class="card-body">
       <h1 class="text-chart"> {{$terceiros_count}}</h1>
    </div>
  </a>
<a class="card flex-child" href="{{route('admin.matriz_de_riscos.index')}}">
	<h4 class="text-chart">Riscos:</h4>
    <div class="card-body">
       <h1 class="text-chart"> {{$totalriscosinerentes}}</h1>
    </div>
  </a>
</div>
<div closs="flex-container">
<div class="card flex-child" id="card-inicio">
	<h4 class="text-chart">Riscos Inerentes: {{$totalriscosinerentes}}</h4>
    <div class="card-body">
      <div id="chartdiv3"></div>
    </div>
</div>
<div class="card flex-child" id="card-inicio">
	<h4 class="text-chart">Riscos Residuais: {{$totalriscosresiduais}}</h4>
    <div class="card-body">
        <div id="chartdiv4"></div>
    </div>
</div>
</div>
<script>

    am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv3", am4charts.PieChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.data = [
  {
    country: "Baixos",
    value: {{ $matriz_de_risco_baixo ?? '' }},
    color: am4core.color("#a3c989")
  },
  {
    country: "Médios",
    value: {{ $matriz_de_risco_medio ?? '' }},
    color: am4core.color("#ffff99")
  },
  {
    country: "Altos",
    value: {{ $matriz_de_risco_alto ?? '' }},
    color: am4core.color("#f4b084")
  },
  {
    country: "Extremos",
    value: {{ $matriz_de_risco_extremo ?? '' }},
    color: am4core.color("#ff7171")
  }

];
chart.radius = am4core.percent(70);
chart.innerRadius = am4core.percent(40);
chart.startAngle = 180;
chart.endAngle = 360;  

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "value";
series.dataFields.category = "country";
series.slices.template.propertyFields.fill = "color";

series.slices.template.cornerRadius = 10;
series.slices.template.innerCornerRadius = 7;
series.slices.template.draggable = true;
series.slices.template.inert = true;

series.hiddenState.properties.startAngle = 90;
series.hiddenState.properties.endAngle = 90;

chart.legend = new am4charts.Legend();
</script>

<script>

    am4core.useTheme(am4themes_animated);

var chart = am4core.create("chartdiv4", am4charts.PieChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.data = [
  {
    country: "Baixos",
    value: {{ $matriz_de_risco_baixo1 ?? '' }},
    color: am4core.color("#a3c989")
  },
  {
    country: "Médios",
    value: {{ $matriz_de_risco_medio1 ?? '' }},
    color: am4core.color("#ffff99")
  },
  {
    country: "Altos",
    value: {{ $matriz_de_risco_alto1 ?? '' }},
    color: am4core.color("#f4b084")
  },
  {
    country: "Extremos",
    value: {{ $matriz_de_risco_extremo1 ?? '' }},
    color: am4core.color("#ff7171")
  }

];
chart.radius = am4core.percent(70);
chart.innerRadius = am4core.percent(40);
chart.startAngle = 180;
chart.endAngle = 360;  

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "value";
series.dataFields.category = "country";
series.slices.template.propertyFields.fill = "color";

series.slices.template.cornerRadius = 10;
series.slices.template.innerCornerRadius = 7;
series.slices.template.draggable = true;
series.slices.template.inert = true;

series.hiddenState.properties.startAngle = 90;
series.hiddenState.properties.endAngle = 90;

chart.legend = new am4charts.Legend();
</script>

@endsection
