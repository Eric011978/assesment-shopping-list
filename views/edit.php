<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form method="post" action="/update/<?php echo $item['id']; ?>">
        <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>">
        <input type="text" name="user" value="<?php echo htmlspecialchars($item['user']); ?>">
        <input type="checkbox" name="checked" <?php echo $item['checked'] ? 'checked' : ''; ?>>
        <button type="submit">Save</button>
    </form>
    <a href="/">Back</a>
</body>
</html>
