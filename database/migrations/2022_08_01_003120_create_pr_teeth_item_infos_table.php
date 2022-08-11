<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePrTeethItemInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName  = 'pr_teeth_item_info';

        Schema::create($tableName, function (Blueprint $table) {
            $table->id()->comment('PK');
            $table->string('chart_no', 80)->comment('FK pt_patient chart_no');
            $table->integer('chart_seq')->unsigned()->comment('차트 순번');
            $table->integer('teeth_no')->unsigned()->comment('치아번호');
            $table->enum('view_type', ['A', 'B', 'L'])->comment('뷰 타입 A: All, B: Bucal, L: Lingual');
            $table->enum('item_type', ['C', 'P', 'B', 'R', 'F', 'Q', 'W'])->comment('아이템 타입 C: 충치, P: Pocket Depth, B: Bleeding, R: Recession, F: Furcation, Q: Plaque, W: Working Length');
            $table->tinyInteger('item_seq')->unsigned()->comment('아이템 순번');
            $table->string('item_value', 20)->comment('아이템 값');
            $table->string('reg_id', 20)->comment('등록아이디');
            $table->timestamp('reg_dtime')->nullable()->comment('등록일시');
            $table->string('upd_id', 20)->nullable()->comment('수정아이디');
            $table->timestamp('upd_dtime')->nullable()->comment('수정일시');
            $table->index(['chart_no', 'chart_seq', 'teeth_no', 'view_type', 'item_type'], 'idx_chart_no_chart_seq_teeth_no_view_type_item_type');
        });

        DB::statement("ALTER TABLE `$tableName` comment '치아 상세 테이블'");
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pr_teeth_item_infos');
    }
}
