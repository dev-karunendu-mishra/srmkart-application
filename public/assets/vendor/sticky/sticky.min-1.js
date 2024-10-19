!function(t,o){"use strict";jQuery.fn[o]=function(t){return t?this.bind("resize",function(t,o,e){var s;return function(){var i=this,a=arguments;s?clearTimeout(s):e&&t.apply(i,a),s=setTimeout(function(){e||t.apply(i,a),s=null},o||100)}}(t)):this.trigger(o)}}(jQuery,"smartresize"),function(t){"use strict";t.fn.themePin=function(o){var e=0,s=0,i=[],a=!1,n=t(window),p=[],r=[],c=[];o=o||{};var f=function(){for(var e=0,s=i.length;e<s;e++){var p=i[e];if(o.minWidth&&n.width()<=o.minWidth)p.parent().is(".pin-wrapper")&&p.unwrap(),p.css({width:"",left:"",top:"",position:""}),a=!0;else{a=!1;var r=o.containerSelector?p.closest(o.containerSelector).length?p.closest(o.containerSelector):t(o.containerSelector):t(document.body),c=p.offset(),f=r.offset();if(void 0!==f){var d=p.parent().offset();p.parent().is(".pin-wrapper")||p.wrap("<div class='pin-wrapper'>");var l=t.extend({top:0,bottom:0},o.padding||{}),h=parseInt(p.parent().parent().css("padding-top")),u=parseInt(p.parent().parent().css("padding-bottom"));void 0!==o.paddingOffsetTop?l.top+=parseInt(o.paddingOffsetTop,10):l.top+=18,void 0!==o.paddingOffsetBottom?l.bottom=parseInt(o.paddingOffsetBottom,10):l.bottom=0;var m=p.css("border-bottom"),v=p.outerHeight();p.css("border-bottom","1px solid transparent");var b=p.outerHeight()-v-1;p.css("border-bottom",m),p.css({width:p.outerWidth()<=p.parent().width()?p.outerWidth():p.parent().width()}),p.parent().css("height",p.outerHeight()+b),p.outerHeight()<=n.height()?p.data("themePin",{pad:l,from:(o.containerSelector?f.top:c.top)-l.top+h,pb:u,parentTop:d.top-h,offset:b}):p.data("themePin",{pad:l,fromFitTop:(o.containerSelector?f.top:c.top)-l.top+h,from:(o.containerSelector?f.top:c.top)+p.outerHeight()-t(window).height()+h,pb:u,parentTop:d.top-h,offset:b})}}}},d=function(){if(!a){e=n.scrollTop();for(var f=window.innerHeight||n.height(),d=0,l=i.length;d<l;d++){var h,u=t(i[d]),m=u.data("themePin");if(m){var v=o.containerSelector?u.closest(o.containerSelector).length?u.closest(o.containerSelector):t(o.containerSelector):t(document.body),b=u.outerHeight()+m.pad.top<=f;if(m.end=v.offset().top+v.height(),b?m.to=v.offset().top+v.height()-u.outerHeight()-m.pad.bottom-m.pb:(m.to=v.offset().top+v.height()-f-m.pb,m.to2=v.height()-u.outerHeight()-m.pad.bottom-m.pb),0===c[d]&&(c[d]=m.to),c[d]!=m.to&&r[d]&&u.height()+u.offset().top+m.pad.bottom<e+f&&(r[d]=!1),b){var g=m.from-m.pad.bottom,C=m.to-m.pad.top-m.offset;if(void 0!==m.fromFitTop&&m.fromFitTop&&(g=m.fromFitTop-m.pad.bottom),g+u.outerHeight()>m.end||g>=C){u.css({position:"",top:"",left:""}),o.activeClass&&u.removeClass(o.activeClass);continue}e>g&&e<C?(!("fixed"==u.css("position"))&&u.css({left:u.offset().left,top:m.pad.top}).css("position","fixed"),o.activeClass&&u.addClass(o.activeClass)):e>=C?(u.css({left:"",top:C-m.parentTop+m.pad.top}).css("position","absolute"),o.activeClass&&u.addClass(o.activeClass)):(u.css({position:"",top:"",left:""}),o.activeClass&&u.removeClass(o.activeClass))}else if(u.height()+m.pad.top+m.pad.bottom>f||p[d]||r[d]){var w=parseInt(u.parent().parent().css("padding-top"));e+m.pad.top-w<=m.parentTop?(u.css({position:"",top:"",bottom:"",left:""}),p[d]=r[d]=!1,o.activeClass&&u.removeClass(o.activeClass)):e>=m.to?(u.css({left:"",top:m.to2,bottom:""}).css("position","absolute"),o.activeClass&&u.addClass(o.activeClass)):e>s?p[d]?(p[d]=!1,h=u.offset().top-m.parentTop,u.css({left:"",top:h,bottom:""}).css("position","absolute"),o.activeClass&&u.addClass(o.activeClass)):!r[d]&&u.height()+u.offset().top+m.pad.bottom<e+f&&(r[d]=!0,!("fixed"==u.css("position"))&&u.css({left:u.offset().left,bottom:m.pad.bottom,top:""}).css("position","fixed"),o.activeClass&&u.addClass(o.activeClass)):e<s?r[d]?(r[d]=!1,h=u.offset().top-m.parentTop,u.css({left:"",top:h,bottom:""}).css("position","absolute"),o.activeClass&&u.addClass(o.activeClass)):!p[d]&&u.offset().top>=e+m.pad.top?(p[d]=!0,!("fixed"==u.css("position"))&&u.css({left:u.offset().left,top:m.pad.top,bottom:""}).css("position","fixed"),o.activeClass&&u.addClass(o.activeClass)):!r[d]&&p[d]&&"absolute"==u.css("position")&&u.offset().top>=e+m.pad.top&&(p[d]=!1):(p[d]=!1,p[d]=!1)}else e>=m.parentTop-m.pad.top?u.css({position:"fixed",top:m.pad.top}):u.css({position:"",top:"",bottom:"",left:""}),p[d]=r[d]=!1;c[d]=m.to}}s=e}},l=function(){f(),d()};return this.each(function(){var o=t(this),e=t(this).data("themePin")||{};e&&e.update||(i.push(o),t("img",this).one("load",f),e.update=l,t(this).data("themePin",e),p.push(!1),r.push(!1),c.push(0))}),n.on("touchmove scroll",d),f(),n.on("load",l),t(this).on("recalc.pin",function(){f(),d()}),t(this).on("recalc.pin.left",function(e,s){!function(e){void 0===e&&(e=400);for(var s=0,a=i.length;s<a;s++){var n=t(i[s]),p=n.data("themePin");if(p){var r=o.containerSelector?n.closest(o.containerSelector).length?n.closest(o.containerSelector):t(o.containerSelector):t(document.body);if("fixed"==n.css("position")){var c=n.offset().top-r.offset().top;n.css({position:"absolute",left:"",top:c,bottom:""}),setTimeout(function(){n.css({left:n.offset().left,top:p.pad.top,bottom:""}).css("position","fixed")},e)}}}}(s)}),this};var o=function(t,o){return this.initialize(t,o)};o.defaults={autoInit:!1,minWidth:767,padding:{top:0,bottom:0},offsetTop:0,offsetBottom:0},o.prototype={initialize:function(t,o){return t.data("__sticky")?this:(this.$el=t,this.setData().setOptions(o).build(),this)},setData:function(){return this.$el.data("__sticky",this),this},setOptions:function(e){return this.options=t.extend(!0,{},o.defaults,e,{wrapper:this.$el}),this},build:function(){if(!t.isFunction(t.fn.themePin))return this;var o,e=this.options.wrapper;return e.themePin(this.options),t(window).smartresize(function(){o&&clearTimeout(o),o=setTimeout(function(){e.trigger("recalc.pin")},800);var t=e.parent();e.outerWidth(t.width()),"fixed"==e.css("position")&&e.css("left",t.offset().left)}),this}},t.fn.themeSticky=function(e){return this.map(function(){var s=t(this);return s.data("__sticky")?(s.trigger("recalc.pin"),setTimeout(function(){s.trigger("recalc.pin")},800),s.data("__sticky")):new o(s,e)})}}.apply(this,[jQuery]);