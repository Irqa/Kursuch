<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%deal}}`.
 */
class m210126_185452_create_deal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('deal', [
          'id' => $this->primaryKey(),
          'add_id' => $this->integer(),
          'user_id' => $this->integer(),
          'from' => $this->date(),
          'till' => $this->date(),
          'isConfirmed' => $this->integer()->defaultValue(0),
      ]);
//add
      $this->createIndex(
        'idx-add_id',
        'deal',
        'add_id'
      );

      $this->addForeignKey(
        'fk-deal-add_id',
        'deal',
        'add_id',
        'add',
        'id',
        'CASCADE'
      );
//user
      $this->createIndex(
        'idx-user_id',
        'deal',
        'user_id'
      );

      $this->addForeignKey(
        'fk-deal-user_id',
        'deal',
        'user_id',
        'user',
        'id',
        'CASCADE'
      );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%deal}}');
    }
}
