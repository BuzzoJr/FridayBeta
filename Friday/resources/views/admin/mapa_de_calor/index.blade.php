@extends("admin.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Mapa de Calor</li>
@endsection
@section('pageTitle')
<h1>Mapa de Calor</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("admin.home")}}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card">
	<h4 class="text-chart">Riscos Inerentes</h4>
    <div class="card-body">
        <div id="chartdiv"></div>
    </div>
</div>
<div class="card">
<h4 class="text-chart">Riscos Residuais</h4>
    <div class="card-body">
        <div id="chartdiv1"></div>
    </div>
</div>
<script>
 

// Apply chart themes
am4core.useTheme( am4themes_animated );
am4core.options.autoDispose = true;
var chart = am4core.create( "chartdiv", am4charts.XYChart );
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.maskBullets = false;

var xAxis = chart.xAxes.push( new am4charts.CategoryAxis() );
var yAxis = chart.yAxes.push( new am4charts.CategoryAxis() );

xAxis.dataFields.category = "x";
yAxis.dataFields.category = "y";


xAxis.renderer.grid.template.disabled = true;
xAxis.renderer.minGridDistance = 40;

yAxis.renderer.grid.template.disabled = true;
yAxis.renderer.inversed = true;
yAxis.renderer.minGridDistance = 60;

var series = chart.series.push( new am4charts.ColumnSeries() );
series.dataFields.categoryX = "x";
series.dataFields.categoryY = "y";
series.dataFields.value = "value";
series.sequencedInterpolation = true;
series.defaultState.transitionDuration = 2000;

// Set up column appearance
var column = series.columns.template;
column.strokeWidth = 2;
column.strokeOpacity = 1;
column.stroke = am4core.color( "#000000" );
column.tooltipText = "{x}, {y}: {value.workingValue.formatNumber('#.')}";
column.width = am4core.percent( 100 );
column.height = am4core.percent( 100 );
column.column.cornerRadius(6, 6, 6, 6);
column.propertyFields.fill = "color";

var bullet2 = series.bullets.push(new am4charts.LabelBullet());
bullet2.label.text = "{value}";
bullet2.label.fill = am4core.color("#000000");
bullet2.zIndex = 1;
bullet2.fontSize = 30;
bullet2.interactionsEnabled = false;

// define colors
var colors = {
	"critical": "#ff7171",
	"bad": "#f4b084",
	"medium": "#ffff99",
	"good": "#a3c989",
	"verygood": "#a3c989"
};

