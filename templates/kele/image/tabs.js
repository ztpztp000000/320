$(function(){
	/*大选项卡*/
		function disAhide(css_a,css_b,css_c,css_d,css_e){
				$(css_a).css("display","block");
				$(css_b).css("display","none");
				$(css_c).css("display","none");
				$(css_d).css("display","none");
				$(css_e).css("display","none");
			}
		function thisRD(curt){
			$(curt).removeClass("bm").removeClass("bt").addClass("curt");
			$(".t5 a").addClass("last");
			}
	
		function aBtm(cn5,cn6){
			$(cn5).addClass("bm");
			$(cn6).addClass("bt");
			}
		function rBm(cn1,cn2,cn3,cn4){}
		$(".t1").hover(function(){
			thisRD(this);
			$(".t2,.t3,.t4,.t5").removeClass("curt");	
			$(".t3,.t4,.t5").removeClass("bt");
			$(".t2,.t3").removeClass("bm");	
			$(".t2").addClass("bt");		
			disAhide("#tab1","#tab2","#tab3","#tab4","#tab5");
			},function(){
				});		
		$(".t2").hover(function(){
				thisRD(this);
				$(".t1,.t3,.t4,.t5").removeClass("curt"); 
				$(".t3,.t4,.t5").removeClass("bm");
				$(".t4,.t5").removeClass("bt");
				aBtm(".t1",".t3");
		 	    disAhide("#tab2","#tab1","#tab3","#tab4","#tab5");
			},function(){
				});		
		/*$(".t3").hover(function(){
				thisRD(this);
				$(".t1,.t2,.t4,.t5").removeClass("curt");
				$(".t1,.t2,.t5").removeClass("bt");
				$(".t1,.t4,.t5").removeClass("bm");
				aBtm(".t2",".t4");
				disAhide("#tab3","#tab1","#tab2","#tab4","#tab5");
			},function(){
				});	*/
				
	function tabsover(taba,tabsdiv,css_01){
			$(taba).mouseover(function(){
					$(taba).removeClass(css_01);
					$(this).addClass(css_01);
					list=$(this).attr("rel");
					$(tabsdiv).css("display","none");
					$(list).css("display","block");
				});		
		}
	tabsover(".bars a",".gelist div","add");
	tabsover(".ntabs a",".news div","at");
		$(".ntabs a:first").mouseover(function(){
				$(this).addClass("ta");
				$(".ntabs a:last").removeClass("ta");
			});
		$(".ntabs a:last").mouseover(function(){
				$(this).removeClass("ta");
				$(".ntabs a:first").addClass("ta");
			});
		});  
		
		
		