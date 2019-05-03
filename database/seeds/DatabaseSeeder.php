<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Level;
use App\Employee;
use App\Type;
use App\Room;

use App\User;
use App\Operator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        Level::create(['name'=>'admin']);
        Level::create(['name'=>'operator']);
        Level::create(['name'=>'maintain']);

        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin'),
            'level_id'=>1
        ]);

        User::create([
            'name'=>'operator',
            'email'=>'operator@gmail.com',
            'password'=>Hash::make('operator'),
            'level_id'=>2
        ]);

        User::create([
            'name'=>'maintain',
            'email'=>'maintain@gmail.com',
            'password'=>Hash::make('maintain'),
            'level_id'=>3
        ]);

        for ($i=0; $i < 10 ; $i++) { 
        	Type::create([
				'name'=>'Type'.$i,
				'code'=>'T00'.$i,
				'desc'=>$faker->text,
        	]);

        	Room::create([
				'name'=>'Room'.$i,
				'code'=>'R00'.$i,
				'desc'=>$faker->text,
        	]);

        	Employee::create([
        		'name'=>$faker->name,
        		'nip'=>'100'.$i,
        		'password'=>Hash::make('100'.$i),
        		'address'=>$faker->address
        	]);

        }
    }
}


