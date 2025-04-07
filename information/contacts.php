<?php
include '../header.php';
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="section-title">Контакты</h1>
            </div>
        </div>
        <div class="row gy-4 align-items-center mt-1 mt-lg-5">
            <div class="col-lg-4">
                <div class="contact-info">
                    <div class="info-block mb-4">
                        <h4>Адрес</h4>
                        <p>г. Москва, ул. Пасечная, д. 15</p>
                    </div>
                    
                    <div class="info-block mb-4">
                        <h4>Телефон</h4>
                        <a href="tel:+74951234567" class="link">+7 (495) 123-45-67</a>
                    </div>

                    <div class="info-block mb-4">
                        <h4>Email</h4>
                        <a href="mailto:info@zdravmed.ru" class="link">info@zdravmed.ru</a>
                    </div>

                    <div class="info-block mb-4">
                        <h4>График работы</h4>
                        <p>Пн-Пт: 9:00 - 20:00</p>
                        <p>Сб-Вс: 10:00 - 18:00</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aba5759c7fd8969bb457fcff4f8793123fd27d95402a0fd4ce2636fb2d6647c69&amp;source=constructor" width="100%" height="520" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>

<style>
.contact-info {
    padding: 30px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.info-block h4 {
    font-size: 18px;
    font-weight: 600;
    color: #2c4964;
    margin-bottom: 10px;
}

.info-block p {
    font-size: 16px;
    color: #666;
    margin-bottom: 5px;
}

.info-block .link {
    color: #1977cc;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s ease;
}

.info-block .link:hover {
    color: #f59d2f;
}

.section-title {
    margin-bottom: 40px;
}
.contact-info {
    padding: 30px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    height: 520px; /* Высота карты */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.info-block {
    margin-bottom: 0 !important; /* Отменяем стандартный отступ */
}

.contact-info a {
	color:#c87f24 !important;
}
</style>

<?php
include "../footer.php";
?>