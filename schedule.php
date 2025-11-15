<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Расписание - 179 Network</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            /* Фоновая картинка */
            background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/%D0%A8%D0%BA%D0%BE%D0%BB%D0%B0_179_%D0%9C%D0%98%D0%9E%D0%9E%2C_%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0.jpg/1200px-%D0%A8%D0%BA%D0%BE%D0%BB%D0%B0_179_%D0%9C%D0%98%D0%9E%D0%9E%2C_%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0.jpg); /* Замените на путь к вашей картинке */
            background-size: cover; /* Растягивает на весь экран */
            background-position: center; /* Центрирует */
            background-repeat: no-repeat; /* Не повторяет */
            background-attachment: fixed; /* Фиксирует при скролле */
            position: relative; /* Нужно для псевдоэлемента */
        }

        /* Затемняющий слой поверх фона */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(248, 249, 250, 0.7); /* Цвет и прозрачность */
            z-index: -1; /* Под всем контентом */
        }
        :root {
            /* Заголовок */
            --title-size: 36px;
            --title-color: #2c3e50;
            
            /* Описание */
            --description-size: 18px;
            --description-color: #7f8c8d;
            
            /* Кнопки */
            --button-size: 18px;
            --button-color: rgb(52, 152, 219);
            --button-text-color: white;
            --button-width: 200px;
            --button-height: 50px;
        }

        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        /* Стили для заголовка */
        .title {
            font-size: var(--title-size);
            color: var(--title-color);
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
        }

        /* Стили для описания */
        .description {
            font-size: var(--description-size);
            color: var(--description-color);
            text-align: center;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        /* Общие стили для кнопок */
        .button {
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: var(--button-size);
            background-color: var(--button-color);
            color: var(--button-text-color);
            width: var(--button-width);
            height: var(--button-height);
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* Контейнер для кнопок */
        .buttons-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        /* Кнопка назад */
        .back-button {
            background-color: #95a5a6;
            width: 150px;
            height: 40px;
            font-size: 14px;
            margin-top: 30px;
        }

        .back-button:hover {
            background-color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Заголовок -->
        <h1 class="title">Расписание</h1>
        
        <!-- Описание -->
        <p class="description">Made by Lion, Kebab, Imp and Field</p>
        
        <!-- Контейнер для кнопок -->
        <div class="buttons-container">
            <button class="button" onclick="window.location.href='find-student.html'">Классы</button>
            <button class="button" onclick="window.location.href='teachers.html'">Учителя</button>
        </div>

        <!-- Кнопка назад -->
        <button class="button back-button" onclick="window.location.href='index.html'">← Назад</button>
    </div>
</body>

</html>

