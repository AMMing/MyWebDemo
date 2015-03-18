//////////////////////////////
// create 2015.03.17 by aming
//
/////////////////////////////
(function (window, document, $, undefined) {
    $.extend($.fn, {
        color_list: ['#bf1729', '#e989e7', '#1a068f', '#518b8a', '#0d07e4', '#246092', '#a55e5b', '#ed1db8', '#7ca194', '#be41ca', '#4bfd77', '#2a7183', '#77d3d5', '#1829d6', '#481224', '#dce95a', '#8a64fd', '#917511', '#a4a682', '#dd03d3', '#dbcbfb', '#47f7fb', '#94682e', '#8dab23', '#fd9c84', '#53027f', '#d88025', '#17afb0', '#1680cf', '#d75d20', '#c812d1', '#2d2cb9', '#d028aa', '#ef7deb', '#f3da0f', '#9c1de6', '#43ee82', '#4f42e2', '#3e7c0c', '#e19279', '#60a61d', '#f47c89', '#bd66ed', '#0c542f', '#b0d363', '#b0fde6', '#32a8ee', '#e4c0c2', '#99cdb6', '#26cd15', '#512b4e', '#c47453', '#990294', '#f8bd5a', '#3c491a', '#5b9334', '#97e0a3', '#5b7441', '#b4563a', '#8d047d', '#7ec2bf', '#5f2290', '#1b8687', '#bc4b3e', '#9f16ad', '#2efa18', '#9bb8e7', '#a6c328', '#b22048', '#c01d2c', '#cb1efe', '#f6a4bf', '#9e9fc0', '#a39730', '#6d9ecd', '#386707', '#9f0f33', '#13c996', '#8e72d1', '#b52a15', '#f73445', '#e02ee6', '#e3c5f7', '#b92122', '#1f3d82', '#1c3784', '#d56fe5', '#b55e8a', '#096ad0', '#5d100f', '#06416a', '#b00597', '#8e9ed2', '#04ab0a', '#de4f30', '#0468d0', '#0288d9', '#70175d', '#eea859', '#922e03'],

        aming_line: function (setting, callback) {
            this.version = '1.0.0.0';

            var config = $.extend({
                space: 10,
                border: 5,
                count: 3,
                mintime: 200,
                maxtime: 1000,
                color: null,
                bgcolor: null
            }, setting);

            var random_id = parseInt(99999 * Math.random());

            var obj = this;
            var $renderTo = jQuery(this);

            $renderTo.empty();
            $renderTo.amingLine = this;
            $renderTo.attr('data-rid', random_id);

            if ($renderTo.css('position') == 'static') {
                $renderTo.css({
                    position: 'relative'
                });
            }
            $renderTo.css({
                overflow: 'hidden'
            });


            var w = $renderTo.width();
            var h = $renderTo.height();
            var column = w / config.space;
            divList = new Array();

            console.log(column);
            var randomColor = function () {
                var index = Math.floor(Math.random() * $.fn.color_list.length);

                return $.fn.color_list[index];
            };
            var randomTime = function () {
                return Math.floor(Math.random() * (config.maxtime - config.mintime) + config.mintime);
            };

            var getColor = function (index) {
                if (config.color != null && config.color.length >= config.count) {
                    return config.color[index];
                } else {
                    return randomColor();
                }
            };
            var getbgColor = function (index) {
                if (config.bgcolor == null)
                    return null;

                if (config.bgcolor.length >= config.count) {
                    return config.bgcolor[index];
                } else {
                    return randomColor();
                }
            };

            var col_div = function (cindex, index, color, bgColor) {
                var $div = jQuery('<div></div>');
                $div.width(config.space - config.border);
                $div.height(h);
                $div.addClass('col_div');
                $div.attr('data-index', index);
                $div.attr('data-cindex', cindex);
                $div.css({
                    position: 'absolute',
                    top: cindex * h,
                    left: index * config.space,
                    borderRight: config.border + 'px solid ' + color,
                    background: bgColor
                });

                return $div;
            };

            var col_divs = function (index, count) {
                var color = getColor(index);
                var bgColor = getbgColor(index);
                for (var i = 0; i < column; i++) {
                    $renderTo.append(col_div(index, i, color, bgColor));
                }
            };
            var getColumnDivByIndex = function (index) {
                return $renderTo.find('.col_div[data-index="' + index + '"]');
            };
            var getColumnDivByCindex = function ($col_items, cindex) {
                return $col_items.filter('.col_div[data-cindex="' + cindex + '"]');
            };

            for (var i = 0; i < config.count; i++) {
                col_divs(i, column);
            }

            obj.showindex = 0;

            var animate_top = function () {
                var oldindex = obj.showindex;
                var newindex = obj.showindex + 1;
                obj.showindex = newindex;
                if (newindex >= config.count) {
                    newindex = 0;
                }
                obj.showindex = newindex;

                for (var i = 0; i < column; i++) {
                    var $col_items = getColumnDivByIndex(i);
                    var $items_old = getColumnDivByCindex($col_items, oldindex);
                    var $items_new = getColumnDivByCindex($col_items, newindex);
                    var time = randomTime();
                    $col_items.css({
                        top: h
                    });
                    $items_old.css({
                        top: 0
                    });
                    $items_old.animate({
                        top: -1 * h
                    }, time);
                    $items_new.animate({
                        top: 0
                    }, time);
                    //$items_old.stop().animate({ top: -1 * h }, time);
                    //$items_new.stop().animate({ top: 0 }, time);
                }

            }


            var animate_bottom = function () {
                var oldindex = obj.showindex;
                var newindex = obj.showindex - 1;
                if (newindex < 0) {
                    newindex = config.count - 1;
                }
                obj.showindex = newindex;

                for (var i = 0; i < column; i++) {
                    var $col_items = getColumnDivByIndex(i);
                    var $items_old = getColumnDivByCindex($col_items, oldindex);
                    var $items_new = getColumnDivByCindex($col_items, newindex);
                    var time = randomTime();
                    $col_items.css({
                        top: -1 * h
                    });
                    $items_old.css({
                        top: 0
                    });
                    $items_old.animate({
                        top: h
                    }, time);
                    $items_new.animate({
                        top: 0
                    }, time);
                    //$items_old.stop().animate({ top: 0 }, time);
                    //$items_new.stop().animate({ top: h }, time);
                }

            }
            this.setIndex = function (index) {
                if (index == obj.showindex)
                    return;

                if (index > obj.showindex) { //next
                    if (obj.showindex >= config.count) {
                        obj.showindex = 0;
                    } else {
                        obj.showindex = index + 1;
                    }

                    animate_bottom();
                } else { //pre
                    if (obj.showindex == 0) {
                        obj.showindex = config.count - 1;
                    } else {
                        obj.showindex = index - 1;
                    }
                    animate_top();
                }
            };
            this.pre = function () {
                animate_top();
            };
            this.next = function () {
                animate_bottom();
            };

            return this;
        }
    });
})(window, document, jQuery);