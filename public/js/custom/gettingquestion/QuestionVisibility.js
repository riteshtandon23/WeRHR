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
 function getQuestionnDate(cname)
 {
    $('#example').DataTable({
        "destroy": true,
        "processing":true,
        "serverSide":true,
        "ajax":{
            type:'GET',
            dataType:'json',
            url:'getQuestionforEGeneration.php',
            data:'id='+cname,
            success:function(data)
            {
                console.log(data);
                columns:[
            {"data":"TopicName"},
            {"data":"Question"},
            {"data":"ExamDate"}
            ]
            }
        }
    });
    // alert(cname);
    // $.ajax({
    //     type:'GET',
    //     dataType:'json',
    //     url:'getQuestionforEGeneration.php',
    //     data:'id='+cname,
    //     success:function(data)
    //     {
    //         var myOb=JSON.stringify(data);
    //         myObject = JSON.parse(myOb);
    //         $('tbody').empty();
    //         for(var i in myObject)
    //         {

    //             //alert(myObject.length);
    //             var Data1=myObject[i].Question;
    //             var Data2=myObject[i].TopicName;
    //             var Data3=myObject[i].ExamDate;
    //            //$('tbody').append('<tr class="even pointer"><td class="a-center"><td class=""><input type="checkbox" name="QuestionVisibility" id="QuestionVisibility"></td><td class="">hhhhh</td><td class="">hhhhh</td><td class="">hhhhh</td></td></tr>')
    //         }
    //         "columns":[
    //         {"data":"TopicName"}
    //         {"data":"Question"}
    //         {"data":"ExamDate"}
    //         ]
    //     }
    // });
 }