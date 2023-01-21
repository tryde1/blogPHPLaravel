<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('phonenumber');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->string('permissions');
        });

        $user = new \App\User();

        $user->email = 'ermakermashko.aa@students.dvfu.ru';
        $user->password = 'wertolet1122';
        $user->name = 'Алексей';
        $user->surname = 'Ермак-Ермашко';
        $user->phonenumber = '89532205606';
        $user->permissions = 'admin';

        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
