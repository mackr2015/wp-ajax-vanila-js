const xhr = new XMLHttpRequest();
const btn = document.querySelector('#btn');
const url = obj_ajax.ajax_url;

// const resultsDiv = document.querySelector('#results');
const ajaxData = 'AJAX DATA from js script';

btn.addEventListener('click', function(){
    btn.classList.add('calling_ajax');

    xhr.open('POST', url, true);

    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

    xhr.onload = (event) => {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            // console.log(event);
            // console.log(xhr.responseText);
            const returnData = xhr.responseText
            document.querySelector('#results').innerHTML = returnData;
        }else{
            console.log( xhr.status );
            console.log(xhr.readyState );
        }

    };
    xhr.onerror = () => {
        console.log('Ajax call has error')
    };
   
    xhr.send( 'dataName=' + ajaxData );

});


