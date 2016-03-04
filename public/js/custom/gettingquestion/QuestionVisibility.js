 $(document).on('change','input[type=checkbox][name="QuestionVisibility"]',function(){
    var QuestionId=$(this).val();
    if(this.checked)
    {
    	var vis=1;
    	$.ajax({
    		type:'GET',
    		dataType:'json',
    		url:'updateQuestionVisibilitytoCandidate.php',
    		data:'id='+QuestionId+'&vis='+vis,
    		//data:'id='+QuestionId
    	});
    }
    else
    {
    	var vis=0;
    	$.ajax({
    		type:'GET',
    		dataType:'json',
    		url:'updateQuestionVisibilitytoCandidate.php',
    		data:'id='+QuestionId+'&vis='+vis,
    		//data:'id='+QuestionId
    	});
    }
   });