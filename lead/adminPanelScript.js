//
$(document).ready(function(){
	/*Функция, которая объявляет обработчики*/
	(function() {
		keeperRedact = function(origin, clone){
			origin.css('display', 'none');
			clone.css('display', 'block');
			keeperRead(origin, clone);
			clone.focus();
		};
		keeperRead = function(origin, clone) {
			if (origin.is('input') || origin.is('textarea'))
				clone.val(origin.attr('placeholder'));
			else
				clone.val(origin.text());
			
		};
		keeperSave = function(origin, clone){
			if (event.keyCode == 13) {
				origin.css('display', 'block');
				clone.css('display', 'none');
				keeperWrite(origin, clone);
			}
		};
		keeperWrite = function(origin, clone) {
			if (origin.is('input')  || origin.is('textarea'))
				origin.attr('placeholder', clone.val());
			else
				origin.text(clone.val());
		};
		keeperToggle = function(origin, clone) {
			origin.click(function(){
				keeperRedact(origin, clone);
			});	
			clone.keydown(function(event){
				keeperSave(origin, clone);
			});
			
		};
	}());	
	
	/*Cписок редактируемых объектов*/
	(function() {
		keeperToggle($('#callkeeperTitleForm'), $('#callkeeperTitleFormClone'));
		keeperToggle($('#callkeeperSecondMessage'), $('#callkeeperSecondMessageClone'));
		keeperToggle($('#youName'), $('#callkeeperYouNameClone'));
		keeperToggle($('#youMail'), $('#callkeeperYouMailClone'));
		keeperToggle($('#youQuestion'), $('#callkeeperQuestionClone'));
		keeperToggle($('#youSend'), $('#callkeeperYouSendClone'));
		keeperToggle($('#youSend'), $('#callkeeperYouSendClone'));
		keeperToggle($('#youClose'), $('#callkeeperYouCloseClone'));
		keeperToggle($('#youPush'), $('#callYouPushClone'));
		keeperToggle($('#titleForComplete'), $('#titleForCompleteClone'));
		keeperToggle($('#callMesBody'), $('#callMesBodyClone'));
	})();
	
	/*Обработчик работы с полями и списками*/
	(function() {
		var addList = function(items, before, classAdd){
			var selectMenu = $('<select>').addClass(classAdd);
			if (row = $(items[0]).val())
				selectMenu.append($('<option>').attr('selected', true).text(row));
			for (i = 1, c = items.length; i < c; i++) {
				if (row = $(items[i]).val())
					selectMenu.append($('<option>').text(row));
			}
			before.before(selectMenu);
		};
		var addField = function(addClass, before, cloneClass) {
			var clone = $('<input>').addClass(cloneClass).addClass('smartEditForm');
			var field = $('<input>').addClass(addClass).attr('type', 'text');
			var autoIncrement = cloneClass + ($('.' + cloneClass).size() + 1);
			clone.attr('id', autoIncrement + 'Clone');
			field.attr('id', autoIncrement).attr('placeholder', 'Новое поле');
			before.before(field);
			field.before(clone);
			eval("keeperToggle($('#" + autoIncrement + "'), $('#" + autoIncrement + "Clone'))");			
		};
		$('#addFieldToolId').click(function(){
			addField('itemListScroll', $('#addFieldToolId'), 'newFieldForm');
		});
		var list = $('#redactListScroll');
		var linkList = $('#addListToolId')
		linkList.click(function(){
			list.css('display', 'block');
		});
		$('#clickAcceptId').click(function(){
			addList($('.itemListScroll'), linkList, 'selectMenuPanel newFieldForm');
			list.css('display', 'none');
		});
	})();
});