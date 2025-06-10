function answerScheme(qNum, answ)
{
   alert("Вопрос "+qNum+" ответ "+answ);

	if(qNum === "q1" && answ==="Yes") 
	{ 
	  $('#scheme_step2_1').css('display', 'block');
	  $('#scheme_question1').css('display', 'none'); 
	  $('#scheme_arrow2').css('display', 'block'); 
	  $('#scheme_step3').css('display', 'block');
	  $('#scheme_arrow3').css('display', 'block'); 
	  $('#scheme_step4').css('display', 'block');
	  $('#scheme_arrow4').css('display', 'block'); 
	  $('#scheme_step5').css('display', 'block');
	  $('#scheme_step_contract').css('display', 'block');
    }   
	if(qNum === "q1" && answ==="No") 
	{
	   $('#scheme_arrow1_2').css('display', 'block');  
	   $('#scheme_add_q1').html('Вы планируете хранить товары на нашем складе? <b>Нет</b>');
	   $('#scheme_question2').css('display', 'block');
	}
	
	
	if(qNum === "q2" && answ==="Myself") 
	{ 
	     $('#scheme_arrow1_2').css('display', 'none');  
	     $('#scheme_question2').css('display', 'none');
		 $('#scheme_question1').css('display', 'none');
		 $('#scheme_step2_2').css('display', 'block');
		 $('#scheme_arrow2').css('display', 'block'); 
		$('#scheme_question3').css('display', 'block');
	}
	
	if(qNum === "q2" && answ==="Supplier") 
	{ 
		$('#scheme_arrow1_2').css('display', 'none');  
	    $('#scheme_question2').css('display', 'none');
		$('#scheme_question1').css('display', 'none');
		$('#scheme_step2_3').css('display', 'block');
		$('#scheme_arrow2').css('display', 'block'); 
	    
		$('#scheme_question3').css('display', 'none');
		$('#scheme_step3_2').css('display', 'block');
		$('#scheme_step3_2').html("<h2>Забор (получение) заказов у поставщика</h2><div class='scheme-pic'  id='scheme_pic3_2'></div><div class='scheme-add'>Наш курьер прибывает к вашему поставщику для получения заказов. Свыше 10-ти заказов мы забираем бесплатно.</div>");
		$('#scheme_arrow3_1').css('display', 'block');
		$('#scheme_step3').css('display', 'block');
	    $('#scheme_arrow3').css('display', 'block'); 
	    $('#scheme_step4').css('display', 'block');
	    $('#scheme_arrow4').css('display', 'block'); 
	    $('#scheme_step5').css('display', 'block');
		$('#scheme_step_contract').css('display', 'block');	
		
	    
	}
	
	
	
	
	
	if(qNum === "q3" && answ==="Myself") 
	{ 
		
		$('#scheme_question3').css('display', 'none');
		$('#scheme_step3_1').css('display', 'block');
		$('#scheme_arrow3_1').css('display', 'block');
		$('#scheme_step3').css('display', 'block');
	    $('#scheme_arrow3').css('display', 'block'); 
	    $('#scheme_step4').css('display', 'block');
	    $('#scheme_arrow4').css('display', 'block'); 
	    $('#scheme_step5').css('display', 'block');
		$('#scheme_step_contract').css('display', 'block');			
	} 
	
	if (qNum === "q3" && answ==="Courier")
	{
		$('#scheme_question3').css('display', 'none');
		$('#scheme_step3_2').css('display', 'block');
		$('#scheme_arrow3_1').css('display', 'block');
		$('#scheme_step3').css('display', 'block');
	    $('#scheme_arrow3').css('display', 'block'); 
	    $('#scheme_step4').css('display', 'block');
	    $('#scheme_arrow4').css('display', 'block'); 
	    $('#scheme_step5').css('display', 'block');
		$('#scheme_step_contract').css('display', 'block');			
		
	}
		
		
	
}