<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SimplifyServiceSectionsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('service_section_items');

        Schema::table('service_sections', function (Blueprint $table) {
            $this->dropColumnIfExists($table, 'tag');
            $this->dropColumnIfExists($table, 'button_1_text');
            $this->dropColumnIfExists($table, 'button_1_url');
            $this->dropColumnIfExists($table, 'button_1_icon');
            $this->dropColumnIfExists($table, 'button_2_text');
            $this->dropColumnIfExists($table, 'button_2_url');
            $this->dropColumnIfExists($table, 'button_2_icon');
            $this->dropColumnIfExists($table, 'float_icon');
            $this->dropColumnIfExists($table, 'float_title');
            $this->dropColumnIfExists($table, 'float_subtitle');
            $this->dropColumnIfExists($table, 'image_alt');
            $this->dropColumnIfExists($table, 'layout_type');
            $this->dropColumnIfExists($table, 'sort_order');
            $this->dropColumnIfExists($table, 'status');
        });
    }

    public function down()
    {
        Schema::create('service_section_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_section_id')->constrained('service_sections')->cascadeOnDelete();
            $table->string('icon')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('service_sections', function (Blueprint $table) {
            if (!Schema::hasColumn('service_sections', 'tag')) {
                $table->string('tag')->nullable()->after('card_icon');
            }

            if (!Schema::hasColumn('service_sections', 'button_1_text')) {
                $table->string('button_1_text')->nullable()->after('description');
                $table->string('button_1_url')->nullable()->after('button_1_text');
                $table->string('button_1_icon')->nullable()->after('button_1_url');
                $table->string('button_2_text')->nullable()->after('button_1_icon');
                $table->string('button_2_url')->nullable()->after('button_2_text');
                $table->string('button_2_icon')->nullable()->after('button_2_url');
                $table->string('float_icon')->nullable()->after('button_2_icon');
                $table->string('float_title')->nullable()->after('float_icon');
                $table->string('float_subtitle')->nullable()->after('float_title');
                $table->string('image_alt')->nullable()->after('float_subtitle');
                $table->enum('layout_type', ['image_left', 'image_right'])->default('image_left')->after('image_alt');
                $table->integer('sort_order')->default(0)->after('layout_type');
                $table->boolean('status')->default(1)->after('sort_order');
            }
        });
    }

    private function dropColumnIfExists(Blueprint $table, string $column): void
    {
        if (Schema::hasColumn('service_sections', $column)) {
            $table->dropColumn($column);
        }
    }
}
