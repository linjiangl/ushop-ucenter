<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://store.yii.red
 * @document https://document.store.yii.red
 * @contact  8257796@qq.com
 */
use Hyperf\Database\Migrations\Migration;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Schema\Schema;
use Hyperf\DbConnection\Db;

class CreateAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attachment', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('system', 50)->comment('云存储系统');
            $table->string('type', 50)->comment('文件类型');
            $table->bigInteger('size', false, true)->default(0)->comment('文件大小(字节)');
            $table->string('hash', 128)->default('');
            $table->string('key', 255)->default('');
            $table->string('index', 64)->comment('索引');
            $table->string('md5', 64)->default('')->comment('文件的 MD5 散列值');
            $table->tinyInteger('status', false, true)->default(1)->comment('状态 0:失效, 1:正常');
            $table->timestamps();

            $table->unique(['index'], 'index');
            $table->index(['md5'], 'md5');
            $table->index(['status'], 'status');
        });

        Db::statement("ALTER TABLE `{$this->table}` COMMENT '附件'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachment');
    }
}
