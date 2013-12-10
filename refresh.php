<script>
    function refresh() {
        $('<?php echo $place; ?>').load('<?php echo $location; ?>');
    }
    var t = setTimeout(refresh, 1000);
</script>