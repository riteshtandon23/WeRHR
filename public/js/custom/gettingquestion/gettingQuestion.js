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
	var QuestionType;
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
	    	//alert(CheckQuestionExist.length);
	    	//QuestionType=myObject[0].QuestionType;
	    	optionNotaficationButton(myObject)
			if(CheckQuestionExist!==null)
			{
				var retrieveQN = localStorage.getItem("QuestionNumber");
				j = JSON.parse(retrieveQN);
				var retrievedData1 = localStorage.getItem("QuestionName");
				Qname = JSON.parse(retrievedData1);
				var retrievedData2 = localStorage.getItem("QuestionOption");
				Optname = JSON.parse(retrievedData2);
				var arr=Qname[j].split(":");
				QuestionType=arr[0];
				temp2=arr[1];
				temp=Optname[j];
			}else{
				localStorage.clear();
		    	for(var i in myObject)
		    	{
		    		
		    		//console.log(myObject.Question);
	    			//console.log(myObject[i].QuestionOption);
	    			var Data1=myObject[i].Question;
	    			var Data2=myObject[i].QuestionOption;
	    			var Data3=myObject[i].QuestionType;
	    			Data1=Data3+":"+Data1;
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
					var arr=Qname[0].split(":");
					QuestionType=arr[0];
					// temp2=Qname[0];
					// temp=Optname[0];
					temp2=arr[1];
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
				var arr=Qname[j].split(":");
				QuestionType=arr[0];
				Display(Optname[j],arr[1]);
			}else{
				j=questionlength-1;
			}
			if($('#QNumber'+j).css('background-color')!=="rgb(255, 255, 0)"){	
				$('#QNumber'+j).css('background-color','red');
			}
			if(QuestionType === "Multiple Choice"){
			getCheckbokOption();	
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
				var arr=Qname[j].split(":");
				QuestionType=arr[0];
				Display(Optname[j],arr[1]);
			}else
			{
				j=0;
			}
			if($('#QNumber'+j).css('background-color')!=="rgb(255, 255, 0)"){	
				$('#QNumber'+j).css('background-color','red');
			}
			if(QuestionType === "Multiple Choice"){
			getCheckbokOption();	
			}
			trackQuestion();
			checkedOption();
		}
	});
	$('#clear').on('click',function(){
		$('input[name="choice"]').removeAttr('checked');
		$('#QNumber'+j).css('background-color','red');
		//var  QuesNo= JSON.parse(localStorage.getItem('QuesNo'));
		var  UserAns= JSON.parse(localStorage.getItem('UserAns'));
		var uans=$(this).val();
		$('#tmpans').val('');
		if(UserAns!==null)
		{
			for(a=0;a<UserAns.length;a++)
			{
				var arr=UserAns[a].split("::");
				if(Number(arr[0])==(Number(j)+1))
				{
					//QuesNo.splice(a,1);
					UserAns.splice(a,1);
				}
			}
		}
		localStorage.setItem("UserAns", JSON.stringify(UserAns))
		//localStorage.setItem("QuesNo", JSON.stringify(QuesNo))
	});
	$('.notification').on('click','button',function(){
		
		unAnswered(j);
		j=$(this).val();

		$('.option').empty();
		var arr=Qname[j].split(":");
		QuestionType=arr[0];
		Display(Optname[j],arr[1]);
		trackQuestion();
		if($('#QNumber'+j).css('background-color')!=="rgb(255, 255, 0)"){	
				$('#QNumber'+j).css('background-color','red');
			}
			if(QuestionType === "Multiple Choice"){
			getCheckbokOption();	
			}
		checkedOption();
		
	});
	$('.option').on('click','input',function(){
		//alert($(this).val());

		removeUnanswered(j);
		$('#QNumber'+j).css('background-color','yellow');
		
		//var  QuesNo= JSON.parse(localStorage.getItem('QuesNo'));
		var  UserAns= JSON.parse(localStorage.getItem('UserAns'));
		var uans=$(this).val();
		var tmp;
		if(QuestionType === "Multiple Choice")
		{
			
			tmp=$('#tmpans').val();
			if(this.checked)
			{
				
				tmp=tmp.replace((Number(j)+1)+"::",'');
				//alert($('input[type="checkbox"]:checked').length==1);
				if($('input[type="checkbox"]:checked').length==1){
					//alert("enter");
				tmp=uans;
				tmp=(Number(j)+1)+"::"+tmp;	
				}else
				{
					
				tmp=tmp+","+uans;
				tmp=(Number(j)+1)+"::"+tmp;		
				}
				
			}else
			{
				//alert("unchecked")
				var uan=","+uans;
				tmp=tmp.replace(uan,'');
				uans=uans+",";
				tmp=tmp.replace(uans,'');
				if($('input[type="checkbox"]:checked').length==0){
				tmp='';
				$('#QNumber'+j).css('background-color','red');
				}
			}
			$('#tmpans').val(tmp);
		}else
		{
			tmp=(Number(j)+1)+"::"+$(this).val();
		}
		// tmp=tmp.substring(1);
		//alert(UserAns);
		if(UserAns!==null)
		{
			
			for(a=0;a<UserAns.length;a++)
			{
				var arr=UserAns[a].split("::");
				//alert(arr[0]);
				if(Number(arr[0])==(Number(j)+1))
				{
					UserAns.splice(a,1);
				}
			}
		}else
		//if(UserAns===null)
		{

		    UserAns = [];
		}
		if(tmp==="")
		{
			localStorage.setItem("UserAns", JSON.stringify(UserAns))
		}
		else
		{
			UserAn={UserAns:tmp};
			UserAns.push(tmp);
			localStorage.setItem("UserAns", JSON.stringify(UserAns))
		}

	});
	function Display(temp,temp2)
	{
		//Display question and option in a page
		
		document.getElementById('question').innerHTML = Number(j)+1+".  "+temp2;
		if(temp!==null)
		{
			if(QuestionType === "Multiple Choice")
			{
				var arr=temp.split(',');
				$.each(arr,function(index, value){
					value=htmlSpecialChars(value);
					$('.option').append('<div class="checkbox"><label class="checkbox-label"><input type="checkbox" name="choice" value="opt'+(index+1)+'" id="opt"'+index+'>'+value+'</label></div>');
				});
			}else{
				//alert("enter");
				var arr=temp.split(',');
				$.each(arr,function(index, value){
					value=htmlSpecialChars(value);
					$('.option').append('<div class="radio"><label class="radio-label"><input type="radio" name="choice" value="opt'+(index+1)+'" id="opt"'+index+'>'+value+'</label></div>');
				});
			}
				$('.option').append('<input type="hidden" id="Q'+j+'" value="'+j+'">');
			}
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
		//button for showing notification
		var k=0;
		for(var i in totalBut){
			k=Number(i)+1;
			$('.notification').append(' <button id="QNumber'+i+'" name="previous" type="button" class="btn btn-primary btn-circle" value="'+i+'">'+k+'</button>');
		}
		
	}
	function checkedOption(){
//recheck the option on previous or next

		if($('#QNumber'+j).css('background-color')==="rgb(255, 255, 0)")
		{
			
			//var  QuesNo= JSON.parse(localStorage.getItem('QuesNo'));
			var  UserAns= JSON.parse(localStorage.getItem('UserAns'));
			// var uans=$(this).val();
			if(UserAns!==null)
			{

				if(QuestionType === "Multiple Choice")
				{

					for(a=0;a<UserAns.length;a++)
					{
						//var arr=UserAns[a].split("::,");
						var arr=UserAns[a].split("::");
						//split array inside array
						// alert(arr[0]);
						// alert(arr[1]);
						var arr2=arr[1].split(",");
						if(Number(arr[0])==(Number(j)+1))
						{
							for(b=0;b<arr2.length;b++)
							{
								selectedOption=arr2[b];
								$('input:checkbox[name=choice][value="'+selectedOption+'"]').prop("checked", true);
							}

						}
					}
				}
				else
				{
					for(a=0;a<UserAns.length;a++)
					{
						var arr=UserAns[a].split("::");
						if(Number(arr[0])==(Number(j)+1))
						{
							selectedOption=arr[1];
							//selectedOption=htmlSpecialCharsrev(selectedOption);
							$('input:radio[name=choice][value="'+selectedOption+'"]').attr('checked',true);
						}
					}
				}
			}
		}
		
	}

	function highlight()
    {
    	//checking for unanswer question and highligh it red
    	var  uA= JSON.parse(localStorage.getItem('unAnswer'));
			if(uA!==null)
			{
			for(b=0;b<uA.length;b++)
				{
					//Number(QuesNo[a]);
					$('#QNumber'+Number(uA[b])).css('background-color','red');
				}
			} 
      	var  UserAns= JSON.parse(localStorage.getItem('UserAns'));
			if((UserAns!==null))
			{

				for(a=0;a<UserAns.length;a++)
				{
					var arr=UserAns[a].split("::");
					$('#QNumber'+(Number(arr[0])-1)).css('background-color','yellow');
				}
			} 
				
    }
    function unAnswered(jval)
    {
    	//red the previous un Answer question
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
		//removed unanswer to answer from local strorage 
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
	function htmlSpecialChars(text) {

  return text
  .replace(/&/g, "&amp;")
  //.replace(/"/g, "'")
  .replace(/'/g, "&#039;")
  .replace(/</g, "&lt")
  .replace(/>/g, "&gt");

}
//get checkbox option for check/uncheck if require
function getCheckbokOption()
{
	$('#tmpans').val('');
	var  UserAns= JSON.parse(localStorage.getItem('UserAns'));
	if(UserAns!==null){
		for(a=0;a<UserAns.length;a++)
		{
			//var arr=UserAns[a].split("::,");
			var arr=UserAns[a].split("::");
			if(Number(arr[0])==(Number(j)+1))
			{
				$('#tmpans').val(UserAns[a]);	
			}
		}
	}
	
}

});	

 