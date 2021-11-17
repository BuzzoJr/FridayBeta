<script>
    var noTableData = '{{trans('admiko.noTableData')}}';
    var tableInfo = '{{trans('admiko.tableInfo')}}';
    var dragDropTableInfo = '{{trans('admiko.dragDropTableInfo')}}';
    var lengthMenu = {!!config("admiko_config.length_menu_table_JS")!!};
    var csrf_token = "{{ csrf_token() }}";
    var mapStartZoom = {{config('admiko_config.map_start_zoom')}};
    var mapStarLatitude = {{config('admiko_config.map_star_latitude')}};
    var mapStarLongitude = {{config('admiko_config.map_star_longitude')}};
    /*Admiko Global Search*/
    var AdmikoGlobalSearchUrl = '{{route("admin.admiko_global_search")}}';
    var searchTypeMore = '{{trans('admiko.search_type_more')}}';
    var searchNoResults = '{{trans('admiko.search_no_results')}}';
    var searchError = '{{trans('admiko.search_error')}}';
</script>

<script> /*SELECT2*/
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            dropdownParent: $('#myModal')
        });   
    });
</script>

<script> /* CASCADE FILL MATRIZ DE RISCOS */
    function cascadeselectid(){
        var idprocesso = document.getElementById("id_no_data_mapping").value;
        document.getElementById('nome_do_ativo_ou_processo').value = idprocesso;
        document.getElementById('descrio').value = idprocesso;
        document.getElementById('departamento').value = idprocesso;
        document.getElementById('terceiro').value = idprocesso;
        document.getElementById('dados_pessoais_coletados').value = idprocesso;
        document.getElementById('finalidade').value = idprocesso;
        document.getElementById('categoria_de_dados').value = idprocesso;
        document.getElementById('titular_de_dados').value = idprocesso;
        document.getElementById('categoria_do_titular').value = idprocesso;
        document.getElementById('prazo_de_reteno').value = idprocesso;
        document.getElementById('base_legal').value = idprocesso;
        //console.log(idprocesso);
}
</script>

<script> //Calculo de Risco
    $(function() {
        $(".DropChange").change(function(){
          var probabilidade = $('#probabilidade').val();
          var impacto = $('#impacto').val();
    
        var resp = probabilidade.split("");
        var resi = impacto.split("");
    
          var riskVal = ((resp[0] * 1) * (resi[0] * 1));
          $('#riskVal').val(riskVal);
    
          $('#position').val(resp[0] + resi[0]);
    
          if (riskVal <= 3) { risco_inerente = "Baixo"} //Baixo 
            else if (riskVal <= 6) { risco_inerente = "Médio"} //Médio
            else if (riskVal <= 12) { risco_inerente = "Alto" } //Alto
            else { risco_inerente = "Extremo" }
            $('#risco_inerente').val(risco_inerente);
    
    
              var riscotest = $('#risco_inerente').val();
            $('#riscotest').val(riscotest);
    
            if (risco_inerente == "Baixo") {
            $("#risco_inerente").css("background", '#a3c989');
        }else if (risco_inerente == "Médio"){
            $("#risco_inerente").css("background", '#ffff99');
        }else if (risco_inerente == "Alto") {
            $("#risco_inerente").css("background", '#f4b084');
        }else {
            $("#risco_inerente").css("background", '#ff7171');
        }
    
        if (probabilidade == '1'){
            $("#probabilidade").css("background", '#c2dbb2');
        }else if (probabilidade == '2'){
            $("#probabilidade").css("background", '#a3c989');
        }else if (probabilidade == "3"){
            $("#probabilidade").css("background", '#ffff99');
        }else if (probabilidade == "4") {
            $("#probabilidade").css("background", '#f4b084');
        }else {
            $("#probabilidade").css("background", '#ff7171');
        }
        if (impacto == '1'){
            $("#impacto").css("background", '#c2dbb2');
        }else if (impacto == '2'){
            $("#impacto").css("background", '#a3c989');
        }else if (impacto == "3"){
            $("#impacto").css("background", '#ffff99');
        }else if (impacto == "4") {
            $("#impacto").css("background", '#f4b084');
        }else {
            $("#impacto").css("background", '#ff7171');
        }
        });
      });
    </script>

