<!DOCTYPE html>
<html>
<head>
    <title>Product Cards</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Article</th>
        <th>Retail Price</th>
    </tr>
    </thead>
    <tbody>
    <form action="{{ route('product-cards.store') }}" method="POST">
        @csrf
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" required>
        <!-- Другие поля формы -->
        <button type="submit">Создать</button>
    </form>
    </tbody>
</table>
</body>
</html>
