<!DOCTYPE html>
<html>
<head>
    <title>Shopping List</title>
</head>
<body>
    <h1>Shopping List</h1>
    <form method="post" action="/create">
        <input type="text" name="name" placeholder="New item" required>
        <button type="submit">Add</button>
    </form>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <form method="post" action="/update/<?php echo $item['id']; ?>">
                    <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>">
                    <input type="text" name="user" value="<?php echo htmlspecialchars($item['user']); ?>">
                    <input type="checkbox" name="checked" <?php echo $item['checked'] ? 'checked' : ''; ?>>
                    <button type="submit">Save</button>
                </form>
                <form method="post" action="/delete/<?php echo $item['id']; ?>" style="display:inline">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
