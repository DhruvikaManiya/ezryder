 
$('.htslider').owlCarousel({
    loop:false,
    margin:10,
    dots:true,
    autoplay:false,    
 // animateIn: 'fadeIn',
 //  animateOut: 'fadeOut', 
touchDrag  : true,
navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
     mouseDrag  : true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:1,
            nav:true,
            // loop:false
        }
    }
});
 
//fixed navbar
$(window).scroll(function () {

    if ($(window).scrollTop() >= 100) {
         $('body').addClass('fixed');
    } else {
        $('body').removeClass('fixed');
    }
});

function get_brand_item(url) {
    let type_id = $("#vehicle_type_id").val();
    console.log(url);
    $.ajax({
        type: "get",
        url: url,
        data: {type_id: type_id},
        success: function (data) {

            $("#vehicle_make").html("");

            let option='';
            option+="<option value=''>Select Make</option>";

            for (let i in data){
               let item = data[i];

                option+="<option value='"+item['id']+"'>"+item['name']+"</option>";

            }
            $("#vehicle_make").html(option);

        }
    });
}

function get_model_item(url) {

    let brand_id = $("#vehicle_make").val();
    console.log(brand_id);
    $.ajax({
        type: "get",
        url: url,
        data: {brand_id: brand_id},
        success: function (data) {

            console.log(data);
            $("#vehicle_modal").html("");

            let option='';
            option+="<option value=''>Select Model</option>";

            for (let i in data){
                let item = data[i];

                option+="<option value='"+item['id']+"'>"+item['name']+"</option>";

            }
            $("#vehicle_modal").html(option);


        }
    });

}

function get_charge_item(url) {

    let model_id = $("#vehicle_modal").val();

    let brand_id = $("#vehicle_make").val();

    let type_id = $("#vehicle_type_id").val();

    $.ajax({
        type: "get",
        url: url,
        data: {model_id , brand_id, type_id},
        success: function (data) {
            // console.log(data);

            $("#distance").val(data['distance']);
            $("#charge").val(data['rider_charge']);
        }
    });
}