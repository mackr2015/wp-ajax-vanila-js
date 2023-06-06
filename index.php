<?php get_header(); ?>

<?php 
echo 'Hello';
?>

<p>Testing ajax PHP call</p>
<button id="btn">Click to Get Data</button>

<div id="results">
    <?php if( isset($_POST['dataName'])): ?>
        <?php echo $_POST['dataName']; ?>
    <?php endif; ?>
</div>



<?php get_footer(); ?>