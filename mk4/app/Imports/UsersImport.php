<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\HasReferencesToOtherSheets;

use App\Models\Admin\Processos;
use App\Models\Admin\Terceiros;
use App\Models\Admin\Ativos;
use App\Models\Admin\MatrizDeRiscos;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class UsersImport implements WithMultipleSheets
{
    public function sheets(): array
    {   
        return [
            'DM - Processos' => new FirstSheetImport(),
            'DM - Terceiros' => new SecondSheetImport(),
            'DM - Ativos' => new ThirdSheetImport(),
            'Matriz de Riscos' => new FourthSheetImport(),
        ];
    }
}

class FirstSheetImport implements ToCollection, WithStartRow, HasReferencesToOtherSheets
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if(!is_null($row[2])){
            Processos::create([
                'id_processo' => $row[1],
                'processo' => $row[2],
                'descrio' => $row[3],
                'responsvel_pelo_processo' => $row[4],
                'forma_de_coleta_dos_dados' => $row[5],
                'id_da_coleta' => $row[6],
                'tipo_de_armazenamento' => $row[7],
                'id_de_armazenamento' => $row[8],
                'nome_do_sistema_de_armazenamento' => $row[9],
                'matriz_ou_filial' => $row[10],
                'departamento' => $row[11],
                'id_do_terceiro' => $row[12],
                'nome_do_terceiro' => $row[13],
                'localizao_fsica' => $row[14],
                'dados_pessoais_coletados' => $row[15],
                'volume_de_dados_pessoais' => $row[16],
                'tratamentos_realizados' => $row[17],
                'departamentos_com_acesso_aos_dados' => $row[18],
                'finalidade' => $row[19],
                'categoria_de_dados' => $row[20],
                'titular_de_dados' => $row[21],
                'categoria_do_titular' => $row[22],
                'prazo_de_reteno' => $row[23],
                'base_legal' => $row[24],
                'responsvel_interno' => $row[25],
            ]);
            }
        }
    }
    public function startRow(): int
    {
        return 6;
    }
}

class SecondSheetImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if(!is_null($row[2])){
            Terceiros::create([
                'id_terceiros' => $row[1],
                'nome_do_terceiro' => $row[2],
                'descrio' => $row[3],
                'localizao_fsica_terceiro' => $row[4],
                'id_do_ativo' => $row[5],
                'ativo_sistemadocumento' => $row[6],
                'responsvel_interno_pelo_ativo' => $row[7],
                'tipo_de_servio_prestado' => $row[8],
                'nome_do_testatusrceiro' => $row[9],
                'importncia' => $row[10],
                'site_terceiro' => $row[11],
                'cnpj_terceiro' => $row[12],
                'nome_contato_terceiro' => $row[13],
                'email_contato_terceiro' => $row[14],
                'telefone_de_contato_do_terceiro' => $row[15],
                'responsvel_interno' => $row[16],
            ]);
            }
        }
    }

    public function startRow(): int
    {
        return 5;
    }
}

class ThirdSheetImport implements ToCollection, WithStartRow, HasReferencesToOtherSheets
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if(!is_null($row[2])){
            Ativos::create([
                'id_ativo' => $row[1],
                'ativo' => $row[2],
                'descrio_ativo' => $row[3],
                'tipo_do_ativo' => $row[4],
                'linkip' => $row[5],
                'formato_do_ativo' => $row[6],
                'responsvel_pelo_ativo' => $row[7],
                'tipo_de_armazenamento' => $row[8],
                'formato_de_armazenamento' => $row[9],
                'nome_do_sistema_de_armazenamento' => $row[10],
                'matriz_ou_filial' => $row[1],
                'departamento' => $row[12],
                'id_do_terceiro' => $row[13],
                'nome_do_terceiro' => $row[14],
                'localizao_fsica_ativos' => $row[15],
                'dados_pessoais_coletados' => $row[16],
                'volume_de_dados_pessoais' => $row[17],
                'trfego_de_rede' => $row[18],
                'autenticao' => $row[19],
                'criptografia_no_armazenamento' => $row[20],
                'finalidade' => $row[21],
                'categoria_de_dados' => $row[22],
                'titular_de_dados' => $row[23],
                'categoria_do_titular' => $row[24],
                'prazo_de_reteno' => $row[25],
                'base_legal' => $row[26],
                'ativo_primrio_ou_secundrio' => $row[27],
                'id_primrio' => $row[28],
                'responsvel_interno' => $row[29],
            ]);
            }
        }
    }
    public function startRow(): int
    {
        return 6;
    }
}

class FourthSheetImport implements ToCollection, WithStartRow, WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $prob =  substr($row[19], 0,1);
            $imp =  substr($row[20], 0,1);
            $riscoinerente = substr(strstr($row[21], '-'), 2);
            if(!is_null($row[2])){
                MatrizDeRiscos::create([
                    'id_col' => $row[1],
                    'id_no_data_mapping' => $row[2],
                    'nome_do_ativo_ou_processo' => $row[2],
                    'descrio' => $row[2],
                    'departamento' => $row[2],
                    'terceiro' => $row[2],
                    'dados_pessoais_coletados' => $row[2],
                    'finalidade' => $row[2],
                    'categoria_de_dados' => $row[2],
                    'titular_de_dados' => $row[2],
                    'categoria_do_titular' => $row[2],
                    'prazo_de_reteno' => $row[2],
                    'base_legal' => $row[2],
                    'eventos_de_risco' => $row[14],
                    'causas' => $row[15],
                    'categoria_de_risco' => $row[16],
                    'consequncias' => $row[17],
                    'probabilidade' => $prob,
                    'impacto' => $imp,
                    'risco_inerente' => $riscoinerente,
                    'resposta_ao_risco' => $row[22],
                    'planos_de_ao_para_implementao_de_controles' => $row[23],
                    'fundamentao' => $row[24],
                    'status_do_plano_de_ao' => $row[25],
                    'gestor_responsvel' => $row[26],
                    'data_de_incio' => $row[27],
                    'data_de_limite' => $row[28],
                    'efetividade' => $row[29],
                    'fora' => $row[30],
                    'objetivo_do_risco' => $row[31],
                    'probabilidade_residual' => $row[33],
                    'impacto_residual' => $row[34],
            ]);
            }
        }
    }
    public function startRow(): int
    {
        return 6;
    }
}