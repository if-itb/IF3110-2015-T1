function validateForm() {
	var elements = document.getElementsByClassName('form-input');
	var size = elements.length;
	for (var i = 0; i < size; ++i) {
		var element = elements[i];
		if (element.value.length == 0) {
			alert('You missed some form.');
			return false;
		}
		if (element.getAttribute('name').toLowerCase() == 'email') {
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			if (re.test(element.value) === false) {
				alert('You missed some form.');
				return false;
			}
		}
	}
	return true;
}

function initialize() {
	var elements = document.getElementsByClassName('form-input');
}

