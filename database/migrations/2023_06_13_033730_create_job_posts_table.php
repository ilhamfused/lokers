<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            // $table->string('company');
            $table->string('title');
            $table->string('slug');
            $table->text('job_description');
            $table->text('excerpt');
            $table->string('job_location');
            $table->boolean('is_active')->default(true);
            $table->foreignId('job_type_id');
            $table->foreignId('user_id');
            $table->foreignId('education_id');
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
        Schema::dropIfExists('job_posts');
    }
}
