document.addEventListener('DOMContentLoaded', function(){
    var search= document.getElementById('country');
    var result= document.getElementById('lookup');
    search.addEventListener('input', function(){
        var query = search.value;
        if(query === ''){
            var eop=result.innerHTML= '';
            return ;
        }

        fetch('http://localhost/info2180-lab5/world.php?country='+ encodeURIComponent(query))
        .then(res => res.text())
        .then(data =>{
            result.innerHTML = data;
        })
        .catch(err => console.error(err));

    })

    
     result.addEventListener('onclick', function(){

        $.ajax({
            url: 'http://localhost/info2180-lab5/world.php?',
            method: 'GET',
            success: function(eop)
            {
              $("#result").html(result);
            }
        
          })
     })
})
