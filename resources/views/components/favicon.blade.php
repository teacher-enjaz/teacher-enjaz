<style>
    span.tooltiplinka,a.tooltiplink {
        position: relative;
    }

    a.tooltiplink:hover::after ,span.tooltiplink:hover::after{
        content: attr(data-title);
        background-color: #312d2d;
        color: #fff;
        padding: 8px;
        border-radius: 4px;
        font-size: 12px;
        line-height: 14px;
        display: block;
        position: absolute;
        margin-left: -5px;
        top: -15px;
        left: 130%;
        transform: translateX(-50%);
        white-space: nowrap;
        z-index: 1;
    }
</style>
@if(isset($site))
    <meta property="og:site_name" content="{{app()->getLocale() == 'ar' ? $site->site_name_ar:$site->site_name_en}}"/>
    <meta property="twitter:site_name" content="{{app()->getLocale() == 'ar' ? $site->site_name_ar:$site->site_name_en}}"/>
    @if(Storage::exists('/public/information/'.$site->logo))
        <link rel="shortcut icon" type="image/png" href="{{asset('/storage/information/'.$site->favicon)}}">
    @else
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/template/icons/favicon.ico')}}">
    @endif
@else
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/template/icons/favicon.ico')}}">
@endif

    <div class="d-flex flex-column position-fixed" style="left: 0px; top: 30px;z-index: 100; background: #ce3d4ee6; border-radius: 0px 10px 10px 0px;">
        <span class="nav-link  text-center text-black-50 tooltiplink" data-title="معايير النفاذ لمحتوى الويب">WCAG</span>
        <a class="nav-link  text-center text-white tooltiplink" href="#" id="mode" data-mode="0"
            data-title="نظام تباين الألوان">
            <i class="fa fa-eye"></i>
        </a>
        <span class="d-flex">
            <a href="#" class="nav-link text-center text-white font-weight-bold tooltiplink" data-title="تكبير حجم الخط">
                <span style="font-size:22px" id="size1">A</span>
                <span style="font-size:18px" id="size2">A</span>
                <span style="font-size:14px" id="size3">A</span>
            </a>
        </span>
        <a class="nav-link  text-center text-white tooltiplink" href="javascript:0;" id="sound" data-title="قراءة النصوص">
            <i class="fa fa-volume-off" id="btn"></i>
        </a>
    </div>
    {{--<div class="d-flex flex-column position-fixed" style="left: 0px; top: 80px;z-index: 100; background: #ce3d4ee6; border-radius: 0px 10px 10px 0px;">
        <span class="d-flex">
            <a href="#" class="nav-link text-center text-white font-weight-bold tooltiplink" data-title="تكبير حجم الخط">
                <span style="font-size:22px" id="size1">A</span>
                <span style="font-size:18px" id="size2">A</span>
                <span style="font-size:14px" id="size3">A</span>
            </a>
        </span>
    </div>
    <div class="d-flex flex-column position-fixed" style="left: 0px; top: 140px;z-index: 100; background: #ce3d4ee6; border-radius: 0px 10px 10px 0px;">
        <a class="nav-link  text-center text-white tooltiplink" href="javascript:0;" id="sound" data-title="قراءة النصوص">
            <i class="fa fa-volume-off" id="btn"></i>
        </a>
    </div>--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    /****************************** Reading text in site *******************************/
    let playText = (element) =>
    {
        window.speechSynthesis.cancel();
        let text = element.innerText;
        if ('speechSynthesis' in window) {
            let msg = new SpeechSynthesisUtterance();
            const voices = window.speechSynthesis.getVoices();
            msg.voice = voices[element];
           // msg.lang = "ar-EG";
            msg.lang = "ar-SA";
            msg.text = text;
            window.speechSynthesis.speak(msg);
            /*setTimeout(() => {
                if (!speechSynthesis.speaking) {
                    alert("Browser not supported")
                }
            }, 100)*/
        } else {
            alert("Browser not supported")
        }
    }
    let cancelText = () =>
    {
        window.speechSynthesis.cancel();
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
        const element9 = document.querySelectorAll("button");
        const element10 = document.querySelectorAll("image");
        const element11 = document.querySelectorAll("span");
        const element12 = document.querySelectorAll("small");

        element1.forEach(h1 => {
            h1.addEventListener('mouseover',(event)=>{
                playText(h1);
            })
        })

        element2.forEach(h2 => {
            h2.addEventListener('mouseover',(event)=>{
                playText(h2);
            })
        })

        element3.forEach(h3 => {
            h3.addEventListener('mouseover',(event)=>{
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
        element11.forEach(span => {
            span.addEventListener('mouseover',(event)=>{
                playText(span);
            })
        })
        element12.forEach(small => {
            small.addEventListener('mouseover',(event)=>{
                playText(small);
            })
        })
    }

    let cancelReadText = () =>{
        const element1 = document.querySelectorAll("h1");
        const element2 = document.querySelectorAll("h2");
        const element3 = document.querySelectorAll("h3");
        const element4 = document.querySelectorAll("h4");
        const element5 = document.querySelectorAll("h5");
        const element6 = document.querySelectorAll("h6");
        const element7 = document.querySelectorAll("p");
        const element8 = document.querySelectorAll("a");
        const element9 = document.querySelectorAll("button");
        const element10 = document.querySelectorAll("image");
        const element11 = document.querySelectorAll("span");
        const element12 = document.querySelectorAll("small");

        element1.forEach(h1 => {
            h1.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })

        element2.forEach(h2 => {
            h2.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })

        element3.forEach(h3 => {
            h3.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
        element4.forEach(h4 => {
            h4.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
        element5.forEach(h5 => {
            h5.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
        element6.forEach(h6 => {
            h6.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
        element7.forEach(p => {
            p.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
        element8.forEach(a => {
            a.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
        element9.forEach(btn => {
            btn.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
        element10.forEach(img => {
            img.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
        element11.forEach(span => {
            span.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
        element12.forEach(small => {
            small.addEventListener('mouseover',(event)=>{
                cancelText();
            })
        })
    }
    /****************************** Change Mode in site *******************************/

    let body = document.querySelector('body')
    $(document).ready(function()
    {
        //let mode = $('#mode').data('mode');
        var changeBtn = document.getElementById('mode');
        var mode = parseInt(changeBtn.getAttribute('data-mode'));
        //let mode = document.getElementById('data-mode');
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
                //$('#mode').data('mode',1);
                changeBtn.setAttribute('data-mode', mode);

                // $.ajax({
                //     url: '/changeMode/'+mode,
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function (data) {
                //     },
                // });
            }
            else
            {
                $('link#styles').attr('href',"{{asset('rawafed/assent/styles/css/styles.css')}}")
                mode = 0
                changeBtn.setAttribute('data-mode', mode);
                //$('#mode').data('mode',0);
                /*$.ajax({
                    url: '/changeMode/'+mode,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                    },
                });*/
            }

            if($('link#styles1').attr('href') === "{{asset('rawafed/assent/styles/css/Merge-style.css')}}")
            {
                $('link#styles1').attr('href',"{{asset('rawafed/assent/styles/css1/Merge-style.css')}}")
                mode = 1
                changeBtn.setAttribute('data-mode', mode);

                /*$.ajax({
                    url: '/changeMode/'+mode,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                    },
                });*/
            }
            else
            {
                $('link#styles1').attr('href',"{{asset('rawafed/assent/styles/css/Merge-style.css')}}")
                mode = 0
                changeBtn.setAttribute('data-mode', mode);

                // $.ajax({
                //     url: '/changeMode/'+mode,
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function (data) {
                //     },
                // });
            }

            if($('link#styles2').attr('href') === "{{asset('rawafed/assent/styles/css/index.css')}}")
            {
                $('link#styles2').attr('href',"{{asset('rawafed/assent/styles/css1/index.css')}}")
                mode = 1
                changeBtn.setAttribute('data-mode', mode);

                // $.ajax({
                //     url: '/changeMode/'+mode,
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function (data) {
                //     },
                // });
            }
            else
            {
                $('link#styles2').attr('href',"{{asset('rawafed/assent/styles/css/index.css')}}")
                mode = 0
                changeBtn.setAttribute('data-mode', mode);

                // $.ajax({
                //     url: '/changeMode/'+mode,
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function (data) {
                //     },
                // });
            }
            if($('link#styles3').attr('href') === "{{asset('rawafed/assent/styles/index/style.css')}}")
            {
                $('link#styles3').attr('href',"{{asset('rawafed/assent/styles/index/dark.css')}}")
                mode = 1
                changeBtn.setAttribute('data-mode', mode);

                // $.ajax({
                //     url: '/changeMode/'+mode,
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function (data) {
                //     },
                // });
            }
            else
            {
                $('link#styles3').attr('href',"{{asset('rawafed/assent/styles/index/style.css')}}")
                mode = 0
                changeBtn.setAttribute('data-mode', mode);

                // $.ajax({
                //     url: '/changeMode/'+mode,
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function (data) {
                //     },
                // });
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
            let className = $('i#btn').attr('class');
            if(className === 'fa fa-volume-off') {
                $('i.fa-volume-off').removeClass('fa-volume-off');
                $('i#btn').addClass('fa-volume-up');
                readText();
            }
            else
            {
                $('i.fa-volume-up').removeClass('fa-volume-up');
                $('i#btn').addClass('fa-volume-off');
                console.log('gggg')
                cancelReadText()
            }
        })
    });
</script>
