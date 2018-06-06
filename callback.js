
function handleResponse(response) {
       
        
        if (response.totalItems !=0 )
            { 
                
               //console.log(response.items);
               //var data= JSON.stringify(response)
                
                $.ajax({
  
                    method: "POST",
                    url: "test.php",
                    cache: false,
                    data: {'myData': response}  
                })
                
                .done(function(msg) {
 
                    alert ( "Response: " + msg );

                })

              .fail(function( jqXHR, textStatus ) {
                  
                    alert( "Request failed: " + textStatus );
                });

                
     /*             
              
                
       
                for (var i = 0; i < response.items.length; i++) {
                    var item = response.items[i];
                    // in production code, item.text should have the HTML entities escaped.
                    //document.getElementById("content").innerHTML += "<br>" + item.volumeInfo.title;
                    image = item.volumeInfo.title;
                    

                    }
*/
                    
                     
            }
               
      
            
}
