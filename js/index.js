//////////////////////////////
// create 2015.03.06 by aming
//
/////////////////////////////
var AMingHomePage = function() {
	var $objs, page = null;

	//jQuery objects
	$objs = {
		window: null,
		fix_content: null,
		fix_left: null,
		fix_right: null,
		init: function() {
			this.window = jQuery(window);
			this.fix_content = jQuery('.fix_content');
			this.fix_left = this.fix_content.find('.left');
			this.fix_right = this.fix_content.find('.right');

		}
	};
	this.$Objs = $objs;

	//page js
	page = {
		resize: function() {
			$objs.fix_left.width($objs.window.width() - 500)
		},
		init: function() {
			$objs.window.bind('resize', this.resize);
		}
	};
	this.Page = page;

	//init all object init functions.
	this.Init = function() {
		var props = this.getPropertys();
		for (var i = 0; i < props.length; i++) {
			var item = props[i];
			if (item.type == 'object') {
				item.value.execFunc('init');
			}
		};
	};
}



var homepage = new AMingHomePage();
$(function() {
	homepage.Init();
});