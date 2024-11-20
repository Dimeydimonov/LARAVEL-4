<?php
// database/migrations/2024_11_10_200431_create_project_workers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_worker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->index()->constrained('projects');
            $table->foreignId('worker_id')->index()->constrained('workers');
            $table->unique(['project_id', 'worker_id']);
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
        Schema::dropIfExists('project_workers');
    }
}
