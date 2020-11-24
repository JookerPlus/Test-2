<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m201124_104131_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'image' => $this->string(),
            'category_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-article-category_id',
            'article',
            'category_id'
        );

        $this->addForeignKey(
            'fk-article-category_id',
            'article',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-article-category_id',
            'article'
        );

        $this->dropIndex(
            'idx-article-category_id',
            'article'
        );

        $this->dropTable('{{%article}}');
    }
}
