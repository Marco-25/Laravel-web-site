<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $ep_por_temporada): Serie
    {
        DB::beginTransaction();
            $serie = Serie::create(['nome' => $nomeSerie]);
            $this->criaTemporada($qtdTemporadas, $serie, $ep_por_temporada);
        DB::commit();
        return $serie;
    }

    /**
     * @param int $qtdTemporadas
     * @param $serie
     * @param int $ep_por_temporada
     */
    public function criaTemporada(int $qtdTemporadas,Serie $serie, int $ep_por_temporada): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodio($ep_por_temporada, $temporada);
        }
    }

    /**
     * @param int $ep_por_temporada
     * @param $temporada
     */
    public function criaEpisodio(int $ep_por_temporada, $temporada): void
    {
        for ($j = 1; $j <= $ep_por_temporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
