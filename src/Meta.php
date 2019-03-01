<?php
namespace Absszero\Trify;

class Meta
{
    public $data;
    public function __construct($url)
    {
        $this->data['url'] = $url;
        $this->data['updated_at'] = date('Y-m-d H:i:s');
    }

    public function setTitle($title)
    {
        $this->data['title'] = $title;
    }

    public function setPrice($price)
    {
        $this->data['price'] = $price;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    public function getData()
    {
        return $this->data;
    }
}
