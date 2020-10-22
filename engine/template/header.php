<?php

echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "https://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>  
<link rel="shortcut icon" href="'.$domain.'/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0"><title>'.$nickname.' '.$domainname.' | COD Stats </title>
<meta name="description" content="'.$nickname.' Profile Call of Duty: Modern Warfare stats. Learn Profile stats for this COD player.">
';
?>

<style>
.rainbowQ {
  
   /* Font options */
  font-family: 'Pacifico', cursive;
  text-shadow: 2px 2px 4px #000000;
  font-size:30px;
  
   /* Chrome, Safari, Opera */
  -webkit-animation: rainbowQ 5s infinite; 
  
  /* Internet Explorer */
  -ms-animation: rainbowQ 5s infinite;
  
  /* Standar Syntax */
  animation: rainbowQ 5s infinite; 
}

/* Chrome, Safari, Opera */
@-webkit-keyframes rainbowQ{
  0%{color: orange;}	
  10%{color: purple;}	
	20%{color: red;}
  30%{color: CadetBlue;}
	40%{color: yellow;}
  50%{color: coral;}
	60%{color: green;}
  70%{color: cyan;}
  80%{color: DeepPink;}
  90%{color: DodgerBlue;}
	100%{color: orange;}
}

/* Internet Explorer */
@-ms-keyframes rainbowQ{
   0%{color: orange;}	
  10%{color: purple;}	
	20%{color: red;}
  30%{color: CadetBlue;}
	40%{color: yellow;}
  50%{color: coral;}
	60%{color: green;}
  70%{color: cyan;}
  80%{color: DeepPink;}
  90%{color: DodgerBlue;}
	100%{color: orange;}
}

/* Standar Syntax */
@keyframes rainbowQ{
    0%{color: orange;}	
  10%{color: purple;}	
	20%{color: red;}
  30%{color: CadetBlue;}
	40%{color: yellow;}
  50%{color: coral;}
	60%{color: green;}
  70%{color: cyan;}
  80%{color: DeepPink;}
  90%{color: DodgerBlue;}
	100%{color: orange;}
}
.containerx {
height: 100%;	
position: relative;
}
.containert {
position: absolute;
    margin-left: auto;
    margin-right: auto;
}
.headshot {
  position: absolute;
  top: 8px;
  left: 48%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;
}

.neck {
  position: absolute;
  top: 48px;
  left: 48%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;  
}


.torso_upper {
  position: absolute;
  top: 77px;
  left: 48%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;
 
}


.torso_lower {
  position: absolute;
  top: 115px;
  left: 48%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;
}


.right_arm_upper {
  position: absolute;
  top: 72px;
  left: 28%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}


