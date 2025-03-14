<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW IF NOT EXISTS ShowAllForms
        AS SELECT
        ticketforms.id,users.name,users.email,
        ticketforms.date,ticketforms.time,
        ticketforms.nationality,ticketforms.quantity,
        ON users.id=ticketforms.user_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ShowAllForms');
    }


};

