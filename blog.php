<? 

   
    include('header.php');


    // get blog data

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
    
        header('location:blogs.php');
    }


    $filter = array(
        'table'=>'ci_blogs',
        'sort'=>'sort_order',
        'order'=>'asc',
        'start'=>'',
        'limit'=>'1',
        'where'=> 'is_active=1 and id='.$id
    );
    $blog = postData('listing',$filter);



    if(!check_data_exist(($blog)))
    {
        header('location:blogs.php');
    }




    // get releted blogs


    $slug = $blog['data'][0]['slug'];

    $releted_blogs = '';

    $filter = array(
        'table'=>'ci_blogs',
        'sort'=>'sort_order',
        'order'=>'asc',
        'start'=>'',
        'limit'=>'3',
        'where'=> "is_active=1 and slug='".$slug."'"
    );

    if($slug!='')
    {
        $releted_blogs = postData('listing',$filter);
    }




?>

<!-- Content -->
    <div role="main" id="content">

<!-- Page info -->
        <div class="biv-page biv-background" data-src="<?=ADMIN_PATH.$blog['data'][0]['image']?>">
            <div class="biv-page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 offset-xl-3 offset-lg-2">
                            <div class="biv-page-info">
                                <div class="biv-page-info-url">
                                    <ul>
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                      
                                    </ul>
                                </div>
                                <div class="biv-page-info-title">
                                    <h1><?=$blog['data'][0]['sort_description']?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="biv-blog-post" id="blogPost">
            <div class="biv-blog-post-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 offset-xl-2 offset-lg-2">
                            <div class="biv-blog-post-info">
                                <div class="biv-blog-post-center">
                                    <h2><?=$blog['data'][0]['sort_description']?></h2>
                                </div>
                                   <?=$blog['data'][0]['description']?> 
                                <div class="biv-blog-post-right">
                                    <a href="index.php">Home page</a>
                                </div>
                            </div>

                       </div>
                    </div>
                </div>
            </div>
        </div>

         <?if(check_data_exist(($releted_blogs))){?>   
        <div class="biv-blog" id="blog">
            <div class="biv-blog-content more-blog">
                <div class="container">
                    <div class="row">

                    <div class="card-group">
                        <?foreach($releted_blogs['data'] as $key => $value){?>

                        <div class="card">
                            <a href="blog.php?id=<?=$value['id']?>" class="biv-blog-item">
                                <div class="biv-blog-item-info-img">
                                    <span class="biv-background-size" data-src="<?=ADMIN_PATH.$value['image']?>"></span>
                                </div>

                                <div class="biv-blog-item-info-title">
                                    <h3><?=$value['sort_description']?></h3>
                                </div>
                                <div class="biv-blog-item-info-date"><?=date('d-m-Y',strtotime($value['blog_date']))?></div>
                                <div class="biv-blog-item-info-desc"><?=mb_strimwidth($value['description'],0,100,'..')?></div>
                            </a>
                               

                        </div>

                        <?}?>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <?}?>

    </div>

<? include('footer.php');?>    