chart.data = [ {
	"y": "Muito Alto",
	"x": "Muito Baixo",
	"color": colors.medium,
	"value": {{ $malto_mbaixo ?? '' }}

}, {
	"y": "Alto",
	"x": "Muito Baixo",
	"color": colors.medium,
	"value": {{ $alto_mbaixo ?? '' }}
}, {
	"y": "Médio",
	"x": "Muito Baixo",
	"color": colors.verygood,
	"value": {{ $medio_mbaixo ?? '' }}
}, {
	"y": "Baixo",
	"x": "Muito Baixo",
	"color": colors.verygood,
	"value": {{ $baixo_mbaixo ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Muito Baixo",
	"color": colors.verygood,
	"value": {{ $mbaixo_mbaixo ?? '' }}
},

{
	"y": "Muito Alto",
	"x": "Baixo",
	"color": colors.bad,
	"value": {{ $malto_baixo ?? '' }}
}, {
	"y": "Alto",
	"x": "Baixo",
	"color": colors.bad,
	"value": {{ $alto_baixo ?? '' }}
}, {
	"y": "Médio",
	"x": "Baixo",
	"color": colors.medium,
	"value": {{ $medio_baixo ?? '' }}
}, {
	"y": "Baixo",
	"x": "Baixo",
	"color": colors.medium,
	"value": {{ $baixo_baixo ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Baixo",
	"color": colors.verygood,
	"value": {{ $mbaixo_baixo ?? '' }}
},

{
	"y": "Muito Alto",
	"x": "Médio",
	"color": colors.critical,
	"value": {{ $malto_medio ?? '' }}
}, {
	"y": "Alto",
	"x": "Médio",
	"color": colors.bad,
	"value": {{ $alto_medio ?? '' }}
}, {
	"y": "Médio",
	"x": "Médio",
	"color": colors.bad,
	"value": {{ $medio_medio ?? '' }}
}, {
	"y": "Baixo",
	"x": "Médio",
	"color": colors.medium,
	"value": {{ $baixo_medio ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Médio",
	"color": colors.verygood,
	"value": {{ $mbaixo_medio ?? '' }}
},

{
	"y": "Muito Alto",
	"x": "Alto",
	"color": colors.critical,
	"value": {{ $malto_alto ?? '' }}
}, {
	"y": "Alto",
	"x": "Alto",
	"color": colors.critical,
	"value": {{ $alto_alto ?? '' }}
}, {
	"y": "Médio",
	"x": "Alto",
	"color": colors.bad,
	"value": {{ $medio_alto ?? '' }}
}, {
	"y": "Baixo",
	"x": "Alto",
	"color": colors.bad,
	"value": {{ $baixo_alto ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Alto",
	"color": colors.medium,
	"value": {{ $mbaixo_alto ?? '' }}
},

{
	"y": "Muito Alto",
	"x": "Muito Alto",
	"color": colors.critical,
	"value": {{ $malto_malto ?? '' }}
}, {
	"y": "Alto",
	"x": "Muito Alto",
	"color": colors.critical,
	"value": {{ $alto_malto ?? '' }}
}, {
	"y": "Médio",
	"x": "Muito Alto",
	"color": colors.critical,
	"value": {{ $medio_malto ?? '' }}
}, {
	"y": "Baixo",
	"x": "Muito Alto",
	"color": colors.bad,
	"value": {{ $baixo_malto ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Muito Alto",
	"color": colors.medium,
	"value": {{ $mbaixo_malto ?? '' }}
}
];
</script>
<script>

// Apply chart themes
am4core.useTheme( am4themes_animated );
am4core.options.autoDispose = true;
var chart1 = am4core.create( "chartdiv1", am4charts.XYChart );
chart1.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart1.maskBullets = false;

var xAxis1 = chart1.xAxes.push( new am4charts.CategoryAxis() );
var yAxis1 = chart1.yAxes.push( new am4charts.CategoryAxis() );

xAxis1.dataFields.category = "x";
yAxis1.dataFields.category = "y";


xAxis1.renderer.grid.template.disabled = true;
xAxis1.renderer.minGridDistance = 40;

yAxis1.renderer.grid.template.disabled = true;
yAxis1.renderer.inversed = true;
yAxis1.renderer.minGridDistance = 30;

var series1 = chart1.series.push( new am4charts.ColumnSeries() );
series1.dataFields.categoryX = "x";
series1.dataFields.categoryY = "y";
series1.dataFields.value = "value";
series1.sequencedInterpolation = true;
series1.defaultState.transitionDuration = 3000;

// Set up column appearance
var column1 = series1.columns.template;
column1.strokeWidth = 2;
column1.strokeOpacity = 1;
column1.stroke = am4core.color( "#000000" );
column1.tooltipText = "{x}, {y}: {value.workingValue.formatNumber('#.')}";
column1.width = am4core.percent( 100 );
column1.height = am4core.percent( 100 );
column1.column.cornerRadius(6, 6, 6, 6);
column1.propertyFields.fill = "color";



var bullet2 = series1.bullets.push(new am4charts.LabelBullet());
bullet2.label.text = "{value}";
bullet2.label.fill = am4core.color("#000000");
bullet2.zIndex = 1;
bullet2.fontSize = 30;
bullet2.interactionsEnabled = false;

// define colors
var colors1 = {
	"critical": "#ff7171",
	"bad": "#f4b084",
	"medium": "#ffff99",
	"good": "#a3c989",
	"verygood": "#a3c989"
};

chart1.data = [ {
	"y": "Muito Alto",
	"x": "Muito Baixo",
	"color": colors.medium,
	"value": {{ $malto_mbaixo1 ?? '' }}

}, {
	"y": "Alto",
	"x": "Muito Baixo",
	"color": colors.medium,
	"value": {{ $alto_mbaixo1 ?? '' }}
}, {
	"y": "Médio",
	"x": "Muito Baixo",
	"color": colors.verygood,
	"value": {{ $medio_mbaixo1 ?? '' }}
}, {
	"y": "Baixo",
	"x": "Muito Baixo",
	"color": colors.verygood,
	"value": {{ $baixo_mbaixo1 ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Muito Baixo",
	"color": colors.verygood,
	"value": {{ $mbaixo_mbaixo1 ?? '' }}
},

{
	"y": "Muito Alto",
	"x": "Baixo",
	"color": colors.bad,
	"value": {{ $malto_baixo1 ?? '' }}
}, {
	"y": "Alto",
	"x": "Baixo",
	"color": colors.bad,
	"value": {{ $alto_baixo1 ?? '' }}
}, {
	"y": "Médio",
	"x": "Baixo",
	"color": colors.medium,
	"value": {{ $medio_baixo1 ?? '' }}
}, {
	"y": "Baixo",
	"x": "Baixo",
	"color": colors.medium,
	"value": {{ $baixo_baixo1 ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Baixo",
	"color": colors.verygood,
	"value": {{ $mbaixo_baixo1 ?? '' }}
},

{
	"y": "Muito Alto",
	"x": "Médio",
	"color": colors.critical,
	"value": {{ $malto_medio1 ?? '' }}
}, {
	"y": "Alto",
	"x": "Médio",
	"color": colors.bad,
	"value": {{ $alto_medio1 ?? '' }}
}, {
	"y": "Médio",
	"x": "Médio",
	"color": colors.bad,
	"value": {{ $medio_medio1 ?? '' }}
}, {
	"y": "Baixo",
	"x": "Médio",
	"color": colors.medium,
	"value": {{ $baixo_medio1 ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Médio",
	"color": colors.verygood,
	"value": {{ $mbaixo_medio1 ?? '' }}
},

{
	"y": "Muito Alto",
	"x": "Alto",
	"color": colors.critical,
	"value": {{ $malto_alto1 ?? '' }}
}, {
	"y": "Alto",
	"x": "Alto",
	"color": colors.critical,
	"value": {{ $alto_alto1 ?? '' }}
}, {
	"y": "Médio",
	"x": "Alto",
	"color": colors.bad,
	"value": {{ $medio_alto1 ?? '' }}
}, {
	"y": "Baixo",
	"x": "Alto",
	"color": colors.bad,
	"value": {{ $baixo_alto1 ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Alto",
	"color": colors.medium,
	"value": {{ $mbaixo_alto1 ?? '' }}
},

{
	"y": "Muito Alto",
	"x": "Muito Alto",
	"color": colors.critical,
	"value": {{ $malto_malto1 ?? '' }}
}, {
	"y": "Alto",
	"x": "Muito Alto",
	"color": colors.critical,
	"value": {{ $alto_malto1 ?? '' }}
}, {
	"y": "Médio",
	"x": "Muito Alto",
	"color": colors.critical,
	"value": {{ $medio_malto1 ?? '' }}
}, {
	"y": "Baixo",
	"x": "Muito Alto",
	"color": colors.bad,
	"value": {{ $baixo_malto1 ?? '' }}
}, {
	"y": "Muito Baixo",
	"x": "Muito Alto",
	"color": colors.medium,
	"value": {{ $mbaixo_malto1 ?? '' }}
}
];

</script>	
@endsection