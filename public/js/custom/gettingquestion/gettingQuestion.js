$(document).ready(function(){
	var x=$('#topicId').val();
	var	temp=null;
	var	temp2=null;
	var myObject;
	var Qname;
	var Optname;
	var j=0;
	var questionlength;
	//checking for Question Exixst or not to resume
	
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
		    	}
		    }
	    	Display(temp,temp2);
	    	trackQuestion();
	    	
	       //$('#display').html(data);
	    },

	});
	
	$('#next').on('click',function(){
		
		if(temp!=null)
		{
			
			questionlength=myObject.length;
			j++;
			
			if(j<questionlength)
			{
				$('.option').empty();
				Display(Optname[j],Qname[j]);
			}else{
				j=questionlength-1;
			}
			trackQuestion();
		}
	});
	$('#prev').on('click',function(){
		if(temp!=null)
		{
			j--;
			if(j>=0)
			{
				$('.option').empty();
				Display(Optname[j],Qname[j]);
			}else
			{
				j=0;
			}
			trackQuestion();
		}
	});

	function Display(temp,temp2)
	{
		document.getElementById('question').innerHTML = temp2;

		var arr=temp.split(',');
		$.each(arr,function(index, value){
			$('.option').append('<div class="radio"><label class="radio-label"><input type="radio" name="choice" id="opt"'+index+'>'+value+'</label></div>');
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

});
 