.right_arm_lower {
  position: absolute;
  top: 103px;
  left: 17%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.right_hand{
  position: absolute;
  top: 133px;
  left: 8%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_arm_upper {
  position: absolute;
  top: 72px;
  right: 28%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}


.left_arm_lower {
  position: absolute;
  top: 103px;
  right: 17%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_hand{
  position: absolute;
  top: 133px;
  right: 8%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.right_leg_upper{
  position: absolute;
  top: 170px;
  left: 38%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.right_leg_lower{
  position: absolute;
  top: 210px;
  left: 35%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.right_foot{
  position: absolute;
  top: 260px;
  left: 34%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_leg_upper{
  position: absolute;
  top: 170px;
  right: 36%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_leg_lower{
  position: absolute;
  top: 210px;
  right: 32%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_foot{
  position: absolute;
  top: 260px;
  right: 30%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}
 
.item-hints{
  height: 10px;
  width: 10px;
  margin: 0px auto;
}
.item-hints .hint {
  width: 0px;
  height: 0px;
  margin: 0px auto;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}
.item-hints .hint::before{ /* //rotated squre */
  background-color: #fff;
  width: 0px;
  height: 0px;
  z-index: 2;
  -webkit-clip-path: polygon(50% 0,100% 50%,50% 100%,0 50%);
  clip-path: polygon(50% 0,100% 50%,50% 100%,0 50%);
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%,-50%);
  transform: translate(-50%,-50%);
}

.item-hints .hint::after{ /* //green glow */
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%,-50%);
  transform: translate(-50%,-50%);
  border-radius: 50%;
  width: 2px;
  height: 2px;
  z-index: 1;
  -webkit-box-shadow: 0 0 50px 30px rgba(72,170,72,.3);
  box-shadow: 0 0 50px 30px rgba(72,170,72,.3);
  -webkit-animation: home_hero_item_hints_glow 2s cubic-bezier(.25,.1,.2,1) infinite;
  animation: home_hero_item_hints_glow 2s cubic-bezier(.25,.1,.2,1) infinite;
  -webkit-transition: opacity .5s ease;
  transition: opacity .5s ease;
}
@-webkit-keyframes home_hero_item_hints_glow {
  0% {
    -webkit-box-shadow: 0 0 30px 5px #4848aa;
    box-shadow: 0 0 30px 5px #4848aa
  }
  70% {
    -webkit-box-shadow: 0 0 70px 50px rgba(72, 170, 72, 0);
    box-shadow: 0 0 70px 50px rgba(72, 170, 72, 0)
  }
  100% {
    -webkit-box-shadow: 0 0 0 50px rgba(72, 170, 72, 0);
    box-shadow: 0 0 0 50px rgba(72, 170, 72, 0)
  }
}
@keyframes home_hero_item_hints_glow {
  0% {
    -webkit-box-shadow: 0 0 30px 5px #4848aa;
    box-shadow: 0 0 30px 5px #4848aa
  }
  70% {
    -webkit-box-shadow: 0 0 70px 50px rgba(72, 170, 72, 0);
    box-shadow: 0 0 70px 50px rgba(72, 170, 72, 0)
  }
  100% {
    -webkit-box-shadow: 0 0 0 50px rgba(72, 170, 72, 0);
    box-shadow: 0 0 0 50px rgba(72, 170, 72, 0)
  }
}
.item-hints .hint-dot {
  z-index: 3;
  border: 1px solid #fff;
  border-radius: 50%;
  width: 0px;
  height: 0px;
  display: block;
  -webkit-transform: translate(-0%,-0%) scale(.95);
  transform: translate(-0%,-0%) scale(.95);
  -webkit-animation: home_hero_item_hints_border 2s linear infinite;
  animation: home_hero_item_hints_border 2s linear infinite;
  margin: auto;
}


@-webkit-keyframes home_hero_item_hints_border {
  0%,
  100% {
    border-color: rgba(255, 255, 255, .6);
    -webkit-transform: translate(-50%, -50%) scale(.95);
    transform: translate(-0%, -0%) scale(.95)
  }
  50% {
    border-color: rgba(255, 255, 255, .3);
    -webkit-transform: translate(-50%, -50%) scale(1);
    transform: translate(-0%, -0%) scale(1)
  }
}
@keyframes home_hero_item_hints_border {
  0%,
  100% {
    border-color: rgba(255, 255, 255, .6);
    -webkit-transform: translate(-50%, -50%) scale(.95);
    transform: translate(-0%, -0%) scale(.95)
  }
  50% {
    border-color: rgba(255, 255, 255, .3);
    -webkit-transform: translate(-50%, -50%) scale(1);
    transform: translate(-0%, -0%) scale(1)
  }
}


.item-hints .hint-radius {
  background-color: rgba(255,255,255,0.1);
  border-radius: 50%;
  width: 50px;
  height: 50px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -25px 0 0 -25px;
  opacity: 0;
  visibility: hidden;
  -webkit-transform: scale(0);
  transform: scale(0);
  -webkit-transition-property: background-color,opacity,visibility,-webkit-transform;
  transition-property: background-color,opacity,visibility,-webkit-transform;
  transition-property: background-color,opacity,visibility,transform;
  transition-property: background-color,opacity,visibility,transform,-webkit-transform;
  -webkit-transition-duration: .5s;
  transition-duration: .5s;
  -webkit-transition-timing-function: ease,ease,ease,cubic-bezier(.5,0,0,1);
  transition-timing-function: ease,ease,ease,cubic-bezier(.5,0,0,1);
}
.item-hints .hint:hover .hint-radius {
  opacity: 1;
  visibility: visible;
  -webkit-transform: scale(1);
  transform: scale(1);
}
.item-hints .hint[data-position="1"] .hint-content {
  top: 85px;
  left: 50%;
  margin-left: 56px;
}
.item-hints .hint-content {
  color: #fff;
  width: 410px;
  position: absolute;
  z-index: 5;
  padding: 12px 0;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity .7s ease,visibility .7s ease;
  transition: opacity .7s ease,visibility .7s ease;
  pointer-events: none;
  color: #fff;
  visibility: hidden;
  pointer-events: none
}
.item-hints .hint:hover .hint-content {
  color: #fff;
  width: 410px;
  position: absolute;
  z-index: 5;
  padding: 12px 0;
  opacity: 1;
  visibility: visible !important;
  -webkit-transition: opacity .7s ease,visibility .7s ease;
  transition: opacity .7s ease,visibility .7s ease;
  pointer-events: none;
  color: #fff;
  visibility: hidden;
  pointer-events: none
}
.item-hints .hint-content::before {
  width: 0px;
  bottom: 0;
  left: 0;
  content: '';
  background-color: #fff;
  height: 1px;
  position: absolute;
  transition: width 0.4s;
}
.item-hints .hint:hover .hint-content::before {
  width: 180px;
  transition: width 0.4s;
}
.item-hints .hint-content::after {
  -webkit-transform-origin: 0 50%;
  transform-origin: 0 50%;
  -webkit-transform: rotate(-225deg);
  transform: rotate(-225deg);
  bottom: 0;
  left: 0;
  width: 80px;
  content: '';
  background-color: #fff;
  height: 1px;
  position: absolute;
  opacity: 1;
  -webkit-transition: opacity .5s ease;
  transition: opacity .5s ease;
  transition-delay: 0s;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}
.item-hints .hint:hover .hint-content::after {
  opacity: 1;
  visibility: visible;
}
.item-hints .hint[data-position="4"] .hint-content {
  bottom: 45px;
  left: 50%;
  margin-left: 56px;
}















#console {display: none;}
#dialog {
  position: absolute;
  z-index: 9999;
  top: 0;
  left: 50%;
  width: 80%;
  height: 100vh;
  background: rgba(0,0,0,0.15);
  transition: visibility 0s linear 0.5s,opacity 0.5s linear;
  opacity: 0;
  visibility: hidden;
}
.dialog_state {
  visibility: hidden;
  opacity: 0;
  display: none;
}
.dialog_state:checked + #dialog,
#dialog.dialog_open {
  transition-delay:0s;
  opacity: 1;
  visibility: visible;
}
#dlg-back {
  position: absolute;
  top: 0;
  left: 50%;
  width: 80%;
  height: 100vh;
  cursor: pointer;
}
.dialog_state:checked + #dialog #dlg-wrap {
  max-height: 24rem;
  opacity: 1;
  padding: 2rem;
}
#dlg-wrap {
  position: relative;
  z-index: 9999;
  display: block;
  box-sizing: border-box;
  margin: 0 auto;
  top: 40%;
  left: 50%;
  transform: translateY(-50%);
  max-width: 640px;
  min-width: 378px;
  height: 90%;
  padding: 2rem;
  border-radius: 0.25rem;
  border: 3px solid #969696;
background: -moz-linear-gradient(top, rgba(2,3,5,0.34) 0%, rgba(2,3,5,0.35) 1%, rgba(25,48,66,1) 80%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 70%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to top, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 80%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  box-shadow: 10px 50px 90px rgba(0,0,0,0.3);
  max-height: 0;
  opacity: 0;
  padding-top: 0;
  padding-bottom: 0;
  overflow: hidden;
  transition: all .5s;
}
#dlg-close {
  position: absolute;
  top: 0;
  right: 0;
  width: 222rem;
  height: 222rem;
  line-height: 2rem;
  text-align: center;
  cursor: pointer;
}
#dlg-content {
  font-weight: 300;
  font-style: italic;
  letter-spacing: 0.015em;
}
#dlg-prompt .buttonz {
  margin: 1rem 0.5rem;
  border-radius: 1.5rem;
}



