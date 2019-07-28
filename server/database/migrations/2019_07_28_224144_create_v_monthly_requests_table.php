<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVMonthlyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'DROP VIEW IF EXISTS v_monthly_requests' );
        DB::statement("
            CREATE VIEW v_monthly_requests AS 
            SELECT
                user_id,
                EXTRACT(YEAR_MONTH FROM date) AS yyyymm,
                COUNT(*) as count,
                SUM(cost) AS total_cost
            FROM
                request_details
            WHERE
                is_delete = 0
            GROUP BY
                EXTRACT(YEAR_MONTH FROM date),
                user_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'DROP VIEW IF EXISTS v_monthly_requests' );
    }
}
