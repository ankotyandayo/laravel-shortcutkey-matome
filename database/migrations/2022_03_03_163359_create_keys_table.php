<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->string('key_1')->nullable();
            $table->string('key_2')->nullable();
            $table->string('key_3')->nullable();
            $table->string('key_4')->nullable();
            $table->string('note')->nullable();
            $table->text('content');
            $table->unsignedBigInteger('admin_id');
            // 論理削除を定義→deleted_atを自動生成
            $table->softDeletes();
            // timestampと書いてしまうと、レコード挿入時、更新時に値が入らないので、DB::rawで直接書く
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keys');
    }
}
