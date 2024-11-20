<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepartmentIdToPositionsTable extends Migration
{
public function up()
{
Schema::table('positions', function (Blueprint $table) {
$table->unsignedBigInteger('department_id')->nullable();  // Add the department_id column
$table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');  // Foreign key constraint
});
}

public function down()
{
Schema::table('positions', function (Blueprint $table) {
$table->dropForeign(['department_id']);  // Remove the foreign key
$table->dropColumn('department_id');  // Drop the column
});
}
}