<script> //Calculo de Risco
    $(function() {
        $(".DropChange1").change(function(){
          var probabilidade_residual = $('#probabilidade_residual').val();
          var impacto_residual = $('#impacto_residual').val();
    
        var resp = probabilidade_residual.split("");
        var resi = impacto_residual.split("");
    
          var riskVal = ((resp[0] * 1) * (resi[0] * 1));
          $('#riskVal').val(riskVal);
    
          $('#position').val(resp[0] + resi[0]);
    
          if (riskVal <= 3) { risco_residual = "Baixo"} //Baixo 
            else if (riskVal <= 6) { risco_residual = "Médio"} //Médio
            else if (riskVal <= 12) { risco_residual = "Alto" } //Alto
            else { risco_residual = "Extremo" }
            $('#risco_residual').val(risco_residual);
    
    
              var riscotest = $('#risco_residual').val();
            $('#riscotest').val(riscotest);
    
            if (risco_residual == "Baixo") {
            $("#risco_residual").css("background", '#a3c989');
        }else if (risco_residual == "Médio"){
            $("#risco_residual").css("background", '#ffff99');
        }else if (risco_residual == "Alto") {
            $("#risco_residual").css("background", '#f4b084');
        }else {
            $("#risco_residual").css("background", '#ff7171');
        }
    
        if (probabilidade_residual == '1'){
            $("#probabilidade_residual").css("background", '#c2dbb2');
        }else if (prob_residual == '2'){
            $("#probabilidade_residual").css("background", '#a3c989');
        }else if (probabilidade_residual == "3"){
            $("#probabilidade_residual").css("background", '#ffff99');
        }else if (probabilidade_residual == "4") {
            $("#probabilidade_residual").css("background", '#f4b084');
        }else {
            $("#probabilidade_residual").css("background", '#ff7171');
        }
        if (impacto_residual == '1'){
            $("#impacto_residual").css("background", '#c2dbb2');
        }else if (impacto_residual == '2'){
            $("#impacto_residual").css("background", '#a3c989');
        }else if (impacto_residual == "3"){
            $("#impacto_residual").css("background", '#ffff99');
        }else if (impacto_residual == "4") {
            $("#impacto_residual").css("background", '#f4b084');
        }else {
            $("#impacto_residual").css("background", '#ff7171');
        }
        });
      });
    </script>

