
const xhr = new XMLHttpRequest();
const btn = document.querySelector('#btn');
const url = 'ajax-data.php';

const resultsDiv = document.querySelector('#results');
const ajaxData = 'Ajax results Data input.....';

btn.addEventListener('click', function(){
    btn.classList.add('calling_ajax');


    xhr.open('POST', fpm_ajax.ajax_url, true);

    xhr.setRequestHeader('Content-type','application/json');
    
    xhr.onreadystatechage = function (){
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            resultsDiv.innerHtml = ajaxData;
        }
    }
    xhr.send( 'dataName=' + ajaxData );
});


