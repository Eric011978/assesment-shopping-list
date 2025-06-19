<?php
namespace App\Models;

use PDO;

class Item extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function all(): array
    {
        return $this->db->query('SELECT * FROM items')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id): array|false
    {
        $stmt = $this->db->prepare('SELECT * FROM items WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name): bool
    {
        $stmt = $this->db->prepare('INSERT INTO items(name, user) VALUES(:name, :user)');
        return $stmt->execute(['name' => $name]);
    }

    public function update($id, $name, $checked): bool
    {
        $stmt = $this->db->prepare('UPDATE items SET name = :name, user = :user checked = :checked WHERE id = :id');
        return $stmt->execute(['name' => $name, 'checked' => $checked, 'id' => $id]);
    }

    public function delete($id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM items WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
