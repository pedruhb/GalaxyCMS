$(function(){$.extend({switchAvatar:function(look){if(!look){look=link.img+'nouser.png';}else{look=link.avatar+ look+"&gesture=sml&direction=4";}
$('.avatarlogin > img').attr('src',look);return this;}});$('.login_mailornick').keyup(function(){var mailornick=$(this).val();$.post(link.action+'avatar_login.php',{username:username},function(data){$.switchAvatar(data.avatar);},'json');});$(document).on('submit','.loginform',function(){var mailornick=$('> .login_mailornick',$(this)).val(),password=$('> .login_password',$(this)).val(),captcha=$('> .login_captcha',$(this)).val();$.post(link.action+'login.php',{mailornick:mailornick,password:password,captcha:captcha},function(data){$.error.top(data,{'scroll':'top'});if(data.type=='success'){location.reload();}else if(data.type=='protection'){location.href='protection';}else if(data.type=='captcha'){$('.imgcaptchaindex').attr('src','./app/captcha/captchaindex.php');$('.login_captcha').val("");$('.login_captcha').fadeIn(200);$('.placecaptcha').fadeIn(200);}},'json');return false;});$(document).on('submit','.mdpform',function(){var email=$('> .mail_email',$(this)).val(),code=$('> .mail_code',$(this)).val();$.post(link.action+'mdpforbidden.php',{email:email,code:code},function(data){if(data.type=='success'){$('.changemdp_ajxload').text(data.message).slideDown(200).css("background","#68911d");$('.mdpform').fadeOut(200);}else{$('.changemdp_ajxload').text(data.message).slideDown(200);$('.captchaimg').attr('src','./app/captcha/captchacolor.php');$('.mail_code').val("");}},'json');return false;});$(document).on('submit','.mdpnewform',function(){var mdp=$('> .mdpnew',$(this)).val(),mdpconfirm=$('> .mdpconfirm',$(this)).val(),clee=$('> .clee',$(this)).val();$.post(link.action+'mdpforbiddenchange.php',{mdp:mdp,mdpconfirm:mdpconfirm,clee:clee},function(data){if(data.type=='success'){$('.changemdp_ajxload').text(data.message).slideDown(200).css("background","#68911d");$('.mdpnewform').fadeOut(200);}else{$('.changemdp_ajxload').text(data.message).slideDown(200);$('.mdpconfirm').val("");$('.mdpnew').val("");}},'json');return false;});$(document).on('click','.captcha',function(){$('.captchaimg').attr('src','./app/captcha/captchacolor.php');});});