<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscordPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discord_posts', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->timestamp('created_utc');
            $table->text('ressource_url');
            $table->text('username');
            $table->text('discord_user_id');
            $table->text('discord_guild_id');
            $table->text('discord_channel_id');
            $table->text('discord_message_id');
            $table->text('text')->nullable();
            $table->text('avatar_url')->nullable();
            $table->text('invite_url')->nullable();
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('discord_posts');
    }
}
