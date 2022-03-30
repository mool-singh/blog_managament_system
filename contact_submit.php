<?
require_once('config.php');

if(!empty($_POST)){ 
    $data = $_POST; 
     
    $contactData = postData('saveinquery', $data); 
    

    $msg = $contactData['message']; 

    $response = $contactData['data'];
    
   
}



?>

<script>
localStorage.setItem("msg", "<?=$msg?>");
localStorage.setItem("code", "<?=$response?>");

window.location = "contact.php";
</script>

