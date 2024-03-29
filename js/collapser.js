/* jQuery - Collapser - Plugin v2.0 www.aakashweb.com (c) 2014 Aakash Chakravarthy MIT License. 

https://www.aakashweb.com/jquery-plugins/collapser/

*/
(function(e,m,p,q){function l(b,f){this.o=e.extend({},n,f);this.e=e(b);this.init()}var n={target:"next",mode:"words",speed:"slow",truncate:10,ellipsis:"...",effect:"fade",controlBtn:"",showText:"Show more",hideText:"Hide text",showClass:"show-class",hideClass:"hide-class",atStart:"hide",lockHide:!1,dynamic:!1,changeText:!1,beforeShow:null,afterShow:null,beforeHide:null,afterHide:null};l.prototype={init:function(){var b=this;b.mode=b.o.mode;b.remaining={};b.ctrlHtml=' <a href="#" data-ctrl class="'+
(e.isFunction(b.o.controlBtn)?"":b.o.controlBtn)+'"></a>';e(b.e).each(function(){e(this).data("oCnt",b.e.html());var a=e.isFunction(b.o.atStart)?b.o.atStart.call(b.e):b.o.atStart,a="undefined"!==typeof b.e.attr("data-start")?b.e.attr("data-start"):a;"hide"==a?b.hide(b.e,0):b.show(b.e,0)});var f;e(m).on("resize",function(){b.o.dynamic&&"lines"==b.mode&&(clearTimeout(f),f=setTimeout(function(){b.reInit(b.e)},100))})},show:function(b,f){var a=this,c=e(b);"undefined"===typeof f&&(f=a.o.speed);var g=function(){e.isFunction(a.o.afterShow)&&
a.o.afterShow.call(a.e,a)};e.isFunction(a.o.beforeShow)&&a.o.beforeShow.call(a.e,a);switch(a.mode){case "chars":case "words":var d=c.height();c.html(c.data("tHTML"));var h=c.height();c.height(d);c.animate({height:h},f,function(){c.height("auto");g()}).removeClass(a.o.hideClass).addClass(a.o.showClass);c.data("tHTML",c.html());break;case "lines":0==c.children("div").length&&c.wrapInner("<div>");var k=c.children("div"),d=k.height(),h=k.html(c.data("oCnt")).css("height","").height();k.css("height",d);
k.animate({height:h},f,function(){k.height("auto");g()});c.removeClass(a.o.hideClass).addClass(a.o.showClass);break;case "block":a.blockMode(c,"show",f,g)}a.status=1;if(!0==a.o.lockHide)return c.find("[data-ctrl]").remove(),"";if("block"==a.mode)c.off("click.coll").on("click.coll",function(b){b.preventDefault();a.hide(c)});else 0!=c.find("[data-ctrl]").length||e.isFunction(a.o.controlBtn)||c.append(a.ctrlHtml),a.ctrlBtn=e.isFunction(a.o.controlBtn)?a.o.controlBtn.call(a.e):e(c.find("[data-ctrl]")),
a.ctrlBtn.off("click.coll").on("click.coll",function(b){b.preventDefault();a.hide(c)}).html(a.o.hideText)},hide:function(b,f){var a=this,c=e(b);"undefined"===typeof f&&(f=a.o.speed);var g=function(){e.isFunction(a.o.afterHide)&&a.o.afterHide.call(a.e,a)};e.isFunction(a.o.beforeHide)&&a.o.beforeHide.call(a.e,a);c.find("[data-ctrl]").remove();switch(a.mode){case "chars":var d=e.trim(c.text());a.remaining.chars=d.length-a.o.truncate;d.length>a.o.truncate&&(c.data("tHTML",c.html()),d=a.pad(d.slice(0,
a.o.truncate),d.slice(a.o.truncate,d.length)),c.html(d).removeClass(a.o.showClass).addClass(a.o.hideClass),g());break;case "words":d=e.trim(c.text());d=d.split(" ");a.remaining.words=d.length-a.o.truncate;d.length>a.o.truncate&&(c.data("tHTML",c.html()),d=a.pad(d.slice(0,a.o.truncate).join(" "),d.slice(a.o.truncate,d.length).join(" ")),c.html(d).removeClass(a.o.showClass).addClass(a.o.hideClass),g());break;case "lines":0==c.children("div").length&&c.wrapInner("<div>");d=c.children("div").css("height",
"");d.html(d.text());var h=d.height();"undefined"===typeof c.data("lHeight")?(temp=d.clone(),lHeight=temp.text("a").insertAfter(d).height(),c.data("lHeight",lHeight),d.next().remove()):lHeight=c.data("lHeight");lines=h/lHeight;a.remaining.lines=lines-a.o.truncate;0<a.remaining.lines&&(d.css("overflow","hidden"),d.animate({height:lHeight*a.o.truncate},f).data("tHeight",h),c.removeClass(a.o.showClass).addClass(a.o.hideClass),0!=c.find("[data-ctrl]").length||e.isFunction(a.o.controlBtn)||c.append(a.ctrlHtml),
g());break;case "block":a.blockMode(c,"hide",f,g)}a.status=0;"block"==a.mode?c.unbind("click.coll").bind("click.coll",function(b){b.preventDefault();a.show(c)}):(a.ctrlBtn=e.isFunction(a.o.controlBtn)?a.o.controlBtn.call(a.e):e(c.find("[data-ctrl]")),a.ctrlBtn.off("click.coll").on("click.coll",function(b){b.preventDefault();a.show(c)}).html(a.o.showText),g=a.o.showText,d={chars:["character","characters"],words:["word","words"],lines:["lines","lines"]},g=g.replace("%s",a.remaining[a.mode]+(1==a.remaining[a.mode]?
" "+d[a.mode][0]:" "+d[a.mode][1])),a.ctrlBtn.html(g))},pad:function(b,f){return b+'<span class="coll-ellipsis">'+this.o.ellipsis+"</span>"+(e.isFunction(this.o.ctrlBtn)?"":this.ctrlHtml)+'<span class="coll-hidden" style="display:none">'+f+"</span>"},blockMode:function(b,f,a,c){var g=["fadeOut","slideUp","fadeIn","slideDown"],d="fade"==this.o.effect?0:1,g="hide"==f?g[d]:g[d+2];if(e.isFunction(this.o.target))this.o.target.call(this.e)[g](a,c);else if(e.fn[this.o.target])e(b)[this.o.target]()[g](a,
c);"show"==f?(b.removeClass(this.o.showClass).addClass(this.o.hideClass),this.o.changeText&&b.text(this.o.hideText)):(b.removeClass(this.o.hideClass).addClass(this.o.showClass),this.o.changeText&&b.text(this.o.showText))},reInit:function(b){b.find("[data-ctrl]").remove();b.html(this.e.data("oCnt"));0==this.status?this.hide(b,0):this.show(b,0)}};e.fn.collapser=function(b){return this.each(function(){e.data(this,"collapser")||e.data(this,"collapser",new l(this,b))})}})(jQuery,window,document);


/*

Example 

	jQuery('.bio').collapser({
		mode: 'chars',
		truncate: 260,
		speed: null,
		lockHide: false,
		showText: 'Read More',
		hideText: 'Read Less',
		ellipsis: '&hellip;',
		effect: 'fadeIn'
	});
*/	