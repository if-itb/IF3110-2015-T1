var isValid;

function validate(form) {
	isValid = true;

	_("input,textarea").forEach(function(element){
		validateFormInput(element);
	}, function(){
		_("input[data-type='email']").forEach(function(element){
			emailValidate(element);
		}, function(){
			if (isValid) form.submit();
		});
	});

	return false;
}

function validateFormInput(element){
	element.style('border-color', '#000');

	if (false){
		isValid = isValid & (emailValidate(element.val()) || (element.style('border-color', '#f00') && false));
	} else {
		isValid = isValid & ((element.val() !== '') || (element.style('border-color', '#f00') && false));
	}
}

function emailValidate(element) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    isValid = isValid & (re.test(element.val()) || (element.style('border-color', '#f00') && false));
}