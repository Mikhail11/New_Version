<script src="//vk.com/js/api/openapi.js" type="text/javascript"></script>

<div id="login_button" onclick="VK.Auth.login(authInfo);" style="display:none;"></div>

<script language="javascript">
VK.init({
  apiId: 4956935
});
function authInfo(response) {
  if (response.session) {
    console.log(response);
    VK.Api.call('users.get',{ user_ids:'43800538'},{ fields:'bdate, photo_50'}, function(resp){

      console.log(resp);});

  } else {
    alert('not auth');
  }
}
VK.Auth.getLoginStatus(authInfo);
VK.UI.button('login_button');
</script>

https://api.vk.com/method/users.get?user_id=43800538&fields=domain