<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RIPD</title>
    <style text="text/css">
    h4 {
        text-align: left;
        margin-left: 30px;
    }
    p {
        text-align: left;
        margin-left: 60px;

    }
    .card-body {
        background-color: white;
        border: 1px solid black;
        padding: 40px;
        margin: 20px;
        width: 550px;
        text-align: center;
    }
    /* flexbox */

.flex-container {
  display: flex;
  margin-right: 20px;
 
}

.flex-child {
  flex: 1;
  border-radius: 10px;
  margin-right: 30px;
  
}  
.page {
    page-break-after: always;
}
    </style>
</head>
<header>

    <div class="flex-container">
        <div class="flex-child">
            <img src="https://friday.app.br/mk4/public/assets/admiko/fav/favicon-32x32.png" alt="Logo">
        </div>
        <div class="flex-child">
            <h3 class="text-chart">Relatório de Impacto de Proteção de Dados - RIPD</h3>
        </div>
        <hr>
    </div>

</header>    
<body>
  
    @foreach($tableData as $data)
<div class="page">
    <div class="card-body">
        <h4>Diretoria:</h4>  
        <h4>Departamento:</h4><p>{{$data->departamento_id()->implode('')??""}}</p>
        <h4>Ativo ou Processo:</h4><p>{{$data->processo_id()->implode('')??""}}</p> 
        <h4>Responsável Interno:</h4> 
        <h4>Aprovador:</h4> 
        <h4>Informado:</h4> 
        <h4>Consultado:</h4> 
    </div> 
    <div class="card-body">  
        <h4> ID Riscos:</h4><p> {{$data->id_col}}</p>
        <h4> Evento de Risco:</h4><p> {{$data->eventos_de_risco}}</p>
        <h4> Dados Pessoais Coletados:</h4><p> {{$data->dados_pessoais_coletados_id()->implode('')??""}}</p>
        <h4> Categoria de Dados: </h4>  <p> {{$data->categoria_de_dados_id()->implode('')??""}}</p>
        <h4> Finalidade: </h4>  <p> {{$data->finalidade_id()->implode('')??""}}</p>
        <h4> Base legal:  </h4><p> {{$data->base_legal_id()->implode('')??""}}</p>
    </div>
</div>
    @php $baseslegais = $data->base_legal_id()->implode('') @endphp
    @if($baseslegais == $baselegal)
<div class="page">
        <div class="card-body">
            <h2>
                LIA - Legitimate Interest Assessment
            </h2>
            <h3> Legitimidade do Interesse</h3>
            <h4> A partir de uma situação concreta, existe uma finalidade legítima (lícita) para o tratamento de dados?</h4><br>
           
                    <input type="radio" id="sim" name="fav_language" value="sim">
                    <label for="nao">Sim</label><br>
              
                    <input type="radio" id="nao" name="fav_language" value="nao">
                    <label for="nao">Não</label><br>
              
           
            <h3> Necessidade</h3>
            <h4> É possível utilizar outra base legal para atingir essa finalidade legítima de maneira mais viável?</h4>
          
                    <input type="radio" id="sim" name="fav_language" value="sim">
                    <label for="nao">Sim</label><br>
              
                
                    <input type="radio" id="nao" name="fav_language" value="nao">
                    <label for="nao">Não</label><br>
               
            
            <h4> Para atingir a finalidade legítima é possível coletar a menor quantidade de dados possível (minimização)?</h4><br>
           
                
                    <input type="radio" id="sim" name="fav_language" value="sim">
                    <label for="nao">Sim</label><br>
               
                
                    <input type="radio" id="nao" name="fav_language" value="nao">
                    <label for="nao">Não</label><br>
               
     
            <h3> Balanceamento</h3>
            <h4> O uso dos dados e finalidade justificada para o tratamento ofende direitos ou liberdades fundamentais do respectivo titular?</h4><br>
 
                    <input type="radio" id="sim" name="fav_language" value="sim">
                    <label for="nao">Sim</label><br>
         
               
                    <input type="radio" id="nao" name="fav_language" value="nao">
                    <label for="nao">Não</label><br>
               
           
            <h3> Salvaguardas</h3>
            <h4> O controlador possui medidadas que garantam a transparência sobre o tratamento de dados, com a possibilidade de o titular dos dados apresentar oposição em relação à utilização de seus dados pessoais, se assim o desejar?</h4><br>             
          
            
                    <input type="radio" id="sim" name="fav_language" value="sim">
                    <label for="nao">Sim</label><br>
              
              
                    <input type="radio" id="nao" name="fav_language" value="nao">
                    <label for="nao">Não</label><br>
          
          
        </div>
    </div>
@endif
@endforeach
</body>
</html>