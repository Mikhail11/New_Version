
	// включить подсказки
	$('[data-toggle="tooltip"]').tooltip({'html': true});

	$('#ex1').slider({
		formatter: function(value) {
			return 'Current value: ' + value;
		}
	});