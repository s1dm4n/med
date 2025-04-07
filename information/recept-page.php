<?php
include '../header.php';
?>
<section class="recipe-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="section-title">Медовая заправка для салатов</h1>
                
                <div class="img-text">
                    <img src="../images/recept3.jpg" alt="Медовая заправка для салатов">
                </div>

                <div class="recipe-info">
                    <div class="info-item">
                        <i class="far fa-clock"></i>
                        <span>Время приготовления: 5 минут</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-utensils"></i>
                        <span>Порций: 4-6</span>
                    </div>
                </div>

                <span class="title">Ингредиенты:</span>
                <ul class="ingr">
                    <li>1 столовая ложка дижонской горчицы</li>
                    <li>2 столовые ложки качественного меда</li>
                    <li>2 столовые ложки яблочного уксуса</li>
                    <li>4 столовые ложки оливкового масла extra virgin</li>
                    <li>1 маленький зубчик чеснока (по желанию)</li>
                    <li>Соль и свежемолотый перец по вкусу</li>
                </ul>

                <span class="title">Процесс приготовления:</span>
                <ol class="steps">
                    <li>
                        Подготовьте все ингредиенты. Для лучшего смешивания они должны быть комнатной температуры.
                    </li>
                    <li>
                        В небольшой миске соедините мед, горчицу и яблочный уксус. Если используете чеснок, измельчите его и добавьте к смеси.
                    </li>
                    <li>
                        Активно взбивая венчиком, медленно влейте оливковое масло тонкой струйкой до получения однородной эмульсии.
                    </li>
                    <li>
                        Приправьте солью и свежемолотым черным перцем по вкусу, перемешайте.
                    </li>
                </ol>

                <div class="recipe-tips">
                    <span class="title">Советы:</span>
                    <ul>
                        <li>Заправка отлично подходит для свежих салатов с листьями</li>
                        <li>Храните в герметичном контейнере до 5 дней в холодильнике</li>
                        <li>Перед использованием дайте заправке согреться до комнатной температуры</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "../footer.php";
?>

<style>
.recipe-page {
    padding: 60px 0;
    color: #2c2c2c;
}

.recipe-page .section-title {
    margin-bottom: 30px;
    font-size: 38px;
    color: #2c2c2c;
    text-align: center;
}

.recipe-page .img-text {
    margin: 30px 0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.recipe-page .img-text img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 12px;
    transition: transform 0.3s ease;
}

.recipe-page .img-text:hover img {
    transform: scale(1.02);
}

.recipe-page .recipe-info {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin: 25px 0;
    padding: 15px;
    background: #fff7e6;
    border-radius: 8px;
}

.recipe-page .info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #f59d2f;
}

.recipe-page .title {
    display: block;
    font-size: 26px;
    font-weight: 600;
    color: #f59d2f;
    margin: 30px 0 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #fff7e6;
}

.recipe-page .ingr {
    list-style: none;
    padding: 25px;
    background: #fff7e6;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 2px 10px rgba(245, 157, 47, 0.1);
}

.recipe-page .ingr li {
    font-size: 18px;
    line-height: 2;
    position: relative;
    padding-left: 25px;
    transition: transform 0.2s ease;
}

.recipe-page .ingr li:hover {
    transform: translateX(5px);
}

.recipe-page .ingr li:before {
    content: "•";
    color: #f59d2f;
    position: absolute;
    left: 0;
    font-size: 20px;
}

.recipe-page .steps {
    counter-reset: recipe-steps;
    padding-left: 0;
}

.recipe-page .steps li {
    list-style: none;
    margin-bottom: 20px;
    padding: 20px 25px 20px 60px;
    background: #f8f9fa;
    border-radius: 12px;
    position: relative;
    font-size: 18px;
    line-height: 1.6;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.recipe-page .steps li:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.recipe-page .steps li:before {
    counter-increment: recipe-steps;
    content: counter(recipe-steps);
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    background: #f59d2f;
    color: white;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.recipe-page .recipe-tips {
    margin-top: 40px;
    padding: 25px;
    background: #fff7e6;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(245, 157, 47, 0.1);
}

.recipe-page .recipe-tips ul {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
}

.recipe-page .recipe-tips li {
    position: relative;
    padding-left: 25px;
    margin-bottom: 12px;
    font-size: 16px;
    line-height: 1.6;
}

.recipe-page .recipe-tips li:before {
    content: "✓";
    color: #f59d2f;
    position: absolute;
    left: 0;
}

@media (max-width: 768px) {
    .recipe-page .recipe-info {
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }
    
    .recipe-page .section-title {
        font-size: 32px;
    }
}
</style>