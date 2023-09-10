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
    @foreach ($productCards as $productCard)
        <div>
            <h2>{{ $productCard->name }}</h2>
            <!-- Другая информация о карточке товара -->
            <a href="{{ route('product-cards.edit', $productCard) }}">Редактировать</a>
            <form action="{{ route('product-cards.destroy', $productCard) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
        </div>
    @endforeach

    <a href="{{ route('product-cards.create') }}">Создать новую карточку товара</a>
    </tbody>
</table>
</body>
</html>
