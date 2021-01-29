<?php
//
//namespace Tests\Unit;
//
//use App\Episodio;
//use App\Temporada;
//use Tests\TestCase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//
//class TemporadaTest extends TestCase
//{
//    /**@var Temporada */
//    private $temporada;
//
//    protected function setUp(): void
//    {
//        parent::setUp(); // TODO: Change the autogenerated stub
//        $temporada = new Temporada();
//        $episodio1 = new Episodio();
//        $episodio1->episodio_assistido = true;
//        $episodio2 = new Episodio();
//        $episodio2->episodio_assistido = false;
//        $episodio3 = new Episodio();
//        $episodio3->episodio_assistido = true;
//
//        $temporada->episodios->add($episodio1);
//        $temporada->episodios->add($episodio2);
//        $temporada->episodios->add($episodio3);
//
//        $this->temporada = $temporada;
//    }
//
//    public function testBuscaPorEpisodiosAssistidos()
//    {
//        $episodiosAssistidos = $this->temporada->getEpisodiosAssistidos();
//
//        $this->assertCount(2,$episodiosAssistidos);
//        foreach ($episodiosAssistidos as $episodio) {
//            $this->assertTrue($episodio->episodio_assistido);
//        }
//    }
//
//    public function testBuscaTodosOsEpisodios()
//    {
//        $episodios = $this->temporada->episodios;
//        $this->assertCount(3,$episodios);
//    }
//}