.main_area {
  transition: all 0.5s ease-out;
  
}
.dialog_state:checked ~ .main_area,
.main_area.dialog_open {
  filter: blur(6px);
}

 
.buttonz, a.buttonz {	
  width:200px; 
  display: inline-block;
  padding: 0.25em 1em;
  box-sizing: border-box;  
  background: #ffffff;
  color: #606060;
  text-decoration: none;
  letter-spacing: 0.075em;
  line-height: 2rem;
  font-size: 0.85em;
  border-radius: 4px;
  border: 1px solid #e0e0e0;
  transition: .1s all;
  cursor: pointer;
}

.buttonz:hover, a.buttonz:hover {
  color: #a0a0a0;
  background: #f8f8f8;
  box-shadow: 0 1px 1px rgba(0,0,0,0.05);
  /*transform: scale(1.01);*/
}
.buttonz.positive, a.buttonz.positive {
  border-color: #6199B7;
  color: #6199B7;
}
.button.positive:hover, a.button.positive:hover {
  border-color: #468FB6;
  color: #fff;
  background-color: #468FB6;
}
 </style> 
 

 
<script>
$(function(){
  $(document).keypress(function(e) {
    cwrite(e.which,'Keypress event');
    if(e.which==120) custom_dialog_toggle('Keypress x','You opened this window by pressing x');
  });
});
function custom_dialog_toggle(title,text,buttons) {
  if(typeof title !=='undefined') $('#dlg-header').html(title);
  if(typeof text !=='undefined') $('#dlg-content').html(text);
  cwrite('Current state: '+$('#dialog_state').prop("checked"),'custom_dialog_toggle');
  $('#dialog_state').prop("checked", !$('#dialog_state').prop("checked"));
}
// Console logging function for debugging
// cwrite(str, title)
//      str:              string to be appended to console
//      title (optional): title of the string
// (c)  Tuomas Hatakka 2015
//      http://tuomashatakka.fi
function cwrite(str,title) {
  var ce = $('#console');
  var sg = "<p>";
  if(typeof title !=='undefined') sg = sg+"<em>"+title+"</em> ";
  sg = sg+str+"</p>";
  ce.prepend(sg);
  //if(ce.children("p").length>6) ce.children("p").first().remove();
}
</script>











