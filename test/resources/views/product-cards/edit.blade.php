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
    <form action="{{ route('product-cards.update', $productCard) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" value="{{ $productCard->name }}" required>
        <!-- Другие поля формы -->
        <button type="submit">Обновить</button>
    </form>
    </tbody>
</table>
</body>
</html>
