<script>
    function refresh() {
        $('<?php echo $place; ?>').load('<?php echo $location; ?>');
    }
    var t = self.setInterval(refresh, 1000);
</script>