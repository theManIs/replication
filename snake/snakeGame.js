var snakeAPI = {
	row: 20,
	col: 20,
	coordinates: [], 
	foodPlate: [],
	score: 0,
	speed: 0,
	totalScore: 0,
	bigFoodPlate: [],
	personName: 'Потрошитель',
	
		//Создаёт игровое поле
	createMatrix: function() {
		var matrix = $('#matrix');
		for (var i = 0; i < this.row * this.col; i++)	{
			var div = document.createElement('div');
			div.className = 'cell';
			$(div).appendTo('#matrix');
		}
	},

		//Зажигает выбранную ячейку
	setCell: function(val)	{
		cell = $('.cell');
		for (crd = this.coordinates, i = crd.length - 1; 0 < i; i--) {
			if (true === val)
				cell[((crd[i][1] * this.row) + crd[i][0])].style.backgroundColor = 'blue';
			if (false === val)
				cell[((crd[i][1] * this.row) + crd[i][0])].style.backgroundColor = 'white';
		}
	},
	
		//Создаёт тело змейки
	snakeBody: function() {
		crd = this.coordinates; 
		for (i = 1; (crd.length - 1) > i; i++) {
			crd[i][0] = crd[(i + 1)][0];
			crd[i][1] = crd[(i + 1)][1];
		}
	},
	
	fieldClear: function() {
		i = 0; 
		while (i < 400) {
			$('.cell')[i].style.backgroundColor = 'white';
			i++;
		}
	},
	
		//Проверяет змейку на столкновение с собой
	testSnake: function(crd, x, y) {
		backStep = crd.length - 2;
		i = crd.length;
		switch(crd[0][0]) {
			case 'right':
				while (i-- > 0) {
					if (crd[backStep][0] == (x + 1))
						return this.snakeMessage(false);
					if ((x + 1) == crd[i][0] && y == crd[i][1])
						return this.snakeMessage(true);
				}
				if (!(((y * row) + x) < ((row * col) - 1) && x < (col - 1)))
					return this.snakeMessage();
				this.snakeBody();
				crd[(crd.length - 1)][0]++;
				break;
			case 'left':
				while (i-- > 0) {
					if (crd[backStep][0] == (x - 1))
						return this.snakeMessage(false);
					if ((x - 1) == crd[i][0] && y == crd[i][1])
						return this.snakeMessage(true);
				}
				if (!(((y * row) + x) > 0 && x > 0))
					return this.snakeMessage();
				this.snakeBody();
				crd[(crd.length - 1)][0]--;
				break;
			case 'down':
				while (i-- > 0) {
					if (crd[backStep][1] == (y + 1))
						return this.snakeMessage(false);
					if ((y + 1) == crd[i][1] && x == crd[i][0])
						return this.snakeMessage(true);
				}
				if (!(((y * row) + x) < ((row * col) - col)))
					return this.snakeMessage();
				this.snakeBody();
				crd[(crd.length - 1)][1]++;
				break;
			case 'top':
				while (i-- > 0) {
					if (crd[backStep][1] == (y - 1))
						return this.snakeMessage(false);
					if ((y - 1) == crd[i][1] && x == crd[i][0])
						return this.snakeMessage(true);
				}
				if (!(((y * row) + x) > (col - 1)))
					return this.snakeMessage();
				this.snakeBody();
				crd[(crd.length - 1)][1]--;
				break;
		}
		this.feedTime(x, y);
		return true;
	},
	
		//Инициирует рост змейки
	feedTime: function(x, y) {
		for (i = 0, plt = this.foodPlate; plt.length > i; i++) {
			if (x == plt[i][0] && y == plt[i][1]) {
				this.improveSnake();
				plt[i][0] = -1;
				plt[i][1] = -1;
			}
		}
		i = this.bigFoodPlate.length;
		while (i-- > 0) {
			if (x == this.bigFoodPlate[i][0] && y == this.bigFoodPlate[i][1]) {
				
				this.showScore(30);
				this.bigFoodPlate[i][0] = -1;
				this.bigFoodPlate[i][0] = -1;
			}
		}
	},
	
		//Двигает змейку вперёд на одну клетку
	moveForward: function() {
		crd = this.coordinates; 
		x = crd[(crd.length - 1)][0];
		y = crd[(crd.length - 1)][1];
		row = this.row;
		col = this.col;
		this.setCell(false);
		this.testSnake(crd, x, y);
		this.setCell(true);
	},
	
		//Инициирует запуск функции движения внутри объекта
	moveSnake: function() {
		snakeAPI.moveForward();
	},
	
		//Увеличивает змейку
	improveSnake: function() {
		crd = this.coordinates; 
		x = this.coordinates[(crd.length - 1)][0];
		y = this.coordinates[(crd.length - 1)][1];
		crd.push([x, y]);
		this.showScore(10);
	},
	
	calcScore: function(add) {
		this.score += add;
		if (this.speed > 200)
			this.speed -= add;
		else
			if (this.speed > 150)
				this.speed -= add/2;
			else
				if (this.speed > 110)
					this.speed -= add/2 - 1;
				else
					if (this.speed > 80)
						this.speed -= add/2 - 2;
					else
						if (this.speed > 60)
							this.speed -= add/2 - 3;
						else
							if (this.speed > 50)
								this.speed -= add/10;
		if (typeof snakeInterval !== 'undefined') clearInterval(snakeInterval);
		snakeInterval = setInterval(snakeAPI.moveSnake, (this.speed));
	},
	
		//Ведёт и отображает счёт
	showScore: function(add) {
		this.calcScore(add);
		crd = this.coordinates; 
		x = crd[(crd.length - 1)][0];
		y = crd[(crd.length - 1)][1];		
		if (add == 10) {
			$($('.cell')[y * this.row + x]).append($('<p>').addClass('scoreUp').html('+10'));
			$('.scoreUp').fadeOut(2000);
		}
		if (add == 30) {
			$($('.cell')[y * this.row + x]).append($('<p>').addClass('fastUp').html('+30'));
			$('.fastUp').fadeOut(4000);
		}
		$('#score').html('Score: ' + this.score);
		$('#speed').html(' Speed: ' + Number(1000/this.speed).toPrecision(3));
		$('#totalScore').html(' Total Score: ' + this.totalScore);		
	},
	
		//Бросает еду на поле в случайную клетку
	castFood: function(food) {
		y = Math.round(Math.random() * snakeAPI.row - 1);
		x = Math.round(Math.random() * snakeAPI.col - 1);
		if (food == 'bigFood') {
			$('.cell')[y * snakeAPI.row + x].style.backgroundColor = 'red';
			snakeAPI.bigFoodPlate.push([x, y]);
		}
		else {
			$('.cell')[y * snakeAPI.row + x].style.backgroundColor = 'green';
			snakeAPI.foodPlate.push([x, y]);
		}
	},

		//Ловит нажатие стрелок на клавиатуре
	catchKeyDown: function(event) {
		switch(event.keyCode) {
			case 39:
				snakeAPI.coordinates[0][0] = 'right';
				break;
			case 37:
				snakeAPI.coordinates[0][0] = 'left';
				break;
			case 38:
				snakeAPI.coordinates[0][0] = 'top';
				break;
			case 40:
				snakeAPI.coordinates[0][0] = 'down';
				break;
			case 32:
				snakeAPI.releaseVariables();
				break;
		}
	},
	
		//Инициирует запуск функции увеличения внутри объекта
	raiseSnake: function() {
		snakeAPI.castFood('bigFood');
	},
	
		//Выводит сообщение после столкновения с краем поля
	snakeMessage: function(off) {
		if (off === true) 
			alert('Ура, авто-укус! Чудовище съело само себя! ' +
		'(пробел - продолжить)');
		else {
			if (off === false)
				alert('Такое чудовище не может двигаться назад! ' +
		'(пробел - продолжить)');
			else
				alert('Ура, столкновение! Вы убили чудовище! ' +
		'(пробел - продолжить)');
		}
		snakeAPI.boardScore();
	},
	
		//Запрашивает счёт игры с сервера
	boardScore: function() {
		this.calcScore(0);
		snakeAPI.totalScore += snakeAPI.score;
		snakeAjax.score = this.score;
		snakeAjax.personName = this.personName;
		snakeAjax.totalScore = this.totalScore;
		snakeAjax.sendAjax();
		clearInterval(snakeInterval);
		$("#accordion").accordion({heightStyle: "fill", active: 0});
	},
	
		//Перезагрузка игры
	releaseVariables: function() {
		snakeAPI.coordinates = [['right'], [0, 0], [1, 0], [2, 0]]; // [x, y]
		snakeAPI.foodPlate = [];
		snakeAPI.score = 0;
		snakeAPI.speed = 300;
		snakeAPI.fieldClear();
		snakeAPI.boardScore();
		$("#accordion").accordion({heightStyle: "fill", active: 1});
		snakeAPI.showScore(0);
	},
	
		//Инициирует объект змейки
	initializeSnake: function() {
		snakeAPI.createMatrix();
		snakeAPI.releaseVariables();
		snakeAPI.setCell(true);
		$('body').keydown(snakeAPI.catchKeyDown);
		increaseSnake = setInterval(snakeAPI.castFood, 2000);
		growSnake = setInterval(snakeAPI.raiseSnake, 6000);
	},
}

//Точка входа
$(document).ready(function() {
	snakeAPI.initializeSnake();
	snakeAPI.personName = decodeURIComponent(location.search.substr(1)).split('=')[1];
});
