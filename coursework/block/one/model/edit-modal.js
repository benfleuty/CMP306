$(function () {
    $('.plant-modal-button').on('click',function (e){
        let plant_id = e.target.id - 1;

        let out = "";

        $.ajax{

        }


        $('#plantModal .modal-title').html(out);
        console.log(out);

    })
})