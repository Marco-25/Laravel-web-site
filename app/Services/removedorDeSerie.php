<?php

namespace App\Services;

use App\{Serie,Temporada, Episodio};
use Illuminate\Support\Facades\DB;

class removedorDeSerie
{
    public function removerSerie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            $this->removerTemporada($serie);
            $serie->delete();
        });

        return $nomeSerie;
    }

    /**
     * @param $serie
     */
    private function removerTemporada(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    /**
     * @param Temporada $temporada
     */
    private function removerEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
