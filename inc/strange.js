 var message="Правый клик запрещен!";
///////////////////////////////////
      function clickIE4(){
      if (event.button==2){
      alert(message);
      return false;
      }
      }
function clickNS4(e){
      if (document.layers||document.getElementById&&!document.all){
      if (e.which==2||e.which==3){
      alert(message);
      return false;
      }
      }
      }
if (document.layers){
      document.captureEvents(Event.MOUSEDOWN);
      document.onmousedown=clickNS4;
      }
      else if (document.all&&!document.getElementById){
      document.onmousedown=clickIE4;
      }
document.oncontextmenu=new Function("alert(message);return false")




function CopyToClipboard(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy");
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");
    alert("Has been copied, now paste anywhere.")
  }
}




$(document).ready(function(){
var s=window.screen;
var width = q.width=s.width;
var height = q.height;
var yPositions = Array(300).join(0).split('');
var ctx=q.getContext('2d');

var draw = function () {
  ctx.fillStyle='rgba(0,0,0,.01)';
  ctx.fillRect(0,0,width,height);
  ctx.fillStyle='#0F0';
  ctx.font = '8pt Georgia';
  yPositions.map(function(y, index){
    text = String.fromCharCode(1e2+Math.random()*33);
    x = (index * 10)+10;
    q.getContext('2d').fillText(text, x, y);
    if(y > 100 + Math.random()*1e4)
    {
      yPositions[index]=0;
    }
    else
    {
      yPositions[index] = y + 10;
    }
  });
};
RunMatrix();
function RunMatrix()
{
if(typeof Game_Interval != "undefined") clearInterval(Game_Interval);
        Game_Interval = setInterval(draw, 33);
}
function StopMatrix()
{
clearInterval(Game_Interval);
}
//setInterval(draw, 33);
$("button#pause").click(function(){
StopMatrix();});
$("button#play").click(function(){RunMatrix();});

})

