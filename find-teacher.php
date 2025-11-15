<?php 
require 'config.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Учителя - 179 Network</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            /* Фоновая картинка */
            background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/%D0%A8%D0%BA%D0%BE%D0%BB%D0%B0_179_%D0%9C%D0%98%D0%9E%D0%9E%2C_%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0.jpg/1200px-%D0%A8%D0%BA%D0%BE%D0%BB%D0%B0_179_%D0%9C%D0%98%D0%9E%D0%9E%2C_%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
        }

        /* Затемняющий слой поверх фона */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(248, 249, 250, 0.7);
            z-index: -1;
        }
        
        :root {
            /* Заголовок */
            --title-size: 36px;
            --title-color: #2c3e50;
            
            /* Описание */
            --description-size: 18px;
            --description-color: #596162;
            
            /* Кнопки */
            --button-size: 14px;
            --button-color: rgb(52, 152, 219);
            --button-text-color: white;
            --button-width: 120px;
            --button-height: 35px;
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

        /* Секция директора */
        .director-section {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            width: 100%;
            max-width: 300px;
            border: 2px solid #3498db;
        }

        .director-title {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .director-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .director-photo {
            width: 250px;
            height: 250px;
            background-color: #ecf0f1;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #3498db;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .photo-placeholder {
            color: #7f8c8d;
            font-size: 14px;
            text-align: center;
        }

        .director-button {
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 16px;
            background-color: #3498db;
            color: white;
            width: 150px;
            height: 40px;
        }

        .director-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            background-color: #2980b9;
        }

        /* Контейнер для разделов - ИЗМЕНЕНО ДЛЯ ЦЕНТРИРОВАНИЯ */
        .sections-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
        width: 100%;
        max-width: 900px;
    }

    /* Стили для раздела - ПОЛНОСТЬЮ ПЕРЕПИСАН */
        .section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px; /* Увеличиваем максимальную ширину */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Контейнер для учителей в разделе - ПОЛНОСТЬЮ ПЕРЕПИСАН */
        .teachers-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center; /* Центрируем карточки по горизонтали */
            width: 100%;

        }

        /* Карточка учителя */
                
        /* Add this - container for all teacher cards */
        
        .teachers-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* or space-between, space-around */
        }

        .teacher-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex: 0 0 30%; /* Don't grow or shrink */
            width: 200px; /* Fixed width for each card */
        }

        .teacher-card img {
            max-width: 200px;
            height: auto;
            border-radius: 8px;
        }

        /* Заголовок раздела */
        .section-title {
            font-size: 20px;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            width: 100%; /* Занимает всю ширину раздела */
        }

        /* Контейнер для учителей в разделе - ИЗМЕНЕНО ДЛЯ ЦЕНТРИРОВАНИЯ */

        /* Место для фотографии */
        .teacher-photo {
            width: 150px;
            height: 150px;
            background-color: #ecf0f1;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #bdc3c7;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Кнопка учителя */
        .teacher-button {
            border: none;
            border-radius: 6px;
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

        .teacher-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
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

        /* Адаптивность */
        @media (max-width: 768px) {
            .sections-container {
                grid-template-columns: 1fr;
            }
            
            .teachers-container {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .section {
                max-width: 500px; /* Увеличиваем максимальную ширину на мобильных */
            }
        }

        @media (max-width: 480px) {
            .teachers-container {
                grid-template-columns: 1fr;
            }
            
            .director-section {
                max-width: 250px;
            }
            
            .director-photo {
                width: 200px;
                height: 200px;
            }
            
            .teacher-photo {
                width: 120px;
                height: 120px;
            }
            
            .section {
                max-width: 300px; /* Уменьшаем на очень маленьких экранах */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Заголовок -->
        <h1 class="title">Учителя</h1>
        
        <!-- Описание -->
        <p class="description">Made by Lion, Kebab, Imp and Field</p>
        
        <!-- Секция директора -->
        <div class="director-section">
            <div class="director-title">Директор</div>
            <div class="director-card">
                <div class="director-photo" style="background-image: url('https://via.placeholder.com/150')">
                    <div class="photo-placeholder" style="display: none;">Фото директора</div>
                </div>
                <button class="director-button" onclick="window.location.href='director.html'">Директор</button>
            </div>
        </div>
        <!-- Контейнер для разделов -->
        <div class="sections-container">
            <!-- Математика -->
            <div class="section">
                <div class="section-title">Математика</div>
                <?php
                $number = 0;
                $db = new SQLite3($data_base);
                $data = $db->query("SELECT name, surname FROM Teachers WHERE subject = 'math'");
                $teachers = array();
                while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
                    $teachers[] = array(
                        'Name' => $row['name'],
                        'Surname' => $row['surname']
                    );
                }
                ?>

                <div class="teachers-container">
                    <?php foreach ($teachers as $teacher) { ?>
                        <div class="teacher-card">
                            <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                                <div class="photo-placeholder" style="display: none;">Фото</div>
                            </div>
                            <button class="teacher-button" onclick="window.location.href='teacher-math2.html'">
                            <?php echo $teacher["Name"] . ' ' . $teacher["Surname"]; ?>
                        </button>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Физика и астрономия -->
            <div class="section">
                <div class="section-title">Физика и астрономия</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url(https://stihi.ru/photos/nshat.jpg)">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-physics1.html'">Шатовская Н.Е.</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-physics2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-physics3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-physics4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-physics5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>

            <!-- Информатика -->
            <div class="section">
                <div class="section-title">Информатика</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-info1.html'">Учитель 1</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-info2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-info3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-info4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-info5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>

            <!-- Русский язык и литература -->
            <div class="section">
                <div class="section-title">Русский язык и литература</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-russian1.html'">Учитель 1</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-russian2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-russian3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-russian4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-russian5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>

            <!-- Английский язык -->
            <div class="section">
                <div class="section-title">Английский язык</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-english1.html'">Учитель 1</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-english2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-english3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-english4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-english5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>

            <!-- История и обществознание -->
            <div class="section">
                <div class="section-title">История и обществознание</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-history1.html'">Учитель 1</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-history2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-history3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-history4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-history5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>

            <!-- География и ОБЗР -->
            <div class="section">
                <div class="section-title">География и ОБЗР</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-geography1.html'">Учитель 1</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-geography2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-geography3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-geography4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-geography5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>

            <!-- Физкультура -->
            <div class="section">
                <div class="section-title">Физкультура</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-pe1.html'">Учитель 1</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-pe2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-pe3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-pe4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-pe5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>

            <!-- Танцы -->
            <div class="section">
                <div class="section-title">Танцы</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-dance1.html'">Учитель 1</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-dance2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-dance3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-dance4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-dance5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>

            <!-- Биология -->
            <div class="section">
                <div class="section-title">Биология</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-biology1.html'">Учитель 1</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-biology2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-biology3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-biology4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-biology5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>

            <!-- Химия -->
            <div class="section">
                <div class="section-title">Химия</div>
                <div class="teachers-container">
                    <!-- 5 карточек учителей -->
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-chemistry1.html'">Учитель 1</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-chemistry2.html'">Учитель 2</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-chemistry3.html'">Учитель 3</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-chemistry4.html'">Учитель 4</button>
                    </div>
                    <div class="teacher-card">
                        <div class="teacher-photo" style="background-image: url('https://via.placeholder.com/100')">
                            <div class="photo-placeholder" style="display: none;">Фото</div>
                        </div>
                        <button class="teacher-button" onclick="window.location.href='teacher-chemistry5.html'">Учитель 5</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Кнопка назад -->
        <button class="teacher-button back-button" onclick="window.location.href='index.html'">← Назад</button>
    </div>
</body>
</html>