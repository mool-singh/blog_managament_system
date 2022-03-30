<? 

include('config.php');

// get images by cat

$id = ' ';

if(isset($_GET['id']))
{
    $id = strip_tags($_GET['id']);
}

if($id!='')
{
    $filter = array(
        'table' => 'ci_gallery_details',
        'sort' => 'sort_order',
        'order' => 'asc',
        'start' => '',
        'limit' => '8',
        'where' => "is_active=1 AND type=1 AND gallery_id=".$id;
    );
    $gallary_images = getData('catwithphotos', $filter);

    prd($gallary_images);
}

?>