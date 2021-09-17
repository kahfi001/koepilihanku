<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGenerateNocheckoutTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER generate_noCheckout BEFORE INSERT ON checkouts FOR EACH ROW 
                BEGIN
                    INSERT INTO sequence_checkout_tbls VALUES (NULL);
                    SET NEW.no_checkout = CONCAT("CO-",DATE_FORMAT(CURDATE(), "%Y%m%d"),"-",LPAD(LAST_INSERT_ID(), 10, "0")); 
                END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER "generate_noCheckout"');
    }
}
