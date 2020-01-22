<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'lastName' => 'Dracula',
            'firstName' => 'Blahblahblah',
            'role' => 'proprietaire',
            'postalCode'=> rand(10000, 99999) ,
            'phoneNumber'=> rand(1000000000, 9999999999),
            'wage'=> rand(1000, 3000),
            'email'=>Str::random(10).'@gmail.com',
            'avatar'=>'data:image/jpeg;base64,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',
            'password'=> Hash::make('password')
        ]);
        DB::table('users')->insert([
            'lastName' => 'Frankenstein',
            'firstName' => 'Monster',
            'role' => 'manager',
            'postalCode'=> rand(10000, 99999) ,
            'phoneNumber'=> rand(1000000000, 9999999999),
            'wage'=> rand(1000, 3000),
            'email'=>Str::random(10).'@gmail.com',
            'avatar'=>'data:image/jpeg;base64,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',
            'password'=> Hash::make('password')
        ]);
        DB::table('users')->insert([
            'lastName' => 'Mavis',
            'firstName' => 'Blahblahblah',
            'role' => 'personnel',
            'postalCode'=> rand(10000, 99999) ,
            'phoneNumber'=> rand(1000000000, 9999999999),
            'wage'=> rand(1000, 3000),
            'email'=>Str::random(10).'@gmail.com',
            'avatar'=>'http://images6.fanpop.com/image/photos/38700000/Mavis-hotel-transylvania-38726899-337-498.jpg',
            'password'=> Hash::make('password')
        ]);
        DB::table('users')->insert([
            'lastName' => 'Murray',
            'firstName' => 'Mummy',
            'postalCode'=> rand(10000, 99999) ,
            'phoneNumber'=> rand(1000000000, 9999999999),
            'wage'=> rand(1000, 3000),
            'role' => 'personnel',
            'email'=>Str::random(10).'@gmail.com',
            'avatar'=>'https://vignette.wikia.nocookie.net/hoteltransylvania/images/5/50/HYixPdaMSAc.jpg/revision/latest?cb=20151111195435',
            'password'=> Hash::make('password')
        ]);
        DB::table('users')->insert([
            'lastName' => 'Jon',
            'firstName' => 'Mokona',
            'role' => 'client',
            'postalCode'=> rand(10000, 99999) ,
            'phoneNumber'=> rand(1000000000, 9999999999),
            'email'=>Str::random(10).'@gmail.com',
            'password'=> Hash::make('password')
        ]);
        DB::table('users')->insert([
            'lastName' => 'Antony',
            'firstName' => 'Corrot',
            'role' => 'client',
            'postalCode'=> rand(10000, 99999) ,
            'phoneNumber'=> rand(1000000000, 9999999999),
            'email'=>Str::random(10).'@gmail.com',
            'password'=> Hash::make('password')
        ]);
        DB::table('users')->insert([
            'lastName' => 'Fx',
            'firstName' => 'Cotte',
            'role' => 'client',
            'postalCode'=> rand(10000, 99999) ,
            'phoneNumber'=> rand(1000000000, 9999999999),
            'email'=>Str::random(10).'@gmail.com',
            'password'=> Hash::make('password')
        ]);
        DB::table('users')->insert([
            'lastName' => 'Baptiste',
            'firstName' => 'Morreau',
            'role' => 'client',
            'postalCode'=> rand(10000, 99999) ,
            'phoneNumber'=> rand(1000000000, 9999999999),
            'email'=>Str::random(10).'@gmail.com',
            'password'=> Hash::make('password')
        ]);
        DB::table('users')->insert([
            'lastName' => 'Djihane',
            'firstName' => 'Jesaisplus',
            'role' => 'client',
            'postalCode'=> rand(10000, 99999) ,
            'phoneNumber'=> rand(1000000000, 9999999999),
            'email'=>Str::random(10).'@gmail.com',
            'password'=> Hash::make('password')
        ]);

    }
}
