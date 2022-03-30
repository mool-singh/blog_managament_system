<?
require_once('config.php');

if(!empty($_POST)){ 
    $data = $_POST;
    $data['package_inquiry']=1; 
     
    $contactData = postData('saveinquerypackage', $data);  
   
    $msg = $contactData['message']; 

    $response = $contactData['data'];
    
   
}



?>

<script>
localStorage.setItem("msg", "<?=$msg?>");
localStorage.setItem("code", "<?=$response?>");

window.location = "index.php";
</script>

