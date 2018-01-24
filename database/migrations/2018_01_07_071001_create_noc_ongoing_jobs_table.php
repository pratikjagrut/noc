<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNocOngoingJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noc_ongoing_jobs', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('ticket')->nullable();
            $table->string('circuit_id')->nullable();
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('contact_details')->nullable();
            $table->string('consumer_type')->nullable();
            $table->string('generation_date_timestamp')->nullable();
            $table->text('case_reason')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('generated_by')->nullable();
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
        Schema::dropIfExists('noc_ongoing_jobs');
    }
}
