<?php

namespace App\Controllers;

use App\Models\Item;
use App\Core\View;
use App\Core\Redirect;

class ItemController
{

    public function index(): void
    {
        $items = (new Item())->all();
        View::render('index', ['items' => $items]);
    }

    public function create(): void
    {
        $name = $_POST['name'] ?? '';
        if ($name) {
            (new Item())->create($name);
        }
        Redirect::to('/');
    }

    public function edit($id): void
    {
        $item = (new Item())->find($id);
        View::render('edit', ['item' => $item]);
    }

    public function update($id): void
    {
        $name = $_POST['name'] ?? '';
        $checked = isset($_POST['checked']) ? 1 : 0;
        if ($name) {
            (new Item())->update($id, $name, $checked);
        }
        Redirect::to('/');
    }

    public function delete($id): void
    {
        (new Item())->delete($id);
        Redirect::to('/');
    }
}
