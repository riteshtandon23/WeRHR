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
                data:'id='+QuestionId+'&vis='+vis+'&Edate='+Edate+'&cname='+cname,
                success:function(data)
                {
                    alert(data);
                }
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
                data:'id='+QuestionId+'&vis='+vis+'&Edate='+Edate+'&cname='+cname,
                 success:function(data)
                {
                    alert(data);
                }
            });
        }
   }
   else
   {
    this.checked=false;
    alert('Date should not be null!!. Add exam Date first');

   }
   //setTimeout(function(){DisplayTableData(cname);},100);
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
 function getUserEmail(cname)
 {
      $('#DisplayAll').attr('checked',false);
      $('#error').html("");
      var table = $('#DisplayParticipant').DataTable({
                "autoWidth":false,
                "destroy": true,
                'iDisplayLength': 12,
                "sPaginationType": "full_numbers"
            });
        table.clear().draw(false);
    $('#Examdate').find('option').remove();//.not(':first')
    $.ajax({
        type:'GET',
        dataType:'json',
        url:'selectExamdate.php',
        data:'cname='+cname,
        success:function(data)
        {
            $('#Examdate').append($("<option></option>").attr("value","null").text("Select Date here"));
            for(i=0;i<data.length;i++ )
            {
               $('#Examdate').append($("<option></option>").attr("value",data[i]).text(data[i])); 
            }
            
        }

    });
 }
 // function displayUser(cname)
 // {
 //    $.ajax({
 //        type:'GET',
 //        dataType:'json',
 //        url:'getUser.php',
 //        data:'id='+cname,
 //        success:function(data)
 //        {
 //            var table = $('#course_details').DataTable({
 //                "autoWidth":false,
 //                "destroy": true,
 //                'iDisplayLength': 12,
 //                "sPaginationType": "full_numbers"
 //            });
 //            table.clear().draw(false);
 //            var myOb=JSON.stringify(data);
 //            var myObject = JSON.parse(myOb);
 //            for(i=0;i<myObject.length;i++)
 //            {
 //                var Data1=myObject[i].Question;
 //                var Data2=myObject[i].TopicName;
 //                if(Number(Data5)===1)
 //                {
 //                    table.row.add(["<input type='checkbox' name='QuestionVisibility' id='QuestionVisibility' value='"+Data1+"' checked>",Data1,Data2]).draw(false);
 //                }else
 //                {
 //                  table.row.add(["<input type='checkbox' name='QuestionVisibility' id='QuestionVisibility' value='"+Data1+"'>",Data1,Data2]).draw(false);  
 //                }
 //            }

 //        }
 //    });
 // }
 function getPercentage(value)
 {
    $('#SelectPercentage').find('option').remove();
    $.ajax({
        type:'GET',
        dataType:'json',
        url:'controllers/getPercentage.php',
        data:'id='+value,
        success:function(data){
            for(i=0;i<data.length;i++ )
            {
               $('#SelectPercentage').append($("<option></option>").attr("value",data[i]).text(data[i])); 
            }
        }
    });
 }
 $(document).on('click','#showSalary',function(){
    var ageR=$('#AgeRange').val();
    var Aper=$('#SelectPercentage').val();
    var backgrnd=$('#Background').val();
    var tname=$('#TestName').val();
    var course=$('#qualification').val();
    if(Aper!==null)
    {
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'controllers/getSalaryforUser.php',
            data:'Ar='+ageR+'&Apertage='+Aper+'&course='+course+'&background='+backgrnd+'&tname='+tname,
            success:function(data){
                alert(data+"% of the salary");
            }
        });   
    }
    
 });
 $(document).on('click','#AddAge,#AddTest,#AddBack,#AddAca',function(){
    var temp=$('#CompanyNameAlgo').val();
   // var submit = true;
    $('form').submit(function (e) {
        //alert("jjj");
            if($('#CompanyNameAlgo').val()==="")
            {
                //alert("hh");
                $('#messages').html("Company Name should not be empty");
                $('#CompanyNameAlgo').focus();
                return false;
            }else{
                
                $('#Company_Name').val(temp);
                $('#Company_Name1').val(temp);
                $('#Company_Name2').val(temp);
                $('#Company_Name3').val(temp);
                //alert($('#Company_Name').val());
                return true;
            }
            

        });
    //alert($('#CompanyNameAlgo').val());
    
 });
 function DisplayAloDetails(value){
$('#AgeRange').find('option').remove();
    $.ajax({
        type:'GET',
        dataType:'json',
        url:'controllers/getPercentage.php',
        data:'id1='+value,
        success:function(data){
            for(i=0;i<data.length;i++ )
            {
               $('#AgeRange').append($("<option></option>").attr("value",data[i]).text(data[i])); 
            }
        }
    });
    $('#qualification').find('option').remove();
    $.ajax({
        type:'GET',
        dataType:'json',
        url:'controllers/getPercentage.php',
        data:'id2='+value,
        success:function(data){
            for(i=0;i<data.length;i++ )
            {
               $('#qualification').append($("<option></option>").attr("value",data[i]).text(data[i])); 
            }
        }
    });
    $('#Background').find('option').remove();
    $.ajax({
        type:'GET',
        dataType:'json',
        url:'controllers/getPercentage.php',
        data:'id3='+value,
        success:function(data){
            for(i=0;i<data.length;i++ )
            {
               $('#Background').append($("<option></option>").attr("value",data[i]).text(data[i])); 
            }
        }
    });
    $('#TestName').find('option').remove();
    $.ajax({
        type:'GET',
        dataType:'json',
        url:'controllers/getPercentage.php',
        data:'id4='+value,
        success:function(data){
            for(i=0;i<data.length;i++ )
            {
               $('#TestName').append($("<option></option>").attr("value",data[i]).text(data[i])); 
            }
        }
    });
 }
 $(document).on('change','input[type=checkbox][name="selectUserForExam"]',function(){
    //alert($(this).val());
    var username=$(this).val();
    var coursename=$('#topicId').val();
    var Examdate=$('#Examdate').val();
    var vis=1;
    //alert(Examdate);
    if(Examdate!==null && Examdate!=="null")
    {
        $('#error').html("");
        var examName=coursename+Examdate;
        if(this.checked)
        {
            //alert("checked");
            vis=1;
        }else{
             vis=0;
            //alert("unchecked");
        }
       
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'controllers/AdduserAsparticipant.php',
            data:'uname='+username+'&examName='+examName+'&vis='+vis,
            success:function(data){
                alert("done");
            }
        });
    }else{
        $('#error').html("select exam date first");
        $(this).removeAttr('checked');
    }
 });
 function DisplayActiveParticipant(){
    //alert("kk");
    $('#DisplayAll').attr('checked',false);
    
    $('#error').html("");
    var coursename=$('#topicId').val();
    var Examdate=$('#Examdate').val();
    if(Examdate!=="null")
    {
        var examName=coursename+Examdate;
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'controllers/AdduserAsparticipant.php',
            data:'examName='+examName,
            success:function(data){
                var table = $('#DisplayParticipant').DataTable({
                "autoWidth":false,
                "destroy": true,
                'iDisplayLength': 12,
                "sPaginationType": "full_numbers"
            });
                 table.clear().draw(false);
                var myOb=JSON.stringify(data);
                var myObject = JSON.parse(myOb);
                for(i=0;i<myObject.length;i++)
                {
                    var Data1=myObject[i].Fname;
                    var Data2=myObject[i].username;
                    table.row.add(["<input type='checkbox' name='selectUserForExam' id='selectUserForExam' value='"+Data2+"' checked>",Data1,Data2]).draw(false);
                } 
            }
        });
    }else{
        var table = $('#DisplayParticipant').DataTable({
                "autoWidth":false,
                "destroy": true,
                'iDisplayLength': 12,
                "sPaginationType": "full_numbers"
            });
            table.clear().draw(false);
    }
            
 }
 $(document).on('change','#DisplayAll',function(){
    var coursename=$('#topicId').val();
    var Examdate=$('#Examdate').val();
    if(this.checked){
        var examName=coursename+Examdate;
       $.ajax({
            type:'GET',
            dataType:'json',
            url:'controllers/AdduserAsparticipant.php',
            data:'DexamName='+examName+'&coursename='+coursename,
            success:function(data){
                var table = $('#DisplayParticipant').DataTable({
                "autoWidth":false,
                "destroy": true,
                'iDisplayLength': 12,
                "sPaginationType": "full_numbers"
            });
                 //table.clear().draw(false);
                var myOb=JSON.stringify(data);
                var myObject = JSON.parse(myOb);
                for(i=0;i<myObject.length;i++)
                {
                    var Data1=myObject[i].Fname;
                    var Data2=myObject[i].username;
                    table.row.add(["<input type='checkbox' name='selectUserForExam' id='selectUserForExam' value='"+Data2+"'>",Data1,Data2]).draw(false);
                } 
            }
        }); 
   }else{
    DisplayActiveParticipant();
   }
    
 });
 $(document).on('change','#SelectAll',function(){
    var coursename=$('#topicId').val();
    var Examdate=$('#Examdate').val();
    if(Examdate!==null && Examdate!=="null")
    {
        $('#error').html("");
        var examName=coursename+Examdate;
        if(this.checked)
        {
            //alert("checked");
            vis=1;
        }else{
             vis=0;
            //alert("unchecked");
        }
       
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'controllers/AdduserAsparticipant.php',
            data:'coursenameforall='+coursename+'&examNameforall='+examName+'&vis='+vis,
            success:function(data){
                //alert("jj");
                 DisplayActiveParticipant();
            },
            error:function(tt)
            {
                //OnError(cartObject.productionID);
                 DisplayActiveParticipant();
            }
        });
    }else{
        $('#error').html("select exam date first");
        $(this).removeAttr('checked');
    }
 });