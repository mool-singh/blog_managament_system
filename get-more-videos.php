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
            'where' => "type=2"
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
            'where' => "gallery_id=".$id
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
                'where' => "id>".$id." AND type=2"
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

  
    // new

    if(check_data_exist($gallary_images))
    {
     foreach ($gallary_images['data'] as $key => $value) {


      echo '<div data-cat="'.$id.'" data-id="'.$value['id'].'" class="gallery_img col-xl-4 col-lg-4 col-md-4 col-sm-4 biv-gallery-section biv-gallery-section-1 all_images">
            <div class="biv-gallery-item biv-photo-viewer-item" >';
                $tubeurl = "";
            if(!empty($value['value'])){ 
            $yid = explode('v=', $value['value'] ); 
            if(!empty($yid[1])){
              $tubeurl= "https://www.youtube.com/embed/".$yid['1'];
            }else{
              $tubeurl= "https://www.youtube.com/embed/".$value['value'];
            } 
          
            } 
       
        
        if($tubeurl!='')
        {
    
       echo'<span class="biv-background" >
        <iframe style="height:100%;width:100%" src="'.$tubeurl.'" frameborder="0" allowfullscreen></iframe>
        </span>';

        }

               
            echo"</div>
        </div>";

        }}

    // 

  

    
}

?>