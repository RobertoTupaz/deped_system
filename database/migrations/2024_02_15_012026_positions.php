<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\This;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user2_available_position', function (Blueprint $table) {
            $table->id();
            $table->string('position_title');
            $table->string('salary_grade');
            $table->timestamps();
        });

        $this->addPositions();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user2_available_position');
    }

    private function addPositions()
    {
        $positions = [
            //Non-Teaching Positions//
            [
                'id' => 1,
                'position_title' => 'Attorney V',
                'salary_grade' => '25'
            ],
            [
                'id' => 2,
                'position_title' => 'Chief Accountant',
                'salary_grade' => '24'
            ],
            [
                'id' => 3,
                'position_title' => 'Chief Administrative Officer',
                'salary_grade' => '24'
            ],
            [
                'id' => 4,
                'position_title' => 'Chief Education Supervisor',
                'salary_grade' => '24'
            ],
            [
                'id' => 5,
                'position_title' => 'Engineer V',
                'salary_grade' => '24'
            ],
            [
                'id' => 6,
                'position_title' => 'Attorney IV',
                'salary_grade' => '23'
            ],
            [
                'id' => 7,
                'position_title' => 'Medical Officer IV',
                'salary_grade' => '23'
            ],
            [
                'id' => 8,
                'position_title' => 'Accountant IV',
                'salary_grade' => '22'
            ],
            [
                'id' => 9,
                'position_title' => 'Engineer IV',
                'salary_grade' => '22'
            ],
            [
                'id' => 10,
                'position_title' => 'Information Technonology Officer II',
                'salary_grade' => '22'
            ],
            [
                'id' => 11,
                'position_title' => 'Planning Officer IV',
                'salary_grade' => '22'
            ],
            [
                'id' => 12,
                'position_title' => 'Project Development Officer IV',
                'salary_grade' => '22'
            ],

            [
                'id' => 13,
                'position_title' => 'Supervising Administrative Officer',
                'salary_grade' => '22'
            ],
            [
                'id' => 14,
                'position_title' => 'Attorney III',
                'salary_grade' => '21'
            ],
            [
                'id' => 15,
                'position_title' => 'Medical Officer III',
                'salary_grade' => '20'
            ],
            [
                'id' => 16,
                'position_title' => 'Dentist III',
                'salary_grade' => '19'
            ],
            [
                'id' => 17,
                'position_title' => 'Accountant III',
                'salary_grade' => '19'
            ],
            [
                'id' => 18,
                'position_title' => 'Engineer III',
                'salary_grade' => '19'
            ],
            [
                'id' => 19,
                'position_title' => 'Information Technonology Officer I',
                'salary_grade' => '19'
            ],
            [
                'id' => 20,
                'position_title' => 'Administrative Officer I',
                'salary_grade' => '18'
            ],
            [
                'id' => 21,
                'position_title' => 'Attorney II',
                'salary_grade' => '18'
            ],
            [
                'id' => 22,
                'position_title' => 'Computer Programmer III',
                'salary_grade' => '18'
            ],
            [
                'id' => 23,
                'position_title' => 'Librarian III',
                'salary_grade' => '18'
            ],
            [
                'id' => 24,
                'position_title' => 'Medical Officer II',
                'salary_grade' => '18'
            ],
            [
                'id' => 25,
                'position_title' => 'Planning Officer III',
                'salary_grade' => '18'
            ],
            [
                'id' => 26,
                'position_title' => 'Project Development Officer III',
                'salary_grade' => '18'
            ],
            [
                'id' => 27,
                'position_title' => 'Computer Maintenance Technologist III',
                'salary_grade' => '17'
            ],
            [
                'id' => 28,
                'position_title' => 'Dentist II',
                'salary_grade' => '17'
            ],
            [
                'id' => 29,
                'position_title' => 'Accountant II',
                'salary_grade' => '16'
            ],
            [
                'id' => 30,
                'position_title' => 'Attorney I',
                'salary_grade' => '16'
            ],
            [
                'id' => 31,
                'position_title' => 'Engineer II',
                'salary_grade' => '16'
            ],
            [
                'id' => 32,
                'position_title' => 'Administrative Officer IV',
                'salary_grade' => '15'
            ],
            [
                'id' => 33,
                'position_title' => 'Computer Programmer II',
                'salary_grade' => '15'
            ],
            [
                'id' => 34,
                'position_title' => 'Human Resource Management Officer II',
                'salary_grade' => '15'
            ],
            [
                'id' => 35,
                'position_title' => 'Librarian II',
                'salary_grade' => '15'
            ],
            [
                'id' => 36,
                'position_title' => 'Nurse II',
                'salary_grade' => '15'
            ],
            [
                'id' => 37,
                'position_title' => 'Planning Officer II',
                'salary_grade' => '15'
            ],
            [
                'id' => 38,
                'position_title' => 'Project Development Officer II',
                'salary_grade' => '15'
            ],
            [
                'id' => 39,
                'position_title' => 'Registrar II',
                'salary_grade' => '15'
            ],
            [
                'id' => 40,
                'position_title' => 'Administrative Officer III',
                'salary_grade' => '14'
            ],
            [
                'id' => 41,
                'position_title' => 'Dentist I',
                'salary_grade' => '14'
            ],
            [
                'id' => 42,
                'position_title' => 'Accountant I',
                'salary_grade' => '12'
            ],
            [
                'id' => 43,
                'position_title' => 'Administrative Assistant VI',
                'salary_grade' => '12'
            ],
            [
                'id' => 44,
                'position_title' => 'Legal Assistant II',
                'salary_grade' => '12'
            ],
            [
                'id' => 45,
                'position_title' => 'Administrative Assistant V',
                'salary_grade' => '11'
            ],
            [
                'id' => 46,
                'position_title' => 'Administrative Officer II',
                'salary_grade' => '11'
            ],
            [
                'id' => 47,
                'position_title' => 'Nurse I',
                'salary_grade' => '11'
            ],
            [
                'id' => 48,
                'position_title' => 'Planning Officer',
                'salary_grade' => '11'
            ],
            [
                'id' => 49,
                'position_title' => 'Project Development Officer I',
                'salary_grade' => '11'
            ],
            [
                'id' => 50,
                'position_title' => 'Registrar I',
                'salary_grade' => '11'
            ],
            [
                'id' => 51,
                'position_title' => 'Administrative Officer I',
                'salary_grade' => '10'
            ],
            [
                'id' => 52,
                'position_title' => 'Legal Assistant I',
                'salary_grade' => '10'
            ],
            [
                'id' => 53,
                'position_title' => 'Administrative Assistant III',
                'salary_grade' => '9'
            ],
            [
                'id' => 54,
                'position_title' => 'Senior Bookkeeper',
                'salary_grade' => '9'
            ],
            [
                'id' => 55,
                'position_title' => 'Administrative Assistant II',
                'salary_grade' => '9'
            ],
            [
                'id' => 56,
                'position_title' => 'Bookkeeper',
                'salary_grade' => '8'
            ],
            [
                'id' => 57,
                'position_title' => 'Disbursing Officer II',
                'salary_grade' => '8'
            ],
            [
                'id' => 58,
                'position_title' => 'Administrative Assistant I',
                'salary_grade' => '7'
            ],
            [
                'id' => 59,
                'position_title' => 'Administrative Aide VI',
                'salary_grade' => '6'
            ],
            [
                'id' => 60,
                'position_title' => 'Disbursing Officer I',
                'salary_grade' => '6'
            ],

            [
                'id' => 61,
                'position_title' => 'Administrative Aide V',
                'salary_grade' => '5'
            ],
            [
                'id' => 62,
                'position_title' => 'Security Guard II',
                'salary_grade' => '5'
            ],
            [
                'id' => 63,
                'position_title' => 'Administrative Aide IV',
                'salary_grade' => '4'
            ],
            [
                'id' => 64,
                'position_title' => 'Dental Aide',
                'salary_grade' => '4'
            ],
            [
                'id' => 65,
                'position_title' => 'Administrative Aide III',
                'salary_grade' => '3'
            ],
            [
                'id' => 66,
                'position_title' => 'Driver I',
                'salary_grade' => '3'
            ],
            [
                'id' => 67,
                'position_title' => 'Security Guard I',
                'salary_grade' => '3'
            ],
            [
                'id' => 68,
                'position_title' => 'Administrative Aide II',
                'salary_grade' => '2'
            ],
            [
                'id' => 69,
                'position_title' => 'Watchman I',
                'salary_grade' => '2'
            ],
            [
                'id' => 70,
                'position_title' => 'Administrative Aide I',
                'salary_grade' => '1'
            ],
            [
                'id' => 71,
                'position_title' => 'Utility Worker I',
                'salary_grade' => '1'
            ],

            //School Administration//

            [
                'id' => 87,
                'position_title' => 'School Principal IV',
                'salary_grade' => '22'
            ],
            [
                'id' => 72,
                'position_title' => 'School Principal III',
                'salary_grade' => '21'
            ],
            [
                'id' => 73,
                'position_title' => 'Assistant School Principal III',
                'salary_grade' => '20'
            ],
            [
                'id' => 74,
                'position_title' => 'School Principal II',
                'salary_grade' => '20'
            ],
            [
                'id' => 75,
                'position_title' => 'Special School Principal II',
                'salary_grade' => '20'
            ],
            [
                'id' => 76,
                'position_title' => 'Assistant School Principal',
                'salary_grade' => '19'
            ],
            [
                'id' => 77,
                'position_title' => 'Head Teacher VI',
                'salary_grade' => '19'
            ],
            [
                'id' => 78,
                'position_title' => 'School Principal I',
                'salary_grade' => '19'
            ],
            [
                'id' => 79,
                'position_title' => 'Special School Principal I',
                'salary_grade' => '19'
            ],
            [
                'id' => 80,
                'position_title' => 'Assistant School Principal I',
                'salary_grade' => '18'
            ],
            [
                'id' => 81,
                'position_title' => 'Assistant Special School Principal',
                'salary_grade' => '18'
            ],
            [
                'id' => 82,
                'position_title' => 'Head Teacher V',
                'salary_grade' => '18'
            ],

            [
                'id' => 83,
                'position_title' => 'Head Teacher IV',
                'salary_grade' => '17'
            ],
            [
                'id' => 84,
                'position_title' => 'Head Teacher III',
                'salary_grade' => '16'
            ],
            [
                'id' => 85,
                'position_title' => 'Head Teacher II',
                'salary_grade' => '15'
            ],
            [
                'id' => 86,
                'position_title' => 'Head Teacher I',
                'salary_grade' => '14'
            ],

            //Related Teaching Postion//

            [
                'id' => 99,
                'position_title' => 'Chief Education Program Specialist',
                'salary_grade' => '24'
            ],
            [
                'id' => 88,
                'position_title' => 'Education Program Supervisor',
                'salary_grade' => '22'
            ],
            [
                'id' => 89,
                'position_title' => 'Public Schools District Supervisor',
                'salary_grade' => '22'
            ],
            [
                'id' => 90,
                'position_title' => 'Senior Education Program Specialist',
                'salary_grade' => '19'
            ],
            [
                'id' => 91,
                'position_title' => 'Education Program Specialist II',
                'salary_grade' => '16'
            ],
            [
                'id' => 92,
                'position_title' => 'Guidance Coordinator III',
                'salary_grade' => '16'
            ],
            [
                'id' => 93,
                'position_title' => 'Guidance Coordinator II',
                'salary_grade' => '15'
            ],
            [
                'id' => 94,
                'position_title' => 'Teacher Credentials Evaluator I',
                'salary_grade' => '13'
            ],
            [
                'id' => 95,
                'position_title' => 'Crafts Education Demonstrator II',
                'salary_grade' => '12'
            ],
            [
                'id' => 96,
                'position_title' => 'Education Program Specialist I',
                'salary_grade' => '12'
            ],
            [
                'id' => 97,
                'position_title' => 'Guidance Councelor II',
                'salary_grade' => '12'
            ],
            [
                'id' => 98,
                'position_title' => 'Guidance Councelor I',
                'salary_grade' => '11'
            ],

            //Teaching Positions//
            [
                'id' => 100,
                'position_title' => 'Teacher I',
                'salary_grade' => '11'
            ],
        ];

        $i = 0;
        foreach ($positions as $key => $value) {
            DB::table('user2_available_position')->insert($positions[$i]);
            $i++;
        }
    }
};
