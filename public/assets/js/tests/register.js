$(document).ready(function(){
    $.post('http://localhost:8000/register',{
        username:'jkumche',
        firstname:'johns',
        surname:'johns',
        specialization:'farming',
        number:'265997933290',
    },
    function(data,status){
        console.log(data)
    }
    )
})