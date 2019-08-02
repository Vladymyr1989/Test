<?php
use yii\db\Migration;

class m190625_185222_add_date_to_comment_table extends Migration
{
    public function up()
    {
        $this->addColumn('comment','date', $this->dateTime());
    }
    public function down()
    {
        $this->dropColumn('comment','date');
    }
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    public function safeDown()
    {
    }
    */
}