<?php
/** Admiko routes. This file will be overwritten on page import. Don't add your code here! **/
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**Processos**/
Route::delete("processos/destroy", [ProcessosController::class,"destroy"])->name("processos.delete");
Route::resource("processos", ProcessosController::class)->parameters(["processos" => "processos"]);
/**Terceiros**/
Route::delete("terceiros/destroy", [TerceirosController::class,"destroy"])->name("terceiros.delete");
Route::resource("terceiros", TerceirosController::class)->parameters(["terceiros" => "terceiros"]);
/**Ativos**/
Route::delete("ativos/destroy", [AtivosController::class,"destroy"])->name("ativos.delete");
Route::resource("ativos", AtivosController::class)->parameters(["ativos" => "ativos"]);
/**MatrizDeRiscos**/
Route::delete("matriz_de_riscos/destroy", [MatrizDeRiscosController::class,"destroy"])->name("matriz_de_riscos.delete");
Route::resource("matriz_de_riscos", MatrizDeRiscosController::class)->parameters(["matriz_de_riscos" => "matriz_de_riscos"]);
/**MapaDeCalor**/
Route::post("mapa_de_calor/admiko_dynamic_fields/{id}", [MapaDeCalorController::class,"admiko_dynamic_fields"])->name("mapa_de_calor.admiko_dynamic_fields");
Route::delete("mapa_de_calor/destroy", [MapaDeCalorController::class,"destroy"])->name("mapa_de_calor.delete");
Route::resource("mapa_de_calor", MapaDeCalorController::class)->parameters(["mapa_de_calor" => "mapa_de_calor"]);