<?php 
echo "
<style> 
  
.blob {
	background: black;
	border-radius: 50%;
    display: inline-block;
    position:absolute;
	height: 25px;
	width: 25px;

	box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
	transform: scale(1);
	animation: pulse 1s infinite;
}

@keyframes pulse {
	0% {
		transform: scale(0.95);
		box-shadow: 0 0 0 0 rgba(198, 0, 20, 0.7);
	}

	70% {
		transform: scale(1);
		box-shadow: 0 0 0 35px rgba(202, 0, 10, 0.5);
	}

	100% {
		transform: scale(0.95);
		box-shadow: 0 0 0 70px rgba(209, 0, 30, 0);
	}
}


.weap_stats{width:50%;float:left;margin:5 0px;}
.weap_stats div{color: #aaa;}
@media  (min-width: 700px) {
	
	
	.search_block{flex-grow: 1;min-width:calc(100% - 100px);overflow:auto;margin-top:4px;  border-radius: 5px 0px 0px 5px;}
	.search_block_button{flex-grow: 1;margin-top:4px;width:150px;
background:#52bafe;height:30px;line-height:30px;text-align:center;color:#0a2739;font-size:12px;
display:inline-block;font-weight:bold;cursor:pointer;cursor:hand;   border-radius: 5px 5px 5px 5px;}

	
.main_content{max-width:1180px;margin:auto;background:#0000008f;color:#fff;padding: 5 10 10 10px;margin-top:50px;}
.menu_container{height:auto;overflow:auto;text-align:center;padding:0px;background:#0000008f;z-index:5;
min-width:320px;margin:auto;height:50px;max-width:995px;width:calc(100% - 215px);	font-size:12px;lex-grow: 1; display: flex;flex-wrap: wrap;min-width:150px;
width: calc(100% - 365px);}
.user_block{background-image: url($domain/inc/images/top_bg.png);
    font-weight: 700;
    text-transform: uppercase;
    overflow: auto;
    color: #89d4f3;
    text-align: center;z-index:10;max-width:150px;
    min-width: 12%;min-width:130px;padding:10px;text-align:right;}
	
.join_button{    display: inline-block;
    float: right;
    background: #52bafe;
    line-height: 30px;
    padding: 0 10px;
    margin-right: 5px;
    cursor: pointer;
    cursor: hand;
    color: #000;
    font-size: 11px;
    width: 85px;
    text-align: center;
    font-weight: 900;
border-radius: 5px;}




.main_menu{background2-image: url($domain/inc/images/top_bg.png);font-weight:700;text-transform:uppercase;overflow:auto;flex-grow: 1; display: flex;flex-wrap: wrap;
color:#89d4f3;text-align:center;min-width:12%;}
.main_menu a{color:#888;display:inline-block;text-align:center;width:100%;padding:17 5 0 5px;margin:0 0px;background:#;}
.main_menu a:hover{background: -moz-linear-gradient(top, rgba(2,3,5,0.34) 0%, rgba(2,3,5,0.35) 1%, rgba(25,48,66,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#57020305', endColorstr='#193042',GradientType=0 ); 
border-bottom:5px solid #fff;color:#89d4f3;display:inline-block;text-align:center;padding:17 5 7 5px;background:#;}



.main_menu_active{font-weight:700;text-transform:uppercase;overflow:auto;flex-grow: 1; display: flex;flex-wrap: wrap;
color:#89d4f3;text-align:center;min-width:12%;background: -moz-linear-gradient(top, rgba(2,3,5,0.34) 0%, rgba(2,3,5,0.35) 1%, rgba(25,48,66,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#57020305', endColorstr='#193042',GradientType=0 ); 
border-bottom:5px solid #fff;color:#89d4f3;text-align:center;padding:0px;background:#;}
.main_menu_active a{color:#89d4f3;display:inline-block;text-align:center;width:100%;padding:17 5 7 5px;margin:0 0px;background:#;}


.lb{	}
}


@media (min-width: 870px) {
	.stick_to_bot{display:none;}
}

@media (min-width: 0px) and (max-width: 870px){
	
	
	.stick_to_bot{position:fixed;bottom:0px;background-color:#000000aa;width:100%;padding:0 0px;}
	
	
.main_menu{   background2-image: url($domain/inc/images/top_bg.png);font-weight:700;text-transform:uppercase;overflow:auto;flex-grow: 1; display: flex;flex-wrap: wrap;font-size:12px;
color:#89d4f3;text-align:center;min-width:5%;
    flex-direction: column;
    justify-content: center; width: calc(20% - 20px);}
.main_menu a{color:#888;display:inline-block;text-align:center;width:calc(100% - 10px);padding:10 5 10 5px;margin:0 0px;background:#;
    text-align: center;}
.main_menu a:hover{background: -moz-linear-gradient(top, rgba(2,3,5,0.34) 0%, rgba(2,3,5,0.35) 1%, rgba(25,48,66,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#57020305', endColorstr='#193042',GradientType=0 ); 
border-bottom:5px solid #fff;color:#89d4f3;display:inline-block;text-align:center;padding:10 5 5 5px;background:#;}



.main_menu_active{
   background-image2: url($domain/inc/images/top_bg.png);font-weight:700;text-transform:uppercase;overflow:auto;flex-grow: 1; display: flex;flex-wrap: wrap;font-size:12px;
color:#89d4f3;text-align:center;min-width:5%;
    flex-direction: column;
    justify-content: center; width: calc(20% - 20px);
	background: -moz-linear-gradient(top, rgba(2,3,5,0.34) 0%, rgba(2,3,5,0.35) 1%, rgba(25,48,66,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#57020305', endColorstr='#193042',GradientType=0 ); 
border-bottom:5px solid #fff;color:#89d4f3;text-align:center;padding:0px;background:#;}
.main_menu_active a{color:#89d4f3;display:inline-block;text-align:center;width:calc(100% - 10px);padding:10 5 10 5px;margin:0 0px;background:#;}

	
.join_button{    display: inline-block;
    float: right;
    background: #52bafe;
    line-height: 30px;
    padding: 0 10px;
    margin-right: 5px;
    cursor: pointer;
    cursor: hand;
    color: #000;
    font-size: 11px;
    width: 65px;
    text-align: center;
    font-weight: 900;
border-radius: 5px;}

.main_content{max-width:1180px;margin:auto;background:#0000008f;color:#fff;padding: 5 10 10 10px;margin-top:100px;}
.menu_container{height:auto;overflow:auto;text-align:center;padding:0px;background:#090909ee;z-index:5;
margin:auto;min-height:50px;width:100%;	font-size:12px;lex-grow: 1; display: flex;flex-wrap: wrap;}
.user_block{position:absolute;left:100%;margin-left:calc(-150px);z-index:12;min-width:130px;padding:10px;}

.lb{	word-wrap: break-word;width:25%;}
}







@media (min-width: 910px){
.reminder{min-width:320px;position:fixed;top:100%;margin-top:-50px;color:#fff;background:#52bafe;width:100%;line-height:40px;left:0px;height:50px;text-align:center;font-weight:600;}
.reminder .rem_img{display:inline-block;}
.reminder .reg_butt{margin:0px;width:90px;}
.reminder .txt_slot{max-width:calc(100% - 140px);}
}

@media (min-width: 0px) and (max-width: 660px){
.reminder{font-size:13px;min-width:320px;position:fixed;top:100%;color:#fff;background:#52bafe;width:100%;line-height:20px;left:0px;height:auto;text-align:center;font-weight:600;transform: translateY(-100%);}
.reminder .rem_img{display:none;}
.reminder .reg_butt{margin:5px;width:calc(100% - 20px);}
.reminder .txt_slot{max-width:calc(100% - 10px);}
}


@media (min-width: 660px) and (max-width: 910px){
.reminder{font-size:13px;min-width:320px;position:fixed;top:100%;margin-top:-50px;color:#fff;background:#52bafe;width:100%;line-height:40px;padding:0 0px;left:0px;height:50px;text-align:center;font-weight:600;}

.reminder .reg_butt{margin:5px;width:90px;}
}



@media (min-width: 0px) and (max-width: 700px){
	
	.search_block{flex-grow: 1;min-width:calc(100% - 100px);overflow:auto;margin-top:4px;  border-radius: 5px;}
	.search_block_button{flex-grow: 1;margin-top:4px;width:50px;background:#52bafe;height:30px;line-height:30px;text-align:center;color:#0a2739;font-size:12px;display:inline-block;font-weight:bold;cursor:pointer;cursor:hand;   border-radius: 5px;}

	
.reminder .rem_img{display:none;}
}
.button{ 
    display: inline-block;
    background: #52bafe;
    line-height: 30px;
    padding: 0 10px;
    margin-right: 5px;
    cursor: pointer;
    cursor: hand;
    color: #000;
    font-size: 11px;
    width: 85px;
    text-align: center;
    font-weight: 900;
    border-radius: 5px;
}


h1{padding: 0 0 0 0px;
    background1: #888;
    display: inline-block;
    color: #52bafe;
    font-weight: bold;float:left;
    ;margin:0px;font-size:20px;text-transform:uppercase;}

.stats_block{padding:10px;background:#191919;border:1px solid #000;overflow:auto;float:left;margin-top:10px;width:350px;margin-right:10px;}
.stats_block .title2{color:#fff;font-size:18px;padding:5px;}
.stats_block .title .text{padding:5 10px;background:#fff;display:inline-block;color:#222;font-weight:bold;}
.stats_block .value{font-size:15px;color:#52bafe;}
.stats_block .avg_value{font-size:9px;color:#777;}						
.stats_block .stats_adv .block{margin-top:10px;float:left;width:33%;}					
.stats_block .stats_adv .title{color:#fff;font-size:11px;line-height:20px;}					
.stats_block .stats_adv .value{font-size:10px;color:#aaa;}

.content_block{background:#090909cc;margin:10 0px;padding:5px;border:1px solid #252525;border-top:1px solid #222;background-color: #090909de;background:url($domain/inc/images/but_bg.png);}
.content_block .title{font-size:15px;overflow:auto;padding:5 0 5 5px;margin:0 5 0 5px;text-transform:uppercase;border-bottom:0px solid #222;}
.content_block .title .text{padding:0 0 0 0px;background1:#888;display:inline-block;color: #52bafe;font-weight:bold;float:left;}
.match_stats_adv{width:100px;display:inline-block;color:#777;padding:5px;}
.wrapper{	display: -webkit-flex;  /* для поддержки ранних версий браузеров */
    display: flex;  /* элемент отображается как блочный flex-контейнер */
    -webkit-justify-content: space-between;  /* для поддержки ранних версий браузеров */
    justify-content: space-between;  /* флекс элементы равномерно распределяются по всей строке, при этом первый флекс элемент позиционируются в начале контейнера, а последний флекс элемент позиционируется в конце контейнера */
flex-flow: row wrap;}
.flexer{flex-grow: 1; display: flex;flex-wrap: wrap;}

body{background-image:url($domain/inc/images/bg.webp);font-family: Roboto;
background-repeat: no-repeat;padding:0px;margin:0px;
    background-position: center center;
    background-attachment: fixed;
background-size: cover;min-width:320px; overflow-y: scroll;  height: 100%;}


.shad{
	    text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px
}
.shad0{
	    text-shadow: #000 1px 0px, #000 1px 1px, #000 0px 1px, #000 -1px 1px, #000 -1px 0px, #000 -1px -1px, #000 0px -1px, #000 1px -1px, #000 0 0 3px, #000 0 0 3px, #000 0 0 3px;
}
a{text-decoration:none;color:#222;}
.white{color:#fff;}

.title_block{margin:5 5 5 5px;colo2r:#00dcff;;font-size:17px;width:100%;z-index:1;text-align:left;}
.title_block .title2{background2:#ffffff22;float:left;padding:2 2 2 5px;margin:3 3 3 0px;border-left:10px solid #00dcff2e;}

.card{padding:10px;margin:5px;width:170px;display:inline-block;min-width:20%;
flex-grow: 1;
background: -moz-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 99%, rgba(255,255,255,0) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(255,255,255,0.05) 0%,rgba(255,255,255,0) 99%,rgba(255,255,255,0) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(77,88,99,0.1) 0%,rgba(0,0,0,0) 99%,rgba(0,0,0,0) 100%); 
background-color:#000000aa;
    border: 1px solid #111;
border-top: 1px solid #333;}




.profile_menu{font-weight:700;text-transform:uppercase;overflow:auto;flex-grow: 1; display: flex;flex-wrap: wrap;
color:#89d4f3;text-align:center;min-width:80px;}
.profile_menu a{color:#89d4f3;display:inline-block;text-align:center;width:100%;padding:12 5px;margin:0 0px;background:#;}
.profile_menu a:hover{background: -moz-linear-gradient(top, rgba(2,3,5,0.34) 0%, rgba(2,3,5,0.35) 1%, rgba(25,48,66,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#57020305', endColorstr='#193042',GradientType=0 ); 
border-bottom:5px solid #fff;color:#89d4f3;display:inline-block;text-align:center;padding:12 5 7 5px;background:#;}

.profile_menu_active{font-weight:700;text-transform:uppercase;overflow:auto;flex-grow: 1; 
display: flex;flex-wrap: wrap;color:#89d4f3;text-align:center;min-width:80px;margin:0 0px;}

.profile_menu_active a{background: -moz-linear-gradient(top, rgba(2,3,5,0.34) 0%, rgba(2,3,5,0.35) 1%, rgba(25,48,66,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(2,3,5,0.34) 0%,rgba(2,3,5,0.35) 1%,rgba(25,48,66,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#57020305', endColorstr='#193042',GradientType=0 ); 
border-bottom:5px solid #fff;color:#89d4f3;display:inline-block;text-align:center;width:100%;padding:12 5 7 5px;background:#;}
.profile_menu_active:hover{background:#777;}
.page{border:1px solid #222;border-radius:3px;text-transform:uppercase;line-height:20px;font-size:12px;min-width:76px;color:#000;background:#fff;padding:2 6px;font-weight:900;margin:2 5px;text-align:center;display:inline-block;}
.page2{color:#000;font-size:12px;border-radius:3px;line-height:20px;background:#52bafe;padding:2 6px;font-weight:900;margin:2 5px;text-align:center;display:inline-block;}
p{margin:0px;padding-bottom:4px;}


html {
background-position: center center;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}


.rainbow-text {
  background-image: repeating-linear-gradient(45deg, violet, indigo, blue, green, yellow, orange, red, violet);
  text-align: center;
  background-size: 800% 800%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 24px;
  animation: rainbow 8s ease infinite;
}

@keyframes rainbow { 
    0%{background-position:0% 50%}
    50%{background-position:100% 25%}
    100%{background-position:0% 50%}
}



/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px; 
  min-width:60px;
  max-width:100%;
}

input[type=text] {
  background-color: #f1f1f1;
  min-width:60px;
  max-width:1800px; 
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;  
  cursor: pointer;
  position: relative;
 height:25px; width:80px; border:1px solid black; 
    line-height:1px; 
	text-align: center;
  
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #333; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}



a.paginator:link { color:#FFF; text-decoration:none; font-weight:normal; }
a.paginator:visited { color: #FFF; text-decoration:none; font-weight:normal; }
a.paginator:hover { color: red; padding:5px;color:#fff;font-size:16px;lign-content:center;background-color: #666666;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: rgba(178, 238, 0,0.8) 0px 3px 3px;}
a.paginator:active { color: #FFF; text-decoration:none; font-weight:normal; }

.tags {
  display: inline;
  position: absolute;
}

.tags:hover:after {
  background: #333;
  background: rgba(0, 0, 0, .8);
  border-radius: 5px;
  bottom: -34px;
  color: #fff;
  content: attr(glose);
  left: 20%;
  padding: 5px 15px;
  position: absolute;
  z-index: 98;
  width: 350px;
}

.tags:hover:before {
  border: solid;
  border-color: #333 transparent;
  border-width: 0 6px 6px 6px;
  bottom: -4px;
  content: \"\";
  left: 50%;
  position: absolute;
  z-index: 99;
}


  // Black
  ::-webkit-scrollbar {
    width: 10px;
    height: 10px;
  }
  ::-webkit-scrollbar-track {
    border-radius: 10px;
    background: #444;
    box-shadow: 0 0 1px 1px #111, inset 0 0 4px rgba(0,0,0,0.3);
  }
  ::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background: linear-gradient(left, #3e3e3e, #111, #000);
    box-shadow: inset 0 0 1px 1px #646464;
  }

</style> 
 




";

if($baseurlz=='img.php')
{
echo "<style> 	
  
html.swipebox-html.swipebox-touch {
	overflow: hidden!important
}

#swipebox-overlay img {
	border: none!important
}

#swipebox-overlay {
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0;
	left: 0;
	z-index: 99999!important;
	overflow: hidden;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none
}

#swipebox-container {
	position: relative;
	width: 100%;
	height: 100%
}

#swipebox-slider {
	-webkit-transition: -webkit-transform .4s ease;
	transition: transform .4s ease;
	height: 100%;
	left: 0;
	top: 0;
	width: 100%;
	white-space: nowrap;
	position: absolute;
	display: none;
	cursor: pointer
}

#swipebox-slider .slide {
	height: 100%;
	width: 100%;
	line-height: 1px;
	text-align: center;
	display: inline-block
}

#swipebox-slider .slide:before {
	content: \"\";
	display: inline-block;
	height: 50%;
	width: 1px;
	margin-right: -1px
}

#swipebox-slider .slide .swipebox-inline-container,
#swipebox-slider .slide .swipebox-video-container,
#swipebox-slider .slide img {
	display: inline-block;
	max-height: 100%;
	max-width: 100%;
	margin: 0;
	padding: 0;
	width: auto;
	height: auto;
	vertical-align: middle
}

#swipebox-slider .slide .swipebox-video-container {
	background: 0 0;
	max-width: 1140px;
	max-height: 100%;
	width: 100%;
	padding: 5%;
	-webkit-box-sizing: border-box;
	box-sizing: border-box
}

#swipebox-slider .slide .swipebox-video-container .swipebox-video {
	width: 100%;
	height: 0;
	padding-bottom: 56.25%;
	overflow: hidden;
	position: relative
}

#swipebox-slider .slide .swipebox-video-container .swipebox-video iframe {
	width: 100%!important;
	height: 100%!important;
	position: absolute;
	top: 0;
	left: 0
}

#swipebox-slider .slide-loading {
	background: url($domain/inc/inc_screenshots/img/loader.gif) center center no-repeat
}

#swipebox-bottom-bar,
#swipebox-top-bar {
	-webkit-transition: .5s;
	transition: .5s;
	position: absolute;
	left: 0;
	z-index: 999;
	height: 50px;
	width: 100%
}

#swipebox-bottom-bar {
	bottom: -50px
}

#swipebox-bottom-bar.visible-bars {
	-webkit-transform: translate3d(0, -50px, 0);
	transform: translate3d(0, -50px, 0)
}

#swipebox-top-bar {
	top: -50px
}

#swipebox-top-bar.visible-bars {
	-webkit-transform: translate3d(0, 50px, 0);
	transform: translate3d(0, 50px, 0)
}

#swipebox-title {
	display: block;
	width: 100%;
	text-align: center
}

#swipebox-close,
#swipebox-next,
#swipebox-prev {
	background-image: url($domain/inc/inc_screenshots/img/icons.png);
	background-repeat: no-repeat;
	border: none!important;
	text-decoration: none!important;
	cursor: pointer;
	width: 50px;
	height: 50px;
	top: 0
}

#swipebox-arrows {
	display: block;
	margin: 0 auto;
	width: 100%;
	height: 50px
}

#swipebox-prev {
	background-position: -32px 13px;
	float: left
}

#swipebox-next {
	background-position: -78px 13px;
	float: right
}

#swipebox-close {
	top: 0;
	right: 0;
	position: absolute;
	z-index: 9999;
	background-position: 15px 12px
}

.swipebox-no-close-button #swipebox-close {
	display: none
}

#swipebox-next.disabled,
#swipebox-prev.disabled {
	opacity: .3
}

.swipebox-no-touch #swipebox-overlay.rightSpring #swipebox-slider {
	-webkit-animation: rightSpring .3s;
	animation: rightSpring .3s
}

.swipebox-no-touch #swipebox-overlay.leftSpring #swipebox-slider {
	-webkit-animation: leftSpring .3s;
	animation: leftSpring .3s
}

.swipebox-touch #swipebox-container:after,
.swipebox-touch #swipebox-container:before {
	-webkit-backface-visibility: hidden;
	backface-visibility: hidden;
	-webkit-transition: all .3s ease;
	transition: all .3s ease;
	content: ' ';
	position: absolute;
	z-index: 999;
	top: 0;
	height: 100%;
	width: 20px;
	opacity: 0
}

.swipebox-touch #swipebox-container:before {
	left: 0;
	-webkit-box-shadow: inset 10px 0 10px -8px #656565;
	box-shadow: inset 10px 0 10px -8px #656565
}

.swipebox-touch #swipebox-container:after {
	right: 0;
	-webkit-box-shadow: inset -10px 0 10px -8px #656565;
	box-shadow: inset -10px 0 10px -8px #656565
}

.swipebox-touch #swipebox-overlay.leftSpringTouch #swipebox-container:before,
.swipebox-touch #swipebox-overlay.rightSpringTouch #swipebox-container:after {
	opacity: 1
}

@-webkit-keyframes rightSpring {
	0% {
		left: 0
	}
	50% {
		left: -30px
	}
	100% {
		left: 0
	}
}

@keyframes rightSpring {
	0% {
		left: 0
	}
	50% {
		left: -30px
	}
	100% {
		left: 0
	}
}

@-webkit-keyframes leftSpring {
	0% {
		left: 0
	}
	50% {
		left: 30px
	}
	100% {
		left: 0
	}
}

@keyframes leftSpring {
	0% {
		left: 0
	}
	50% {
		left: 30px
	}
	100% {
		left: 0
	}
}

@media screen and (min-width:800px) {
	#swipebox-close {
		right: 10px
	}
	#swipebox-arrows {
		width: 92%;
		max-width: 800px
	}
}

#swipebox-overlay {
	background: #0d0d0d
}

#swipebox-bottom-bar,
#swipebox-top-bar {
	text-shadow: 1px 1px 1px #000;
	background: #000;
	opacity: .95
}

#swipebox-top-bar {
	color: #fff!important;
	font-size: 15px;
	line-height: 43px;
	font-family: Helvetica, Arial, sans-serif
}
</style>";
echo '<link rel="stylesheet" href="'.$domain.'/inc/inc_screenshots/style.css">';
}




 
echo ' 
</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Open+Sans%7CRoboto:400,600,700,900&amp;display=swap" rel="stylesheet">
<script src="'.$domain.'/inc/script2.js"></script>

';