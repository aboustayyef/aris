$(".flexslider").flexslider(),$(document).ready(function(){$(".sections>li").hover(function(){$(".sections li.active").removeClass("active"),$(this).addClass("active")},function(){console.log("left")}),$(".subsections>li").hover(function(){$(".subsections>li.active").removeClass("active"),$(this).addClass("active")},function(){}),$("ul.subsections").hover(function(){},function(){$(".sections li.active").removeClass("active")}),$("header").hover(function(){$(".sections li.active").removeClass("active")},function(){})}),$(document).ready(function(){$("#mobileMenu h3").on("click",function(){$("#mobileMenu").toggleClass("active")}),$("#mobileMenu > ul > li").on("click",function(){return $(this).hasClass("active")?void $(this).removeClass("active"):($("#mobileMenu > ul > li").each(function(){$(this).removeClass("active")}),void $(this).toggleClass("active"))})});