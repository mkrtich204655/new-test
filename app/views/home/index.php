
<?php
include_once __DIR__.'../../includes/header.php';
?>
<div class="base_container">


<?php
if ($data[0]->channel){
echo<<<text
    <div class="upcoming">
         <h4>Upcoming TV shows</h4>
         <h2> "{$data[0]->channel}" TV</h2>
         <h5> Series "{$data[0]->title}" </h5>
         <h5> Will be shown on TV  {$data[0]->week_day}  at  {$data[0]->show_time} </h5>
    </div>
text;
}else{
    echo "<h2 class='no_result'>No Results</h2>";
}

foreach ($data as $index=>$item ){
    if ($index){
echo <<<text1
    <div class="all_series">
        <h3>"{$item->channel}" TV</h3>
        <h6> Series "{$item->title}"</h6>
        <h6> Will be shown on TV {$item->week_day} at {$item->show_time} </h6>
    </div>
text1;
    }
}
?>


</div>

<?php
include_once __DIR__.'../../includes/footer.php';
?>