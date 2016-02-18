$(document).ready(function(){
	var x=$('#topicId').val();
	var	temp=null;
	var	temp2=null;
	var myObject;
	var ulname;
	var usname;
	var j=1;
	$.ajax({
	    type: 'GET',
	    dataType:'json',
	    url:'getQuestionAnswer.php',
	    data:'key='+x,
	    success:function(data)
	    {
	    	var myOb=JSON.stringify(data);
	    	myObject = JSON.parse(myOb);
	    	
	    	for(var i in myObject)
	    	{
	    		console.log(myObject[i].Question);
    			console.log(myObject[i].QuestionOption);
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
				usname = JSON.parse(retrievedData1);
				var retrievedData2 = localStorage.getItem("QuestionOption");
				ulname = JSON.parse(retrievedData2);
				//var opt1=$(row).val().split(',');
				//document.getElementById('questionOpt').innerHTML = ulname[0];
				temp=ulname[0];
				temp2=usname[0];
	    	}
	    	Display(temp,temp2);
	    	
	       //$('#display').html(data);
	    },

	});
	$('#next').on('click',function(){
		if(temp!=null)
		{
			$('.option').empty();
			var ql=myObject.length;
			Display(ulname[j],usname[j]);
			j++;
			


		}
	});

	function Display(temp,temp2)
	{
		document.getElementById('question').innerHTML = temp2;
		var arr=temp.split(',');
		$.each(arr,function(index, value){
			//alert(index +':'+value);
			//$('<input/>',{type:'checkbox',id:'opt'+index,}).appendTo('.option');
			//$('<label/>',{'for':'opt'+index,text:value}).appendTo('.option');
			//$('.option').append('<div class="checkbox"><label class="checkbox-label"><input type="checkbox" id="opt"'+index+'>'+value+'<label></div>');
			$('.option').append('<div class="radio"><label class="radio-label"><input type="radio" name="choice" id="opt"'+index+'>'+value+'</label></div>');
		});
	}
});
	$(window).bind('onbeforeunload',function(){
		alert("refreshing");
	});