<html>
	<head>
		<title>Rifas</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<style>
			.panel {
				display: inline-block;
			}
			
			.panel__header {
				margin: 8px;
				text-align: center;
			}
		</style>
	</head>
	
	<header>
	</header>
	<body>
		<div class="container">
		<div class="panel">
			<div class="panel__header">
				<input id="sumGame" class="form-control" type="Number" placeholder="Valor aposta..."/>
				<button id="btnConvert" class="btn btn-primary btn-block">Converter</button>
			</div>
			<textarea id="textInitial" rows="30" cols="40"></textarea>
		
			<textarea id="textResult" rows="30" cols="40"></textarea>
			
		</div>
</div>
</body>

<script type="text/javascript">

		window.onload = (() => 
		{
			document.querySelector('#btnConvert').addEventListener('click', () => { getData() });
		}
		);
		
		var arrayLast = [];
		
		async function getData()
		{
			let data = document.querySelector('#textInitial');
			await clearFields();
			await sumGame();
			arrayLast = [];
			sumGames(transformDataArray(data.value));

		}
		
		function transformDataArray(dataModify)
		{
			return dataModify.split("\n");
		}
		
		function clearFields()
		{
			document.querySelector('#textResult').value = "";
		}
		
		function sumGames(arrayGames)
		{
			let newArrayGames = [];
			let count = 0;
			let  itemList = "";
			arrayGames.forEach((game) => {
				newArrayGames.push(clearName(game));
			});
			
			newArrayGames = newArrayGames.sort();
			
			newArrayGames.forEach((item) => {
				count = newArrayGames.filter((newItem) => newItem == item);
				count = count.length;	
				if(item != itemList){
					arrayFinal(`${item} - Nº${count} - R$${count * sumGame()}`);
					count = 0;
					itemList = item;
				}else{
					itemList = item;
				}
			});
			returnArrayFinal();	
		}
		
		function arrayFinal(dataGame)
		{
			arrayLast.push(dataGame);
		}
		
		function sumGame()
		{
			return document.querySelector('#sumGame').value;
		}
		
		function returnArrayFinal(){
			createStringText(arrayLast);
			return arrayLast;
		}
		
		function createStringText(arrayData)
		{
			let textFormat = "";
			arrayData.forEach((item) => textFormat += clearName(item)+'\n');
			document.querySelector('#textResult').value = textFormat;
		}
		
		function clearName(value)
		{
			return value.substr(value.indexOf("@")+1, value.length).trim();
		}
		
	
	
</script>

</html>
