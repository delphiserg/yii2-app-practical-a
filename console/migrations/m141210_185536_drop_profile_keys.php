<?php

use yii\db\Schema;
use yii\db\Migration;

class m141210_185536_drop_profile_keys extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%profile}}', 'public_email');
        $this->dropColumn('{{%profile}}', 'gravatar_email');
        $this->dropColumn('{{%profile}}', 'bio');
        $this->dropColumn('{{%profile}}', 'website');
        $this->dropColumn('{{%profile}}', 'location');
        $this->dropColumn('{{%profile}}', 'gravatar_id');
    }

    public function down()
    {
        echo "m141210_185536_drop_profile_keys cannot be reverted.\n";

        return false;
    }
}
