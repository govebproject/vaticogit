$(document).ready(function(){$('a[href*=#]:not([href=#])').click(function(){var elementClick=$(this).attr("href");var destination=$(elementClick).offset().top;jQuery("html:not(:animated), body:not(:animated)").animate({scrollTop:destination},800);return false;});function update(){var Now=new Date(),Finish=new Date();Finish.setHours(23);Finish.setMinutes(59);Finish.setSeconds(59);if(Now.getHours()===23&&Now.getMinutes()===59&&Now.getSeconds===59){Finish.setDate(Finish.getDate()+1);}
var sec=Math.floor((Finish.getTime()-Now.getTime())/1000);var hrs=Math.floor(sec/3600);sec-=hrs*3600;var min=Math.floor(sec/60);sec-=min*60;$(".timer .hours").text(pad(hrs));$(".timer .minutes").text(pad(min));$(".timer .seconds").text(pad(sec));setTimeout(update,200);}
function pad(s){return('00'+s).substr(-2)}
update();});$(window).on("load",function(){$('.reviews').owlCarousel({loop:true,margin:10,autoHeight:true,nav:false,dotsEach:true,dots:true,responsive:{0:{items:1,},659:{items:1,},960:{items:2,nav:false,}}});});

var i = 1;
while (i<=4){
	$('.op'+i).owlCarousel({
		loop: true,
		margin: 10,
		autoHeight: true,
		nav: true,
		dotsEach: true,
		dots: false,
		navText: "",
		items: 1
	});
	i++;
}