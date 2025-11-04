<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'product_code')) {
                $table->string('product_code')->unique()->nullable();
            }
            if (!Schema::hasColumn('products', 'author')) {
                $table->string('author')->nullable();
            }
            if (!Schema::hasColumn('products', 'translator')) {
                $table->string('translator')->nullable();
            }
            if (!Schema::hasColumn('products', 'publisher')) {
                $table->string('publisher')->nullable();
            }
            if (!Schema::hasColumn('products', 'publish_year')) {
                $table->integer('publish_year')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['product_code', 'author', 'translator', 'publisher', 'publish_year']);
        });
    }
};
