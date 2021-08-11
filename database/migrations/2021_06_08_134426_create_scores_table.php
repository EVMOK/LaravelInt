<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
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
        Schema::create('scores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('discipline_id');
            $table->tinyInteger('value')->unsigned();
            $table->timestamps();

            $table->index('value');

            $table->foreign('student_id')
                ->references('id')->on('students')
                ->onDelete('cascade');

            $table->foreign('discipline_id')
                ->references('id')->on('disciplines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table = new Blueprint('scores');
        $table->dropForeign('scores_student_id_foreign');
        $table->dropForeign('scores_discipline_id_foreign');

        Schema::dropIfExists('scores');
    }
}
