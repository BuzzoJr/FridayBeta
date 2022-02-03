<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

//use Maatwebsite\Excel\Concerns\FromQuery;


use App\Models\Admin\Processos;
use App\Models\Admin\Terceiros;
use App\Models\Admin\Ativos;
use App\Models\Admin\MatrizDeRiscos;

class UsersExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        $sheets = [new processosexport, new ativosexport, new terceirosexport, new matrizexport];

        return $sheets;
    }
}

class processosexport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        $collectprocessos = Processos::all();
        foreach ($collectprocessos as $key=>$rows){
            $rows['id'] = '';
        
            $collectionprocessos[] = $rows;
        }
        $processosobj = collect($collectionprocessos);
        return $processosobj;
    }
}
class ativosexport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        $collectativos = Ativos::all();
        foreach ($collectativos as $key=>$rows){
            $rows['id'] = '';
        
            $collectionativos[] = $rows;
        }
        $ativosobj = collect($collectionativos);
        return $ativosobj;
    }
}
class terceirosexport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        $collectterceiros = Terceiros::all();

        foreach ($collectterceiros as $key=>$rows){
            $rows['id'] = '';
        
            $collectionterceiros[] = $rows;
        }
        $terceirosobj = collect($collectionterceiros);
        return $terceirosobj;
    }
}
class matrizexport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        $collectmatriz = MatrizDeRiscos::all();
        foreach ($collectmatriz as $key=>$rows){
            if ($rows['probabilidade'] == "1"){
                $rows['probabilidade'] = "1 - Muito Baixa";
            } elseif ('probabilidade' == "2"){
                $rows = ["2 - Baixa"];
            }elseif ($rows['probabilidade'] == "3"){
                $rows['probabilidade'] = "3 - Média";
            }elseif ($rows['probabilidade'] == "4"){
                $rows['probabilidade'] = "4 - Alta";
            }else{
                $rows['probabilidade'] = "5 - Muito Alta";
            }

            $rows['id'] = '';
            $rows['nome_do_ativo_ou_processo'] = '';
            $rows['descrio'] = '';
            $rows['departamento'] = '';
            $rows['terceiro'] = '';
            $rows['dados_pessoais_coletados'] = '';
            $rows['finalidade'] = '';
            $rows['categoria_de_dados'] = '';
            $rows['titular_de_dados'] = '';
            $rows['categoria_do_titular'] = '';
            $rows['prazo_de_reteno'] = '';
            $rows['base_legal'] = '';
            $rows['risco_inerente'] = '';
            
            if ($rows['impacto'] == "1"){
                $rows['impacto'] = "1 - Muito Baixo";
            } elseif ('impacto' == "2"){
                $rows = ["2 - Baixo"];
            }elseif ($rows['impacto'] == "3"){
                $rows['impacto'] = "3 - Médio";
            }elseif ($rows['impacto'] == "4"){
                $rows['impacto'] = "4 - Alto";
            }else{
                $rows['impacto'] = "5 - Muito Alto";
            }
            $collectionriscos[] = $rows;
        }
        $collectobj = collect($collectionriscos);
        return $collectobj;
    }
}