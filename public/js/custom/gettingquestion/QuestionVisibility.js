 $(document).on('change','input[type=checkbox][name="QuestionVisibility"]',function(){
    var QuestionId=$(this).val();
    var cname=$('#topicId').val();
   if($('#Examdate').val()!==null)
   {
        var Edate=$('#Examdate').val();
        if(this.checked)
        {
            var vis=1;
            $.ajax({
                type:'GET',
                dataType:'json',
                url:'updateQuestionVisibilitytoCandidate.php',
                data:'id='+QuestionId+'&vis='+vis+'&Edate='+Edate,
            });
        }
        else
        {
            Edate="Not Set";
            var vis=0;
            $.ajax({
                type:'GET',
                dataType:'json',
                url:'updateQuestionVisibilitytoCandidate.php',
                data:'id='+QuestionId+'&vis='+vis+'&Edate='+Edate,
            });
        }
   }
   else
   {
    this.checked=false;
    alert('Date should not be null!!. Add exam Date first');

   }
   setTimeout(function(){DisplayTableData(cname);},100);
   //DisplayTableData(cname);

   });
 function getQuestionnDate(cname)
 {
	 
    $('#Examdate').find('option').remove();//.not(':first')
    $.ajax({
        type:'GET',
        dataType:'json',
        url:'selectExamdate.php',
        data:'cname='+cname,
        success:function(data)
        {
            for(i=0;i<data.length;i++ )
            {
               $('#Examdate').append($("<option></option>").attr("value",data[i]).text(data[i])); 
            }
            
        }

    });
    DisplayTableData(cname);
 }
 function DisplayTableData(cname)
 {
	 //alert("xx");
    $.ajax({
        type:'GET',
        dataType:'json',
        url:'getQuestionforEGeneration.php',
        data:'id='+cname,
        success:function(data)
        {
            var table = $('#course_details').DataTable({
                "autoWidth":false,
                "destroy": true,
                'iDisplayLength': 12,
                "sPaginationType": "full_numbers"
            });
			table.clear().draw(false);
            var myOb=JSON.stringify(data);
            var myObject = JSON.parse(myOb);


            //console.log(data);
            //console.log(table.row);
            for(i=0;i<myObject.length;i++)
            {
                var Data1=myObject[i].Question;
                var Data2=myObject[i].TopicName;
                var Data3=myObject[i].ExamDate;
                var Data4=myObject[i].QID;
                var Data5=myObject[i].QuestionStatus;
                //console.log(data[i]);
                //table.row.add(data[i]).draw(true);
                //console.log(table.rows.add(data[i]));
                //console.log(myObject[i].Question);

                if(Number(Data5)===1)
                {
                    table.row.add(["<input type='checkbox' name='QuestionVisibility' id='QuestionVisibility' value='"+Data4+"' checked>",Data1,Data2,Data3]).draw(false);
                }else
                {
                  table.row.add(["<input type='checkbox' name='QuestionVisibility' id='QuestionVisibility' value='"+Data4+"'>",Data1,Data2,Data3]).draw(false);  
                }
                
                //table.rows.add({"TopicName":data[i].TopicName,"Question":data[i].Question,"ExamDate":data[i].ExamDate}).draw(false);
            }

        }
    });
 }