<script>
    var base_url = '<?php echo base_url()?>';
</script>
<script src='<?php echo base_url('assets/js/myscripts.js') ?>'></script>
<?php foreach ($this->template->get_js_files() as $file){ ?>
<script src="<?php echo base_url($file)?>"></script>
    <?php }?>
				
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-38620714-4']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </body>

</html>
