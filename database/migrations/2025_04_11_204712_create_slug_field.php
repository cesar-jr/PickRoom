<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hidehalo\Nanoid\Client as Nanoid;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('polls', function (Blueprint $table) {
            $table->string("slug", length: 50)->nullable();
        });

        $nanoid = new Nanoid();
        DB::table("polls")->select('id')->chunkById(100, function (Collection $polls) use ($nanoid) {
            foreach ($polls as $poll) {
                DB::table("polls")->where('id', $poll->id)->update(['slug' => $nanoid->generateId(10)]);
            }
        });

        Schema::table('polls', function (Blueprint $table) {
            $table->string("slug", length: 50)->nullable(false)->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('polls', function (Blueprint $table) {
            $table->dropColumn("slug");
        });
    }
};
