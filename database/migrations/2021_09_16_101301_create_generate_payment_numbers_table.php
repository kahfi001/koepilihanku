<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGeneratePaymentNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER generate_noPayment BEFORE INSERT ON payments FOR EACH ROW 
                BEGIN
                    INSERT INTO sequence_payment_tbls VALUES (NULL);
                    SET NEW.no_payment = CONCAT("PAY-",DATE_FORMAT(CURDATE(), "%Y%m%d"),"-",LPAD(LAST_INSERT_ID(), 10, "0")); 
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
        Schema::dropIfExists('generate_payment_numbers');
    }
}
