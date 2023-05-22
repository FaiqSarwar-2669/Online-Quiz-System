$(document).ready(function(){
    $("#display-question-of-selectd").change(function(){
        let category_id = $(this).val();
        $.ajax({
            url: "../../backend/display-question.php",
            type: "POST",
            data: {category_id: category_id},
            success: function(data){
                $(".question-style").html(data);
            }
        });
    });
});
$(document).ready(function(){
    $("#SaveData").click(function(){
        let select_course = $("#select-course").val();
        let subject_question = $("#subject-question").val();
        let question_marks = $("#question-marks").val();
        let question_option1 = $("#question-option1").val();
        let question_option2 = $("#question-option2").val();
        let question_option3 = $("#question-option3").val();
        let question_option4 = $("#question-option4").val();
        let correct_answer = $("#correct-answer").val();
        $.ajax({
            url: "../../backend/add-question.php?add=question",
            type: "POST",
            data: {
                select_course: select_course,
                subject_question: subject_question,
                question_marks: question_marks,
                question_option1: question_option1,
                question_option2: question_option2,
                question_option3: question_option3,
                question_option4: question_option4,
                correct_answer: correct_answer
            },
            success: function(data){
                alert(data);
                if (data == 'Question added Successfully!!') {
                    $("#select-course").val('');
                    $("#subject-question").val('');
                    $("#question-marks").val('');
                    $("#question-option1").val('');
                    $("#question-option2").val('');
                    $("#question-option3").val('');
                    $("#question-option4").val('');
                    $("#correct-answer").val('');
                }
            }
        });
    });
});




