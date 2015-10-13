function validateDelete() {
	var ask = window.confirm("Are you sure you want to delete this Question?");
    if (ask) {
        window.alert("This Question was successfully deleted.");
		return 1;	
    }
	else{
		return false;
	}
}
