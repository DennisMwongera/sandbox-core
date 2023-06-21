<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('lead_program_officer');
            $table->string('support_department');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
        $this->insertMockData();
    }
    public function insertMockData()
    {
        $programmes = [
            [
                'title' => 'Data Fellowship',
                'lead_program_officer' => 'Christine',
                'support_department' => 'Finance',
                'status' => 'ongoing',
            ],
            [
                'title' => 'Ficha Uchi Campaign',
                'lead_program_officer' => 'Esther',
                'support_department' => 'Human Resources',
                'status' => 'completed',
            ],
            [
                'title' => 'Open Chats',
                'lead_program_officer' => 'Esther',
                'support_department' => 'Comms',
                'status' => 'completed',
            ],
            [
                'title' => 'Code Jam Competition',
                'lead_program_officer' => 'John',
                'support_department' => 'Technology',
                'status' => 'ongoing',
            ],
            [
                'title' => 'Community Outreach',
                'lead_program_officer' => 'Alice',
                'support_department' => 'Public Relations',
                'status' => 'completed',
            ],
            [
                'title' => 'Health Awareness Campaign',
                'lead_program_officer' => 'Michael',
                'support_department' => 'Health Services',
                'status' => 'ongoing',
            ],
            [
                'title' => 'Education Scholarship Program',
                'lead_program_officer' => 'Emily',
                'support_department' => 'Education',
                'status' => 'ongoing',
            ],
            [
                'title' => 'Environmental Sustainability Initiative',
                'lead_program_officer' => 'David',
                'support_department' => 'Environment',
                'status' => 'completed',
            ],
            [
                'title' => 'Art Exhibition',
                'lead_program_officer' => 'Sophia',
                'support_department' => 'Arts and Culture',
                'status' => 'completed',
            ],
            [
                'title' => 'Sports Development Program',
                'lead_program_officer' => 'Daniel',
                'support_department' => 'Sports',
                'status' => 'ongoing',
            ]
            // Add more mock data as needed
        ];

        DB::table('programmes')->insert($programmes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programmes');
    }
}
