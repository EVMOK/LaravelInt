<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    private const TABLE_NAME = 'scores';

    /**
     * Загрузка любых служб приложения.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->unsignedInteger('student_id');
            $table->unsignedSmallInteger('discipline_id');
            $table->tinyInteger('value')->unsigned()->index();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('discipline_id')->references('id')->on('disciplines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table = new Blueprint(self::TABLE_NAME);
        $table->dropForeign('scores_student_id_foreign');
        $table->dropForeign('scores_discipline_id_foreign');

        Schema::dropIfExists(self::TABLE_NAME);
    }
}
