<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->timestamps();
        });

        DB::table('roles')->insert(
            array(
                array(
                    'name' => 'ADMIN',
                    'description' => 'Admin of the project',
                ),
                array(
                    'name' => 'MANAGER',
                    'description' => 'Manager of the project', 
                ),
                array(
                    'name' => 'DOCTOR',
                    'description' => 'Doctor of the project', 
                ),
                array(
                    'name' => 'PATIENT',
                    'description' => 'Patient of the project', 
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
