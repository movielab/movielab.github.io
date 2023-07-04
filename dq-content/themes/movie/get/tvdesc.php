<?php
if (empty($kotretan_title)) {
$link = site_url() . '/'. get_webinfo('_tvurl') .'/'. $_GET['id'].'/'.sanitize_title($single['title']);
} else {
$link = site_url() . '/'. get_webinfo('_tvurl') .'/'. $_GET['id'].'/'.sanitize_title($kotretan_title);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="content-language" content="en"/>
    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&family=Open+Sans:wght@400;600&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo get_webinfo('theme_url') ;?>css/main.css">
    <style>
        table {background-color: #181818;color:#fff;}
        .table-striped>tbody>tr:nth-of-type(odd) {
                background-color: #181818;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                border-top: 1px solid #282828;color:#fff;
        }
        td, th {
    padding: 5px;
}

    </style>
</head>
<body>
	<section class="section section--first" style="margin-top:35px">
		<div class="container">
			<div class="row">
			    <div class="col-sm-12">
					<h1 class="text-center media-heading"><?php echo $single['title'];?></h1>
				</div>
            </div>
        </div>
    </section>
	<section class="section" style="padding-top:0px">
		<div class="container">
			<div class="row">
					<div class="col-md-3 text-center">
					    <img src="<?php echo $single['poster']?>">
					    <table class="table table-striped" style="margin-top: 1rem;">
                    		<thead></thead>
                    		<tbody>
                                <tr><td onclick="selectText(this);"><?php echo $single['poster']?></td></tr>
                    		</tbody>
                    	</table>
                    	<table class="table table-striped">
                    		<thead></thead>
                    			<tbody>
                                    <tr><td onclick="selectText(this);"><?php echo $single['keyword'];?></td></tr>
                    			</tbody>
                    	</table>
                    	<table class="table table-striped">
                    		<thead></thead>
                    			<tbody>
                                    <tr><td onclick="selectText(this);"><?php echo $single['genre'];?></td></tr>
                    			</tbody>
                    	</table>
                    	<table class="table table-striped">
                    		<thead></thead>
                    			<tbody>
                    				<tr><td onclick="selectText(this);"><?php echo $link;?></td></tr>
                    			</tbody>
                    	</table>
				    </div>
				    <div class="col-md-9">
					            <table class="table table-striped">
                        			<thead></thead>
                                    <tbody>	
                                        <tr><td onclick="selectText(this);"><?php echo $cari_judul;?> Full In HD Quality</td></tr>
                                        <tr><td onclick="selectText(this);"><?php echo $cari_judul;?> Full In English Subtitle</td></tr>
                                        <tr><td onclick="selectText(this);"><?php echo $cari_judul;?> Full In En Sub</td></tr>
                                        <tr><td onclick="selectText(this);"><?php echo $cari_judul;?> Full Online</td></tr>
                                        <tr><td onclick="selectText(this);"><?php echo $cari_judul;?> Full Stream</td></tr>
                                        <tr><td onclick="selectText(this);">Watch Online <?php echo $cari_judul;?> Full In HD Quality</td></tr>
                                        <tr><td onclick="selectText(this);">Watch Online <?php echo $cari_judul;?> Full In English Subtitle</td></tr>
                                        <tr><td onclick="selectText(this);">Watch Online <?php echo $cari_judul;?> Full In En Sub</td></tr>
                                        <tr><td onclick="selectText(this);">Download <?php echo $cari_judul;?> Full In HD Quality</td></tr>
                                        <tr><td onclick="selectText(this);">Download <?php echo $cari_judul;?> Full In English Subtitle</td></tr>
                                        <tr><td onclick="selectText(this);">Download <?php echo $cari_judul;?> Full In En Sub</td></tr>
                                        <tr><td onclick="selectText(this);"><?php echo $cari_judul;?> Full</td></tr>
                                    </tbody>
                        		</table>
                        		<table class="table table-striped">
                        			<thead></thead>
                                    <tbody>	
                                        <tr>
                                            <td onclick="selectText(this);">
                                                <?php echo $cari_judul;?><br>
                                                <?php echo $single['description'];?><br>
                                				Popularity : <?php echo  $single['popularity'];?><br>
                                				Runtime : <?php echo $single['runtime'];?><br>
                                				Studio : <?php echo $single['networks'];?><br>
                                				Cast : <?php echo $single['cast'];?><br>
                                				Genre : <?php echo $single['genre'];?><br>
                                				Keyword : <?php echo $single['keyword'];?><br>
                                            </td>
                                        </tr>
                                    </tbody>
                        		</table>
				    </div>
            </div>
        </div>
    </section>
	<section class="section section--last" style="padding-top:0px">
		<div class="container">
			<div class="row">
					<div class="col-md-12 text-center">
					    <?php echo $single['images'];?>
				    </div>
            </div>
        </div>
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="<?php echo get_webinfo('theme_url') ;?>js/main.js"></script>
<script src="<?php echo get_webinfo('theme_url') ;?>js/script.js" type="text/javascript"></script>
<script type="text/javascript">
        function selectText(obj) {     
            var range = document.createRange();
            range.selectNode(obj);
            window.getSelection().removeAllRanges(); // clear current selection
            window.getSelection().addRange(range); // to select text
            range.select();
            window.getSelection().removeAllRanges();// to deselect
        }
    </script>
</body>
</html>