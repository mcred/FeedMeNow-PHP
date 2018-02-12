<?php
namespace FeedMeNow\Model;

class Category
{
    private $alias;
    private $title;

    public function __construct($alias, $title)
    {
        $this->alias = $alias;
        $this->title = $title;
    }

    public static function create(array $data)
    {
        return new self(
            $data['alias'],
            $data['title']
        );
    }

    public function GetAlias()
    {
        return $this->alias;
    }
    public function GetTitle()
    {
        return $this->title;
    }
}
