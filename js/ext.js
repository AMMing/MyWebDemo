//////////////////////////////
// create 2015.03.06 by aming
// object extension methods
/////////////////////////////

//Execution method
Object.prototype.execFunc = function(funcName) {
	for (var p in this) {
		if (p == funcName && typeof(this[p]) == "function") {
			this[p]();
			return true;
		}
	}

	return false;
};
//Get object
Object.prototype.getObject = function(funcName) {
	for (var p in this) {
		if (p == funcName && typeof(this[p]) == "object") {
			return this[p];
		}
	}

	return null;
};
//Get Property
Object.prototype.getProperty = function(funcName) {
	for (var p in this) {
		if (p == funcName && typeof(this[p]) != "function") {
			return this[p];
		}
	}

	return null;
};
//Get Propertys
//{name:"property name.",type:"property type.",value:"property value."}
Object.prototype.getPropertys = function() {
	var props = new Array();
	for (var p in this) {
		var type = typeof(this[p]);
		if (type != "function") {
			props.push({
				name: p,
				type: type,
				value: this[p]
			});
		}
	}

	return props;
};