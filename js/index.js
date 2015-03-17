//////////////////////////////
// create 2015.03.06 by aming
//
/////////////////////////////
var AMingHomePage = function() {
	var $objs, page, animate = null;

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
			$objs.fix_left.width($objs.window.width() - 500);

			animate.resetline();
		},
		init: function() {
			$objs.window.bind('resize', this.resize);
		}
	};
	this.Page = page;

	animate = {
		$line: null,
		initline: function() {
			this.line = $objs.fix_right.find('.bg').aming_line({
				space: 20,
				border: 3,
				count: 5,
                mintime: 400,
                maxtime: 1200,
				color: ['#45C0FF', '#FFAE5F', '#62EFA9', '#C45FFF', '#FF7197']
			});
		},
		resetline: function() {
			var index = this.line.showindex;
			this.initline();
			this.line.setIndex(index);
		},
		init: function() {
			this.initline();
			$('#btn_1').click(function() {
				animate.line.pre();
			});
			$('#btn_2').click(function() {
				animate.line.next();
			});
		}
	};
	this.Animate = animate;

	//init all object init functions.
	this.Init = function() {
		var props = AmingEx.getPropertys(this);
		for (var i = 0; i < props.length; i++) {
			var item = props[i];
			if (item.type == 'object') {
				AmingEx.execFunc(item.value, 'init');
			}
		};
	};
}



var homepage = new AMingHomePage();
$(function() {
	homepage.Init();

});