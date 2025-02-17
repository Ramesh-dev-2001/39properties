<?php 
   $propertyId = $_REQUEST['propertyId'];
   $id = base64_encode('id='.$propertyId);
?>

<script>


    // var urlVariables = '<?php echo $id;?>'; 
    // var url = '<?php echo PROPERTY_URL;?>/propertydetail.php?'+window.btoa(urlVariables);
    // window.location.replace(url);  

</script>

<script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>