<script type="text/javascript">
    var risk = ['Vazamento, alteração ou destruição de dados de forma acidental ou ilícita.', 
                'Tratar dados sem utilizar medidas técnicas e administrativas para protegê-los.', 
                'Vazamento de dados no ambiente do terceiro.', 
                'Retenção irregular de dados pessoais após cumprir sua finalidade.', 
                'Não informar ou informar finalidade diversa da destinação dos dados ao titular.', 
                'Tratamento de dados pessoais sem o devido consentimento do titular e/ou responsável legal.', 
                'Impossibilidade de atendimento das solicitações do titular do dado pessoal.', 
                'Coleta excessiva de dados pessoais.', 
                'Impossibilidade de responder à ANPD em caso de incidentes.'];

    var eventorisco = ['Vazamento, alteração ou destruição de dados de forma acidental ou ilícita.', 
                'Tratar dados sem utilizar medidas técnicas e administrativas para protegê-los.', 
                'Vazamento de dados no ambiente do terceiro.', 
                'Retenção irregular de dados pessoais após cumprir sua finalidade.', 
                'Não informar ou informar finalidade diversa da destinação dos dados ao titular.', 
                'Tratamento de dados pessoais sem o devido consentimento do titular e/ou responsável legal.', 
                'Impossibilidade de atendimento das solicitações do titular do dado pessoal.', 
                'Coleta de dados além da sua finalidade.', 
                'Impossibilidade de responder à ANPD em caso de incidentes.'];
    var causa = ['Armazenamento de documentos no servidor de e-mail. Armazenar de forma inadequada dados pessoais. Ausência de controle e restrição de acesso. Usar dados para finalidade alheia.', 
                'Armazenamento de documentos pessoais no servidor de arquivos sem controle de acesso. Armazenamento de documentos pessoais em arquivo físico sem controle de acesso. Armazenar de forma inadequada dados pessoais.', 
                'Fragilidade na avaliação de terceiros sobre questões de privacidade e segurança.', 
                'Ausência de política de descarte.', 
                'Utilização de dados pessoais para fins alheios aos informados.', 
                'Utilização de dados pessoais sem consentimento. Tratar dados com autorização genérica. Comunicação indesejada.', 
                'Ausência de  procedimento formal para exclusão de dados. Não cumprir com as solicitações do titular.', 
                'Coleta de dados além da sua finalidade.', 
                'Ausência de procedimento de resposta a incidentes de segurança da informação.'];
    var categoriarisco = ['Segurança Digital', 
                'Segurança Digital', 
                'Segurança Digital', 
                'Privacidade', 
                'Privacidade', 
                'Privacidade', 
                'Privacidade', 
                'Privacidade', 
                'Privacidade'];
    var consequencia = ['Ações individuais dos titulares. Aplicação de sanções previstas no artigo 52 da LGPD.', 
                'Ações individuais dos titulares. Aplicação de  sanções previstas no artigo 52 da LGPD. Incidentes de segurança ou tratamento indevido de dados pessoais.', 
                'Ações individuais dos titulares. Aplicação de sanções previstas no artigo 52 da LGPD.', 
                'Ações individuais dos titulares. Aplicação de sanções previstas no artigo 52 da LGPD.', 
                'Ações individuais dos titulares. Aplicação de sanções previstas no artigo 52 da LGPD.', 
                'Denúncia do titular do dado para a ANPD sobre a dificuldade de exigir seus direitos, previstos na LGPD e, consequentemente, sobre tratamento irregular, já que não há consentimento. Ações individuais dos titulares. Aplicação de sanções previstas no artigo 52 da LGPD.', 
                'Ações individuais dos titulares. Aplicação de sanções previstas no artigo 52 da LGPD.', 
                'Aplicação de  sanções previstas no artigo 52 da LGPD.', 
                'Aplicação de  sanções previstas no artigo 52 da LGPD.'];

    var plano = ['Redesenho de processo: Evitar o compartilhamento desnecessário de dados e documentos. Implementar controle e restrição de acesso somente às pessoas autorizadas. Elaboração de treinamentos para conscientização e educação de colaboradores e terceiros: Todos os funcionários da organização e, quando pertinente, fornecedores e terceiros devem receber treinamento apropriado em conscientização e atualizações regulares nas políticas e procedimentos organizacionais relevantes para as suas funções.', 
                'Política de Privacidade e Segurança da Informação: Elaborar política de Segurança da Informação para evitar que os colaboradores possam compartilhar dados pessoais com pessoas não autorizadas. Controle e restrição de acesso: Implementar controle e restrição de acesso somente às pessoas autorizadas.', 
                'Análise de riscos de terceiros: Elaborar uma avaliação de terceiros com foco em questões de privacidade de dados pessoais e segurança da informação. Avaliação contratual: Incluir cláusula de proteção de dados pessoais no contrato com o terceiro envolvido.', 
                'Política de Retenção e Descarte: Elaboração e implementação de uma política de retenção e descarte de dados pessoais.', 
                'Gerênciamento de Consentimento: A organização deve coletar consentimento de forma livre, informada e inequívoca pela qual o titular concorda com o tratamento dos seus dados para todas as finalidades.', 
                'Gerênciamento de Consentimento: A organização deve coletar consentimento de forma livre, informada e inequívoca pela qual o titular concorda com o tratamento dos seus dados para todas as finalidades.', 
                'Direito do titular: Elaborar um fluxograma para atendimento das requisições dos titulares no prazo máximo de 15 dias. Ao receber o requerimento do titular, é necessário analisar sua viabilidade, de acordo com a finalidade e a base legal do tratamento dos dados pessoais. Ao responder o titular do dado, informá-lo se foi possível atender seu requerimento ou justificar de forma fundamentada a sua impossibilidade. ', 
                'Resposta a incidentes de segurança: Criar procedimentos de resposta à ANPD em caso de incidentes de segurança da informação.', 
                'Resposta a incidentes de segurança: Criar procedimentos de resposta à ANPD em caso de incidentes de segurança da informação.'];
    var fund = ['LGPD - Art. 6º As atividades de tratamento de dados pessoais deverão observar a boa-fé e os seguintes princípios: VIII - prevenção: adoção de medidas para prevenir a ocorrência de danos em virtude do tratamento de dados pessoais. ISO 27001 - A.10.8.1  - Políticas e procedimentos para troca de informações', 
                'LGPD - Art. 6º As atividades de tratamento de dados pessoais deverão observar a boa-fé e os seguintes princípios: VII - segurança: utilização de medidas técnicas e administrativas aptas a proteger os dados pessoais de acessos não autorizados e de situações acidentais ou ilícitas de destruição, perda, alteração, comunicação ou difusão. ISO 27001 - A.15.2 -  Conformidade com normas e políticas de segurança da informação e conformidade técnica', 
                'LGPD - Art. 50. Os controladores e operadores, no âmbito de suas competências, pelo tratamento de dados pessoais, individualmente ou por meio de associações, poderão formular regras de boas práticas e de governança que estabeleçam as condições de organização, o regime de funcionamento, os procedimentos, incluindo reclamações e petições de titulares, as normas de segurança, os padrões técnicos, as obrigações específicas para os diversos envolvidos no tratamento, as ações educativas, os mecanismos internos de supervisão e de mitigação de riscos e outros aspectos relacionados ao tratamento de dados pessoais. ISO 27001 - A.6.2.1 - Identificação dos riscos relacionados com partes externas', 
                'LGPD - Art. 16. Os dados pessoais serão eliminados após o término de seu tratamento, no âmbito e nos limites técnicos das atividades, autorizada a conservação para as seguintes finalidades. ISO 27701 - A.7.4.7 - Retenção ISO 27701 - A.7.4.8 - Descarte', 
                'LGPD - Art. 6º As atividades de tratamento de dados pessoais deverão observar a boa-fé e os seguintes princípios: VIII - prevenção: adoção de medidas para prevenir a ocorrência de danos em virtude do tratamento de dados pessoais. ISO 27001 - A.10.8.1  - Políticas e procedimentos para troca de informações.', 
                'LGPD - Art. 7º O tratamento de dados pessoais somente poderá ser realizado nas seguintes hipóteses: I - mediante o fornecimento de consentimento pelo titular. ISO 27701 - A.7.3.4 - Fornecendo mecanismos para modificar ou cancelar o consentimento.', 
                'LGPD - Art. 18. O titular dos dados pessoais tem direito a obter do controlador, em relação aos dados do titular por ele tratados, a qualquer momento e mediante requisição. LGPD - Art. 19.  A confirmação de existência ou o acesso a dados pessoais serão providenciados, mediante requisição do titular: II - por meio de declaração clara e completa, que indique a origem dos dados, a inexistência de registro, os critérios utilizados e a finalidade do tratamento, observados os segredos comercial e industrial, fornecida no prazo de até 15 (quinze) dias, contado da data do requerimento do titular. ISO 27701 - A.7.3.1 - Determinando e cumprindo as obrigações para os titulares de DP.', 
                'LGPD - Art. 48. O controlador deverá comunicar à autoridade nacional e ao titular a ocorrência de incidente de segurança que possa acarretar risco ou dano relevante aos titulares. ISO 27701 - 6.13.1 Gestão de incidentes de segurança da informação e melhorias.', 
                'LGPD - Art. 48. O controlador deverá comunicar à autoridade nacional e ao titular a ocorrência de incidente de segurança que possa acarretar risco ou dano relevante aos titulares. ISO 27701 - 6.13.1 Gestão de incidentes de segurança da informação e melhorias.'];

  var arraylength = risk.length;
  var i;
  var options = '';

  options += '<option value="default">Escolha o Risco</option>';
  for(i = 0; i < arraylength; i++)
    options += '<option value="'+risk[i]+'">'+risk[i]+'</option>';
  
  document.getElementById('risk').innerHTML = options.toString();
  document.getElementById('risk').selectedIndex = 0;
  getNumber();
  
  function getNumber(){
	var index = document.getElementById('risk').selectedIndex;
	
	if(index == 0){
		document.getElementById('eventos_de_risco').value = "";
        document.getElementById('causas').value = "";
        document.getElementById('categoria_de_risco').value = "";
        document.getElementById('consequncias').value = "";
        document.getElementById('planos_de_ao_para_implementao_de_controles').value = "";
        document.getElementById('fundamentao').value = "";
	} else {
		document.getElementById('eventos_de_risco').value = eventorisco[index-1];
        document.getElementById('causas').value = causa[index-1];
        document.getElementById('categoria_de_risco').value = categoriarisco[index-1];
        document.getElementById('consequncias').value = consequencia[index-1];
        document.getElementById('planos_de_ao_para_implementao_de_controles').value = plano[index-1];
        document.getElementById('fundamentao').value = fund[index-1];
	}
  }
