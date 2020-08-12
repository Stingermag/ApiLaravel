<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title> Kursach </title>

		<script type="text/javascript">
			var xhr;
			

			function getapi(text,valute)
			{
				xhr = new XMLHttpRequest();
				xhr.open('GET' , 'shows/'+text.value.trim(),true);
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200)
					{
					var div = document.getElementById('val');
					var div2 = document.getElementById('val2');
    				var data = JSON.parse(xhr.responseText);
					div.innerHTML = data.reviews[0].name;
					div2.innerHTML = data.reviews[0].discript;
					}
				};
			
				xhr.send();

			}

			function createapi(name,discript,raiting,photos)
			{

				xhr = new XMLHttpRequest();
				xhr.open('POST' , 'create',true);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.send("name=" + encodeURIComponent(name.value.trim()) + "&discript=" + encodeURIComponent(discript.value.trim()) + "&raiting=" + encodeURIComponent(raiting.value.trim()) + "&photos=" + encodeURIComponent(photos.value.trim()));
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200)
					{
					var divtwo = document.getElementById('valtwo');
					var data = JSON.parse(xhr.responseText);
					divtwo.innerHTML = "Создан " + data.reviews;

					}
				};	
			}
			function getallapi(page)
			{
				xhr = new XMLHttpRequest();
				xhr.open('GET' , 'showall',true);
				xhr.onreadystatechange = function(){
					if(xhr.readyState == 4 && xhr.status == 200)
					{
					
    				var data = JSON.parse(xhr.responseText);
					
					var size = data.reviews[page.value.trim()].length;

					var listreviews = "<div>";
					for (let i = 0; i < size; i++) 
						listreviews = listreviews + data.reviews[page.value.trim()][i].name + " : " + data.reviews[page.value.trim()][i].discript +  "<br>";
					listreviews = listreviews + "</div>";

					var divpages = document.getElementById('pages');
					divpages.innerHTML = listreviews;
					
					}
				};
			
				xhr.send();

			}
		</script>
		<style>
				textarea {
					resize: none;
					border-radius: 7px;
					border-width: 2;

				}
				textarea:target {
					resize: none;
					border-radius: 50%;
					border-width: 10px;
					
				}
				body{
					text-align: center;
				}
		</style>
	
</head>

<body>

<h2>Получить отзыв</h2>
Введите id отзыва<br>
	<textarea id="field" maxlength="8"></textarea>
<br>
	<input type="button" onmousedown = "getapi(document.getElementById('field'))" value="Получить описание"/>
	<br>
Название <div id = 'val' ></div><br>
Описание <div id = 'val2' ></div>
	

	<h2>Добавить отзыв</h2>
	1 Введите название отзыва<br>
	<textarea id="name" maxlength="50"></textarea><br>
	2 Введите описание отзыва<br>
	<textarea id="discript" maxlength="1000"></textarea><br>
	3 Выберите рейтинг <br>
	<select id="raiting">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select><br>
	4 Введите юрл фотографий через пробел<br>
	<textarea id="photos"></textarea><br>
	
    <input type="button" onmousedown = "createapi(
    	document.getElementById('name'),
    	document.getElementById('discript'),
    	document.getElementById('raiting'),
    	document.getElementById('photos')
    )" value="Добавить"/>
 <div id = 'valtwo' ></div><br>


 <h2>Получить страницу с данными</h2>
Введите страницу<br>
<textarea id="page" maxlength="3"></textarea><br>
<input type="button" onmousedown = "getallapi(document.getElementById('page'))" value="Получить страницу"/><br>
<div id = "pages" ></div><br>


</body>
</html>