<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*
        php artisan make:model Models/Goods  创建一个Goods模型
        php artisan make:model Models/Goods  -m 创建一个Goods模型, 同时生成表的版本控制文件(定义表的结构)
        php artisan migrate  会根据myweb/databases/migrations下的数据库版本控制文件 ->执行创建数据库表
        php artisan migrate:refresh 更新数据库表结构

    */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            //设计goods表的结构
            $table->increments('id')->comment('商品id');
            $table->integer('tid')->comment('商品类别id');
            $table->string('gname')->comment('商品名称');
            $table->string('pic')->comment('商品主图');
            $table->decimal('price')->comment('商品单价');         
            $table->string('desc')->comment('商品描述');
            $table->integer('store')->comment('商品库存');
            $table->integer('status')->comment('商品状态');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goods');
    }
}
