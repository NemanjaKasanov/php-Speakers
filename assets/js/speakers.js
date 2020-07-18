$(document).ready(function(){
    displayAllSpeakers();

    $(".cbxClass").click(function(){
        let arrayStars = [null];
        let arrayCateg = [null];

        $(".starCbx:checkbox:checked").each(function(){
            arrayStars.push($(this).val());
        });
        $(".categCbx:checkbox:checked").each(function(){
            arrayCateg.push($(this).val());
        });

        $.ajax({
            url: "models/speakers/filter_speakers.php",
            dataType: "json",
            method: "POST",
            data: {
                stars: arrayStars,
                categ: arrayCateg
            },
            success: function(data){
                displaySpeakers(data);
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    $("#search").keyup(function(){
        let input = $(this).val();

        $('.cbxClass').prop('checked', false);

        $.ajax({
            url: "models/speakers/search_users.php",
            dataType: "json",
            method: "POST",
            data: {
                input: input
            },
            success: function(data){
                if(input == ""){
                    displayAllSpeakers();
                }
                else{
                    displaySpeakers(data);
                }
            },
            error: function(err){
                console.log(err);
            }
        });
    });

});

function displayAllSpeakers(){
    $.ajax({
        url: "models/speakers/show_all_speakers.php",
        dataType: "json",
        method: "POST",
        success: function(data){
            displaySpeakers(data);
        },
        error: function(err){
            console.log(err);
        }
    });
}

function displaySpeakers(data){
    let html = "";

    data.user.forEach(el => {
        let categories = data.categories.filter(ctg => ctg.user_id == el.id);
        let grades = data.grades.filter(gr => gr.id == el.id);

        grade = grades[0];
        if(grades[0] == undefined){
            grade = 0;
        }
        else{
            grade = Math.round(grade.grade);
        }

        html += `
        <div class="col-12 d-flex flex-wrap mb-5 pb-3 speakerDiv">
            <div class="col-lg-4 col-sm-12 text-center">
                <a href="index.php?page=speaker&id=${el.id}" class="h3">
                    <img src="assets/images/users/${el.image_sm}" alt="${el.name} ${el.last_name}" class="rounded-circle img-fluid w-50 mb-4"/>
                </a>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="col-12">
                    <a href="index.php?page=speaker&id=${el.id}" class="h3">${el.name} ${el.last_name}</a>
                    <p>${el.description}</p>
                </div>
                <div class="col-12 d-flex flex-wrap">
                    <div class="col-lg-10 col-sm-12">
                        <ul>`;

                        categories.forEach(ctg => {
                            html += `<li>${ctg.category}</li>`;
                        });

                        html += `</ul>
                    </div>
                    <div class="col-lg-2 col-sm-12 text-center">
                        <p><i class="fa fa-star" aria-hidden="true"></i><br/>${grade}</p>
                    </div>
                </div>
            </div>
        </div>
        `;
    });

    $('#speakersDisplay').html(html);
}