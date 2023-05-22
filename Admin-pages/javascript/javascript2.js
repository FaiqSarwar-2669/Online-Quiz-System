function done(id) 
{
  let submitButton = document.getElementById('submitBtn');
  let name=document.getElementById('User-name').value;
  if(name.trimStart()=="")
  {
    alert("Enter the name!");
    return;
  }
  submitButton.addEventListener('click', function() {
      let selectedOptions = {};
      let questions = document.getElementsByTagName('input');
      for (var i = 0; i < questions.length; i++) {
        let questionId = questions[i].name;
        let optionValue = questions[i].value;
        if (questions[i].checked) {
          selectedOptions[questionId] = optionValue;
        }
      }
      let jsonData = JSON.stringify(selectedOptions);
      $.ajax({
        url: 'backend/load-quiz.php?id6=quiz',
        type: 'POST',
        data: { 
          id: id ,
          selectedOptions:selectedOptions,
          name:name
        },
        success: function(response) {
            alert(response);
        }
      });
    });
}

$(document).ready(function(){
  
  $("#LoadQuiz").click(function(){
    let id =$(this).data("id");
    $.ajax({
        url: "backend/load-quiz.php?id5=quiz",
        type: "POST",
        data: {
          questionid: id
        },
        success: function(data){
          $(".Quiz-panel").html(data);
            
        }
    });
  }); 

  $("#ViewCourse").click(function(){
    $("#view-course-panel").show();
    $("#add-course-panel").hide();
    $("#course-tablel").load("../../backend/fetchdata.php");
  }); 
  $("#AddCourse").click(function(){
    $("#view-course-panel").hide();
    $("#add-course-panel").show();
  }); 


  $("#ViewQuestion").click(function(){
    $("#view-course-panel").show();
    $("#add-course-panel").hide();
  }); 
  $("#AddQuestion").click(function(){
    $("#view-course-panel").hide();
    $("#add-course-panel").show();
  }); 


  $(document).on("click",".delete-question-btn",function(){
    let Course=$("#display-question-of-selectd").val();
    let id =$(this).data("id");
    $.ajax({
        url: "../../backend/delete.php?delete=question",
        type: "POST",
        data: {
            questionid: id
        },
        success: function(data){
            if(data=="Successfully deleted!!")
            {
                $(this).closest('.question-style').remove();
                alert(data);
                Load(Course);
            }
            
        }
    });
    function Load(category_id) 
    {
      $.ajax({
          url: "../../backend/display-question.php",
          type: "POST",
          data: {category_id: category_id},
          success: function(response) {
              $(".question-style").html(response);
          }
      });
    }
            
  });
  
  $(document).on("click",".fa-trash",function(){
    let subjectid=$(this).data("id");
    let $p2 = $("#view-course-panel");
    $.ajax({
      url: "../../backend/delete.php?delete=subject",
      type: "POST",
      data: {
        subjectid: subjectid
      },
      success: function(data){
          if(data=="Successfully deleted!!")
          {
              $(this).closest('tr').remove();
              alert(data);
              $("#course-tablel").load("../../backend/fetchdata.php");
          }
          
      }
    });
  });

});
