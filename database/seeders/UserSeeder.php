<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','sazid@gmail.com')->first(); 
        if(is_null($user)){
                $user = new User;
                $user->name='sazid';
                $user->email='sazid@gmail.com';
                $user->password=Hash::make('12345678');
                $user->save();
        }
    }
}
