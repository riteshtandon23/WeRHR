$(document).ready(function(){
	var x=$('#topicId').val();
	var	temp=null;
	var	temp2=null;
	var myObject;
	var Qname;
	var Optname;
	var j=0;
	var selectedOption;
	var questionlength;
	//checking for Question Exixst or not to resume
	//localStorage.clear();
	$.ajax({
	    type: 'GET',
	    dataType:'json',
	    url:'getQuestionAnswer.php',
	    data:'key='+x,
	    success:function(data)
	    {
	    	var myOb=JSON.stringify(data);
	    	myObject = JSON.parse(myOb);
	    	var CheckQuestionExist = JSON.parse(localStorage.getItem('QuestionNumber'));
	    	optionNotaficationButton(myObject)
			if(CheckQuestionExist!==null)
			{
				var retrieveQN = localStorage.getItem("QuestionNumber");
				j = JSON.parse(retrieveQN);
				var retrievedData1 = localStorage.getItem("QuestionName");
				Qname = JSON.parse(retrievedData1);
				var retrievedData2 = localStorage.getItem("QuestionOption");
				Optname = JSON.parse(retrievedData2);
				temp2=Qname[j];
				temp=Optname[j];
			}else{
	    	
		    	for(var i in myObject)
		    	{
		    		localStorage.clear();
		    		//console.log(myObject[i].Question);
	    			//console.log(myObject[i].QuestionOption);
	    			var Data1=myObject[i].Question;
	    			var Data2=myObject[i].QuestionOption;
	    			var QuestionName= JSON.parse(localStorage.getItem('QuestionName'));
					var QuestionOption= JSON.parse(localStorage.getItem('QuestionOption'));
					if (QuestionName=== null)
					{
					    QuestionName = [];
					}
					QuestionNam={QName:Data1};
					QuestionName.push(Data1);
					if(QuestionOption=== null)
					{
						QuestionOption= [];
					}
					QuestionOptio ={QOption:Data2};
					QuestionOption.push(Data2);
					localStorage.setItem("QuestionName", JSON.stringify(QuestionName))
					localStorage.setItem("QuestionOption", JSON.stringify(QuestionOption))	
					var retrievedData1 = localStorage.getItem("QuestionName");
					Qname = JSON.parse(retrievedData1);
					var retrievedData2 = localStorage.getItem("QuestionOption");
					Optname = JSON.parse(retrievedData2);
					//var opt1=$(row).val().split(',');
					//document.getElementById('questionOpt').innerHTML = ulname[0];
					temp2=Qname[0];
					temp=Optname[0];
					k=Number(i)+1;	
		    	}
		    }
			 $('#QNumber'+j).css('background-color','red');
	    	Display(temp,temp2);
	    	trackQuestion();
	    	highlight();
	    	checkedOption();
	    	
	       //$('#display').html(data);
	    },

	});
	
	$('#next').on('click',function(){
		
		if(temp!=null)
		{
			unAnswered(j);
			questionlength=myObject.length;
			
			j++;
			
			if(j<questionlength)
			{
				$('.option').empty();
				Display(Optname[j],Qname[j]);
			}else{
				j=questionlength-1;
			}
			if($('#QNumber'+j).css('background-color')!=="rgb(255, 255, 0)"){	
				$('#QNumber'+j).css('background-color','red');
			}
			trackQuestion();
			checkedOption();

		}
	});
	$('#prev').on('click',function(){
		if(temp!=null)
		{
			unAnswered(j);
			j--;
			if(j>=0)
			{
				$('.option').empty();
				Display(Optname[j],Qname[j]);
			}else
			{
				j=0;
			}
			if($('#QNumber'+j).css('background-color')!=="rgb(255, 255, 0)"){	
				$('#QNumber'+j).css('background-color','red');
			}
			trackQuestion();
			checkedOption();
		}
	});
	$('#clear').on('click',function(){
		$('input[name="choice"]').removeAttr('checked');
		$('#QNumber'+j).css('background-color','red');
		var  QuesNo= JSON.parse(localStorage.getItem('QuesNo'));
		var  UserAns= JSON.parse(localStorage.getItem('UserAns'));
		var uans=$(this).val();
		if(QuesNo!==null)
		{
			for(a=0;a<QuesNo.length;a++)
			{
				if(Number(QuesNo[a])==j)
				{
					QuesNo.splice(a,1);
					UserAns.splice(a,1);
				}
			}
		}
		localStorage.setItem("UserAns", JSON.stringify(UserAns))
		localStorage.setItem("QuesNo", JSON.stringify(QuesNo))
	});
	$('.notification').on('click','button',function(){
		//alert($(this).val());
		//alert($(this).css('background-color'));
		unAnswered(j);
		j=$(this).val();

		$('.option').empty();
		Display(Optname[j],Qname[j]);
		trackQuestion();
		if($('#QNumber'+j).css('background-color')!=="rgb(255, 255, 0)"){	
				$('#QNumber'+j).css('background-color','red');
			}
		//highlight("visit");
		checkedOption();
		
	});
	$('.option').on('click','input',function(){
		//alert($(this).val());
		removeUnanswered(j);
		$('#QNumber'+j).css('background-color','yellow');
		
		var  QuesNo= JSON.parse(localStorage.getItem('QuesNo'));
		var  UserAns= JSON.parse(localStorage.getItem('UserAns'));
		var uans=$(this).val();
		if(QuesNo!==null)
		{
			for(a=0;a<QuesNo.length;a++)
			{
				if(Number(QuesNo[a])==j)
				{
					QuesNo.splice(a,1);
					UserAns.splice(a,1);
				}
			}
		}
		if (QuesNo === null)
		{
		    QuesNo = [];
		}
		QuesN={QuesNo:j};
		QuesNo.push(j);
		if (UserAns === null)
		{
		    UserAns = [];
		}
		UserAn={UserAns:uans};
		UserAns.push(uans);
		localStorage.setItem("UserAns", JSON.stringify(UserAns))
		localStorage.setItem("QuesNo", JSON.stringify(QuesNo))
		

	});
	function Display(temp,temp2)
	{
		
		document.getElementById('question').innerHTML = Number(j)+1+".  "+temp2;

		var arr=temp.split(',');
		$.each(arr,function(index, value){
			$('.option').append('<div class="radio"><label class="radio-label"><input type="radio" name="choice" value="'+value+'" id="opt"'+index+'>'+value+'</label></div>');
		});
		$('.option').append('<input type="hidden" id="Q'+j+'" value="'+j+'">');
	}
	function trackQuestion()
	{
		//track question number
			localStorage.removeItem('QuestionNumber');
			var QN=$('#Q'+j).attr('value');
			var QuestionNumber = JSON.parse(localStorage.getItem('QuestionNumber'));
			if (QuestionNumber === null)
			{
			    QuestionNumber = [];
			}
			QuestionNumbe={QNumber:QN};
			QuestionNumber.push(QN);
			localStorage.setItem("QuestionNumber", JSON.stringify(QuestionNumber))

	}
	function optionNotaficationButton(totalBut)
	{

		var k=0;
		for(var i in totalBut){
			k=Number(i)+1;
			$('.notification').append(' <button id="QNumber'+i+'" name="previous" type="button" class="btn btn-round" value="'+i+'">'+k+'</button>');
		}
		
	}
	function checkedOption(){

		if($('#QNumber'+j).css('background-color')==="rgb(255, 255, 0)")
		{
			
			var  QuesNo= JSON.parse(localStorage.getItem('QuesNo'));
			var  UserAns= JSON.parse(localStorage.getItem('UserAns'));
			// var uans=$(this).val();
			if(QuesNo!==null)
			{

				for(a=0;a<QuesNo.length;a++)
				{
					if(Number(QuesNo[a])==j)
					{
						selectedOption=UserAns[a];
						$('input:radio[name=choice][value="'+selectedOption+'"]').attr('checked',true);
					}
				}
			}
		}
		
	}

	function highlight()
    {
    	var  uA= JSON.parse(localStorage.getItem('unAnswer'));
			if(uA!==null)
			{
			for(b=0;b<uA.length;b++)
				{
					//Number(QuesNo[a]);
					$('#QNumber'+Number(uA[b])).css('background-color','red');
				}
			} 
      var  QuesNo= JSON.parse(localStorage.getItem('QuesNo'));
			if(QuesNo!==null)
			{

				for(a=0;a<QuesNo.length;a++)
				{
					//Number(QuesNo[a]);
					$('#QNumber'+Number(QuesNo[a])).css('background-color','yellow');
				}
			} 
				
    }
    function unAnswered(jval)
    {
    	
    	if($('#QNumber'+jval).css('background-color')!=="rgb(255, 255, 0)")
		{
			var unAnswer = JSON.parse(localStorage.getItem('unAnswer'));
			if(unAnswer!==null)
			{
				for(a=0;a<unAnswer.length;a++)
				{
					if(Number(unAnswer[a])==jval)
					{
						unAnswer.splice(a,1);
						//alert(unAnswer.length);
					}
				}
			}
				if (unAnswer === null)
				{
				    unAnswer = [];
				}
				unAnswe={unAnswer:jval};
				unAnswer.push(jval);
				localStorage.setItem("unAnswer", JSON.stringify(unAnswer))/**/
				}
		
		
	}
	function removeUnanswered(jval)
	{
		var unAnswer = JSON.parse(localStorage.getItem('unAnswer'));
		if(unAnswer!==null)
		{
			for(a=0;a<unAnswer.length;a++)
			{
				if(Number(unAnswer[a])==jval)
				{
					unAnswer.splice(a,1);
					//alert(unAnswer.length);
				}
			}
				//unAnswe={unAnswer:jval};
			//unAnswer.push(null);
			localStorage.setItem("unAnswer", JSON.stringify(unAnswer))

		}
	}
});	

 