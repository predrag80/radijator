<?php 
    $dir_path = get_stylesheet_directory_uri(); 
?>


<div id="searchOverlay">
    <span class="closebtn" title="Close Overlay">×</span>
    <div class="overlay-content">
        <form action="/" method="get">
            <input type="text" placeholder="Search.." name="s" id="search" value="">
            <button type="submit" id="searchsubmit" value=""><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>



<?php wp_footer();?>
</body>
</html>