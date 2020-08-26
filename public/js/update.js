
var content = "";

function getOld(){ // Called on page load
    $.ajax({
        url: "/posts",
        success: function( data ) { // Success, no error, content saved to data var
            if (content == data){ // Content is the same, no need to update (Shouldn't be on page load)
            }
            else{
                content = data; //Content value is set to data received
                $( '#posts' ).html(content); // Output the content
            }
        }
    });
}
function getNew(){
    $.ajax({
        url: "/posts",
        success: function( data ) {
            if (data == content){ // Nothing has changed
            }
            else{ // Something has changed
                if(data.length === 0){ // Nothing received
                }
                else{ // Output the content
                    content = data;
                    $( '#posts' ).html(content);
                }
            }
        }
    });
}
$(document).ready(function () {
    getOld();
    setInterval(function() {
        getNew();
    }, 1000);
});
