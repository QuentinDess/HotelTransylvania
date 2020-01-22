<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name' => 'Frankenstein',
            'doorNumber' => 42,
            'price' => 39,
            'size'=>'petite',
            'avatar'=>'https://s2.lmcdn.fr/multimedia/251500390745/30079582db8af/campus/comment-traiter-les-murs-et-le-sol-d-une-cave/traiter-les-murs-et-le-sol-d-une-cave.jpg',
            'description'=>'Sombre et humide, raviera les amateurs de cave. Parfaite pour les phobiques de la torche'
        ]);
        DB::table('rooms')->insert([
            'name' => 'Mummy\'s Sarcophagus',
            'doorNumber' => 77,
            'price' => 38,
            'size'=>'petite',
            'avatar'=>'https://www.cdiscount.com/pdt2/1/4/7/1/300x300/puc2009911655147/rw/grande-figurine-egyptienne-sarcophage-anubis-avec.jpg',
            'description'=>'Sarcophage XXL certie de saphir du nil et de dorure en or 12 carats, un petit nid douillet pour une nuit ou plusieur seul ou avec vos bandelettes'
        ]);
        DB::table('rooms')->insert([
            'name' => 'Mavis Suite',
            'doorNumber' => 18 ,
            'price' => 49,
            'size'=>'moyenne',
            'avatar'=>'https://i.pinimg.com/originals/4a/a0/07/4aa0073ce77534415cfdb165cb6a993c.jpg',
            'description'=>'Son style émo mais pas trop saura convenir à vos adoléchiants en besoin de liberté et d\'autonomie (et vous apportera le calme que vous méritez)'
        ]);
        DB::table('rooms')->insert([
            'name' => 'Werewolf\'s Lair',
            'doorNumber' => 42,
            'price' => 75,
            'size'=>'grande',
            'avatar'=>'http://www.grotte-de-la-vache.org/img/diapo/pillier.jpg',
            'description'=>'Bienvennue dans l\'antre du loup garou, spacieuse mais spartiate cette chambre pourra accueillir sans aucun soucis votre dernière portée de louveteaux'
        ]);
        DB::table('rooms')->insert([
            'name' => 'Dracula\'s Coffin',
            'doorNumber' => 666,
            'price' => 95,
            'size'=>'suite',
            'avatar'=>'https://static.papergeek.fr/2016/10/airbnb-dracula.jpg',
            'description'=>'Une suite trés luxueuse avec son bar à donneur de sang de tout type.Son petit plus le velour qui tapisse le cercueil qui fait office de lit (existe en double cercueil pour les amoureux)'
        ]);
        
    }
}
