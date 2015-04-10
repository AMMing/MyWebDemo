//////////////////////////////
// create 2015.03.06 by aming
//
/////////////////////////////
var AMingHomePage = function () {
    var $objs, page, animate = null;

    //jQuery objects
    $objs = {
        window: null,
        main_content: null,
        fix_content: null,
        fix_left: null,
        fix_right: null,
        init: function () {
            this.window = jQuery(window);
            this.main_content = jQuery('body > div');
            this.fix_content = jQuery('.fix_content');
            this.fix_left = this.fix_content.find('.left');
            this.fix_right = this.fix_content.find('.right');

        }
    };
    this.$Objs = $objs;

    //page js
    page = {
        resize: function () {
            $objs.fix_left.width($objs.main_content.width() - 500);

            // animate.resetline();
            animate.reseteffect();
        },
        init: function () {
            $objs.window.bind('resize', this.resize);
            page.resize();
        }
    };
    this.Page = page;

    animate = {
        $line: null,
        $effect: null,
        time: 3000,
        initline: function () {
            this.$line = $objs.fix_right.find('.bg').aming_line({
                space: 20,
                border: 2,
                count: 6,
                mintime: 400,
                maxtime: 1200,
                color: ['#45C0FF', '#FFAE5F', '#62EFA9', '#C45FFF', '#FFEF80', '#FF7197'],
                bgcolor: ['#D7F1FF', '#FFEFDF', '#D5FFEA', '#F4E0FF', '#FFFDF2', '#FFEAF0']
            });
        },
        initeffect: function () {
            this.$effect = $objs.fix_right.find('.content').aming_imgeffect({
                center: true,
                margin: 60,
                time: 800,
                imgs: [
                    'images/nav_1.png',
                    'images/nav_2.png',
                    'images/nav_3.png',
                    'images/nav_4.png',
                    'images/nav_5.png',
                    'images/nav_6.png'
                ]
            });
        },
        resetline: function () {
            if (this.$line == null)
                return;

            var index = this.$line.showindex;
            this.initline();
            this.$line.setIndex(index);
        },
        reseteffect: function () {
            if (this.$effect == null)
                return;

            this.$effect.resize();
        },
        auto: function () {
            setInterval(function () {
                animate.$line.next();
                animate.$effect.next();
            }, animate.time);
        },
        init: function () {
            this.initline();
            this.initeffect();
            this.auto();
        }
    };
    this.Animate = animate;

    //init all object init functions.
    this.Init = function () {
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
$(function () {
    homepage.Init();

});