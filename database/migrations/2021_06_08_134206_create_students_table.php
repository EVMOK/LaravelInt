<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    private const TABLE_NAME = 'students';

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
            $table->increments('id');
            $table->string('name');
            $table->foreignId('group_id')->constrained('groups');
            $table->date('date_born')->index();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
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
        $table->dropForeign('students_group_id_foreign');
        $table->dropForeign('students_user_id_foreign');

        Schema::dropIfExists(self::TABLE_NAME);
    }
}
