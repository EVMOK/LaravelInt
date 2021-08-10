<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Загрузка любых служб приложения.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(190);
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('group_id');
            $table->date('date_born');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('name');
            $table->index('date_born');

            $table->foreign('group_id')
                ->references('id')->on('groups');

            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table = new Blueprint('students');
        $table->dropForeign('students_group_id_foreign');
        $table->dropForeign('students_user_id_foreign');

        Schema::dropIfExists('students');
    }
}
