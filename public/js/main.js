$(function masonry(){
	var bloc = $('#masonry-bloc');
	bloc.masonry({
		isAnimated: true,
		itemSelector: '.bloc:not(.hidden)',
		"isFitWidth": true
	});
	
	$('.navbar-popup').find('.cats').click(function(e){
		var cls = $(this).attr("href").replace('#', '');
		bloc.find('.bloc').removeClass('hidden').fadeTo('fast', 1);
		bloc.find('.bloc:not(.'+cls+')').addClass('hidden').fadeTo('fast', 0.2);
		bloc.masonry('reload');
		e.preventDefault();
	});
	
	$('.navbar-popup').find('.tous').click(function(e){
		bloc.find('.bloc').removeClass('hidden').fadeTo('fast', 1);
		e.preventDefault();
	});
});

/* ===================================================================== Fade mouseover */

$(function fadeOver(){
	var blocList = $('#masonry-bloc').find('.bloc');
	blocList.find('.imgover').hide();
	blocList.find('p').hide();
	blocList.mouseenter(function(){
		$(this).find('.imgover').fadeTo('fast', 0.8);
		$(this).find('p').fadeTo('fast', 1);
	});
	blocList.mouseleave(function(){
		$(this).find('.imgover').fadeOut('fast');
		$(this).find('p').fadeOut('fast');
	});
});

/* ===================================================================== StayOnTop menu */

$(function(){
	var menu = $('#header-default');
	var menuFix = $('#header-fixed');
	var pos = menu.offset();
	
	menuFix.hide();
	
	$(window).scroll(function(){
		if($(this).scrollTop() > pos.top+$('#header-default').height()-85){
			menuFix.fadeIn('fast');
		}else if($(this).scrollTop() <= pos.top+$('#header-default').height()){
			menuFix.fadeOut('fast');
		}
	});
});

/* ===================================================================== Carousel */

$(document).ready(function(){
	s1 = new Slider("#Slider1");
});

var Slider = function(id){
	var self=this;
	this.div = $(id);
	this.slider = this.div.find('.slider');
	this.largeurCache = this.div.width();
	this.largeur = 0;
	this.nbImg = 0;
	this.idImg = 0;
	
	self.div.find('.slider a').css("width", $(window).width());
	self.div.find('.slider a').each(function(){
		self.nbImg += 1;
		self.largeur += $(this).width();
		self.largeur += parseInt($(this).css('margin-left'));
		self.largeur += parseInt($(this).css('margin-right'));
	});
	
	this.prev = this.div.find('.prev');
	this.next = this.div.find('.next');
	this.saut = this.largeur/this.nbImg+5;
	
	var autoplay = 4000;
	
	//////////////// RESIZE
	$(window).resize(function(){
		self.div.find('.slider a').css("width", $(window).width());
		self.largeur = self.div.find('.slider a').width()*self.nbImg;
		self.saut = self.largeur/self.nbImg+5;
		self.slider.animate({
			left: -self.idImg*self.saut
		},500);
	});
	
	//////////////// PUCES
	$(function(){
		for (var i=0; i<$(id).find('.slider a').length; i++){
			$(id).find('.steps ul.puces').append("<li></li>");
		}
		$("ul.puces li:first-child").addClass('active');
		self.div.find('.steps ul.puces li').click(function(){
			self.idImg = $(id).find('.steps ul.puces li').index(this);
			self.slider.animate({
				left: -self.idImg*self.saut
			},500);
			if(self.idImg == 0){
				self.prev.hide();
				self.next.show();
			}else if(self.idImg >= $(id).find('.slider a').length-2){
				self.prev.show();
				self.next.hide();
			}else{
				self.prev.show();
				self.next.show();
			}
			$("ul.puces li").removeClass('active');
			$("ul.puces li:eq("+self.idImg+")").addClass('active');
		});
	});
	
	///////////////// NEXT PREV
	this.prev.click(function prevImg(){
		self.next.show();
		if(self.idImg > 0){
			self.idImg--;
			self.slider.animate({
				left: -self.idImg*self.saut
			},500);
		}
		if(self.idImg < 1){
			self.prev.hide();
		}
		$("ul.puces li").removeClass('active');
		$("ul.puces li:eq("+self.idImg+")").addClass('active');
	});
	if(self.idImg < 1){
		self.prev.hide();
	}
	
	this.next.click(function nextImg(){
		self.prev.show();
		if(self.idImg < self.nbImg-1){
			self.idImg++;
			self.slider.animate({
				left: -self.idImg*self.saut
			},500);
			$("ul.puces li").removeClass('active');
			$("ul.puces li:eq("+self.idImg+")").addClass('active');
		}
		if(self.idImg > self.nbImg-2){
			self.next.hide();
		}
	});

	///////////////// AUTOPLAY 
	function nextImg(){
		self.prev.show();
		if(self.idImg < self.nbImg-1){
			self.idImg++;
			self.slider.animate({
				left: -self.idImg*self.saut
			},500);
		}
		if(self.idImg > self.nbImg-2){
			self.next.hide();
		}
	}
	
    setInterval(function() {
    	if(self.idImg>self.nbImg-2){
    		self.idImg = 0;
    		self.next.show();
    		self.prev.hide();
    		self.slider.animate({
				left: 0
			},500);
    	}else{
    		nextImg();
    	}
    	$("ul.puces li").removeClass('active');
		$("ul.puces li:eq("+self.idImg+")").addClass('active');
    }, 6000);
    
    ///////////////// SCROLL TO MENU
    this.div.find(".down-button").click(function(){
    	//alert('ok');
    	$("html, body").animate({ scrollTop: $('#header-default').height()-83 }, 600);
    });
	
}
