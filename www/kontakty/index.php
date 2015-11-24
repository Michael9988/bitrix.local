<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
	ymaps.ready(init);

	function init () {
		var myMap = new ymaps.Map("banner", {
				center: [59.851223, 30.377376],
				zoom: 15,
				controls: []
			}, {
				searchControlProvider: 'yandex#search'
			}),
		// Создание макета содержимого хинта.
		// Макет создается через фабрику макетов с помощью текстового шаблона.
			HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
				"<b>{{ properties.object }}</b><br />" +
				"{{ properties.address }}" +
				"</div>", {
					// Определяем метод getShape, который
					// будет возвращать размеры макета хинта.
					// Это необходимо для того, чтобы хинт автоматически
					// сдвигал позицию при выходе за пределы карты.
					getShape: function () {
						var el = this.getElement(),
							result = null;
						if (el) {
							var firstChild = el.firstChild;
							result = new ymaps.shape.Rectangle(
								new ymaps.geometry.pixel.Rectangle([
									[0, 0],
									[firstChild.offsetWidth, firstChild.offsetHeight]
								])
							);
						}
						return result;
					}
				}
			);

		var myPlacemark = new ymaps.Placemark([59.851223, 30.377376], {
			address: "Санкт-Петербург, Альпийский переулок, д. 15, к. 2",
			object: "ООО МАГАЗИН"
		}, {
			hintLayout: HintLayout
		});

		myMap.geoObjects.add(myPlacemark);
		
		 myMap.behaviors
			// Отключаем часть включенных по умолчанию поведений:
			//  - drag - перемещение карты при нажатой левой кнопки мыши;
			//  - magnifier.rightButton - увеличение области, выделенной правой кнопкой мыши.
			.disable(['drag', 'rightMouseButtonMagnifier', 'scrollZoom'])
	}
</script>

 <style>
	.my-hint {
		display: inline-block;
		padding: 5px;
		height: 55px;
		position: relative;
		left: -10px;
		width: 195px;
		font-size: 11px;
		line-height: 17px;
		color: #333333;
		text-align: center;
		vertical-align: middle;
		background-color: #faefb6;
		border: 1px solid #CDB7B5;
		border-radius: 20px;
		font-family: Arial;
	}
	#banner header{
		z-index: 1
	}
</style>

<!-- Banner -->
	<section id="banner">
		<header>
			<h2>Адресс: <em>Санкт-Петербург, Альпийский переулок, д.15, к.2</em></h2>
			<a href="#footer" class="button">Написать сообщение</a>
		</header>
	</section>

<!-- Posts -->
	<section class="wrapper style1">
		<div class="container">
			<div class="row">
				<section class="6u 12u(narrower)">
					<div class="box post">
						<h3>Контакты</h3>
						<p>
							198218, г.Санкт-Петербург, Альпийский переулок, д.15, к.2<br/>
							+79990283468<br/>
							<a href="mailto:manager@magazin.ru">manager@magazin.ru</a>
						</p>
						<p>Время работы: пн-пт с 9.00 до 18.00</p>
					</div>
				</section>
				<section class="6u 12u(narrower)">
					<div class="box post">
						<h3>ООО &laquo;МАГАЗИН&raquo;</h3>
						<p>
							ИНН 323223232444<br/>
							КПП 323232323<br/>
							БИК 232323<br/>
							ОКПО 2323232<br/>
							ОКАТО 123573232<br/>
						</p>
					</div>
				</section>
			</div>
		</div>
	</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>