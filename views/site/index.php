<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Ту-ту Тур';
?>
<div class="site-index">

    <div class="jumbotron">
        <p id="counter">Идёт поиск самых свежих туров...</p>
       
    </div>

    <div class="body-content">

        <div class="row">

            <?php
                foreach($problems as $problem){
                   echo '
                   <div class="col-lg-3">
                        <h2>'.$problem->name.'</h2>

                        <p>'.$problem->description.'</p>
                        <img alt= "fgbfd" class="img-fluid" src="web/uploads/'.$problem->photoAfter.'"
                        data-before="web/uploads/'.$problem->photoBefore.'" data-after="web/uploads/'.$problem->photoAfter.'"
                        onMouseOver="hover(this)" onMouseOut="back(this)"> 
                        
                    </div>
                   ';
                }
            ?>

        </div>
        
    </div>
</div>


<script>
var i = 0;
function hover(el){
    el.src = el.dataset.before;
}

function back(el){
    el.src = el.dataset.after;
}


function updateCounter(){
    $.ajax({
        type: 'GET',
        url: '<?= Url::toRoute('/site/counter') ?>',    
        dataType: 'text',
        success: function (response){
            
            $('#counter').html('На данный момент свежих туров: ' + response);

        }
    });
    
}

setInterval(updateCounter, 3000);
</script>
