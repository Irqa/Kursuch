<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add}}`.
 */
class m210126_185442_create_add_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('add', [
          'id' => $this->primaryKey(),
          'adress' => $this->string(),
          'owner_id' => $this->integer(),
          'type_id' => $this->integer(),
      ]);
//owner
      $this->createIndex(
        'idx-owner_id',
        'add',
        'owner_id'
      );

      $this->addForeignKey(
        'fk-add-owner_id',
        'add',
        'owner_id',
        'user',
        'id',
        'CASCADE'
      );
//type
      $this->createIndex(
        'idx-type_id',
        'add',
        'type_id'
      );

      $this->addForeignKey(
        'fk-add-type_id',
        'add',
        'type_id',
        'type',
        'id',
        'CASCADE'
      );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%add}}');
    }
}
