$(document).ready(function(){
    let myFunction = function (){
        let name = $('#searchByName').val();
        let date = $('#searchByDate').val();
        $.ajax({
            url: "TVSeries/filter?seriesName="+name+"&date="+date,
            success: function(result){
                $('.base_container').html(result)
                console.log(true)
            }
        });
    }

    $('#searchByName').keyup(function (){
        myFunction();
    })

    $('#searchByDate').change(function (){
        myFunction();
    })

});