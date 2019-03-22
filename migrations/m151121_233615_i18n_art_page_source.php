<?php

use artsoft\db\SourceMessagesMigration;

class m151121_233615_i18n_art_page_source extends SourceMessagesMigration
{

    public function getCategory()
    {
        return 'art/page';
    }

    public function getMessages()
    {
        return [
            'Page' => 1,
            'Pages' => 1,
            'Create Page' => 1,
        ];
    }
}