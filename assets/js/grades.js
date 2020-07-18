$(document).ready(function(){
    $("#gradedText").hide();

    $(".starButton").click(function(){
        let grade = $(this).val();
        let userId = $("#user_id").val();
        let speakerId = $("#speaker_id").val();

        $.ajax({
            url: "models/grades/grades.php",
            method: "POST",
            data: {
                sendGrade: grade,
                sendUserId: userId,
                sendSpeakerId: speakerId
            },
            success: function(data){
                $("#gradedText").show();
            },
            error: function(err){
                console.log(err);
            }
        });
    });
});