</script>

<script src="{{ asset('assets/admiko/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/admiko/vendors/jquery/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/admiko/vendors/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/admiko/vendors/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/admiko/vendors/datepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('assets/admiko/vendors/select2/js/select2.full.js') }}"></script>
<script src="{{ asset('assets/admiko/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/admiko/vendors/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/admiko/vendors/listjs/list.min.js') }}"></script>
<script src="{{ asset('assets/admiko/js/global.js') }}"></script>
<script src="{{ asset('assets/admiko/js/index_start.js') }}"></script>
<script src="{{ asset('assets/admiko/js/form_start.js') }}"></script>
<script src="{{ asset('assets/admiko/js/form_validate.js') }}"></script>
<script src="{{ asset('assets/admiko/js/avatar.js') }}"></script>
@if(config('admiko_config.google_map_api_key'))
    <script src="//maps.googleapis.com/maps/api/js?key={{config('admiko_config.google_map_api_key')}}&callback=startGoogleMaps" async defer></script>
@endIf
@if(config('admiko_config.bing_map_api_key'))
    <script>
        var bingKey = "{{config('admiko_config.bing_map_api_key')}}";
    </script>
    <script type='text/javascript' src='//www.bing.com/api/maps/mapcontrol?callback=startBingMaps' async defer></script>
@endIf
@yield('footerCode')
