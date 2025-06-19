<?php

namespace App\Controllers;

use App\Models\Item;
use App\Core\View;
use App\Core\Redirect;
use App\Models\User;

class ItemController
{
    public function index(): void
    {
        $items = (new Item())->all();
        $users = (new User())->all();
        View::render('index', ['items' => $items, 'users' => $users]);
    }

    public function create(): void
    {
        $name = $_POST['name'] ?? '';
        $userId = (int) $_POST['user_id'] ?? '';
        if ($name) {
            (new Item())->create($name, $userId);
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
        $userId = (int)$_POST['user_id'] ?? '';
        $checked = isset($_POST['checked']) ? 1 : 0;
        if ($name) {
            (new Item())->update($id, $name, $userId, $checked);
        }
        Redirect::to('/');
    }

    public function delete($id): void
    {
        (new Item())->delete($id);
        Redirect::to('/');
    }
}
