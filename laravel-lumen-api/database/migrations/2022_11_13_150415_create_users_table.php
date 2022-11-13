<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('login', 100)->index();
            $table->string('email')->nullable();
            $table->string('avatar_url',200)->nullable();
            $table->string('type',100);
            $table->boolean('site_admin');
            $table->string('name',255)->nullable();
            $table->string('company')->nullable();
            $table->string('blog')->nullable();
            $table->string('location')->nullable();
            $table->text('bio')->nullable();
            $table->string('twitter_username')->nullable();
            $table->float('public_repos')->nullable();
            $table->float('followers')->nullable();
            $table->float('following')->nullable();
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
        Schema::dropIfExists('users');
    }
};
