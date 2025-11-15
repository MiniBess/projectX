<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Классы - 179 Network</title>
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
            --description-color:  #596162;
            
            /* Кнопки */
            --button-size: 16px;
            --button-color: rgb(52, 152, 219);
            --button-text-color: white;
            --button-width: 120px;
            --button-height: 45px;
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

        /* Контейнер для строк классов */
        .classes-rows {
            display: flex;
            flex-direction: column;
            gap: 25px;
            align-items: center;
            width: 100%;
            max-width: 500px;
        }

        /* Строка с кнопками */
        .class-row {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            width: 100%;
        }

        /* Заголовок строки */
        .row-title {
            font-size: 20px;
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: center;
            width: 100%;
        }

        /* Кнопка назад */
        .back-button {
            background-color: #596162;
            width: 150px;
            height: 40px;
            font-size: 14px;
            margin-top: 30px;
        }

        .back-button:hover {
            background-color: #7f8c8d;
        }

        /* Адаптивность для мобильных */
        @media (max-width: 600px) {
            .class-row {
                gap: 10px;
            }
            
            .button {
                width: 100px;
                height: 40px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Заголовок -->
        <h1 class="title">Классы</h1>
        
        <!-- Описание -->
        <p class="description">Made by Lion, Kebab, Imp and Field</p>
        
        <!-- Контейнер для строк классов -->
        <div class="classes-rows">
            <!-- 7-е классы -->
            <div class="class-row">
                <div class="row-title">7-е классы</div>
                <button class="button" onclick="window.location.href='class-7i.html'">7И</button>
                <button class="button" onclick="window.location.href='class-7b.html'">7Б</button>
            </div>

            <!-- 8-е классы -->
            <div class="class-row">
                <div class="row-title">8-е классы</div>
                <button class="button" onclick="window.location.href='class-8i.html'">8И</button>
                <button class="button" onclick="window.location.href='class-8b.html'">8Б</button>
                <button class="button" onclick="window.location.href='class-8k.html'">8К</button>
                <button class="button" onclick="window.location.href='class-8l.html'">8Л</button>
            </div>

            <!-- 9-е классы -->
            <div class="class-row">
                <div class="row-title">9-е классы</div>
                <button class="button" onclick="window.location.href='class-9i.html'">9И</button>
                <button class="button" onclick="window.location.href='class-9b.html'">9Б</button>
                <button class="button" onclick="window.location.href='class-9v.html'">9В</button>
                <button class="button" onclick="window.location.href='class-9d.html'">9Д</button>
            </div>

            <!-- 10-е классы -->
            <div class="class-row">
                <div class="row-title">10-е классы</div>
                <button class="button" onclick="window.location.href='class-10i.html'">10И</button>
                <button class="button" onclick="window.location.href='class-10b.html'">10Б</button>
                <button class="button" onclick="window.location.href='class-10v.html'">10В</button>
                <button class="button" onclick="window.location.href='class-10d.html'">10Д</button>
            </div>

            <!-- 11-е классы -->
            <div class="class-row">
                <div class="row-title">11-е классы</div>
                <button class="button" onclick="window.location.href='class-11i.html'">11И</button>
                <button class="button" onclick="window.location.href='class-11b.html'">11Б</button>
                <button class="button" onclick="window.location.href='class-11v.html'">11В</button>
                <button class="button" onclick="window.location.href='class-11d.html'">11Д</button>
            </div>
        </div>

        <!-- Кнопка назад -->
        <button class="button back-button" onclick="window.location.href='index.html'">← Назад</button>
    </div>
</body>
</html>
