<? 

include('config.php');

// get images by cat

$id = ' ';

$eqaul_grid = 0;

if(isset($_GET['grid']))
{
    $eqaul_grid=1;
}

if(isset($_GET['id']))
{
    $id = strip_tags($_GET['id']);
}


if($id!='')
{

    

    if($id=='ALL')
    {
        $filter = array(
            'table' => 'ci_gallery_details',
            'sort' => 'id',
            'order' => 'asc',
            'start' => '',
            'limit' => '8',
            'where' => "type=1"
        );  
    }
    else
    {
        $filter = array(
            'table' => 'ci_gallery_details',
            'sort' => 'id',
            'order' => 'asc',
            'start' => '',
            'limit' => '8',
            'where' => "gallery_id=".$id." AND type=1"
        );
    }


    if(isset($_GET['more']))
    {
        $eqaul_grid=1;
        $category =strip_tags($_GET['cat']);

        if($category=='ALL' || $category=='')
        {
            $filter = array(
                'table' => 'ci_gallery_details',
                'sort' => 'id',
                'order' => 'asc',
                'start' => '',
                'limit' => '8',
                'where' => "id>".$id." AND type=1" 
            );
        }
        else
        {
            $filter = array(
                'table' => 'ci_gallery_details',
                'sort' => 'id',
                'order' => 'asc',
                'start' => '',
                'limit' => '8',
                'where' => "id>".$id." AND gallery_id=".$category
            );
        }
    }
   
    $gallary_images = postData('listing',$filter);

   

    
   if(check_data_exist($gallary_images))
   {
    foreach ($gallary_images['data'] as $key => $value) {
                            

                           

        if($key==0)
        {
            $class = "col-xl-8 col-lg-8 col-md-8 col-sm-6";
        }
        elseif($key==1)
        {
            $class = "col-xl-4 col-lg-4 col-md-4 col-sm-6";
        }
        else
        {
            $class = "col-xl-4 col-lg-4 col-md-4 col-sm-4"; 
        }

        if($eqaul_grid)
        {
            $class = "col-xl-4 col-lg-4 col-md-4 col-sm-4"; 
        }

       
    


       echo '<div data-cat="'.$id.'" data-id="'.$value["id"].'" class="gallery_img '.$class.' biv-gallery-section biv-gallery-section-1 all_images">
            <div class="biv-gallery-item biv-photo-viewer-item" data-src="img/tours/full/01.jpg">
                <span class="biv-background" data-src="'.ADMIN_PATH.$value["value"].'"></span></div></div>';

    }
   }

    
}

?>