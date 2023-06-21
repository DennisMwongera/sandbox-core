<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();;
            $table->string('development_status')->default('pending');
            $table->string('developer')->nullable();;
            $table->timestamp('deployment');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
        // Call the insertMockData() method here
        $this->insertMockData();
    }
    public function insertMockData()
    {
        $data = [
            [
                'title' => 'Sabasi Application',
                'description' => 'This is the Sabasi application.',
                'development_status' => 'pending',
                'developer' => 'John Doe',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Open County Application',
                'description' => 'This is the Open County application.',
                'development_status' => 'staging',
                'developer' => 'Jane Smith',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Nuru Application',
                'description' => 'This is the Nuru application.',
                'development_status' => 'pending',
                'developer' => 'John Doe',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Old Open County Application',
                'description' => 'This is the Old Open County application.',
                'development_status' => 'staging',
                'developer' => 'Jane Smith',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Maono Application',
                'description' => 'This is the Maono application.',
                'development_status' => 'pending',
                'developer' => 'John Doe',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kilifi M and E Application',
                'description' => 'This is the Kilifi M and E application.',
                'development_status' => 'staging',
                'developer' => 'Jane Smith',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Nairobi M and E Application',
                'description' => 'This is the Nairobi M and E application.',
                'development_status' => 'pending',
                'developer' => 'John Doe',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ability Application',
                'description' => 'This is the Ability application.',
                'development_status' => 'staging',
                'developer' => 'Jane Smith',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sample Application 1',
                'description' => 'This is a sample application.',
                'development_status' => 'pending',
                'developer' => 'John Doe',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sample Application 2',
                'description' => 'Another sample application.',
                'development_status' => 'staging',
                'developer' => 'Jane Smith',
                'deployment' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more data as needed
        ];

        DB::table('applications')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
