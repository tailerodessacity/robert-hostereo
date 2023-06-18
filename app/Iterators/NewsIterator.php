<?php

namespace App\Iterators;

use App\Models\PostTranslation;
use Illuminate\Support\Collection;
use Iterator;

class NewsIterator implements Iterator
{
    private $collection;
    private $position = 0;

    public function __construct($query)
    {
        $this->collection = $this->fetchNews($query);
    }

    private function fetchNews($query)
    {
        $language = $query['language'];
        $searchTerm = $query['title'];

        $fields = ['title', 'description'];

        return PostTranslation::whereHas('language', function ($query) use ($language) {
            $query->where('locale', $language);
        })
            ->where(function ($query) use ($fields, $searchTerm) {
                foreach ($fields as $field) {
                    $query->orWhere($field, 'LIKE', '%' . $searchTerm . '%');
                }
            })
            ->paginate(10);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->collection[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->collection[$this->position]);
    }
}
