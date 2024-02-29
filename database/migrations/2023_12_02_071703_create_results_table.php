 <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {

//     public function up()
//     {
//         Schema::create('results', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('user_id')->constrained();
//             $table->foreignId('quiz_id')->constrained();
//             $table->integer('quiz_score');
//             $table->integer(('achieved_score'));
//             $table->timestamps();
//         });
//     }

//      @return void

//     public function down()
//     {
//         Schema::dropIfExists('results');
//     }
// };

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if(!Schema::hasTable('results')) {
            Schema::create('results', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->foreignId('quiz_id')->constrained();
                $table->integer('quiz_score');
                $table->integer('achieved_score');
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
};
