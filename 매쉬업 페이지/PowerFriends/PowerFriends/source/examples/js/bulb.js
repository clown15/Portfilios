/*Downloaded from https://www.codeseek.co/Michael-Conway/light-bulb-onoff-JNJErm */
function ON ()
{document.getElementById("lightON").style.visibility="visible"

    document.getElementById("lightOFF").style.visibility="hidden"}

function OFF ()
{document.getElementById("lightOFF").style.visibility="hidden"

    document.getElementById("lightOFF").style.visibility="visible"
}

var timer
function setmytimer(){
    timer = 500
    timer = setinterval(move lightbulb, timer)

}

function move lightbulb(){
    x = Math.floor(Math.random() * screen.height)/2
    y = Math.floor(Math.random() * screen.width)/2
    document.getElementById("lightOFF, lightON").style.top = x + "px";
    document.getElementById("lightOFF, lightON").style.top = x + "px";




}