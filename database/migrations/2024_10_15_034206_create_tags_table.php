<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            // In the second parameter, overrides the default column name to 'job_listing_id'// What do constrained and cascadeOnDelete do?
            $table->foreignIdFor(App\Models\Job::class, 'job_listing_id')->constrained()->cascadeOnDelete();
            // What do constrained and cascadeOnDelete do?
            // The constrained method creates a foreign key constraint, linking this column to the referenced record.
            // The cascadeOnDelete method ensures that if the referenced record is deleted, the pivot record is also deleted.
            $table->foreignIdFor(App\Models\Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
    }
};
