
/****************************** Reading text in site *******************************/
let playText = (element) =>
{
    let text = element.innerText;
    console.log(text)
    if ('speechSynthesis' in window) {
        let msg = new SpeechSynthesisUtterance();
        const voices = window.speechSynthesis.getVoices();
        msg.voice = voices[element];
        msg.lang = "ar-EG";
        //msg.lang = "ar-SA";
        msg.text = text;
        window.speechSynthesis.speak(msg);
    } else {
        document.write("Browser not supported")
    }
}
let readText = () =>{
    const element1 = document.querySelectorAll("h1");
    const element2 = document.querySelectorAll("h2");
    const element3 = document.querySelectorAll("h3");
    const element4 = document.querySelectorAll("h4");
    const element5 = document.querySelectorAll("h5");
    const element6 = document.querySelectorAll("h6");
    const element7 = document.querySelectorAll("p");
    const element8 = document.querySelectorAll("a");
    console.log(element8[0].text)
    const element9 = document.querySelectorAll("button");
    const element10 = document.querySelectorAll("image");

    element1.forEach(h1 => {
        h1.addEventListener('mouseover',(event)=>{
            playText(h1);
        })
    })

    element2.forEach(h2 => {
        h2.addEventListener('mouseover',(event)=>{
            playText(h4);
        })
    })

    element3.forEach(h3 => {
        h3addEventListener('mouseover',(event)=>{
            playText(h3);
        })
    })
    element4.forEach(h4 => {
        h4.addEventListener('mouseover',(event)=>{
            playText(h4);
        })
    })
    element5.forEach(h5 => {
        h5.addEventListener('mouseover',(event)=>{
            playText(h5);
        })
    })
    element6.forEach(h6 => {
        h6.addEventListener('mouseover',(event)=>{
            playText(h6);
        })
    })
    element7.forEach(p => {
        p.addEventListener('mouseover',(event)=>{
            playText(p);
        })
    })
    element8.forEach(a => {
        a.addEventListener('mouseover',(event)=>{
            playText(a);
        })
    })
    element9.forEach(btn => {
        btn.addEventListener('mouseover',(event)=>{
            playText(btn);
        })
    })
    element10.forEach(img => {
        img.addEventListener('mouseover',(event)=>{
            playText(img);
        })
    })

}
/****************************** Change Mode in site *******************************/

let body = document.querySelector('body')
$(document).ready(function()
{
    let mode = $('#mode').data('mode');
    console.log(mode)
    if(mode === 0)
    {
        $('link#styles').attr('href',"{{asset('rawafed/assent/styles/css/styles.css')}}")
        $('link#styles1').attr('href',"{{asset('rawafed/assent/styles/css/Merge-style.css')}}")
        $('link#styles2').attr('href',"{{asset('rawafed/assent/styles/css/index.css')}}")
        $('link#styles3').attr('href',"{{asset('rawafed/assent/styles/index/style.css')}}")
    }
    else if(mode === 1)
    {
        $('link#styles').attr('href',"{{asset('rawafed/assent/styles/css1/styles.css')}}")
        $('link#styles1').attr('href',"{{asset('rawafed/assent/styles/css1/Merge-style.css')}}")
        $('link#styles2').attr('href',"{{asset('rawafed/assent/styles/css1/index.css')}}")
        $('link#styles3').attr('href',"{{asset('rawafed/assent/styles/index/dark.css')}}")

    }

    $('#mode').click(function(){
        if($('link#styles').attr('href') === "{{asset('rawafed/assent/styles/css/styles.css')}}")
        {
            $('link#styles').attr('href',"{{asset('rawafed/assent/styles/css1/styles.css')}}")
            mode = 1
            $.ajax({
                url: '/changeMode/'+mode,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                },
            });
        }
        else
        {
            $('link#styles').attr('href',"{{asset('rawafed/assent/styles/css/styles.css')}}")
            mode = 0
            $.ajax({
                url: '/changeMode/'+mode,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                },
            });
        }

        if($('link#styles1').attr('href') === "{{asset('rawafed/assent/styles/css/Merge-style.css')}}")
        {
            $('link#styles1').attr('href',"{{asset('rawafed/assent/styles/css1/Merge-style.css')}}")
            mode = 1
            $.ajax({
                url: '/changeMode/'+mode,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                },
            });
        }
        else
        {
            $('link#styles1').attr('href',"{{asset('rawafed/assent/styles/css/Merge-style.css')}}")
            mode = 0
            $.ajax({
                url: '/changeMode/'+mode,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                },
            });
        }

        if($('link#styles2').attr('href') === "{{asset('rawafed/assent/styles/css/index.css')}}")
        {
            $('link#styles2').attr('href',"{{asset('rawafed/assent/styles/css1/index.css')}}")
            mode = 1
            $.ajax({
                url: '/changeMode/'+mode,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                },
            });
        }
        else
        {
            $('link#styles2').attr('href',"{{asset('rawafed/assent/styles/css/index.css')}}")
            mode = 0
            $.ajax({
                url: '/changeMode/'+mode,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                },
            });
        }
        if($('link#styles3').attr('href') === "{{asset('rawafed/assent/styles/index/style.css')}}")
        {
            $('link#styles3').attr('href',"{{asset('rawafed/assent/styles/index/dark.css')}}")
            mode = 1
            $.ajax({
                url: '/changeMode/'+mode,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                },
            });
        }
        else
        {
            $('link#styles3').attr('href',"{{asset('rawafed/assent/styles/index/style.css')}}")
            mode = 0
            $.ajax({
                url: '/changeMode/'+mode,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                },
            });
        }
    })
    let size1 = document.getElementById("size1")
    let size2 = document.getElementById("size2")
    let size3 = document.getElementById("size3")
    $('#size1').click(function() {
        body.style.zoom = "125%"
        size1.style.textDecoration = "underline"
        size2.style.textDecoration = "none"
        size3.style.textDecoration = "none"
    })
    $('#size2').click(function() {
        body.style.zoom = "110%"
        size2.style.textDecoration = "underline"
        size1.style.textDecoration = "none"
        size3.style.textDecoration = "none"
    })
    $('#size3').click(function() {
        body.style.zoom = "100%"
        size3.style.textDecoration = "underline"
        size2.style.textDecoration = "none"
        size1.style.textDecoration = "none"
    })

    $('#sound').click(function() {
        $('#btn').removeClass('fa-volume-mute')
        $('#btn').addClass('fa-microphone')
        readText();
    })
});

