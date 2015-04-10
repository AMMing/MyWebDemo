//////////////////////////////
// create 2015.03.06 by aming
// object extension methods
/////////////////////////////

// //Execution method
// Object.prototype.execFuncEx = function(funcName) {
// 	for (var p in this) {
// 		if (p == funcName && typeof(this[p]) == "function") {
// 			this[p]();
// 			return true;
// 		}
// 	}

// 	return false;
// };
// //Get object
// Object.prototype.getObjectEx = function(funcName) {
// 	for (var p in this) {
// 		if (p == funcName && typeof(this[p]) == "object") {
// 			return this[p];
// 		}
// 	}

// 	return null;
// };
// //Get Property
// Object.prototype.getPropertyEx = function(funcName) {
// 	for (var p in this) {
// 		if (p == funcName && typeof(this[p]) != "function") {
// 			return this[p];
// 		}
// 	}

// 	return null;
// };
// //Get Propertys
// //{name:"property name.",type:"property type.",value:"property value."}
// Object.prototype.getPropertysEx = function() {
// 	var props = new Array();
// 	for (var p in this) {
// 		var type = typeof(this[p]);
// 		if (type != "function") {
// 			props.push({
// 				name: p,
// 				type: type,
// 				value: this[p]
// 			});
// 		}
// 	}

// 	return props;
// };
//直接拓展Object会照成jQuery冲突所以改成现在HelperClass方式
var AmingEx = new function () { };
AmingEx = {
    //Execution method
    execFunc: function (obj, funcName) {
        for (var p in obj) {
            if (p == funcName && typeof (obj[p]) == "function") {
                obj[p]();
                return true;
            }
        }

        return false;
    },
    //Get object
    getObject: function (obj, funcName) {
        for (var p in obj) {
            if (p == funcName && typeof (obj[p]) == "object") {
                return obj[p];
            }
        }

        return null;
    },
    //Get Property
    getProperty: function (obj, funcName) {
        for (var p in obj) {
            if (p == funcName && typeof (obj[p]) != "function") {
                return obj[p];
            }
        }

        return null;
    },
    //Get Propertys
    //{name:"property name.",type:"property type.",value:"property value."}
    getPropertys: function (obj) {
        var props = new Array();
        for (var p in obj) {
            var type = typeof (obj[p]);
            if (type != "function") {
                props.push({
                    name: p,
                    type: type,
                    value: obj[p]
                });
            }
        }

        return props;
    }
};